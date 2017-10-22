<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateNhanvatTranhinhsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('nhanvat_tranhinhs', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('nhanvat_id')->unsigned();
            $table->foreign('nhanvat_id')->references('id')->on('nhanvats');
            $table->integer('tranhinh_id')->unsigned();
            $table->foreign('tranhinh_id')->references('id')->on('tranhinhs');
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
        Schema::dropIfExists('nhanvat_tranhinhs');
    }
}
