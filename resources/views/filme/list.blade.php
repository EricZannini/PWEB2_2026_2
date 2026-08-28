@extends('main')
@section('titulo', 'Listagem de Filmes')
@section('conteudo')
    <div class="row">

        <h3>Filmes em Cartaz</h3>
        <form action="{{ route('filme.search') }}" method="post">
            @csrf
            <div class="row">
                <div class="col-2">
                    <label for="tipo">Tipo</label>
                    <select name="tipo" class="form-select">
                        <option value="titulo">Título</option>
                        <option value="genero">Gênero</option>
                        <option value="classificacao">Classificação</option>
                    </select>
                </div>
                <div class="col-5">
                    <label for="valor">Valor</label>
                    <input type="text" name="valor" placeholder="Pesquisar..." class="form-control">
                </div>
                <div class="col-5">
                    <button type="submit" class="btn btn-primary">Buscar</button>
                    <a href="{{ url('filme/create') }}" class="btn btn-success"> Novo</a>
                </div>
            </div>
        </form>

    </div>

    <div class="row mt-4">
        <table class="table table-striped table-hover">
            <thead>
                <tr>
                    <th scope="col">#</th>
                    <th scope="col">Título</th>
                    <th scope="col">Gênero</th>
                    <th scope="col">Duração</th>
                    <th scope="col">Classificação</th>
                    <th scope="col">Ação</th>
                    <th scope="col">Ação</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($dados as $item)
                    <tr>
                        <th scope='row'>{{ $item->id }}</th>
                        <td>{{ $item->titulo }}</td>
                        <td>{{ $item->genero }}</td>
                        <td>{{ $item->duracao }}</td>
                        <td>{{ $item->classificacao }}</td>
                        <td>
                            <a class='btn btn-warning' title='Editar' href="#">Editar</a>
                        </td>
                        <td>
                            <button type="button" class='btn btn-danger' title='Excluir'>Deletar</button>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
@stop
