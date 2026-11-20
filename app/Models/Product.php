<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    public $incrementing = false;

    protected $keyType = 'int';

    protected $fillable = [
        'id',
        'img',
        'filename',
        'name',
        'cat',
        'price',
        'stars',
        'released',
        'desc',
    ];

    protected function casts(): array
    {
        return [
            'released' => 'boolean',
        ];
    }
}
