<?php

namespace App\Http\Controllers;

use App\Models\ControleLivrosView;
use App\Models\ControleAssunto;
use App\Models\ControleAutor;


class HomeController extends Controller
{
    private $assunto;
    
    private $autor;

    public function __construct()
    {
        $this->assunto = new ControleAssunto();
        
        $this->autor = new ControleAutor();
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    { 
        $livros = ControleLivrosView::select("*")
                ->get()
                ->toArray();
        $assunto = ControleAssunto::all();
        $autor = ControleAutor::all();

        return view('home', compact(['livros', 'assunto', 'autor']));
    }
}
