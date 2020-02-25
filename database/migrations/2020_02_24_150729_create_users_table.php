<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUsersTable extends Migration
{
    public function up()
    {
        Schema::create('users', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('name');
            $table->string('email')->unique();
            $table->timestamp('email_verified_at')->nullable();
            $table->enum('status', ['active', 'inactive']);
            $table->string('foto_ktp')->nullable();
            $table->string('selfie_ktp')->nullable();
            $table->string('nik')->nullable();
            $table->string('foto_profile')->nullable();
            $table->string('alamat')->nullable();
            $table->date('tanggal_lahir')->nullable();
            $table->string('phone')->nullable();
            $table->string('instagram')->nullable();
            $table->string('twitter')->nullable();
            $table->string('facebook')->nullable();
            $table->string('password');
            $table->rememberToken();
            $table->date('admin_verified_at')->nullable();
            $table->bigInteger('admin_verified_by')->unsigned()->nullable();
            $table->timestamps();
            $table->foreign('admin_verified_by')->references('id')->on('admins');
        });
    }
    
    public function down()
    {
        Schema::dropIfExists('users');
    }
}
