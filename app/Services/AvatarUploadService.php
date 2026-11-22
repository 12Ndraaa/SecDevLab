<?php

namespace App\Services;

use App\Models\Lab;
use App\Models\LabSession;
use App\Models\LabUploadedFile;
use Illuminate\Http\Request;

class AvatarUploadService
{
    public function __construct(
        private readonly SandboxedPhpEvaluator $phpEvaluator
    ) {}

    /**
     * Parse raw multipart/form-data first (preserving ../, %2f, %00 filenames from Burp/tests),
     * falling back to standard Laravel UploadedFile or query parameters.
     *
     * @return array{rawFilename: string, partContentType: string, fileBuffer: string}
     */
    public function parseUpload(Request $request): array
    {
        $rawBuffer = (string) $request->getContent();
        $contentTypeHeader = (string) $request->header('Content-Type', '');

        $boundary = '';
        if (preg_match('/boundary=(?:"([^"]+)"|([^;\s]+))/i', $contentTypeHeader, $bMatch)) {
            $boundary = trim($bMatch[1] !== '' ? $bMatch[1] : ($bMatch[2] ?? ''));
        } elseif (strlen($rawBuffer) > 4 && str_starts_with($rawBuffer, '--')) {
            $firstNl = strpos($rawBuffer, "\n");
            if ($firstNl !== false) {
                $boundary = trim(rtrim(substr($rawBuffer, 2, $firstNl - 2), "\r"));
            }
        }

        if ($boundary !== '' && $rawBuffer !== '') {
            $delim = '--'.$boundary;
            $pos = strpos($rawBuffer, $delim);
            while ($pos !== false) {
                $partStart = $pos + strlen($delim);
                $nextPos = strpos($rawBuffer, $delim, $partStart);
                if ($nextPos === false) {
                    break;
                }
                $partSlice = substr($rawBuffer, $partStart, $nextPos - $partStart);
                if (str_starts_with($partSlice, "\r\n")) {
                    $partSlice = substr($partSlice, 2);
                } elseif (str_starts_with($partSlice, "\n")) {
                    $partSlice = substr($partSlice, 1);
                }

                $sepIdx = strpos($partSlice, "\r\n\r\n");
                $sepLen = 4;
                if ($sepIdx === false) {
                    $sepIdx = strpos($partSlice, "\n\n");
                    $sepLen = 2;
                }

                if ($sepIdx !== false) {
                    $headersStr = substr($partSlice, 0, $sepIdx);
                    if (preg_match('/filename=/i', $headersStr) || preg_match('/name="avatar"/i', $headersStr)) {
                        $rawFilename = 'avatar.jpg';
                        if (preg_match('/filename="([^"]*)"/i', $headersStr, $fnM)) {
                            $rawFilename = trim($fnM[1]);
                        } elseif (preg_match('/filename=([^;\r\n]+)/i', $headersStr, $fnM)) {
                            $rawFilename = trim($fnM[1]);
                        }

                        $partContentType = 'application/octet-stream';
                        if (preg_match('/Content-Type:\s*([^\r\n;]+)/i', $headersStr, $ctM)) {
                            $partContentType = strtolower(trim($ctM[1]));
                        }

                        $bodyBuf = substr($partSlice, $sepIdx + $sepLen);
                        if (str_ends_with($bodyBuf, "\r\n")) {
                            $bodyBuf = substr($bodyBuf, 0, -2);
                        } elseif (str_ends_with($bodyBuf, "\n")) {
                            $bodyBuf = substr($bodyBuf, 0, -1);
                        }

                        return [
                            'rawFilename' => $rawFilename,
                            'partContentType' => $partContentType,
                            'fileBuffer' => $bodyBuf,
                        ];
                    }
                }
                $pos = $nextPos;
            }
        }

        if ($request->hasFile('avatar')) {
            $file = $request->file('avatar');
            $rawName = $_FILES['avatar']['name'] ?? $file->getClientOriginalName();
            $clientMime = strtolower((string) ($_FILES['avatar']['type'] ?? $file->getClientMimeType() ?? 'application/octet-stream'));

            return [
                'rawFilename' => (string) $rawName,
                'partContentType' => $clientMime,
                'fileBuffer' => (string) file_get_contents($file->getRealPath()),
            ];
        }

        return [
            'rawFilename' => (string) $request->input('filename', 'avatar.jpg'),
            'partContentType' => strtolower(trim(explode(';', (string) $request->input('contentType', $contentTypeHeader ?: 'application/octet-stream'))[0])),
            'fileBuffer' => $request->has('content') ? (string) $request->input('content') : $rawBuffer,
        ];
    }

