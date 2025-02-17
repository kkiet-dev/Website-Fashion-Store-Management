<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Shipping extends Model
{
    use HasFactory;

    protected $table = 'shipping';

    protected $fillable = [
        'order_id',
        'product_id',
        'quantity',
        'price',
        'shipping_address',
        'status',
        'payment_method',
        'user_id'
    ];

    // Liên kết đến bảng orders
    public function order()
    {
        return $this->belongsTo(Order::class);
    }

    // Liên kết đến bảng users
    public function user()
    {
        return $this->belongsTo(User::class);
        
    }

    public function product()
    {
        return $this->belongsTo(Product::class, 'product_id');
    }
}


