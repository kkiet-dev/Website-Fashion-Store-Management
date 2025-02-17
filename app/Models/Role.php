<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Role extends Model
{
    use HasFactory;

    // Định nghĩa bảng mà model này tương tác
    protected $table = 'roles';

    // Các trường có thể được gán đại diện cho mô hình
    protected $fillable = ['name'];


    // Nếu cần thiết, bạn có thể thêm mối quan hệ với bảng users (nếu bạn muốn quản lý người dùng theo vai trò)
    public function users()
    {
        return $this->hasMany(User::class);
    }
}