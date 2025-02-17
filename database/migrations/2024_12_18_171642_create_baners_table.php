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
        Schema::create('baners', function (Blueprint $table) {
            $table->id(); // Primary key
            $table->string('name'); // Name of the slider
            $table->string('image')->nullable(); // Image path or URL
            $table->text('description')->nullable(); // Description of the slider
            $table->timestamps(); // Created at and Updated at
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('baners');
    }
};
