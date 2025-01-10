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
        Schema::create('jobs', function (Blueprint $table) {
            $table->id(); // Primary key (BIGINT unsigned, AUTO_INCREMENT)
            $table->string('queue', 255); // Kolom queue
            $table->longText('payload'); // Kolom payload
            $table->unsignedTinyInteger('attempts'); // Kolom attempts (unsigned tinyint)
            $table->unsignedInteger('reserved_at')->nullable(); // Kolom reserved_at (nullable)
            $table->unsignedInteger('available_at'); // Kolom available_at (unsigned int)
            $table->unsignedInteger('created_at'); // Kolom created_at (unsigned int)

            // Index untuk kolom 'queue'
            $table->index('queue', 'jobs_queue_index');
        });

        Schema::create('job_batches', function (Blueprint $table) {
            $table->string('id', 255)->primary(); // Primary key
            $table->string('name', 255); // Nama batch
            $table->integer('total_jobs'); // Total pekerjaan
            $table->integer('pending_jobs'); // Pekerjaan yang belum selesai
            $table->integer('failed_jobs'); // Jumlah pekerjaan yang gagal
            $table->longText('failed_job_ids'); // ID pekerjaan yang gagal
            $table->mediumText('options')->nullable(); // Opsi tambahan (nullable)
            $table->integer('cancelled_at')->nullable(); // Waktu pembatalan
            $table->integer('created_at'); // Waktu pembuatan
            $table->integer('finished_at')->nullable(); // Waktu selesai (nullable)
        });

        Schema::create('failed_jobs', function (Blueprint $table) {
            $table->id();
            $table->string('uuid')->unique();
            $table->text('connection');
            $table->text('queue');
            $table->longText('payload');
            $table->longText('exception');
            $table->timestamp('failed_at')->useCurrent();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('jobs');
        Schema::dropIfExists('job_batches');
        Schema::dropIfExists('failed_jobs');
    }
};
