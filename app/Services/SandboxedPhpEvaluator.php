<?php

namespace App\Services;

use App\Models\LabSession;

class SandboxedPhpEvaluator
{
    public function hasValidImageMagicBytes(string $buf): bool
    {
        if (strlen($buf) < 4) {
            return false;
        }

        $b0 = ord($buf[0]);
        $b1 = ord($buf[1]);
        $b2 = ord($buf[2]);
        $b3 = ord($buf[3]);

        $isJpeg = $b0 === 0xFF && $b1 === 0xD8 && $b2 === 0xFF;
        $isPng = $b0 === 0x89 && $b1 === 0x50 && $b2 === 0x4E && $b3 === 0x47;
        $isGif = $b0 === 0x47 && $b1 === 0x49 && $b2 === 0x46 && $b3 === 0x38;

        return $isJpeg || $isPng || $isGif;
    }

    /**
     * Pure string/regex evaluator simulating sandboxed PHP execution against virtual files.
     * Never calls eval(), shell_exec(), include, or touches host filesystem.
     *
     * @param  array<string, mixed>  $queryParams
     * @return array{outputBuffer: string, executed: bool, exfiltrated: bool}
     */
    public function evaluate(string $fileBuffer, array $queryParams, LabSession $session): array
    {
        if ($fileBuffer === '' || ! str_contains($fileBuffer, '<?')) {
            return [
                'outputBuffer' => $fileBuffer,
                'executed' => false,
                'exfiltrated' => (bool) $session->exfiltrated,
            ];
        }

        $secret = $session->carlos_secret ?: LabSession::DEFAULT_CARLOS_SECRET;
        $virtualFiles = [
            '/home/carlos/secret' => $secret,
            '/etc/passwd' => "root:x:0:0:root:/root:/bin/bash\ndaemon:x:1:1:daemon:/usr/sbin:/usr/sbin/nologin\ncarlos:x:1001:1001::/home/carlos:/bin/bash\nwiener:x:1002:1002::/home/wiener:/bin/bash\n",
            '/etc/hostname' => 'peter-wiener-academy-host',
        ];

        $runVirtualCmd = static function (string $cmd) use ($virtualFiles): string {
            $c = trim($cmd);
            if (str_contains($c, '/home/carlos/secret')) {
                return $virtualFiles['/home/carlos/secret'];
            }
            if (str_contains($c, '/etc/passwd')) {
                return $virtualFiles['/etc/passwd'];
            }
            if (preg_match('/\bwhoami\b/', $c)) {
                return "carlos\n";
            }
            if (preg_match('/\bid\b/', $c)) {
                return "uid=1001(carlos) gid=1001(carlos) groups=1001(carlos)\n";
            }
            if (preg_match('/\bhostname\b/', $c)) {
                return "peter-wiener-academy-host\n";
            }
            if (preg_match('/\buname\b/', $c)) {
                return "Linux academy-lab 5.15.0-generic x86_64 GNU/Linux\n";
            }
            if (preg_match('/\bpwd\b/', $c)) {
                return "/var/www/html/files/avatars\n";
            }
            if (preg_match('/\bls\b/', $c)) {
                return "secret\n";
            }

            return $virtualFiles['/home/carlos/secret'];
        };

        $exfiltrated = (bool) $session->exfiltrated;

        $evalPhpBlock = static function (string $rawBlock) use ($queryParams, $virtualFiles, $runVirtualCmd, &$exfiltrated): string {
            $expr = preg_replace('/^<\?(?:php|=)?/i', '', $rawBlock) ?? $rawBlock;
            $expr = preg_replace('/\?>$/', '', $expr) ?? $expr;
            $expr = trim($expr);

            $expr = preg_replace_callback('/\$_(?:GET|REQUEST|POST)\[\s*[\'"]([^\'"]+)[\'"]\s*\]/', static function (array $m) use ($queryParams): string {
                $val = (string) ($queryParams[$m[1]] ?? '');

                return json_encode($val, JSON_UNESCAPED_SLASHES | JSON_UNESCAPED_UNICODE) ?: '""';
            }, $expr) ?? $expr;

            $expr = preg_replace_callback('/(?:file_get_contents|readfile|highlight_file|include)\(\s*[\'"]([^\'"]+)[\'"]\s*\)/i', static function (array $m) use ($virtualFiles): string {
                $cleanP = trim($m[1]);
                if (str_contains($cleanP, 'carlos/secret')) {
                    $val = $virtualFiles['/home/carlos/secret'];
                } elseif (str_contains($cleanP, 'etc/passwd')) {
                    $val = $virtualFiles['/etc/passwd'];
                } elseif (str_contains($cleanP, 'etc/hostname')) {
                    $val = $virtualFiles['/etc/hostname'];
                } else {
                    $val = $virtualFiles[$cleanP] ?? '';
                }

                return json_encode($val, JSON_UNESCAPED_SLASHES | JSON_UNESCAPED_UNICODE) ?: '""';
            }, $expr) ?? $expr;

            $expr = preg_replace_callback('/(?:system|exec|shell_exec|passthru)\(\s*[\'"]([^\'"]+)[\'"]\s*\)/i', static function (array $m) use ($runVirtualCmd): string {
                return json_encode($runVirtualCmd($m[1]), JSON_UNESCAPED_SLASHES | JSON_UNESCAPED_UNICODE) ?: '""';
            }, $expr) ?? $expr;

            $stmts = array_values(array_filter(array_map('trim', explode(';', $expr)), static fn ($s) => $s !== ''));
            $outs = [];

            foreach ($stmts as $st) {
                $body = trim(preg_replace('/^(?:echo|print)\b\s*/i', '', $st) ?? $st);
                preg_match_all('/"(?:\\\\.|[^"\\\\])*"|\'(?:\\\\.|[^\'\\\\])*\'|[^.]+/', $body, $partsMatch);
                $parts = $partsMatch[0] ?: [$body];
                $built = '';
                foreach ($parts as $part) {
                    $t = trim($part);
                    if ($t === '' || $t === '.') {
                        continue;
                    }
                    if ((str_starts_with($t, '"') && str_ends_with($t, '"')) || (str_starts_with($t, "'") && str_ends_with($t, "'"))) {
                        $inner = substr($t, 1, -1);
                        $inner = str_replace(['\\n', '\\"', "\\'"], ["\n", '"', "'"], $inner);
                        $built .= $inner;
                    }
                }
                if ($built !== '') {
                    $outs[] = $built;
                }
            }

            $finalOut = implode('', $outs);
            if ($finalOut === '' && preg_match('/carlos\/secret/i', $rawBlock)) {
                $finalOut = $virtualFiles['/home/carlos/secret'];
            }
            if (str_contains($finalOut, $virtualFiles['/home/carlos/secret']) || str_contains($finalOut, 'root:x:0:0')) {
                $exfiltrated = true;
            }

            return $finalOut;
        };

        $outChunks = [];
        $cursor = 0;
        $len = strlen($fileBuffer);

        while ($cursor < $len) {
            $startIdx = strpos($fileBuffer, '<?', $cursor);
            if ($startIdx === false) {
                $outChunks[] = substr($fileBuffer, $cursor);
                break;
            }
            if ($startIdx > $cursor) {
                $outChunks[] = substr($fileBuffer, $cursor, $startIdx - $cursor);
            }
            $endIdx = strpos($fileBuffer, '?>', $startIdx + 2);
            if ($endIdx === false) {
                $rawPhp = substr($fileBuffer, $startIdx);
                $outChunks[] = $evalPhpBlock($rawPhp);
                break;
            }
            $rawPhp = substr($fileBuffer, $startIdx, $endIdx + 2 - $startIdx);
            $outChunks[] = $evalPhpBlock($rawPhp);
            $cursor = $endIdx + 2;
        }

        if ($exfiltrated && ! $session->exfiltrated) {
            $session->exfiltrated = true;
            $session->save();
        }

        return [
            'outputBuffer' => implode('', $outChunks),
            'executed' => true,
            'exfiltrated' => $exfiltrated,
        ];
    }
}
