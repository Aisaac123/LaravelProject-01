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
        Schema::create('comments', function (Blueprint $table) {
            $table->bigIncrements('id')->primary();
            $table->foreignId('user_id')->constrained('users');
            $table->foreignId('image_id')->constrained('images');
            $table->longText('body')->nullable(false);
            $table->timestamps();
        });

        Schema::create('likes', function (Blueprint $table) {
            $table->bigIncrements('id')->primary();
            $table->foreignId('user_id')->constrained('users');
            $table->foreignId('image_id')->constrained('images');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('comments');
        Schema::dropIfExists('likes');
    }
};
