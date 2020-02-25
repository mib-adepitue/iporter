<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePortersTable extends Migration
{
    public function up()
    {
        Schema::create('porters', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('destinasi');
            $table->string('alamat_awal');
            $table->string('alamat_tujuan');
            $table->integer('jarak')->nullable();
            $table->string('kendaraan');
            $table->integer('kapasitas');
            $table->bigInteger('created_by')->unsigned();
            $table->timestamps();
            $table->foreign('created_by')->references('id')->on('users');
        });
    }

    public function down()
    {
        Schema::dropIfExists('porters');
    }
}
