<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTableEventos extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('eventos', function (Blueprint $table) {
            $table->id(); // Chave primária auto-incrementada
            $table->string('titulo'); // Coluna para o título do evento
            $table->text('descricao'); // Coluna para a descrição do evento
            $table->date('data_evento'); // Coluna para a data do evento
            $table->string('local'); // Coluna para o local do evento
            $table->integer('capacidade'); // Coluna para a capacidade do evento
            $table->timestamps(); // Colunas created_at e updated_at
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('eventos');
    }
}
