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

        Schema::create('transaksi_header', function (Blueprint $table) {
            $table->id('id_transaksi_header'); // Primary key (AUTO_INCREMENT)
            $table->unsignedBigInteger('id_customer')->nullable(); // Kolom id_customer
            $table->date('tanggal_transaksi')->nullable(); // Kolom tanggal_transaksi
            $table->integer('total_transaksi')->nullable(); // Kolom total_transaksi
            $table->boolean('tipe_pembayaran')->nullable(); // Kolom tipe_pembayaran
            $table->text('deskripsi')->nullable(); // Kolom deskripsi
            $table->boolean('status_transaksi')->default(1); // Kolom status_transaksi (default 1)
            $table->timestamps(); // Kolom created_at dan updated_at
            $table->softDeletes(); // Kolom deleted_at (soft deletes)

            $table->foreign('id_customer')->references('id_customer')->on('customer')->onDelete('set null');
        });

        Schema::create('temp_transaksi_header', function (Blueprint $table) {
            $table->id('id_transaksi_header'); // Primary key (AUTO_INCREMENT)
            $table->unsignedBigInteger('id_customer')->nullable(); // Kolom id_customer
            $table->date('tanggal_transaksi')->nullable(); // Kolom tanggal_transaksi
            $table->integer('total_transaksi')->nullable(); // Kolom total_transaksi
            $table->boolean('status_transaksi')->default(1); // Kolom status_transaksi (default 1)
            $table->timestamps(); // Kolom created_at dan updated_at
            $table->softDeletes(); // Kolom deleted_at (soft deletes)

            $table->foreign('id_customer')->references('id_customer')->on('customer')->onDelete('set null');
        });

        Schema::create('transaksi_detail', function (Blueprint $table) {
            $table->id('id_transaksi_detail'); // Primary key (AUTO_INCREMENT)
            $table->unsignedBigInteger('id_transaksi_header')->nullable(); // Kolom id_transaksi_header
            $table->unsignedBigInteger('id_stok')->nullable(); // Kolom id_stok
            $table->integer('jumlah')->nullable(); // Kolom jumlah
            $table->integer('sub_total')->nullable(); // Kolom sub_total
            $table->boolean('status_transaksi_detail')->default(1); // Kolom status_transaksi_detail (default 1)
            $table->timestamps(); // Kolom created_at dan updated_at
            $table->softDeletes(); // Kolom deleted_at (soft deletes)

            $table->foreign('id_transaksi_header')->references('id_transaksi_header')->on('transaksi_header')->onDelete('cascade');
            $table->foreign('id_stok')->references('id_stok')->on('stok')->onDelete('cascade');
        });

        Schema::create('temp_transaksi_detail', function (Blueprint $table) {
            $table->id('id_transaksi_detail'); // Primary key (AUTO_INCREMENT)
            $table->unsignedBigInteger('id_transaksi_header')->nullable(); // Kolom id_transaksi_header
            $table->unsignedBigInteger('id_stok')->nullable(); // Kolom id_stok
            $table->integer('jumlah')->nullable(); // Kolom jumlah
            $table->integer('sub_total')->nullable(); // Kolom sub_total
            $table->boolean('status_transaksi_detail')->default(1); // Kolom status_transaksi_detail (default 1)
            $table->timestamps(); // Kolom created_at dan updated_at
            $table->softDeletes(); // Kolom deleted_at (soft deletes)

            $table->foreign('id_transaksi_header')->references('id_transaksi_header')->on('temp_transaksi_header')->onDelete('cascade');
            $table->foreign('id_stok')->references('id_stok')->on('stok')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('transaksi_detail');
        Schema::dropIfExists('temp_transaksi_detail');
        Schema::dropIfExists('transaksi_header');
        Schema::dropIfExists('temp_transaksi_header');
    }
};
