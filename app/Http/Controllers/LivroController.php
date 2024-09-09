<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\ControleAssunto;
use App\Models\ControleAutor;
use App\Models\ControleLivro;
use Exception;
use Illuminate\Support\Facades\DB;

class LivroController extends Controller
{
    private $assunto;
    private $autor;
    private $livro;

    public function __construct()
    {
        $this->assunto = new ControleAssunto();
        $this->autor = new ControleAutor();
        $this->livro = new ControleLivro();
    }


    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        try {
            $data =  $request->all();
        
            // Insert Livro
            $dataLivroInsert = [
                'Titulo' => $data['_titulo'],
                'Editora' => $data['_editora'],
                'Edicao' => (int)$data['_edicao'],
                'Valor' => $data['_valor'],
                'Ano_Publicacao' => $data['_ano']
            ];
            $Codl = $this->livro->create($dataLivroInsert);

            // Insert Assunto
            $listAssuntos = substr($data['listAssunto'],1);
            
            $listAssunto = DB::select("
             select  
                 CodAs
                 Livro_Codl,
                 Descricao
                 FROM Assunto
                 WHERE CodAs in ('{$listAssuntos}')"
            );

            foreach ($listAssunto as $assunto) {
                $dataAssuntoInsert = [
                    'Livro_Codl' => $Codl['id'],
                    'Descricao' => $assunto->Descricao
                ];
                $insertAssunto = $this->assunto->create($dataAssuntoInsert);
            }
            

            // Insert Autor
            $listAutores = substr($data['listAutor'],1);
            
            $listAutor = DB::select("
             select  
                 CodAu
                 Livro_Codl,
                 Nome
                 FROM Autor
                 WHERE CodAu in ('{$listAutores}')"
            );
dd($listAutor);
            foreach ($listAutor as $autores) {
                $insertAutor = $dataAutorInsert = [
                    'Livro_Codl' => $Codl['id'],
                    'Nome' => $autores->Nome
                ];
                $this->autor->create($dataAutorInsert);
            }
            
            return response()->json([
                'success'=> true, 
                'dataLivro' => $Codl,
                'dataAutor' => $insertAutor,
                'dataAssunto' => $insertAssunto,
                400
            ]);
            

        } catch (Exception $e) {
            return response()->json([
                'success'=> false, 
                'message' => $e->getMessage(),
                400
            ]);
        }
    }


    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
