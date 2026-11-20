<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class LabUploadedFile extends Model
{
    protected $fillable = [
        'user_id',
        'lab_id',
        'storage_key',
        'content',
        'content_type',
        'expires_at_ms',
    ];

    protected function casts(): array
    {
        return [
            'expires_at_ms' => 'integer',
        ];
    }
}
