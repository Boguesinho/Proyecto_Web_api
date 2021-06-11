<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUsersTable extends Migration
{
    public function up()
    {
        Schema::create('users', function (Blueprint $table) {
            $table->id();
            $table->string('email')->unique();
            $table->string('password');
            $table->string('nombre');
            $table->unsignedBigInteger('idPais');
            $table->foreign('idPais')->references('id')->on('paises');
            $table->integer('edad');
            $table->unsignedBigInteger('idGenero');
            $table->foreign('idGenero')->references('id')->on('generos');
            $table->string('info')->nullable();
            $table->string('rutaFoto')->nullable();

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
        Schema::dropIfExists('users');
    }
}
