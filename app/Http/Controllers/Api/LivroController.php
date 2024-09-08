<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Exception;
use App\Models\ControleLivro;
use App\Models\ControleAssunto;
use App\Models\ControleAutor;
use App\Models\ControleLivrosView;
use GuzzleHttp\Promise\Create;
use Illuminate\Support\Facades\Validator;

class LivroController extends Controller
{
    private $livro;
    private $assunto;
    private $autor;

    public function __construct()
    {
        $this->livro = new ControleLivro();
        $this->assunto = new ControleAssunto();
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
            $livros = ControleLivrosView::select("*")
                ->get()
                ->toArray();

            if(!empty($livros)) {
                return response()->json($livros);
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
            $dataLivro =  $request->all();            

            $retValidaApiLivro = $this->validarApi($dataLivro);
            $returnValidaApiLivro = json_decode($retValidaApiLivro->content(), true);
            
            if (!(boolean)$returnValidaApiLivro['valida']) {
                return response()->json($returnValidaApiLivro, 400);
            } else {
                $data = $this->livro->create($dataLivro);

                // Cadastrar o novo Assunto
                $arrAssunto = $dataLivro['Assunto'];
                if (!empty($arrAssunto)) {
                    foreach ($arrAssunto as $assunto) {
                       if ($assunto['Descricao'] != '')  {
                            $arrAssunto = array(
                                "Livro_Codl" => $data['id'],
                                "Descricao" => $assunto['Descricao']
                            );
                            $this->assunto->create($arrAssunto);
                       }
                    }
                }

                // Cadastrar os Autores
                $arrAutor = $dataLivro['Autor'];
                if (!empty($arrAutor)) {
                    foreach ($arrAutor as $autor) {
                        if ($autor['Nome'] != '')  {
                            $arrAutor = array(
                                "Livro_Codl" => $data['id'],
                                "Nome" => $autor['Nome']
                            );
                            $this->autor->create($arrAutor);
                        }
                    }
                }

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
    public function show($Nome)
    {   
        try {
            if (!$dataLivro = ControleLivrosView::select("*")
                ->where("Nome", "LIKE", "%{$Nome}%")
                ->get()
                ->toArray()
                ) {
                return response()->json(['error'=> 'Nada Encontrado', 404]);
            } else {
                return response()->json($dataLivro);
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
    public function update(Request $request, $Codl)
    {
        try {
            if (!$this->livro::where(
                'Codl', '=', "{$Codl}")->get()->toArray()) {
                return response()->json(['error'=> 'Nada Encontrado', 404]);
            } else {
                $dataJsonLivro =  $request->all();
                $dataLivro = $this->livro::where('Codl', '=', "{$Codl}");

                $retornoValida = $this->validarApi($dataJsonLivro, $Codl);
                $returnValidaLivro = json_decode($retornoValida->content(), true);
                
                
                if (!(boolean)$returnValidaLivro['valida']) {
                    return response()->json($returnValidaLivro, 400);
                } else {
                    $arrLivro = array(
                        "Titulo" => $dataJsonLivro['Titulo'],
                        "Editora"=> $dataJsonLivro['Editora'],
                        "Edicao" => $dataJsonLivro['Edicao'],
                        "Valor" => $dataJsonLivro['Valor'],
                        "Ano_Publicacao" => $dataJsonLivro['Ano_Publicacao'],
                    );
                    $dataLivro->update($arrLivro);

                    // Update Assunto
                    $arrAssunto = $dataJsonLivro['Assunto'];

                    if (!empty($arrAssunto)) {
                        foreach ($arrAssunto as $assunto) {
                            if ($assunto['Descricao'] != '')  {
                                if ($dataAssunto = $this->assunto::where(
                                    'Livro_Codl', '=', "{$Codl}")
                                    ->where('CodAs', '=', "{$assunto['CodAs']}")
                                ) {
                                    $arrAssunto = array(
                                        "Livro_Codl" => $Codl,
                                        "Descricao" => $assunto['Descricao']
                                    );
                                    $dataAssunto->update($arrAssunto);
                                } else {
                                    $arrAssunto = array(
                                        "Livro_Codl" => $Codl,
                                        "Descricao" => $assunto['Descricao']
                                    );
                                    $this->assunto->create($arrAssunto); 
                                }
                            }
                        }
                    }

                    // Update Autor
                    $arrAutor = $dataJsonLivro['Autor'];
                    if (!empty($arrAutor)) {
                        foreach ($arrAutor as $autor) {
                            if ($autor['Nome'] != '')  {
                                
                                if ($dataAutor = $this->autor::where(
                                    'Livro_Codl', '=', "{$Codl}")
                                    ->where('CodAu', '=', "{$autor['CodAu']}")
                                ) {
                                    $arrAutor = array(
                                        "Livro_Codl" => $Codl,
                                        "Nome" => $autor['Nome']
                                    );
                                    
                                    $dataAutor->update($arrAutor);
                                } else {
                                    $arrAutor = array(
                                        "Livro_Codl" => $Codl,
                                        "Nome" => $autor['Nome']
                                    );
                                    $this->autor->create($arrAssunto); 
                                }
                            }
                        }
                    }

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
    public function destroy($Codl)
    {
        try {

            if (!$this->livro::where(
                'Codl', '=', "{$Codl}")->get()->toArray()) {
                return response()->json(['error'=> 'Nada Encontrado', 404]);
            } else {
                $data = $this->livro::where('Codl', '=', "{$Codl}");
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
                'Titulo.required' => 'informe o Titulo',
                'Editora.required' => 'informe a Editora',
                'Edicao.required' => 'informe a Edição',
                'Valor.required' => 'informe o Valor',
                'Ano_Publicacao.required' => 'informe o Ano da Publicação',
                'Assunto.required' => 'informe o Assunto',
                'Autor.required' => 'informe o/os Autor(es)',
            ];
    
            $rules = [
                'Titulo' => 'required',
                'Editora' => 'required',
                'Edicao' => 'required',
                'Valor' => 'required',
                'Assunto' => 'required',
                'Autor' => 'required',
            ];
    
            $regras = ($id != null) ? $rules : $this->livro->rules();

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
