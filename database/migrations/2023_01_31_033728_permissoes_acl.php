<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class PermissoesAcl extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('permissoes', function (Blueprint $table) {
            $table->id();
            $table->string('name')->nullable();
            $table->timestamps(); 
        });

        Schema::create('profile', function (Blueprint $table) {
            $table->id();
            $table->string('name')->nullable();
         });

    
        Schema::create('profile_permissoes', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('user_id');
            $table->unsignedBigInteger('profile_id')->nullable();
            $table->foreign('profile_id')->references('id')->on('profile')->onDelete('cascade');
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');        
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
        Schema::dropIfExists('permissoes');
        Schema::dropIfExists('profile');
        Schema::dropIfExists('profile_permissoes');
    }
}
