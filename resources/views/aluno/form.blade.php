@extends('main')
@section('titulo', isset($dado) ? 'Editar Aluno' : 'Novo Aluno')
@section('conteudo')
    <div class="row">
        <h3>{{ isset($dado) ? 'Editar Aluno' : 'Cadastro de Aluno' }}</h3>

        {{-- Mensagens de erro de validação --}}
        @if ($errors->any())
            <div class="alert alert-danger">
                <ul class="mb-0">
                    @foreach ($errors->all() as $erro)
                        <li>{{ $erro }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        {{-- Na edição envia PUT para /aluno/{id}; no cadastro envia POST para /aluno --}}
        <form action="{{ isset($dado) ? url('aluno/' . $dado->id) : url('aluno') }}" method="post">
            @csrf
            @isset($dado)
                @method('PUT')
            @endisset

            <div class="col-6 mb-2">
                <label for="nome" class="form-label">Nome</label>
                <input type="text" name="nome" id="nome" class="form-control"
                    value="{{ old('nome', $dado->nome ?? '') }}">
            </div>
            <div class="col-6 mb-2">
                <label for="cpf" class="form-label">CPF</label>
                <input type="text" name="cpf" id="cpf" class="form-control"
                    value="{{ old('cpf', $dado->cpf ?? '') }}">
            </div>
            <div class="col-6 mb-2">
                <label for="telefone" class="form-label">Telefone</label>
                <input type="text" name="telefone" id="telefone" class="form-control"
                    value="{{ old('telefone', $dado->telefone ?? '') }}">
            </div>

            <div class="mt-3">
                <button type="submit" class="btn btn-success">Salvar</button>
                <a href="{{ url('aluno') }}" class="btn btn-primary">Voltar</a>
            </div>
        </form>
    </div>
@stop
