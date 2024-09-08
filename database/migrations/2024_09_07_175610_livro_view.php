<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\DB;

class LivroView extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        DB::statement(
            <<<'SQL'
            CREATE VIEW livro_views AS 
                SELECT 
                    aut.Nome,
                    l.Codl,    
                    l.Titulo,
                    l.Editora,
                    l.Edicao,
                    l.Ano_Publicacao,
                    ass.Descricao
                FROM Autor as aut
                LEFT JOIN Livro as l
                on l.Codl = aut.Livro_Codl
                LEFT JOIN Assunto as ass 
                    on ass.Livro_Codl = l.Codl
                GROUP BY aut.Nome, l.Codl, ass.CodAs;
            SQL
        );
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        DB::statement('DROP VIEW livro_views;');
    }
}
