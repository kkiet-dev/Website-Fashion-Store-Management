<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProductCategory extends Model
{
    use HasFactory;

    // Bảng liên kết với model
    protected $table = 'product_categories';

    // Các cột được phép gán giá trị (Mass Assignable)
    protected $fillable = [
        'name',
        'description',
    ];

    /**
     * Định nghĩa mối quan hệ với sản phẩm (Product).
     * Một danh mục có nhiều sản phẩm.
     */
    public function products()
    {
        // return $this->hasMany(Product::class, 'category_id');
        return $this->hasMany(Product::class);
    }
}
