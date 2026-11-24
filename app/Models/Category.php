<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Category extends Model
{
    public $incrementing = false;

    protected $keyType = 'string';

    protected $fillable = [
        'id',
        'title',
        'topic_route',
        'lab_count',
        'sort_order',
    ];

    public function localizedTitle(?string $locale = null): string
    {
        return \App\Services\CatalogLocalization::categoryTitle(
            (string) $this->id,
            (string) $this->title,
            $locale
        );
    }

    public function labs(): HasMany
    {
        return $this->hasMany(Lab::class, 'category_id', 'id')->orderBy('sort_order');
    }

    public function cveArticles(): HasMany
    {
        return $this->hasMany(CveArticle::class, 'category_id', 'id');
    }

    public function syncLabCount(): void
    {
        $this->lab_count = $this->labs()->count();
        $this->save();
    }
}
