<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCustomerTable extends Migration
{
    public function up()
    {
        Schema::create('customer', function (Blueprint $table) {
            $table->id('id_customer'); // Primary key (AUTO_INCREMENT)
            $table->string('nama_customer', 255)->nullable(); // Nama customer
            $table->string('alamat_customer', 255)->nullable(); // Alamat customer
            $table->string('email_customer', 255)->nullable(); // Email customer
            $table->string('telp_customer', 255)->nullable(); // Telepon customer
            $table->boolean('status_customer')->default(1); // Status customer dengan default 1
            $table->timestamps(); // Kolom created_at dan updated_at
            $table->softDeletes(); // Kolom deleted_at
        });
    }

    public function down()
    {
        Schema::dropIfExists('customer');
    }
}
