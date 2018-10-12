<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateHeadlineTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('headline', function (Blueprint $table) {
            $table->increments('id');
            $table->string('judul1')->nullable();
            $table->string('judul2')->nullable();
            $table->string('gambar');
            $table->string('tampil')->default('Ya');
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
        Schema::dropIfExists('headline');
    }
}
