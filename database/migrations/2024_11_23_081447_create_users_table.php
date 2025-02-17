

<?php

// use Illuminate\Database\Migrations\Migration;
// use Illuminate\Database\Schema\Blueprint;
// use Illuminate\Support\Facades\Schema;

// return new class extends Migration
// {
//     public function up()
//     {
//         Schema::create('users', function (Blueprint $table) {
//             $table->id();  // Tạo cột ID tự tăng
//             $table->string('name');  // Tạo cột tên người dùng
//             $table->string('email')->unique();  // Tạo cột email và đảm bảo nó là duy nhất
//             $table->timestamp('email_verified_at')->nullable();  // Cột xác thực email
//             $table->string('password');  // Cột mật khẩu người dùng
//             $table->rememberToken();  // Cột remember_token (dùng cho tính năng "Remember me")
//             $table->timestamps();  // Cột created_at và updated_at
//             $table->foreign('role_id')->references('id')->on('roles')->onDelete('set default');

//         });
//     }

//     public function down()
//     {
//         Schema::dropIfExists('users');
//     }
// };


use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::create('users', function (Blueprint $table) {
            $table->id();  // Tạo cột ID tự tăng
            $table->string('name');  // Tạo cột tên người dùng
            $table->string('email')->unique();  // Tạo cột email và đảm bảo nó là duy nhất
            $table->timestamp('email_verified_at')->nullable();  // Cột xác thực email
            $table->string('password');  // Cột mật khẩu người dùng
            $table->rememberToken();  // Cột remember_token (dùng cho tính năng "Remember me")
            $table->timestamps();  // Cột created_at và updated_at
            
            // Tạo cột role_id và thiết lập khóa ngoại
            $table->foreignId('role_id')->constrained('roles')->onDelete('set default');
        });
    }

    public function down()
    {
        Schema::dropIfExists('users');
    }
};
