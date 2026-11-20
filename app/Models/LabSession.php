<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class LabSession extends Model
{
    public const DEFAULT_CARLOS_SECRET = '2B2tlPyJQfJDynyKME5D02Cw0ouydMpZ';

    public const DEFAULT_EXECUTABLE_EXTS = ['.php', '.php5', '.phtml', '.phar'];

    protected $fillable = [
        'user_id',
        'lab_id',
        'exfiltrated',
        'solved',
        'solved_at',
        'logged_in_user',
        'avatar_path',
        'executable_exts',
        'carlos_secret',
        'chat_history',
        'exploit_state',
    ];

    protected function casts(): array
    {
        return [
            'exfiltrated' => 'boolean',
            'solved' => 'boolean',
            'solved_at' => 'datetime',
            'executable_exts' => 'array',
            'chat_history' => 'array',
            'exploit_state' => 'array',
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

    public static function forUserAndLab(int $userId, string $labId): self
    {
        return self::firstOrCreate(
            ['user_id' => $userId, 'lab_id' => strtolower($labId)],
            [
                'exfiltrated' => false,
                'solved' => false,
                'logged_in_user' => '',
                'avatar_path' => '',
                'executable_exts' => self::DEFAULT_EXECUTABLE_EXTS,
                'carlos_secret' => self::DEFAULT_CARLOS_SECRET,
                'chat_history' => [],
                'exploit_state' => null,
            ]
        );
    }

    public function resetState(): void
    {
        $this->fill([
            'exfiltrated' => false,
            'solved' => false,
            'solved_at' => null,
            'logged_in_user' => '',
            'avatar_path' => '',
            'executable_exts' => self::DEFAULT_EXECUTABLE_EXTS,
            'carlos_secret' => self::DEFAULT_CARLOS_SECRET,
            'chat_history' => [],
            'exploit_state' => null,
        ]);
        $this->save();

        LabUploadedFile::where('user_id', $this->user_id)
            ->where('lab_id', $this->lab_id)
            ->delete();
    }
}