    /**
     * @return array{ok: bool, status: int, errorBody?: string, headers: array<string, string>, reportedPath?: string, storedKey?: string}
     */
    public function processUpload(Request $request, Lab $lab, LabSession $session): array
    {
        $parsed = $this->parseUpload($request);
        $rawFilename = $parsed['rawFilename'];
        $partContentType = $parsed['partContentType'];
        $fileBuffer = $parsed['fileBuffer'];

        $profile = is_array($lab->profile) ? $lab->profile : [];
        $rule = $profile['uploadRule'] ?? 'no-validation';
        $headers = ['Cache-Control' => 'no-store'];
        if ($rule === 'extension-blacklist') {
            $headers['Server'] = 'Apache/2.4.41 (Ubuntu)';
        }

        $storedKey = '';
        $reportedPath = '';

        if ($rule === 'content-type') {
            if ($partContentType !== 'image/jpeg' && $partContentType !== 'image/png') {
                return [
                    'ok' => false,
                    'status' => 403,
                    'headers' => $headers,
                    'errorBody' => "Sorry, file type {$partContentType} is not allowed. Only image/jpeg and image/png are allowed.",
                ];
            }
            $baseName = $this->posixBasename($rawFilename);
            $storedKey = "avatars/{$baseName}";
            $reportedPath = "avatars/{$baseName}";
        } elseif ($rule === 'path-traversal') {
            $strippedLiteral = preg_replace('/\.\.[\/\\\\]/', '', $rawFilename) ?? $rawFilename;
            $decodedName = rawurldecode($strippedLiteral);
            if (str_starts_with($decodedName, '../') || str_starts_with($decodedName, '..\\') || str_contains($decodedName, '/../')) {
                $baseName = $this->posixBasename(str_replace('\\', '/', $decodedName));
                $storedKey = $baseName;
                $reportedPath = "avatars/../{$baseName}";
            } else {
                $baseName = $this->posixBasename(str_replace('\\', '/', $decodedName));
                $storedKey = "avatars/{$baseName}";
                $reportedPath = "avatars/{$baseName}";
            }
        } elseif ($rule === 'extension-blacklist') {
            $baseName = $this->posixBasename($rawFilename);
            $ext = $this->posixExtname($baseName);
            if (in_array($ext, ['.php', '.php2', '.php3', '.php4', '.php5', '.phtml', '.phar'], true)) {
                return [
                    'ok' => false,
                    'status' => 403,
                    'headers' => $headers,
                    'errorBody' => 'Sorry, php files are not allowed.',
                ];
            }
            if ($baseName === '.htaccess') {
                if (preg_match('/AddType\s+application\/x-httpd-php\s+([^\s\r\n]+)/i', $fileBuffer, $m)) {
                    $mapped = strtolower($m[1]);
                    if (! str_starts_with($mapped, '.')) {
                        $mapped = '.'.$mapped;
                    }
                    $exts = is_array($session->executable_exts) ? $session->executable_exts : LabSession::DEFAULT_EXECUTABLE_EXTS;
                    if (! in_array($mapped, $exts, true)) {
                        $exts[] = $mapped;
                        $session->executable_exts = $exts;
                        $session->save();
                    }
                }
            }
            $storedKey = "avatars/{$baseName}";
            $reportedPath = "avatars/{$baseName}";
        } elseif ($rule === 'null-byte') {
            if (! preg_match('/\.(jpg|jpeg|png)$/i', $rawFilename)) {
                return [
                    'ok' => false,
                    'status' => 403,
                    'headers' => $headers,
                    'errorBody' => 'Sorry, only JPG & PNG files are allowed.',
                ];
            }
            $parts = preg_split('/%00|\x00/i', $rawFilename);
            $baseName = $this->posixBasename($parts[0] ?? $rawFilename);
            $storedKey = "avatars/{$baseName}";
            $reportedPath = "avatars/{$baseName}";
        } elseif ($rule === 'polyglot') {
            if (! $this->phpEvaluator->hasValidImageMagicBytes($fileBuffer)) {
                return [
                    'ok' => false,
                    'status' => 403,
                    'headers' => $headers,
                    'errorBody' => 'Error: File is not a valid image.',
                ];
            }
            $baseName = $this->posixBasename($rawFilename);
            $storedKey = "avatars/{$baseName}";
            $reportedPath = "avatars/{$baseName}";
        } elseif ($rule === 'race-condition') {
            $baseName = $this->posixBasename($rawFilename);
            $ext = $this->posixExtname($baseName);
            $storedKey = "avatars/{$baseName}";
            $reportedPath = "avatars/{$baseName}";

            $expiresAtMs = (int) floor(microtime(true) * 1000) + 2500;
            $this->storeFile($session->user_id, $lab->id, $storedKey, $fileBuffer, $partContentType, $expiresAtMs);

            // Simulate virus/type check race window before rejecting non-image extensions
            usleep(350000);
            if (! in_array($ext, ['.jpg', '.jpeg', '.png'], true)) {
                return [
                    'ok' => false,
                    'status' => 403,
                    'headers' => $headers,
                    'errorBody' => "Sorry, only JPG & PNG files are allowed\nSorry, there was an error uploading your file.",
                ];
            }
        } else {
            $baseName = $this->posixBasename($rawFilename);
            $storedKey = "avatars/{$baseName}";
            $reportedPath = "avatars/{$baseName}";
        }

        $this->storeFile($session->user_id, $lab->id, $storedKey, $fileBuffer, $partContentType, null);

        if ($session->logged_in_user === '') {
            $session->logged_in_user = 'wiener';
        }
        $session->avatar_path = "files/{$storedKey}";
        $session->save();

        return [
            'ok' => true,
            'status' => 200,
            'headers' => $headers,
            'reportedPath' => $reportedPath,
            'storedKey' => $storedKey,
        ];
    }

