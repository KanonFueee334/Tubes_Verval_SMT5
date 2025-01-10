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
        Schema::create('users', function (Blueprint $table) {
            $table->id(); // Primary key (AUTO_INCREMENT)
            $table->string('name'); // Kolom name
            $table->string('email')->unique(); // Kolom email (unique)
            $table->timestamp('email_verified_at')->nullable(); // Kolom email_verified_at
            $table->string('password'); // Kolom password
            $table->string('remember_token', 100)->nullable(); // Kolom remember_token
            $table->timestamps(); // Kolom created_at dan updated_at
        });

        Schema::create('password_reset_tokens', function (Blueprint $table) {
            $table->string('email', 255); // Kolom email
            $table->string('token', 255); // Kolom token
            $table->timestamp('created_at')->nullable(); // Kolom created_at (nullable)

            // Primary key pada kolom 'email'
            $table->primary('email');
        });

        Schema::create('sessions', function (Blueprint $table) {
            $table->string('id', 255); // Kolom id (varchar(255))
            $table->unsignedBigInteger('user_id')->nullable(); // Kolom user_id (bigint unsigned, nullable)
            $table->string('ip_address', 45)->nullable(); // Kolom ip_address (varchar(45), nullable)
            $table->text('user_agent')->nullable(); // Kolom user_agent (text, nullable)
            $table->longText('payload'); // Kolom payload (longtext)
            $table->integer('last_activity'); // Kolom last_activity (int(11))

            // Primary Key dan Indexes
            $table->primary('id'); // Menetapkan id sebagai primary key
            $table->index('user_id'); // Index untuk user_id
            $table->index('last_activity'); // Index untuk last_activity
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('users');
        Schema::dropIfExists('password_reset_tokens');
        Schema::dropIfExists('sessions');
    }
};
