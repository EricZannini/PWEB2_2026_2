@extends('main')
@section('titulo', 'Formulário de Sessão')
@section('conteudo')
    <div class="row">
        @php
            if (!empty($data->id)) {
                $action = route('sessao.update', $data->id);
            } else {
                $action = route('sessao.store');
            }
        @endphp

        <h4>Formulário Sessão</h4>
        <form action="{{ $action }}" method="post">
            @csrf
            @if (!empty($data->id))
                @method('PUT')
            @endif

            <input type="hidden" name="id" value="{{ old('id', $data->id ?? '') }}">

            <div class="col-6">
                <label for="filme_id">Filme</label>
                <select name="filme_id" class="form-select">
                    <option value="">Selecione um filme</option>
                    @foreach ($filmes as $filme)
                        <option value="{{ $filme->id }}"
                            {{ old('filme_id', $data->filme_id ?? '') == $filme->id ? 'selected' : '' }}>
                            {{ $filme->titulo }}
                        </option>
                    @endforeach
                </select>
            </div>
            <div class="col-6">
                <label for="sala">Sala</label>
                <input type="text" name="sala" class="form-control" value="{{ old('sala', $data->sala ?? '') }}">
            </div>
            <div class="col-6">
                <label for="data_sessao">Data</label>
                <input type="date" name="data_sessao" class="form-control"
                    value="{{ old('data_sessao', $data->data_sessao ?? '') }}">
            </div>
            <div class="col-6">
                <label for="hora_inicio">Hora de Início</label>
                <input type="time" name="hora_inicio" class="form-control"
                    value="{{ old('hora_inicio', $data->hora_inicio ?? '') }}">
            </div>
            <div class="col-6">
                <label for="preco">Preço</label>
                <input type="number" step="0.01" name="preco" class="form-control"
                    value="{{ old('preco', $data->preco ?? '') }}">
            </div>
            <div class="mt-2">
                <button type="submit" class="btn btn-success">Salvar</button>
                <a href="{{ url('sessao') }}" class="btn btn-primary"> Voltar</a>
            </div>
        </form>
    </div>
@stop
