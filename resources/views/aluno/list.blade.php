@extends('main')
@section('titulo', 'Listagem de Alunos')
@section('conteudo')
    <div class="row">
        <h3>Listagem de Alunos</h3>

        {{-- Mensagem de sucesso após cadastrar / editar / excluir --}}
        @if (session('success'))
            <div class="alert alert-success">{{ session('success') }}</div>
        @endif

        <div class="col-12 mb-3">
            <a href="{{ url('aluno/create') }}" class="btn btn-success">Novo</a>
        </div>
    </div>

    <div class="row mt-2">
        <table class="table table-striped table-hover">
            <thead>
                <tr>
                    <th scope="col">#</th>
                    <th scope="col">Nome</th>
                    <th scope="col">CPF</th>
                    <th scope="col">Telefone</th>
                    <th scope="col">Ações</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($dados as $item)
                    <tr>
                        <th scope="row">{{ $item->id }}</th>
                        <td>{{ $item->nome }}</td>
                        <td>{{ $item->cpf }}</td>
                        <td>{{ $item->telefone }}</td>
                        <td>
                            <a class="btn btn-warning btn-sm" title="Editar"
                                href="{{ url('aluno/' . $item->id . '/edit') }}">Editar</a>

                            <form action="{{ url('aluno/' . $item->id) }}" method="post" class="d-inline"
                                onsubmit="return confirm('Deseja excluir este aluno?')">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger btn-sm" title="Excluir">Deletar</button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
@stop
