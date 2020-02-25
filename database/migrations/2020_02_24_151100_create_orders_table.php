<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateOrdersTable extends Migration
{
   public function up()
    {
        Schema::create('orders', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('destinasi');
            $table->string('nama_barang');
            $table->integer('harga')->nullable();
            $table->integer('jarak_berat');
            $table->integer('tip');
            $table->enum('status', ['ambil', 'beli']);
            $table->string('alamat_awal');
            $table->string('alamat_tujuan');
            $table->integer('facebook_porter')->nullable();
            $table->integer('twitter_porter')->nullable();
            $table->integer('instagram_porter')->nullable();
            $table->integer('order_to')->nullable();
            $table->bigInteger('created_by')->unsigned();
            $table->dateTime('tanggal_selesai')->nullable();
            $table->integer('verified_by')->nullable();
            $table->tinyInteger('deleted');
            $table->timestamps();
            $table->foreign('created_by')->references('id')->on('users');
        });
    }

    public function down()
    {
        Schema::dropIfExists('orders');
    }
}
