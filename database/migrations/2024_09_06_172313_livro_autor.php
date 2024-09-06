<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class LivroAutor extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('Livro_Autor', function (Blueprint $table) {
            $table->Increments('id');            
            $table->integer('Livro_Codl')->unsigned();
            $table->foreign('Livro_Codl')->references('Codl')->on('Livro')->onDelete('cascade')->onUpdate('cascade');
            $table->integer('Autor_CodAu')->unsigned();
            $table->foreign('Autor_CodAu')->references('CodAu')->on('Autor')->onDelete('cascade')->onUpdate('cascade');
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
        Schema::dropIfExists('Livro_Autor');
    }
}
