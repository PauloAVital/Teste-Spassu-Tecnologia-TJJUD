<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class LivroAssunto extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('Livro_Assunto', function (Blueprint $table) {
            $table->Increments('id');            
            $table->integer('Livro_Codl')->unsigned();
            $table->foreign('Livro_Codl')->references('Codl')->on('Livro')->onDelete('cascade')->onUpdate('cascade');
            $table->integer('Assunto_CodAs')->unsigned();
            $table->foreign('Assunto_CodAs')->references('CodAs')->on('Assunto')->onDelete('cascade')->onUpdate('cascade');
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
        Schema::dropIfExists('Livro_Assunto');
    }
}
