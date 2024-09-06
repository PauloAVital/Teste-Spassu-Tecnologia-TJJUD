<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class livros extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('Livro')->insert([
            'Codl' => 1, 
            'Titulo' => 'Inteligência Artificial e Direito Processual',
            'Editora' => 'JusPODIVM',
            'Edicao' => 1,
            'Valor' => 99.90,
            'Ano_Publicacao' => '2022',
        ]);

        DB::table('Autor')->insert([
            'CodAu' => 1,
            'Nome' => 'ADRIANA JOCOTO UNGER'
        ]);
        DB::table('Autor')->insert([
            'CodAu' => 2,
            'Nome' => 'ALEXANDRE BAHIA'
        ]);
        DB::table('Autor')->insert([
            'CodAu' => 3,
            'Nome' => 'ALEXANDRE MORAIS DA ROSA'
        ]);
        DB::table('Autor')->insert([
            'CodAu' => 4,
            'Nome' => 'ANA LUIZA PINTO COELHO MARQUES'
        ]);
        DB::table('Autor')->insert([
            'CodAu' => 5,
            'Nome' => 'ANTÔNIO AURÉLIO DE SOUZA VIANA'
        ]);
        DB::table('Autor')->insert([
            'CodAu' => 6,
            'Nome' => 'BERNARDO DE AZEVEDO E SOUZA'
        ]);
        DB::table('Autor')->insert([
            'CodAu' => 7,
            'Nome' => 'BARBARA GUASQUE'
        ]);
        DB::table('Autor')->insert([
            'CodAu' => 8,
            'Nome' => 'BRÁULIO GUSMÃO'
        ]);
        DB::table('Autor')->insert([
            'CodAu' => 9,
            'Nome' => 'CAMILLA MATTOS PAOLINELLI'
        ]);
        DB::table('Autor')->insert([
            'CodAu' => 10,
            'Nome' => 'CESAR CURY'
        ]);
        DB::table('Autor')->insert([
            'CodAu' => 11,
            'Nome' => 'DANIEL BECKER'
        ]);
        DB::table('Autor')->insert([
            'CodAu' => 12,
            'Nome' => 'DIERLE NUNES'
        ]);
        DB::table('Autor')->insert([
            'CodAu' => 13,
            'Nome' => 'ERIK NAVARRO WOLKART'
        ]);
        DB::table('Autor')->insert([
            'CodAu' => 14,
            'Nome' => 'FERNANDA AMARAL DUARTE'
        ]);
        DB::table('Autor')->insert([
            'CodAu' => 15,
            'Nome' => 'FERNANDA BRAGANÇA'
        ]);
        DB::table('Autor')->insert([
            'CodAu' => 16,
            'Nome' => 'FLAVIANE DE MAGALHÃES BARROS'
        ]);
        DB::table('Autor')->insert([
            'CodAu' => 17,
            'Nome' => 'FLÁVIO QUINAUD PEDRON'
        ]);
        DB::table('Autor')->insert([
            'CodAu' => 18,
            'Nome' => 'FRANCISCO DE MESQUITA LAUX'
        ]);
        DB::table('Autor')->insert([
            'CodAu' => 19,
            'Nome' => 'FREDIE DIDIER JR.'
        ]);
        DB::table('Autor')->insert([
            'CodAu' => 20,
            'Nome' => 'GUILHERME HENRIQUE LAGE FARIA'
        ]);
        DB::table('Autor')->insert([
            'CodAu' => 21,
            'Nome' => 'HUGO MALONE'
        ]);
        DB::table('Autor')->insert([
            'CodAu' => 22,
            'Nome' => 'ISABELA FERRARI'
        ]);
        DB::table('Autor')->insert([
            'CodAu' => 23,
            'Nome' => 'ISADORA WERNECK'
        ]);
        DB::table('Autor')->insert([
            'CodAu' => 24,
            'Nome' => 'ÍTALO MENEZES DE CASTRO'
        ]);
        DB::table('Autor')->insert([
            'CodAu' => 25,
            'Nome' => 'JEAN CARLOS DE ALBUQUERQUE GOMES'
        ]);
        DB::table('Autor')->insert([
            'CodAu' => 26,
            'Nome' => 'JOÃO SÉRGIO DOS SANTOS SOARES PEREIRA'
        ]);
        DB::table('Autor')->insert([
            'CodAu' => 27,
            'Nome' => 'JOSÉ EDUARDO DE RESENDE CHAVES JÚNIOR'
        ]);
        DB::table('Autor')->insert([
            'CodAu' => 28,
            'Nome' => 'JOSÉ LUIZ BOLZAN DE MORAIS'
        ]);
        DB::table('Autor')->insert([
            'CodAu' => 29,
            'Nome' => 'JULIANA LOSS'
        ]);
        DB::table('Autor')->insert([
            'CodAu' => 30,
            'Nome' => 'LARISSA HOLANDA ANDRADE RODRIGUES'
        ]);
        DB::table('Autor')->insert([
            'CodAu' => 31,
            'Nome' => 'LETÍCIA MARCELE DO NASCIMENTO MELO'
        ]);
        DB::table('Autor')->insert([
            'CodAu' => 32,
            'Nome' => 'LUIS MANOEL BORGES DO VALE'
        ]);
        DB::table('Autor')->insert([
            'CodAu' => 33,
            'Nome' => 'MARCELO MAZZOLA'
        ]);
        DB::table('Autor')->insert([
            'CodAu' => 34,
            'Nome' => 'MARCELO ORNELLAS MARCHIORI'
        ]);
        DB::table('Autor')->insert([
            'CodAu' => 35,
            'Nome' => 'MARCO ANTONIO RODRIGUES'
        ]);
        DB::table('Autor')->insert([
            'CodAu' => 36,
            'Nome' => 'NACLE SAFAR AZIZ ANTÔNIO'
        ]);
        DB::table('Autor')->insert([
            'CodAu' => 37,
            'Nome' => 'NATHÁLIA ROBERTA FETT VIANA DE MEDEIROS'
        ]);
        DB::table('Autor')->insert([
            'CodAu' => 38,
            'Nome' => 'NURIA BELLOSO MARTÍN'
        ]);
        DB::table('Autor')->insert([
            'CodAu' => 39,
            'Nome' => 'PATRÍCIA SEKHON'
        ]);
        DB::table('Autor')->insert([
            'CodAu' => 40,
            'Nome' => 'PAULO DE TARSO SANSEVERINO'
        ]);
        DB::table('Autor')->insert([
            'CodAu' => 41,
            'Nome' => 'PAULO HENRIQUE DOS SANTOS LUCON'
        ]);
        DB::table('Autor')->insert([
            'CodAu' => 42,
            'Nome' => 'PEDRO PETIZ VIANA'
        ]);
        DB::table('Autor')->insert([
            'CodAu' => 43,
            'Nome' => 'RAFAEL ALEXANDRIA DE OLIVEIRA'
        ]);
        DB::table('Autor')->insert([
            'CodAu' => 44,
            'Nome' => 'RENATA BRAGA'
        ]);
        DB::table('Autor')->insert([
            'CodAu' => 45,
            'Nome' => 'RICARDO VILLAS BÔAS CUEVA'
        ]);
        DB::table('Autor')->insert([
            'CodAu' => 46,
            'Nome' => 'ROMULO SOARES VALENTINI'
        ]);
        DB::table('Autor')->insert([
            'CodAu' => 47,
            'Nome' => 'TAINÁ AGUIAR JUNQUILHO'
        ]);
        DB::table('Autor')->insert([
            'CodAu' => 48,
            'Nome' => 'TATIANE COSTA DE ANDRADE'
        ]);
        DB::table('Autor')->insert([
            'CodAu' => 49,
            'Nome' => 'WALTER ROSATI VEGAS JÚNIOR'
        ]);
        DB::table('Autor')->insert([
            'CodAu' => 50,
            'Nome' => 'WILSON ENGELMANN'
        ]);

        # Assunto
        DB::table('Assunto')->insert([
            'CodAs' => 1,
            'Descricao' => 'A Pandemia da COVID-19 promoveu uma evidente aceleração na percepção da tecnologia no processo e no sistema de justiça. Tal situação, no entanto, nos convida a trilhar as benesses que as tecnologias de informação e comunicação (TICs) podem trazer, mas sempre buscando aplicá-las com o intuito de melhoria da vida e da aplicação dos direitos dos cidadãos de nosso Estado Democrático de Direito com respeito ao código e autonomia do Direito.'
        ]);

        # Livro Autor
        DB::table('Livro_Autor')->insert([
            'id' => 1,
            'Livro_Codl' => '1',
            'Autor_CodAu' => '1'
        ]);
        DB::table('Livro_Autor')->insert([
            'id' => 2,
            'Livro_Codl' => '1',
            'Autor_CodAu' => '2'
        ]);
        DB::table('Livro_Autor')->insert([
            'id' => 3,
            'Livro_Codl' => '1',
            'Autor_CodAu' => '3'
        ]);
        DB::table('Livro_Autor')->insert([
            'id' => 4,
            'Livro_Codl' => '1',
            'Autor_CodAu' => '4'
        ]);
        DB::table('Livro_Autor')->insert([
            'id' => 5,
            'Livro_Codl' => '1',
            'Autor_CodAu' => '5'
        ]);
        DB::table('Livro_Autor')->insert([
            'id' => 6,
            'Livro_Codl' => '1',
            'Autor_CodAu' => '6'
        ]);
        DB::table('Livro_Autor')->insert([
            'id' => 7,
            'Livro_Codl' => '1',
            'Autor_CodAu' => '7'
        ]);
        DB::table('Livro_Autor')->insert([
            'id' => 8,
            'Livro_Codl' => '1',
            'Autor_CodAu' => '8'
        ]);
        DB::table('Livro_Autor')->insert([
            'id' => 9,
            'Livro_Codl' => '1',
            'Autor_CodAu' => '9'
        ]);
        DB::table('Livro_Autor')->insert([
            'id' => 10,
            'Livro_Codl' => '1',
            'Autor_CodAu' => '10'
        ]);
        DB::table('Livro_Autor')->insert([
            'id' => 11,
            'Livro_Codl' => '1',
            'Autor_CodAu' => '11'
        ]);
        DB::table('Livro_Autor')->insert([
            'id' => 12,
            'Livro_Codl' => '1',
            'Autor_CodAu' => '12'
        ]);
        DB::table('Livro_Autor')->insert([
            'id' => 13,
            'Livro_Codl' => '1',
            'Autor_CodAu' => '13'
        ]);
        DB::table('Livro_Autor')->insert([
            'id' => 14,
            'Livro_Codl' => '1',
            'Autor_CodAu' => '14'
        ]);
        DB::table('Livro_Autor')->insert([
            'id' => 15,
            'Livro_Codl' => '1',
            'Autor_CodAu' => '15'
        ]);
        DB::table('Livro_Autor')->insert([
            'id' => 16,
            'Livro_Codl' => '1',
            'Autor_CodAu' => '16'
        ]);
        DB::table('Livro_Autor')->insert([
            'id' => 17,
            'Livro_Codl' => '1',
            'Autor_CodAu' => '17'
        ]);
        DB::table('Livro_Autor')->insert([
            'id' => 18,
            'Livro_Codl' => '1',
            'Autor_CodAu' => '18'
        ]);
        DB::table('Livro_Autor')->insert([
            'id' => 19,
            'Livro_Codl' => '1',
            'Autor_CodAu' => '19'
        ]);
        DB::table('Livro_Autor')->insert([
            'id' => 20,
            'Livro_Codl' => '1',
            'Autor_CodAu' => '20'
        ]);
        DB::table('Livro_Autor')->insert([
            'id' => 21,
            'Livro_Codl' => '1',
            'Autor_CodAu' => '22'
        ]);
        DB::table('Livro_Autor')->insert([
            'id' => 23,
            'Livro_Codl' => '1',
            'Autor_CodAu' => '24'
        ]);
        DB::table('Livro_Autor')->insert([
            'id' => 25,
            'Livro_Codl' => '1',
            'Autor_CodAu' => '25'
        ]);
        DB::table('Livro_Autor')->insert([
            'id' => 26,
            'Livro_Codl' => '1',
            'Autor_CodAu' => '26'
        ]);
        DB::table('Livro_Autor')->insert([
            'id' => 27,
            'Livro_Codl' => '1',
            'Autor_CodAu' => '27'
        ]);
        DB::table('Livro_Autor')->insert([
            'id' => 28,
            'Livro_Codl' => '1',
            'Autor_CodAu' => '28'
        ]);
        DB::table('Livro_Autor')->insert([
            'id' => 29,
            'Livro_Codl' => '1',
            'Autor_CodAu' => '29'
        ]);
        DB::table('Livro_Autor')->insert([
            'id' => 30,
            'Livro_Codl' => '1',
            'Autor_CodAu' => '30'
        ]);
        DB::table('Livro_Autor')->insert([
            'id' => 31,
            'Livro_Codl' => '1',
            'Autor_CodAu' => '32'
        ]);
        DB::table('Livro_Autor')->insert([
            'id' => 34,
            'Livro_Codl' => '1',
            'Autor_CodAu' => '35'
        ]);
        DB::table('Livro_Autor')->insert([
            'id' => 36,
            'Livro_Codl' => '1',
            'Autor_CodAu' => '36'
        ]);
        DB::table('Livro_Autor')->insert([
            'id' => 37,
            'Livro_Codl' => '1',
            'Autor_CodAu' => '37'
        ]);
        DB::table('Livro_Autor')->insert([
            'id' => 38,
            'Livro_Codl' => '1',
            'Autor_CodAu' => '38'
        ]);
        DB::table('Livro_Autor')->insert([
            'id' => 39,
            'Livro_Codl' => '1',
            'Autor_CodAu' => '39'
        ]);
        DB::table('Livro_Autor')->insert([
            'id' => 40,
            'Livro_Codl' => '1',
            'Autor_CodAu' => '40'
        ]);
        DB::table('Livro_Autor')->insert([
            'id' => 41,
            'Livro_Codl' => '1',
            'Autor_CodAu' => '41'
        ]);
        DB::table('Livro_Autor')->insert([
            'id' => 42,
            'Livro_Codl' => '1',
            'Autor_CodAu' => '42'
        ]);
        DB::table('Livro_Autor')->insert([
            'id' => 43,
            'Livro_Codl' => '1',
            'Autor_CodAu' => '43'
        ]);
        DB::table('Livro_Autor')->insert([
            'id' => 44,
            'Livro_Codl' => '1',
            'Autor_CodAu' => '44'
        ]);
        DB::table('Livro_Autor')->insert([
            'id' => 45,
            'Livro_Codl' => '1',
            'Autor_CodAu' => '46'
        ]);
        DB::table('Livro_Autor')->insert([
            'id' => 47,
            'Livro_Codl' => '1',
            'Autor_CodAu' => '47'
        ]);
        DB::table('Livro_Autor')->insert([
            'id' => 48,
            'Livro_Codl' => '1',
            'Autor_CodAu' => '48'
        ]);
        DB::table('Livro_Autor')->insert([
            'id' => 49,
            'Livro_Codl' => '1',
            'Autor_CodAu' => '49'
        ]);
        DB::table('Livro_Autor')->insert([
            'id' => 50,
            'Livro_Codl' => '1',
            'Autor_CodAu' => '50'
        ]);        


        DB::table('Livro_Assunto')->insert([
            'id' => 1,
            'Livro_Codl' => '1',
            'Assunto_CodAs' => '1'
        ]);
        
    }
}
