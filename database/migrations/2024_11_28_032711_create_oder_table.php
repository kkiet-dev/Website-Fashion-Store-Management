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
        // Bảng orders
        Schema::create('orders', function (Blueprint $table) {
            $table->id(); // Khóa chính id tự tăng
            $table->unsignedBigInteger('user_id'); // ID người dùng
            $table->enum('status', ['cart', 'pending', 'completed', 'cancelled'])->default('cart'); // Trạng thái đơn hàng
            $table->timestamps();
        });

        // Bảng order_items
        Schema::create('order_items', function (Blueprint $table) {
            $table->id(); // Khóa chính id tự tăng
            $table->unsignedBigInteger('order_id'); // Liên kết đến bảng orders
            $table->unsignedBigInteger('product_id'); // Liên kết đến bảng products
            $table->integer('quantity'); // Số lượng sản phẩm
            $table->decimal('price', 10, 2); // Giá tại thời điểm thêm vào giỏ hàng
            $table->timestamps();

            // Khóa ngoại liên kết với bảng orders
            $table->foreign('order_id')->references('id')->on('orders')->onDelete('cascade');

            // Khóa ngoại liên kết với bảng products
            $table->foreign('product_id')->references('id')->on('products')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('order_items');
        Schema::dropIfExists('orders');
    }
};
