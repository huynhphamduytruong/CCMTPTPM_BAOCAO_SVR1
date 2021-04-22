<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Builder;

/**
 * @mixin Builder
 */
class Product extends Model
{
    use HasFactory;

    protected $casts = [
        'price' => 'double'
    ];

    protected $fillable = [
        'name',
        'description',
        'img_url',
        'price',
        'screen',
        'resolution',
        'ram',
        'cpu',
        'gpu',
        'storage',
        'discontinued',
        'category_id',
        'brand_id',
    ];
}
