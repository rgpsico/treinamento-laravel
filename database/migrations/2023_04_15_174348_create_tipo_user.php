<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTipoUser extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {

        Schema::create('users_tipo', function (Blueprint $table) {
            $table->id();
            $table->string('nome');
            $table->timestamps();
        });

        Schema::create('users_tipo_users', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('tipo_usuario_id');
            $table->unsignedBigInteger('user_id');
            $table->timestamps();

            $table->foreign('tipo_usuario_id')->references('id')->on('users_tipo');
            $table->foreign('user_id')->references('id')->on('users');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('tipo_user');
    }
}