    public function normalizeStorageKey(string $rawRel): string
    {
        $decoded = str_replace('\\', '/', rawurldecode($rawRel));
        $segments = explode('/', $decoded);
        $stack = [];

        foreach ($segments as $seg) {
            if ($seg === '' || $seg === '.') {
                continue;
            }
            if ($seg === '..') {
                array_pop($stack);
                continue;
            }
            $stack[] = $seg;
        }

        return implode('/', $stack);
    }

    public function findActiveFile(int $userId, string $labId, string $storageKey): ?LabUploadedFile
    {
        $record = LabUploadedFile::where('user_id', $userId)
            ->where('lab_id', strtolower($labId))
            ->where('storage_key', $storageKey)
            ->first();

        if (! $record) {
            return null;
        }

        $nowMs = (int) floor(microtime(true) * 1000);
        if ($record->expires_at_ms !== null && $nowMs > $record->expires_at_ms) {
            $record->delete();

            return null;
        }

        return $record;
    }

    public function posixExtname(string $filename): string
    {
        $base = $this->posixBasename($filename);
        $dotPos = strrpos($base, '.');
        if ($dotPos === false || $dotPos === 0) {
            return '';
        }

        return strtolower(substr($base, $dotPos));
    }

    private function posixBasename(string $filename): string
    {
        $clean = str_replace('\\', '/', $filename);
        $parts = explode('/', $clean);

        return (string) end($parts);
    }

    private function storeFile(
        int $userId,
        string $labId,
        string $storageKey,
        string $content,
        string $contentType,
        ?int $expiresAtMs
    ): void {
        LabUploadedFile::updateOrCreate(
            [
                'user_id' => $userId,
                'lab_id' => strtolower($labId),
                'storage_key' => $storageKey,
            ],
            [
                'content' => $content,
                'content_type' => $contentType,
                'expires_at_ms' => $expiresAtMs,
            ]
        );
    }
}
