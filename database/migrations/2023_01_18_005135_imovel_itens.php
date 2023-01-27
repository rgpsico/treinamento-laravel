<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class ImovelItens extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('imovel_itens', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('imovel_id');
            $table->unsignedBigInteger('item_id');          
            $table->timestamps();
            $table->foreign('imovel_id')->references('id')->on('imoveis');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('imovel_itens');
    }
}
