<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Exception;
use App\Models\ControleAutor;
use Illuminate\Support\Facades\Validator;

class AutorController extends Controller
{
    private $autor;

    public function __construct()
    {
        $this->autor = new ControleAutor();
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        try {
            $data = ControleAutor::all();

            if(!$data->isEmpty()) {
                return response()->json($data);
            } else {
                return response()->json(['error'=> 'Nada Encontrado', 404]);
            }

        } catch (Exception $e) {
            return response()->json(['error'=> $e->getMessage(), 400]);
        }
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

            $retValidaApiAutor = $this->validarApi($dataAutor);
            $returnValidaApiAutor = json_decode($retValidaApiAutor->content(), true);
            if (!(boolean)$returnValidaApiAutor['valida']) {
                return response()->json($returnValidaApiAutor, 400);
            } else {
                $data = $this->autor->create($dataAutor);
                return response()->json($data, 200);
            }
        } catch (\Illuminate\Database\QueryException $exception) {
            $errorInfo = $exception->errorInfo;
            return response()->json([
                'success'=> false, 
                'message' => $errorInfo,
                400
            ]);
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($CodAu)
    {
        try {
            if (!$dataAutor = $this->autor::where(
                    'CodAu', '=', "{$CodAu}")->get()->toArray()
                ) {
                return response()->json(['error'=> 'Nada Encontrado', 404]);
            } else {
                return response()->json($dataAutor);
            }
        } catch (Exception $e) {
            return response()->json(['error'=> $e->getMessage(), 400]);
        }
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $CodAu)
    {
        try {
            if (!$this->autor::where(
                'CodAu', '=', "{$CodAu}")->get()->toArray()) {
                return response()->json(['error'=> 'Nada Encontrado', 404]);
            } else {
                $dataJsonAutor =  $request->all();
                $dataAutor = $this->autor::where('CodAu', '=', "{$CodAu}");

                $retornoValida = $this->validarApi($dataJsonAutor, $CodAu);
                $returnValidaAutor = json_decode($retornoValida->content(), true);
                
                if (!(boolean)$returnValidaAutor['valida']) {
                    return response()->json($returnValidaAutor, 400);
                } else {
                    $dataAutor->update($dataJsonAutor);
                    return response()->json([
                        'success' => "Atualizado com Sucesso",
                        200
                    ]);
                }
            }
        } catch (Exception $e) {
            return response()->json(['error'=> $e->getMessage(), 400]);
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($CodAu)
    {
        try {

            if (!$this->autor::where(
                'CodAu', '=', "{$CodAu}")->get()->toArray()) {
                return response()->json(['error'=> 'Nada Encontrado', 404]);
            } else {
                $data = $this->autor::where('CodAu', '=', "{$CodAu}");
                $data->delete();
    
                return response()->json(['success'=> 'Deletado com Sucesso']);
            }
        } catch (Exception $e) {
            return response()->json(['error'=> $e->getMessage(), 400]);
        }
    }

    private function validarApi($dataForm, $id = null) {        

        try {
            $messages = [
                'Nome.required' => 'informe o Nome'
            ];
    
            $rules = [
                'Nome' => 'required'
            ];
    
            $regras = ($id != null) ? $rules : $this->autor->rules();
            
            $validator = Validator::make($dataForm, $regras, $messages);

            if ($validator->fails()) {
                return  
                    response()->json([ 
                        "valida" => false,
                        "erros" => $validator->errors()
                    ]);
            }
            return
                response()->json([ 
                    "valida" => true,
                    "erros" => ''
                ]); 
        } catch (Exception $e) {
            return 
                response()->json([
                    "valida" => false,
                    "erros" => $e->getMessage()
                ]);
        }
    }
}
