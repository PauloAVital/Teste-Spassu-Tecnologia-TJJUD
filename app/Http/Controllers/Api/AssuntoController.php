<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Exception;
use App\Models\ControleAssunto;
use Illuminate\Support\Facades\Validator;

class AssuntoController extends Controller
{
    private $assunto;

    public function __construct()
    {
        $this->assunto = new ControleAssunto();
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        try {
            $data = ControleAssunto::all();

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
            $dataAssunto =  $request->all();            

            $retValidaApiAssunto = $this->validarApi($dataAssunto);
            $returnValidaApiAssunto = json_decode($retValidaApiAssunto->content(), true);
            if (!(boolean)$returnValidaApiAssunto['valida']) {
                return response()->json($returnValidaApiAssunto, 400);
            } else {
                $data = $this->assunto->create($dataAssunto);
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
    public function show($CodAs)
    {
        try {
            if (!$dataAssunto = $this->assunto::where(
                    'CodAs', '=', "{$CodAs}")->get()->toArray()
                ) {
                return response()->json(['error'=> 'Nada Encontrado', 404]);
            } else {
                return response()->json($dataAssunto);
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
    public function update(Request $request, $CodAs)
    {
        try {
            if (!$this->assunto::where(
                'CodAs', '=', "{$CodAs}")->get()->toArray()) {
                return response()->json(['error'=> 'Nada Encontrado', 404]);
            } else {
                $dataJsonAssunto =  $request->all();
                $dataAssunto = $this->assunto::where('CodAs', '=', "{$CodAs}");

                $retornoValida = $this->validarApi($dataJsonAssunto, $CodAs);
                $returnValidaAssunto = json_decode($retornoValida->content(), true);
                
                if (!(boolean)$returnValidaAssunto['valida']) {
                    return response()->json($returnValidaAssunto, 400);
                } else {
                    $dataAssunto->update($dataJsonAssunto);
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
    public function destroy($CodAs)
    {
        try {
            if (!$this->assunto::where(
                'CodAs', '=', "{$CodAs}")->get()->toArray()) {
                return response()->json(['error'=> 'Nada Encontrado', 404]);
            } else {
                $data = $this->assunto::where('CodAs', '=', "{$CodAs}");
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
                'Descricao.required' => 'informe a Descrição'
            ];
    
            $rules = [
                'Descricao' => 'required'
            ];
    
            $regras = ($id != null) ? $rules : $this->assunto->rules();
            
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
