<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Categories extends Model
{
    use HasFactory;
    // Các thuộc tính có thể gán
    protected $fillable = [
        'name',
        'description'
    ];

    /**
     * Định nghĩa mối quan hệ nhiều-nhiều với model Product
     */
    public function products()
    {
        // return $this->belongsToMany(Product::class, 'category_product');
        return $this->hasMany(Product::class, 'category_id');
    }
}