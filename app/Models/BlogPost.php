<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class BlogPost extends Model
{
    public $incrementing = false;

    protected $keyType = 'int';

    protected $fillable = [
        'id',
        'img',
        'title',
        'author',
        'published_label',
        'excerpt',
        'body',
    ];
}
