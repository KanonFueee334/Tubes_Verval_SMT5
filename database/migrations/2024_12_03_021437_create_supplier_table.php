<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSupplierTable extends Migration
{
    public function up()
    {
        Schema::create('supplier', function (Blueprint $table) {
            $table->id('id_supplier'); // Primary key (AUTO_INCREMENT)
            $table->string('nama_supplier')->nullable(); // Kolom nama_supplier
            $table->string('alamat_supplier')->nullable(); // Kolom alamat_supplier
            $table->string('email_supplier')->nullable(); // Kolom email_supplier
            $table->string('telp_supplier')->nullable(); // Kolom telp_supplier
            $table->boolean('status_supplier')->default(1); // Kolom status_supplier (default 1)
            $table->timestamps(); // Kolom created_at dan updated_at
            $table->softDeletes(); // Kolom deleted_at (soft deletes)
        });
    }

    public function down()
    {
        Schema::dropIfExists('supplier');
    }
}
