<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Article extends Model
{
     // Các trường có thể gán giá trị hàng loạt
     protected $fillable = [
        'name',
        'description'
    ];
}