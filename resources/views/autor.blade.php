@extends('layouts.app')

@section('content')
<meta name="csrf-token" content="{{ csrf_token() }}" />
<link href="{{ asset('css/style.css')}}" rel="stylesheet">
<link href="{{ asset('css/dataTables.dataTables.css')}}" rel="stylesheet">
<link href="{{ asset('css/bootstrap.min.css')}}" rel="stylesheet">
<link href="{{ asset('css/dataTables.bootstrap5.css')}}" rel="stylesheet">

<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card col-md-12"><br>
            <div class="card">
                <h5 class="card-header">Cadastro de Autor <a class="btn btn-secondary" style="float: right" href="{{ url('/home') }}">Voltar</a></h5>
                
                <div class="card-body">
                    <form>
                        <div class="form-row">
                            <div class="form-group col-md-4">
                                <label for="Livro">Livro</label>
                                <select id="livro" name ="livro" class="form-control">
                                    @foreach($livro as $k => $livros)
                                        @if ($k == 1)
                                            <option selected id="{{$livros['Codl']}}">{{$livros['Titulo']}}</option>
                                        @else                                        
                                            <option id="{{$livros['Codl']}}">{{$livros['Titulo']}}</option>
                                        @endif
                                    @endforeach
                                </select>
                            </div>
                            <div class="form-group col-md-8">
                                <label for="Nome">Nome</label>
                                <input type="text" class="form-control" id="nome" placeholder="Nome do Autor">
                                <br>
                                <div 
                                    class="alert alert-warning alert-dismissible " 
                                    role="alert" 
                                    style="display: none"
                                    id="alert_nome"
                                    name="alert_nome"
                                >
                                    <strong>Nome</strong> O campo deve ser preenchido.
                                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                                <div 
                                    class="alert alert-success alert-dismissible " 
                                    role="alert" 
                                    style="display: none"
                                    id="success_autor"
                                    name="success_autor"
                                >
                                    <strong>Nome</strong> Foi Cadastrada com Sucesso.
                                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                                <div 
                                    class="alert alert-success alert-dismissible " 
                                    role="alert" 
                                    style="display: none"
                                    id="success_nome_delete"
                                    name="success_nome_delete"
                                >
                                    <strong>Nome</strong> Foi Deletado com Sucesso.
                                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                            </div>
                        </div>
                            <button 
                                type="submit" 
                                class="btn btn-primary" 
                                style="float: right"
                                onclick="insertAutor()"
                            >Enviar</button>
                        </form>
                </div>
            </div>
            
            <br>
                <div class="card-header">
                    <hr>             
                    <table id="assunto" class="table table-striped" style="width:100%">
                        <thead>
                            <tr>
                                <th>Cod_Livro</th>
                                <th>Nome</th>
                                <th>Ação</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($autor as $k => $autores)
                                @if ($autores['Nome'] != '')
                                    <tr>
                                        <td>{{$autores['CodAu']}}</td>
                                        <td>{{$autores['Nome']}}</td>
                                        <td>
                                        <button 
                                            type="button" 
                                            class="btn btn-danger btnExcluirAutor"
                                            id="{{$autores['Livro_Codl']}}, {{$autores['CodAu']}}"
                                        >Excluir
                                        </button></td>
                                    </tr>
                                @endif
                            @endforeach
                            
                        </tbody>
                        <tfoot>
                            <tr>
                                <th>Cod_Livro</th>
                                <th>Descricao</th>
                            </tr>
                        </tfoot>
                    </table>
                </div>
                
            </div>
        </div>
    </div>
</div>

<script src="https://code.jquery.com/jquery-3.7.1.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.3.0/js/bootstrap.bundle.min.js"></script>
<script src="https://cdn.datatables.net/2.1.5/js/dataTables.bootstrap5.js"></script>
<script src="https://cdn.datatables.net/2.1.5/js/dataTables.js"></script>
<script src="https://cdn.datatables.net/2.1.5/js/dataTables.js"></script>
<script>
    new DataTable('#assunto');
</script>
<script src="{{ asset('js/autor.js')}}"></script>
@endsection
