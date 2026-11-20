<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Lab extends Model
{
    public $incrementing = false;

    protected $keyType = 'string';

    protected $fillable = [
        'id',
        'category_id',
        'title',
        'href',
        'difficulty',
        'difficulty_class',
        'description_html',
        'sections',
        'profile',
        'sort_order',
    ];

    protected function casts(): array
    {
        return [
            'sections' => 'array',
            'profile' => 'array',
        ];
    }

    public function category(): BelongsTo
    {
        return $this->belongsTo(Category::class, 'category_id', 'id');
    }

    public function labSessions(): HasMany
    {
        return $this->hasMany(LabSession::class, 'lab_id', 'id');
    }

    public function cveArticles(): HasMany
    {
        return $this->hasMany(CveArticle::class, 'lab_id', 'id');
    }

    public function levelDisplayClass(): string
    {
        return match ($this->difficulty) {
            'PRACTITIONER' => 'lab-level-display__practitioner',
            'EXPERT' => 'lab-level-display__expert',
            default => 'lab-level-display__apprentice',
        };
    }

    public static function difficultyClassFor(string $difficulty): string
    {
        return match (strtoupper($difficulty)) {
            'PRACTITIONER' => 'label-light-blue-small',
            'EXPERT' => 'label-purple-small',
            default => 'label-light-green-small',
        };
    }
}
