<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('shipping', function (Blueprint $table) {
            $table->id(); // Khóa chính tự tăng
            $table->unsignedBigInteger('order_id'); // Liên kết đến bảng orders
            $table->unsignedBigInteger('product_id'); // Liên kết đến bảng products
            $table->integer('quantity'); // Số lượng sản phẩm
            $table->decimal('price', 10, 2); // Giá
            $table->string('shipping_address'); // Địa chỉ giao hàng
            // $table->string('status')->default('pending'); // Trạng thái giao hàng
            $table->enum('status', ['pending', 'delivered'])->default('pending');
            $table->timestamps();
            $table->unsignedBigInteger('user_id'); // Thêm cột user_id
           
        
            // Khóa ngoại
            $table->foreign('order_id')->references('id')->on('orders')->onDelete('cascade');
            $table->foreign('product_id')->references('id')->on('products')->onDelete('cascade');
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade'); // Khóa ngoại
        });
        
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('shipping');
    }
};
