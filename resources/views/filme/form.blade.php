@extends('main')
@section('titulo', 'Formulário de Filme')
@section('conteudo')
    <div class="row">
        @php
            if (!empty($data->id)) {
                $action = route('filme.update', $data->id);
            } else {
                $action = route('filme.store');
            }
        @endphp

        <h4>Formulário Filme</h4>
        <form action="{{ $action }}" method="post">
            @csrf
            @if (!empty($data->id))
                @method('PUT')
            @endif

            <input type="hidden" name="id" value="{{ old('id', $data->id ?? '') }}">
            <div class="col-6">
                <label for="titulo">Título</label>
                <input type="text" name="titulo" class="form-control" value="{{ old('titulo', $data->titulo ?? '') }}">
            </div>
            <div class="col-6">
                <label for="genero">Gênero</label>
                <input type="text" name="genero" class="form-control" value="{{ old('genero', $data->genero ?? '') }}">
            </div>
            <div class="col-6">
                <label for="duracao">Duração</label>
                <input type="text" name="duracao" class="form-control" value="{{ old('duracao', $data->duracao ?? '') }}"
                    placeholder="Ex: 1h45">
            </div>
            <div class="col-6">
                <label for="classificacao">Classificação</label>
                <input type="text" name="classificacao" class="form-control"
                    value="{{ old('classificacao', $data->classificacao ?? '') }}" placeholder="Ex: 12+">
            </div>
            <div class="mt-2">
                <button type="submit" class="btn btn-success">Salvar</button>
                <a href="{{ url('filme') }}" class="btn btn-primary"> Voltar</a>
            </div>
        </form>
    </div>
@stop
