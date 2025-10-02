<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    protected $fillable = [
        'name',
        'description',
        'price',
        'image',
        'stock',
        'active',
        'category_id',
    ];

    public function images()
    {
        return $this->hasMany(\App\Models\ProductImage::class);
    }
}
