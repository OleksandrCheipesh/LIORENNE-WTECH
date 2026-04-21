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
        'colors',
        'sizes',
        'stock',
        'category',
        'image',
        'images',
    ];

    protected $casts = [
        'sizes'  => 'array',
        'colors' => 'array',
        'images' => 'array',
    ];
}
