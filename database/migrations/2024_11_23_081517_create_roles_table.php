<?php
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\DB;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('roles', function (Blueprint $table) {
            $table->id();
            $table->string('name')->unique(); // Tên vai trò (admin, user, etc.)
            $table->timestamps();
        });

        // Thêm vai trò mặc định vào bảng roles
        DB::table('roles')->insert([
            ['name' => 'admin'], // Vai trò admin
            ['name' => 'user'],  // Vai trò user
        ]);
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('roles');
    }
};
