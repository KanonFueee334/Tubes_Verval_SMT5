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
        Schema::create('cache', function (Blueprint $table) {
            $table->string('key', 255)->primary(); // Kolom key sebagai primary key
            $table->mediumText('value'); // Kolom value
            $table->integer('expiration'); // Kolom expiration
        });

        Schema::create('cache_locks', function (Blueprint $table) {
            $table->string('key', 255)->primary(); // Kolom key sebagai primary key
            $table->string('owner', 255); // Kolom owner
            $table->integer('expiration'); // Kolom expiration
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('cache');
        Schema::dropIfExists('cache_locks');
    }
};
