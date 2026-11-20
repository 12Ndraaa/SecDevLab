<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class CveArticle extends Model
{
    public const SEVERITIES = ['CRITICAL', 'HIGH', 'MEDIUM', 'LOW', 'INFO'];

    public const STATUSES = ['published', 'draft'];

    protected $fillable = [
        'cve_id',
        'slug',
        'cve_year',
        'category_id',
        'lab_id',
        'title',
        'cvss_score',
        'severity',
        'affected_product',
        'summary',
        'technical_analysis',
        'poc_content',
        'mitigation',
        'references_json',
        'source_repo',
        'is_hot',
        'status',
        'author_id',
        'published_at',
    ];

    protected function casts(): array
    {
        return [
            'cve_year' => 'integer',
            'cvss_score' => 'float',
            'references_json' => 'array',
            'is_hot' => 'boolean',
            'published_at' => 'datetime',
        ];
    }

    public function category(): BelongsTo
    {
        return $this->belongsTo(Category::class, 'category_id', 'id');
    }

    public function lab(): BelongsTo
    {
        return $this->belongsTo(Lab::class, 'lab_id', 'id');
    }

    public function author(): BelongsTo
    {
        return $this->belongsTo(User::class, 'author_id');
    }

    public function scopePublished(Builder $query): Builder
    {
        return $query->where('status', 'published');
    }

    public function severityBadgeClass(): string
    {
        return match (strtoupper((string) $this->severity)) {
            'CRITICAL' => 'vla-sev--critical',
            'HIGH' => 'vla-sev--high',
            'MEDIUM' => 'vla-sev--medium',
            'LOW' => 'vla-sev--low',
            default => 'vla-sev--info',
        };
    }

    /**
     * @return Collection<int, Lab>
     */
    public function relatedLabs(int $limit = 4): Collection
    {
        if (! $this->category_id) {
            return $this->lab ? new Collection([$this->lab]) : new Collection;
        }

        $query = Lab::where('category_id', $this->category_id)->orderBy('sort_order');
        if ($this->lab_id) {
            $query->where('id', '!=', $this->lab_id);
        }

        $list = $query->limit($limit)->get();
        if ($this->lab) {
            $list->prepend($this->lab);
        }

        return $list->take($limit);
    }
}
