<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    protected $fillable = [
        'customer_id',
        'status',
        'payment',
        'created_date',
        'total',
        'observation',
    ];

     public function items()
    {
        return $this->belongsToMany(Product::class, 'order_items')->withPivot('quantity', 'total');
    }
}
