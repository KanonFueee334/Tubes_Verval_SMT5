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

        Schema::create('purchasing_order_header', function (Blueprint $table) {
            $table->id('id_purchasing_order_header'); // Primary key (AUTO_INCREMENT)
            $table->unsignedBigInteger('id_supplier')->nullable(); // Kolom id_supplier
            $table->date('tanggal_order')->nullable(); // Kolom tanggal_order (type DATE)
            $table->integer('total_order')->nullable(); // Kolom total_order
            $table->boolean('status_order')->default(1); // Kolom status_order (default 1)
            $table->softDeletes(); // Kolom deleted_at (soft deletes)

            $table->foreign('id_supplier')->references('id_supplier')->on('supplier')->onDelete('cascade');
        });

        Schema::create('purchasing_order_detail', function (Blueprint $table) {
            $table->id('id_purchasing_order_detail'); // Primary key (AUTO_INCREMENT)
            $table->unsignedBigInteger('id_purchasing_order_header')->nullable(); // Kolom id_purchasing_order_header
            $table->unsignedBigInteger('id_barang')->nullable(); // Kolom id_barang
            $table->integer('jumlah_barang')->nullable(); // Kolom jumlah_barang
            $table->integer('harga_barang')->nullable(); // Kolom harga_barang
            $table->integer('sub_total')->nullable(); // Kolom sub_total
            $table->boolean('status_order_detail')->default(1); // Kolom status_order_detail (default 1)
            $table->softDeletes(); // Kolom deleted_at (soft deletes)

            $table->foreign('id_purchasing_order_header')->references('id_purchasing_order_header')->on('purchasing_order_header')->onDelete('cascade');
            $table->foreign('id_barang')->references('id_barang')->on('barang')->onDelete('cascade');

            // Menambahkan foreign key jika ada relasi dengan tabel lain
            // $table->foreign('id_purchasing_order_header')->references('id')->on('purchasing_order_headers');
            // $table->foreign('id_barang')->references('id')->on('barang');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('purchasing_order_detail');
        Schema::dropIfExists('purchasing_order_header');
    }
};
