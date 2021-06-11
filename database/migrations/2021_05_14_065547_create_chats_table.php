<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateChatsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('chats', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('idMensaje');
            $table->foreign('idMensaje')->references('id')->on('mensajes');
            $table->unsignedBigInteger('idUserSend');
            $table->foreign('idUserSend')->references('id')->on('users');
            $table->unsignedBigInteger('idUserReceive');
            $table->foreign('idUserReceive')->references('id')->on('users');
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
        Schema::dropIfExists('chats');
    }
}
