<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateStokTable extends Migration
{
    public function up()
    {
        Schema::create('stok', function (Blueprint $table) {
            $table->id('id_stok'); // Primary key (AUTO_INCREMENT)
            $table->foreignId('id_purchasing_order_detail')->nullable(); // Kolom id_purchasing_order_detail
            $table->unsignedBigInteger('id_barang')->nullable(); // Kolom id_barang
            $table->integer('harga_barang_jual')->nullable(); // Kolom harga_barang_jual
            $table->boolean('status')->default(1); // Kolom status (default 1)
            $table->timestamps(); // Kolom created_at dan updated_at
            $table->softDeletes(); // Kolom deleted_at (soft deletes)
        });
    }

    public function down()
    {
        Schema::dropIfExists('stok');
    }
}
