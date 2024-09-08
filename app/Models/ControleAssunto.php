<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ControleAssunto extends Model
{
    protected $table = 'Assunto';

    protected $fillable = [
                            'CodAs',
                            'Livro_Codl',
                            'Descricao'
                          ];

    public function rules()
    {
        return [
            'Livro_Codl' => 'required:Assunto',
            'Descricao' => 'required:Assunto'
        ];
    }
    
    public function relAssunto() {
        return $this->hasMany('App\Models\ControleLivroAssunto', 'CodAs', 'Assunto_CodAs' );
    }
}
