<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ControleLivro extends Model
{
    protected $table = 'Livro';

    protected $fillable = [
                            'Codl',
                            'Titulo',
                            'Editora',
                            'Edicao',
                            'Valor',
                            'Ano_Publicacao'
                          ];

    public function rules()
    {
        return [
            'Titulo' => 'required:Livro',
            'Editora' => 'required:Livro',
            'Edicao' => 'required:Livro',
            'Valor' => 'required:Livro',
            'Ano_Publicacao' => 'required:Livro'
        ];
    }
    
    public function relLivroAutor() {
        return $this->hasMany('App\Models\ControleLivroAutor', 'Codl', 'Livro_Codl' );
    }

    public function relLivroAssunto() {
        return $this->hasMany('App\Models\ControleLivroAssunto', 'Codl', 'Livro_Codl' );
    }

}
