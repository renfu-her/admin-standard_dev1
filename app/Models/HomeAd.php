<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class HomeAd extends Model
{
    protected $fillable = [
        'title',
        'image',
        'link',
        'is_active',
        'sort_order'
    ];

    protected $casts = [
        'is_active' => 'boolean'
    ];
} 