<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;
    public $timestamps = false; 

    protected $table = 'products';
    protected $fillable = [
        'name', 
        'image',
        'description', 
        'price', 
        'quantity', 
        'category_id'
    ];

    public function category()
    {
        return $this->belongsTo(ProductCategory::class, 'category_id');
        // return $this->belongsTo(ProductCategory::class, 'category_id');
    }

    public function images()
    {
        return $this->hasMany(ProductImage::class);
    }
    public function shippings()
    {
        return $this->hasMany(Shipping::class, 'product_id');
    }

    public function reviews()
    {
        return $this->hasMany(ProductReview::class);
    }

    public function comments()
    {
        return $this->hasMany(Comment::class);
    }

}
