<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ControleAutor extends Model
{
    protected $table = 'Autor';

    protected $fillable = [
                            'CodAu',
                            'Nome'
                          ];

    public function rules()
    {
        return [
            'Nome' => 'required:Autor'
        ];
    }
    
    public function relAutor() {
        return $this->hasMany('App\Models\ControleLivroAutor', 'CodAu', 'Autor_CodAu' );
    }
}
