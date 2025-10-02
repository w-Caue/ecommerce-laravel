<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ProductImage extends Model
{
    protected $fillable = ['product_id', 'image', 'mime_type'];

    public function product()
    {
        return $this->belongsTo(Product::class);
    }

    // Helper para converter em base64
    public function getBase64ImageAttribute()
    {
        return "data:{$this->mime_type};base64," . base64_encode($this->image);
    }
}
