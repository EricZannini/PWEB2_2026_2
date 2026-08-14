<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AlunoController;

Route::get('/', function () {
    return view('main');
});

// Rotas unificadas (RESTful) do CRUD de Aluno.
// Gera: index, create, store, edit, update, destroy.
// (show foi omitido: a interface trabalha apenas com listagem + formulário)
Route::resource('aluno', AlunoController::class)->except(['show']);
