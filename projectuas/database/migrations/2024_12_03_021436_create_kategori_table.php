<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateKategoriTable extends Migration
{
    public function up()
    {
        Schema::create('kategori', function (Blueprint $table) {
            $table->id('id_kategori'); // Primary key (AUTO_INCREMENT)
            $table->string('nama_kategori', 255)->nullable(); // Nama kategori
            $table->boolean('status')->default(1); // Status kategori, default 1
            $table->timestamps(); // Kolom created_at dan updated_at
            $table->softDeletes(); // Kolom deleted_at (soft deletes)
        });
    }

    public function down()
    {
        Schema::dropIfExists('kategori');
    }
}
