<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
     // Các trường có thể gán giá trị hàng loạt
     protected $fillable = [
        'user_id',
        'status',
        'total_price',
    ];

    // Liên kết với các OrderItem
    public function items()
    {
        return $this->hasMany(OrderItem::class);
    }
}
