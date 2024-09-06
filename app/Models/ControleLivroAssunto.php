<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ControleLivroAssunto extends Model
{
    protected $table = 'Livro_Assunto';

    protected $fillable = [
                            'Livro_Codl',
                            'Assunto_CodAs'
                          ];

    public function rules()
    {
        return [
            'Livro_Codl' => 'required:Livro_Assunto',
            'Assunto_CodAs' => 'required:Livro_Assunto'
        ];
    }
    
    public function relLivroLivroAssunto() {
        return $this->hasMany('App\Models\ControleLivro', 'Codl', 'Livro_Codl' );
    }

    public function relLivroAssunto() {
        return $this->hasMany('App\Models\ControleAssunto', 'CodAs', 'Assunto_CodAs' );
    }
}
