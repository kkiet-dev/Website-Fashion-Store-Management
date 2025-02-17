<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class OrderItem extends Model
{
    // Các trường có thể gán giá trị hàng loạt
    protected $fillable = [
        'order_id',
        'product_id',
        'quantity',
        'price',
    ];

    // Liên kết với bảng orders
    public function order()
    {
        return $this->belongsTo(Order::class);
    }

    // Liên kết với bảng products
    public function product()
    {
        return $this->belongsTo(Product::class);
    }
}

