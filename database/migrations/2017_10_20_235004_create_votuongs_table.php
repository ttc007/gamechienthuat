<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateVotuongsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('votuongs', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name');
            $table->integer('capdo')->default(1);
            $table->integer('trangbi1')->nullable();
            $table->integer('trangbi2')->nullable();
            $table->integer('trangbi3')->nullable();
            $table->integer('trangbi4')->nullable();
            $table->integer('trangbi5')->nullable();
            $table->integer('trangbi6')->nullable();
            $table->integer('trangbi7')->nullable();
            $table->integer('trangbi8')->nullable();

            $table->integer('binhluc')->default(160);
            $table->integer('tancong')->default(50);
            $table->integer('binhchung_id')->unsigned();
            $table->foreign('binhchung_id')->references('id')->on('binhchungs');
            
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
        Schema::dropIfExists('votuongs');
    }
}
