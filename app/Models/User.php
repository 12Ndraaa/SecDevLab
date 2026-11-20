<?php

namespace App\Models;

use Database\Factories\UserFactory;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    /** @use HasFactory<UserFactory> */
    use HasFactory, Notifiable;

    public const ROLE_OWNER = 'owner';

    public const ROLE_USER = 'user';

    public const DIFFICULTY_POINTS = [
        'APPRENTICE' => 10,
        'PRACTITIONER' => 25,
        'EXPERT' => 50,
    ];

    /**
     * The attributes that are mass assignable.
     * Note: 'role' is intentionally excluded to prevent mass-assignment privilege escalation.
     *
     * @var list<string>
     */
    protected $fillable = [
        'name',
        'email',
        'password',
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var list<string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * Get the attributes that should be cast.
     *
     * @return array<string, string>
     */
    protected function casts(): array
    {
        return [
            'email_verified_at' => 'datetime',
            'password' => 'hashed',
        ];
    }

    public function isOwner(): bool
    {
        return strtolower((string) $this->role) === self::ROLE_OWNER;
    }

    public function isUser(): bool
    {
        return ! $this->isOwner();
    }

    public function labSessions(): HasMany
    {
        return $this->hasMany(LabSession::class);
    }

    public function cveArticles(): HasMany
    {
        return $this->hasMany(CveArticle::class, 'author_id');
    }

    /**
     * @return array<string, true>
     */
    public function solvedLabIdMap(): array
    {
        $ids = $this->labSessions()
            ->where('solved', true)
            ->pluck('lab_id')
            ->all();

        $map = [];
        foreach ($ids as $id) {
            $map[strtolower((string) $id)] = true;
        }

        return $map;
    }

    /**
     * @return array{total_solved: int, points: int, apprentice: int, practitioner: int, expert: int}
     */
    public function progressSummary(): array
    {
        $solvedSessions = $this->labSessions()
            ->with('lab:id,difficulty')
            ->where('solved', true)
            ->get();

        $app = 0;
        $prac = 0;
        $exp = 0;
        foreach ($solvedSessions as $s) {
            $diff = $s->lab?->difficulty ?? 'APPRENTICE';
            if ($diff === 'EXPERT') {
                $exp++;
            } elseif ($diff === 'PRACTITIONER') {
                $prac++;
            } else {
                $app++;
            }
        }

        return [
            'total_solved' => $app + $prac + $exp,
            'points' => ($app * self::DIFFICULTY_POINTS['APPRENTICE'])
                + ($prac * self::DIFFICULTY_POINTS['PRACTITIONER'])
                + ($exp * self::DIFFICULTY_POINTS['EXPERT']),
            'apprentice' => $app,
            'practitioner' => $prac,
            'expert' => $exp,
        ];
    }
}
