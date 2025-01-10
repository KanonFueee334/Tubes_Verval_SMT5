<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePenggunaTable extends Migration
{
    public function up()
    {
        Schema::create('pengguna', function (Blueprint $table) {
            $table->id('id_pengguna'); // Primary key (AUTO_INCREMENT)
            $table->string('nama_pengguna', 255); // Kolom nama_pengguna
            $table->string('password', 255); // Kolom password_pengguna
            $table->integer('saldo')->default(25000000); // Kolom saldo, default 25000000
            $table->enum('role', ['superadmin', 'admin', 'gudang']); // Kolom role dengan enum
        });
    }

    public function down()
    {
        Schema::dropIfExists('pengguna');
    }
}
