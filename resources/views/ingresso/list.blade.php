@extends('main')
@section('titulo', 'Listagem de Ingressos')
@section('conteudo')
    <div class="row">

        <h3>Ingressos</h3>
        <form action="{{ route('ingresso.search') }}" method="post">
            @csrf
            <div class="row">
                <div class="col-2">
                    <label for="tipo">Tipo</label>
                    <select name="tipo" class="form-select">
                        <option value="cliente_nome">Cliente</option>
                        <option value="assento">Assento</option>
                        <option value="tipo_ingresso">Tipo</option>
                    </select>
                </div>
                <div class="col-5">
                    <label for="valor">Valor</label>
                    <input type="text" name="valor" placeholder="Pesquisar..." class="form-control">
                </div>
                <div class="col-5">
                    <button type="submit" class="btn btn-primary">Buscar</button>
                    <a href="{{ url('ingresso/create') }}" class="btn btn-success"> Novo</a>
                </div>
            </div>
        </form>

    </div>

    <div class="row mt-4">
        <table class="table table-striped table-hover">
            <thead>
                <tr>
                    <th scope="col">#</th>
                    <th scope="col">Cliente</th>
                    <th scope="col">Sessão</th>
                    <th scope="col">Assento</th>
                    <th scope="col">Tipo</th>
                    <th scope="col">Ação</th>
                    <th scope="col">Ação</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($dados as $item)
                    <tr>
                        <th scope='row'>{{ $item->id }}</th>
                        <td>{{ $item->cliente_nome }}</td>
                        <td>
                            @if ($item->sessao)
                                {{ $item->sessao->filme->titulo ?? '-' }} ({{ $item->sessao->sala }})
                            @else
                                -
                            @endif
                        </td>
                        <td>{{ $item->assento }}</td>
                        <td>{{ $item->tipo_ingresso }}</td>
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
