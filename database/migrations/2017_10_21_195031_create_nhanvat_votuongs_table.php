<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateNhanvatVotuongsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('nhanvat_votuongs', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('nhanvat_id')->unsigned();
            $table->foreign('nhanvat_id')->references('id')->on('nhanvats');
            $table->integer('votuong_id')->unsigned();
            $table->foreign('votuong_id')->references('id')->on('votuongs');
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
        Schema::dropIfExists('nhanvat_votuongs');
    }
}
