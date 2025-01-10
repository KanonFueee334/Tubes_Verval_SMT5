<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateBarangTable extends Migration
{
    public function up()
    {
        Schema::create('barang', function (Blueprint $table) {
            $table->id('id_barang'); // Primary key
            $table->unsignedBigInteger('id_kategori')->nullable(); // Foreign key kategori
            $table->unsignedBigInteger('id_supplier')->nullable(); // Foreign key supplier
            $table->string('nama_barang', 255); // Nama barang
            $table->boolean('status')->default(1); // Status aktif/tidak
            $table->softDeletes(); // Kolom deleted_at
            $table->timestamps(); // Kolom created_at dan updated_at

            $table->foreign('id_kategori')->references('id_kategori')->on('kategori')->onDelete('set null');
            $table->foreign('id_supplier')->references('id_supplier')->on('supplier')->onDelete('set null');
        });
    }

    public function down()
    {
        Schema::dropIfExists('barang');
    }
}
