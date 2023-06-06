<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;
    protected $fillable = [
        'name',
        'reference',
        'price',
        'weight',
        'category_id',
        'stock',
        'shipping_cost',
        'image_path',
        'slug',
        'details',
        'description',
        'brand_id',

    ];
}
