@extends('layouts.app')

@section('content')

<link href="{{ asset('css/style.css')}}" rel="stylesheet">
<link href="{{ asset('css/dataTables.dataTables.css')}}" rel="stylesheet">
<link href="{{ asset('css/bootstrap.min.css')}}" rel="stylesheet">
<link href="{{ asset('css/dataTables.bootstrap5.css')}}" rel="stylesheet">

<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card col-md-12"><br>
            <div class="card">
                <h5 class="card-header">Cadastro de Livros</h5>
                <div class="card-body">
                    <form>
                        <div class="form-row">
                            <div class="form-group col-md-5">
                                <label for="Titulo">Titulo</label>
                                <input type="text" class="form-control" id="titulo" placeholder="Titulo">
                                <br>
                                <div 
                                    class="alert alert-warning alert-dismissible " 
                                    role="alert" 
                                    style="display: none"
                                    id="alert_titulo"
                                    name="alert_titulo"
                                >
                                    <strong>Titulo</strong> O campo deve ser preenchido.
                                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                            </div>
                            <div class="form-group col-md-5">
                                <label for="Editora">Editora</label>
                                <input type="text" class="form-control" id="editora" placeholder="Editora">
                                <br>
                                <div 
                                    class="alert alert-warning alert-dismissible " 
                                    role="alert" 
                                    style="display: none"
                                    id="alert_editora"
                                    name="alert_editora"
                                >
                                    <strong>Editora</strong> O campo deve ser preenchido.
                                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                            </div>
                            <div class="form-group col-md-2">
                                <label for="Edicao">Edição</label>
                                <select id="edicao" class="form-control">
                                    @foreach(array(1, 2, 3, 4, 5) as &$valor)
                                        @if ($valor == 1)
                                            <option selected id="{{$valor}}">{{$valor}}</option>
                                        @else                                        
                                            <option id="{{$valor}}">{{$valor}}</option>
                                        @endif
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="form-row">
                            <div class="form-group col-md-6">
                                <label for="valor">Valor 2</label>
                                <input 
                                    class="form-control" 
                                    id="valor" 
                                    name="valor"
                                    placeholder="R$"
                                    oninput="this.value = this.value.replace(/[^0-9.]/g, ''); this.value = this.value.replace(/(\..*)\./g, '$1');"
                                    >
                                <br>
                                <div 
                                    class="alert alert-warning alert-dismissible " 
                                    role="alert" 
                                    style="display: none"
                                    id="alert_valor"
                                    name="alert_valor"
                                >
                                    <strong>Valor</strong> O campo deve ser preenchido.
                                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                            </div>
                            <div class="form-group col-md-6">
                                <label for="Ano">Ano Publicação</label>
                                <select id="ano" class="form-control">
                                    @foreach(range(date('Y')-100, date('Y')) as $y)
                                        <option selected id="{{$y}}">{{$y}}</option>
                                    @endforeach
                                </select>
                                <br>
                                <div 
                                    class="alert alert-warning alert-dismissible " 
                                    role="alert" 
                                    style="display: none"
                                    id="alert_ano"
                                    name="alert_ano"
                                >
                                    <strong>Ano Publicação</strong> O campo deve ser preenchido.
                                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                            </div>
                        </div>
                        
                        <div class="form-row">
                            <div class="form-group col-md-6">
                                <div class="card">
                                <div class="card-header"> Assunto
                                    <a class="btn btn-success" style="float: right" href="{{ url('/assunto') }}">Cadastrar</a>
                                </div>
                                <br>
                                <div 
                                    class="alert alert-warning alert-dismissible " 
                                    role="alert" 
                                    style="display: none"
                                    id="alert_assunto"
                                    name="alert_assunto"
                                >
                                    <strong>Assunto</strong> Deve ser escolhido.
                                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                                <div class="card-body" style="overflow-x: auto; height: 200px">
                                    @foreach($assunto as $k => $assuntos)
                                        <div class="form-check">
                                            <input 
                                                class="form-check-input" 
                                                type="checkbox" 
                                                value="{{$assuntos['CodAs']}}" 
                                                id="assunto"
                                                name="assunto[]"
                                            >
                                            <label class="form-check-label" for="flexCheckDefault" style="text-align: justify">
                                                {{$assuntos['Descricao']}}
                                            </label>
                                        </div>
                                    @endforeach
                                </div>
                            </div>

                            
                            </div>
                            <div class="form-group col-md-6">                            
                                <div class="card">
                                <div class="card-header"> Autor
                                    <a class="btn btn-success" style="float: right" href="{{ url('/autor') }}">Cadastrar</a>
                                </div>
                                <br>
                                <div 
                                    class="alert alert-warning alert-dismissible " 
                                    role="alert" 
                                    style="display: none"
                                    id="alert_autor"
                                    name="alert_autor"
                                >
                                    <strong>Autor</strong> Deve ser escolhido.
                                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                                <div class="card-body" style="overflow-x: auto; height: 200px">
                                    
                                    @foreach($autor as $k => $autores)
                                        <div class="form-check">
                                        <input 
                                            class="form-check-input" 
                                            type="checkbox" 
                                            value="{{$autores['CodAu']}}" 
                                            id="Autor"
                                            name="Autor[]"
                                        >
                                        <label class="form-check-label" for="Autor">
                                            {{$autores['Nome']}}
                                        </label>
                                    </div>
                                    @endforeach
                                </div>                            
                            </div>                            
                        </div>
                        
                            <button 
                                type="submit" 
                                class="btn btn-primary" 
                                style="float: right"
                                onclick="insertLivro()"
                            >Enviar</button>
                        </form>
                </div>
            </div><br>
                <div class="card-header">
                    <hr>             
                    <table id="book" class="table table-striped" style="width:100%">
                        <thead>
                            <tr>
                                <th>Nome</th>
                                <th>Título</th>
                                <th>Editora</th>
                                <th>Ano Publicação</th>
                                <th>Descrição</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($livros as $k => $livro)
                                <tr>
                                    <td>{{$livro['Codl']}} - {{$livro['Nome']}}</td>
                                    <td>{{$livro['Titulo']}}</td>
                                    <td>{{$livro['Editora']}} - {{$livro['Edicao']}}</td>
                                    <td>{{$livro['Ano_Publicacao']}}</td>
                                    <td>{{$livro['Descricao']}}</td>
                                </tr>
                            @endforeach
                            
                        </tbody>
                        <tfoot>
                            <tr>
                                <th>Nome</th>
                                <th>Título</th>
                                <th>Editora</th>
                                <th>Ano Publicação</th>
                                <th>Descrição</th>
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

<script src="https://cdn.datatables.net/buttons/3.1.2/js/dataTables.buttons.js"></script>
<script src="https://cdn.datatables.net/buttons/3.1.2/js/buttons.dataTables.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jszip/3.10.1/jszip.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.2.7/pdfmake.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.2.7/vfs_fonts.js"></script>
<script src="https://cdn.datatables.net/buttons/3.1.2/js/buttons.html5.min.js"></script>
<script src="https://cdn.datatables.net/buttons/3.1.2/js/buttons.print.min.js"></script>


<script>
    new DataTable('#book', {
    layout: {
        topStart: {
            buttons: ['copy', 'csv', 'excel', 'pdf', 'print']
        }
    }
});
</script>
<script src="{{ asset('js/home.js')}}"></script>
@endsection