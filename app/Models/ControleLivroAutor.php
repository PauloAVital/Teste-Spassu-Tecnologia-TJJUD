<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ControleLivroAutor extends Model
{
    protected $table = 'Livro_Autor';

    protected $fillable = [
                            'Livro_Codl',
                            'Autor_CodAu'
                          ];

    public function rules()
    {
        return [
            'Livro_Codl' => 'required:Livro_Autor',
            'Autor_CodAu' => 'required:Livro_Autor'
        ];
    }
    
    public function relLivroLivroAutor() {
        return $this->hasMany('App\Models\ControleLivro', 'Codl', 'Livro_Codl' );
    }

    public function relLivroAutor() {
        return $this->hasMany('App\Models\ControleAutor', 'CodAu', 'Assunto_CodAu' );
    }
}
