<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    protected $fillable = [
        'name',
        'description',
        'price',
        'original_price',
        'brand',
        'color',
        'sizes',
        'stock',
        'category',
        'image',
    ];

    protected $casts = [
        'sizes' => 'array',
    ];
}
