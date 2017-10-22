<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateNhanvatsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('nhanvats', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name');
            $table->integer('capdo')->default(1);
            $table->integer('xu')->default(0);
            $table->integer('xuqua')->default(500);
            $table->integer('bac')->default(5000);
            $table->integer('chientich')->default(50);
            
            $table->integer('user_id')->unsigned();
            $table->foreign('user_id')->references('id')->on('users');
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
        Schema::dropIfExists('nhanvats');
    }
}
