<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Support\Facades\Cache;

class LabSession extends Model
{
    public const DEFAULT_EXECUTABLE_EXTS = ['.php', '.php5', '.phtml', '.phar'];

    protected $fillable = [
        'user_id',
        'lab_id',
        'instance_token',
        'expires_at',
        'exfiltrated',
        'instance_solved',
        'solved',
        'solved_at',
        'logged_in_user',
        'avatar_path',
        'executable_exts',
        'carlos_secret',
        'session_secrets',
        'chat_history',
        'exploit_state',
        'workbench_state',
        'ui_theme',
    ];

    protected function casts(): array
    {
        return [
            'expires_at' => 'datetime',
            'exfiltrated' => 'boolean',
            'instance_solved' => 'boolean',
            'solved' => 'boolean',
            'solved_at' => 'datetime',
            'executable_exts' => 'array',
            'session_secrets' => 'array',
            'chat_history' => 'array',
            'exploit_state' => 'array',
            'workbench_state' => 'array',
        ];
    }

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }

    public function lab(): BelongsTo
    {
        return $this->belongsTo(Lab::class, 'lab_id', 'id');
    }

    public static function generateInstanceToken(): string
    {
        do {
            $token = bin2hex(random_bytes(16));
        } while (self::where('instance_token', $token)->exists());

        return $token;
    }

    /**
     * @return array<string, string>
     */
    public static function generateSessionSecrets(?string $instanceToken = null): array
    {
        $prefix = substr($instanceToken ?: bin2hex(random_bytes(4)), 0, 8);
        $carlosSecret = bin2hex(random_bytes(16));

        return [
            'carlos_secret' => $carlosSecret,
            'file_secret' => bin2hex(random_bytes(10)),
            'admin_password' => 'adm_'.bin2hex(random_bytes(6)),
            'carlos_password' => 'crl_'.bin2hex(random_bytes(6)),
            'wiener_api_key' => bin2hex(random_bytes(16)),
            'carlos_api_key' => bin2hex(random_bytes(16)),
            'aws_secret' => 'AKIA'.strtoupper(bin2hex(random_bytes(8))).'/'.bin2hex(random_bytes(12)),
            'hostname' => 'lab-'.$prefix.'.secdevlab.internal',
            'csrf_token' => bin2hex(random_bytes(16)),
            'forgot_password_token' => bin2hex(random_bytes(10)),
            'tracking_id' => bin2hex(random_bytes(8)),
            'lab_session_cookie' => self::base64UrlEncode((string) json_encode([
                'user' => 'wiener',
                'role' => 'user',
                'sid' => bin2hex(random_bytes(6)),
            ], JSON_UNESCAPED_SLASHES)),
            'users_table_suffix' => bin2hex(random_bytes(3)),
            'jwt_hs_secret' => bin2hex(random_bytes(12)),
            'oauth_client_secret' => 'sec_'.bin2hex(random_bytes(12)),
        ];
    }

    public static function forUserAndLab(int $userId, string $labId, ?string $uiTheme = null, ?string $uiLocale = null): self
    {
        $normalizedLabId = strtolower($labId);
        $theme = in_array($uiTheme, ['dark', 'light'], true) ? $uiTheme : 'light';
        $resolvedLocale = in_array($uiLocale, ['en', 'id'], true)
            ? $uiLocale
            : (string) Cache::get("secdevlab_user_locale:{$userId}", '');
        if (! in_array($resolvedLocale, ['en', 'id'], true)) {
            $resolvedLocale = in_array(app()->getLocale(), ['en', 'id'], true) ? app()->getLocale() : 'en';
        }

        $existing = self::where('user_id', $userId)
            ->where('lab_id', $normalizedLabId)
            ->first();

        if ($existing) {
            if (
                empty($existing->instance_token)
                || empty($existing->session_secrets)
                || $existing->isExpired()
            ) {
                $existing->resetState($uiTheme, true, $uiLocale);
            } else {
                if ($uiTheme && in_array($uiTheme, ['dark', 'light'], true) && $existing->ui_theme !== $uiTheme) {
                    $existing->ui_theme = $uiTheme;
                    $existing->save();
                }
                if ($uiLocale && in_array($uiLocale, ['en', 'id'], true) && $existing->uiLocale() !== $uiLocale) {
                    $existing->setUiLocale($uiLocale, false);
                }
            }

            return $existing;
        }

        $token = self::generateInstanceToken();
        $secrets = self::generateSessionSecrets($token);

        $created = self::create([
            'user_id' => $userId,
            'lab_id' => $normalizedLabId,
            'instance_token' => $token,
            'expires_at' => now()->addMinutes(self::ttlMinutes()),
            'exfiltrated' => false,
            'instance_solved' => false,
            'solved' => false,
            'logged_in_user' => '',
            'avatar_path' => '',
            'executable_exts' => self::DEFAULT_EXECUTABLE_EXTS,
            'carlos_secret' => $secrets['carlos_secret'],
            'session_secrets' => $secrets,
            'chat_history' => [],
            'exploit_state' => null,
            'workbench_state' => $resolvedLocale !== 'en' ? ['_ui_locale' => $resolvedLocale] : null,
            'ui_theme' => $theme,
        ]);

        if ($resolvedLocale !== 'en') {
            Cache::forever("secdevlab_session_locale:{$created->id}", $resolvedLocale);
        }

        return $created;
    }

    public function uiLocale(?string $fallbackLocale = null): string
    {
        $wb = is_array($this->workbench_state) ? $this->workbench_state : [];
        if (isset($wb['_ui_locale']) && in_array($wb['_ui_locale'], ['en', 'id'], true)) {
            return (string) $wb['_ui_locale'];
        }

        $sessionCached = (string) Cache::get("secdevlab_session_locale:{$this->id}", '');
        if (in_array($sessionCached, ['en', 'id'], true)) {
            return $sessionCached;
        }

        if ($this->user_id) {
            $userCached = (string) Cache::get("secdevlab_user_locale:{$this->user_id}", '');
            if (in_array($userCached, ['en', 'id'], true)) {
                return $userCached;
            }
        }

        if ($fallbackLocale && in_array($fallbackLocale, ['en', 'id'], true)) {
            return $fallbackLocale;
        }

        return in_array(app()->getLocale(), ['en', 'id'], true) ? app()->getLocale() : 'en';
    }

    public function setUiLocale(string $locale, bool $persistUser = true): void
    {
        $clean = in_array(strtolower($locale), ['en', 'id'], true) ? strtolower($locale) : 'en';
        $wb = is_array($this->workbench_state) ? $this->workbench_state : [];
        $wb['_ui_locale'] = $clean;
        $this->workbench_state = $wb;
        $this->save();

        Cache::forever("secdevlab_session_locale:{$this->id}", $clean);
        if ($persistUser && $this->user_id) {
            Cache::forever("secdevlab_user_locale:{$this->user_id}", $clean);
        }
    }

    public static function findByToken(string $token): ?self
    {
        $clean = strtolower(trim($token));
        if (! preg_match('/^[a-f0-9]{32,64}$/', $clean)) {
            return null;
        }

        return self::with('lab.category')
            ->where('instance_token', $clean)
            ->first();
    }

    public static function ttlMinutes(): int
    {
        return max(5, (int) config('lab.ttl_minutes', 60));
    }

    public function isExpired(): bool
    {
        if (! $this->expires_at) {
            return false;
        }

        return $this->expires_at->isPast();
    }

    public function remainingSeconds(): int
    {
        if (! $this->expires_at) {
            return self::ttlMinutes() * 60;
        }

        return max(0, (int) now()->diffInSeconds($this->expires_at, false));
    }

    public function remainingLabel(?string $locale = null): string
    {
        $lang = in_array($locale, ['en', 'id'], true) ? $locale : app()->getLocale();
        $secs = $this->remainingSeconds();
        if ($secs <= 0) {
            return $lang === 'id' ? 'Kedaluwarsa' : 'Expired';
        }

        $mins = intdiv($secs, 60);
        $remSecs = $secs % 60;

        if ($mins >= 60) {
            $hrs = intdiv($mins, 60);
            $remMins = $mins % 60;

            return $lang === 'id'
                ? sprintf('%dj %02dm', $hrs, $remMins)
                : sprintf('%dh %02dm', $hrs, $remMins);
        }

        return $lang === 'id'
            ? sprintf('%dm %02dd', $mins, $remSecs)
            : sprintf('%dm %02ds', $mins, $remSecs);
    }

    public function renewTtl(?int $minutes = null): void
    {
        $mins = max(5, $minutes ?? self::ttlMinutes());
        $this->expires_at = now()->addMinutes($mins);
        $this->save();
    }

    public function resetState(?string $uiTheme = null, bool $rotateToken = true, ?string $uiLocale = null): void
    {
        $token = $rotateToken || empty($this->instance_token)
            ? self::generateInstanceToken()
            : (string) $this->instance_token;

        $secrets = self::generateSessionSecrets($token);
        $preservedLocale = in_array($uiLocale, ['en', 'id'], true)
            ? $uiLocale
            : $this->uiLocale();

        $this->fill([
            'instance_token' => $token,
            'expires_at' => now()->addMinutes(self::ttlMinutes()),
            'exfiltrated' => false,
            'instance_solved' => false,
            'logged_in_user' => '',
            'avatar_path' => '',
            'executable_exts' => self::DEFAULT_EXECUTABLE_EXTS,
            'carlos_secret' => $secrets['carlos_secret'],
            'session_secrets' => $secrets,
            'chat_history' => [],
            'exploit_state' => null,
            'workbench_state' => $preservedLocale !== 'en' ? ['_ui_locale' => $preservedLocale] : null,
            'ui_theme' => in_array($uiTheme, ['dark', 'light'], true)
                ? $uiTheme
                : ($this->ui_theme ?: 'light'),
        ]);
        $this->save();

        Cache::forever("secdevlab_session_locale:{$this->id}", $preservedLocale);

        LabUploadedFile::where('user_id', $this->user_id)
            ->where('lab_id', $this->lab_id)
            ->delete();
    }

    public function secret(string $key, string $default = ''): string
    {
        $secrets = is_array($this->session_secrets) ? $this->session_secrets : [];
        if (empty($secrets)) {
            $secrets = self::generateSessionSecrets($this->instance_token ?: null);
            $this->session_secrets = $secrets;
            $this->carlos_secret = $secrets['carlos_secret'];
            $this->save();
        }

        if ($key === 'carlos_secret' && ! empty($this->carlos_secret)) {
            return (string) $this->carlos_secret;
        }

        return (string) ($secrets[$key] ?? $default);
    }

    public function buildSessionJwt(?string $overrideUser = null, ?string $overrideRole = null): string
    {
        $user = $overrideUser ?: ($this->logged_in_user ?: 'wiener');
        $role = $overrideRole ?: ($user === 'administrator' ? 'administrator' : 'user');
        $header = self::base64UrlEncode((string) json_encode(['alg' => 'HS256', 'typ' => 'JWT'], JSON_UNESCAPED_SLASHES));
        $payload = self::base64UrlEncode((string) json_encode([
            'iss' => 'secdevlab-auth',
            'sub' => $user,
            'role' => $role,
            'sid' => substr((string) $this->instance_token, 0, 12),
            'exp' => ($this->expires_at?->timestamp ?? (time() + 3600)),
        ], JSON_UNESCAPED_SLASHES));
        $sig = self::base64UrlEncode(hash_hmac('sha256', "{$header}.{$payload}", $this->secret('jwt_hs_secret'), true));

        return "{$header}.{$payload}.{$sig}";
    }

    private static function base64UrlEncode(string $raw): string
    {
        return rtrim(strtr(base64_encode($raw), '+/', '-_'), '=');
    }
}
