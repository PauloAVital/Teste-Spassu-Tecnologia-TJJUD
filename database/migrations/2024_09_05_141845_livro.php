<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class Livro extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('Livro', function (Blueprint $table) {
            $table->increments('Codl');            
            $table->string('Titulo', 100);
            $table->string('Editora', 40);
            $table->integer('Edicao');
            $table->decimal('Valor', 10, 2);
            $table->string('Ano_Publicacao', 4);
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
        Schema::dropIfExists('Livro');
    }
}
