<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class Assunto extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('Assunto', function (Blueprint $table) {
            $table->increments('CodAs');
            $table->integer('Livro_Codl')->unsigned();
            $table->foreign('Livro_Codl')->references('Codl')->on('Livro')->onDelete('cascade')->onUpdate('cascade');
            $table->text('Descricao');
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
        Schema::dropIfExists('Assunto');
    }
}
