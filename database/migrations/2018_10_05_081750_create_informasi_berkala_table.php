<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateInformasiBerkalaTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('informasi_berkala', function (Blueprint $table) {
            $table->increments('id');
            $table->string('nama_info');
            $table->string('kategori');
            $table->string('jenis');
            $table->string('link')->nullable();
            $table->string('file')->nullable();
            $table->index('jenis');
            $table->index('nama_info');
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
        Schema::dropIfExists('informasi_berkala');
    }
}
