<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateInformasiSetiapsaatTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('informasi_setiapsaat', function (Blueprint $table) {
            $table->increments('id');
            $table->string('nama_info')->nullable();
            $table->string('bagian_info');
            $table->string('kategori')->nullable();
            $table->string('keterangan')->nullable();
            $table->string('jenis');
            $table->string('link')->nullable();
            $table->string('file')->nullable();
            $table->index('jenis');
            $table->index('nama_info');
            $table->index('kategori');
            $table->index('keterangan');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('informasi_setiapsaat');
    }
}
