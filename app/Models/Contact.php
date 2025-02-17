<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Contact extends Model
{
     // Các trường có thể gán giá trị hàng loạt
     protected $fillable = [
        'name',
        'email',
        'message'
    ];
}