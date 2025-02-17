<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Term extends Model
{
     // Các trường có thể gán giá trị hàng loạt
     protected $fillable = [
        'name',
        'image',
        'description'
    ];
}