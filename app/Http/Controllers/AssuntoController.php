<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\ControleAssunto;
use App\Models\ControleLivro;
use Exception;

class AssuntoController extends Controller
{
    private $assunto;
    private $livro;

    public function __construct()
    {
        $this->assunto = new ControleAssunto();
        $this->livro = new ControleLivro();
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $assunto = ControleAssunto::all();
        $livro = ControleLivro::all();
        return view('assunto', compact(['assunto', 'livro']));
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
            $dataAssunto =  $request->all();
        
            $dataAssuntoInsert = [
                'Livro_Codl' => $dataAssunto['_Codl'],
                'Descricao' => $dataAssunto['_Descricao']
            ];
                
            try {
                $inputAssunto = $this->assunto->create($dataAssuntoInsert);

                return response()->json([
                    'success'=> true, 
                    'data' => $inputAssunto,
                    400
                ]);
            } catch (\Illuminate\Database\QueryException $exception) {
                $errorInfo = $exception->errorInfo;
                return response()->json([
                    'success'=> false, 
                    'message' => $errorInfo,
                    400
                ]);
            }

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
    public function destroy(Request $request)
    {
        try {
            $dataAssuntoDelete =  $request->all();

            $Codl = $dataAssuntoDelete['_Codl'];
            $CodAs = $dataAssuntoDelete['_CodAs'];
            if (!$this->assunto::where(
                'Livro_Codl', '=', "{$Codl}")
                ->where('CodAs', '=', "{$CodAs}")->get()->toArray()) {
                return response()->json(['error'=> 'Nada Encontrado', 404]);
            } else {
                $dataAssuntoDelete = $this->assunto::where('Livro_Codl', '=', "{$Codl}")
                    ->where('CodAs', '=', "{$CodAs}");
                $dataAssuntoDelete->delete();
    
                return response()->json(['success'=> 'Deletado com Sucesso']);
            }
        } catch (Exception $e) {
            return response()->json(['error'=> $e->getMessage(), 400]);
        }
    }
}
