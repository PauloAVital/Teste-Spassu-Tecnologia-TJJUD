<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\ControleAutor;
use App\Models\ControleLivro;
use Exception;

class AutorController extends Controller
{
    private $autor;
    private $livro;

    public function __construct()
    {
        $this->autor = new ControleAutor();
        $this->livro = new ControleLivro();
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $autor = ControleAutor::all();
        $livro = ControleLivro::all();
        return view('autor', compact(['autor', 'livro']));
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
            $dataAutor =  $request->all();
        
            $dataAutorInsert = [
                'Livro_Codl' => $dataAutor['_Codl'],
                'Nome' => $dataAutor['_Nome']
            ];
                
            try {
                $inputAutor = $this->autor->create($dataAutorInsert);

                return response()->json([
                    'success'=> true, 
                    'data' => $inputAutor,
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
            $dataAutorDelete =  $request->all();

            $Codl = $dataAutorDelete['_Codl'];
            $CodAu = $dataAutorDelete['_CodAu'];
            if (!$this->autor::where(
                'Livro_Codl', '=', "{$Codl}")
                ->where('CodAu', '=', "{$CodAu}")->get()->toArray()) {
                return response()->json(['error'=> 'Nada Encontrado', 404]);
            } else {
                $dataAutorDelete = $this->autor::where('Livro_Codl', '=', "{$Codl}")
                    ->where('CodAu', '=', "{$CodAu}");
                $dataAutorDelete->delete();
    
                return response()->json(['success'=> 'Deletado com Sucesso']);
            }
        } catch (Exception $e) {
            return response()->json(['error'=> $e->getMessage(), 400]);
        }
    }
}
