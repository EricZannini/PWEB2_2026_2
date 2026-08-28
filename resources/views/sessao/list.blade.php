@extends('main')
@section('titulo', 'Listagem de Sessões')
@section('conteudo')
    <div class="row">

        <h3>Sessões</h3>
        <form action="{{ route('sessao.search') }}" method="post">
            @csrf
            <div class="row">
                <div class="col-2">
                    <label for="tipo">Tipo</label>
                    <select name="tipo" class="form-select">
                        <option value="sala">Sala</option>
                        <option value="data_sessao">Data</option>
                    </select>
                </div>
                <div class="col-5">
                    <label for="valor">Valor</label>
                    <input type="text" name="valor" placeholder="Pesquisar..." class="form-control">
                </div>
                <div class="col-5">
                    <button type="submit" class="btn btn-primary">Buscar</button>
                    <a href="{{ url('sessao/create') }}" class="btn btn-success"> Novo</a>
                </div>
            </div>
        </form>

    </div>

    <div class="row mt-4">
        <table class="table table-striped table-hover">
            <thead>
                <tr>
                    <th scope="col">#</th>
                    <th scope="col">Filme</th>
                    <th scope="col">Sala</th>
                    <th scope="col">Data</th>
                    <th scope="col">Hora</th>
                    <th scope="col">Preço</th>
                    <th scope="col">Ação</th>
                    <th scope="col">Ação</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($dados as $item)
                    <tr>
                        <th scope='row'>{{ $item->id }}</th>
                        <td>{{ $item->filme->titulo ?? '-' }}</td>
                        <td>{{ $item->sala }}</td>
                        <td>{{ $item->data_sessao }}</td>
                        <td>{{ $item->hora_inicio }}</td>
                        <td>R$ {{ number_format($item->preco, 2, ',', '.') }}</td>
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
