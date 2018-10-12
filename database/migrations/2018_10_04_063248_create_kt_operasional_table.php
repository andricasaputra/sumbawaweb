<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateKtOperasionalTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('kt_operasional', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('domas')->nullable()->default(0);
            $table->integer('dokel')->nullable()->default(0);
            $table->integer('ekspor')->nullable()->default(0);
            $table->integer('impor')->nullable()->default(0);
            $table->integer('tahun')->nullable()->default(0);
            $table->index('tahun');
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
        Schema::dropIfExists('kt_operasional');
    }
}
