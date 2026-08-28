<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AlunoController;
use App\Http\Controllers\FilmeController;
use App\Http\Controllers\SessaoController;
use App\Http\Controllers\IngressoController;
use App\Http\Controllers\LoginController;

Route::get('/login', [LoginController::class, 'index'])->name('login');
Route::post('/login', [LoginController::class, 'autenticar'])->name('login.autenticar');
Route::get('/logout', [LoginController::class, 'logout'])->name('logout');

Route::get('/', function () {
    return redirect('filme');
});

Route::middleware('autenticado')->group(function () {

    Route::get('/aluno', [AlunoController::class, 'index']);
    Route::get('/aluno/create', [AlunoController::class, 'create']);
    Route::post('/aluno/store', [AlunoController::class, 'store'])->name('aluno.store');
    Route::get('/aluno/edit/{id}', [AlunoController::class, 'edit'])->name('aluno.edit');
    Route::put('/aluno/update/{id}', [AlunoController::class, 'update'])->name('aluno.update');
    Route::delete('/aluno/{id}', [AlunoController::class, 'destroy'])->name('aluno.destroy');
    Route::post('/aluno/search', [AlunoController::class, 'search'])->name('aluno.search');

    Route::get('/filme', [FilmeController::class, 'index']);
    Route::get('/filme/create', [FilmeController::class, 'create']);
    Route::post('/filme/store', [FilmeController::class, 'store'])->name('filme.store');
    Route::get('/filme/edit/{id}', [FilmeController::class, 'edit'])->name('filme.edit');
    Route::put('/filme/update/{id}', [FilmeController::class, 'update'])->name('filme.update');
    Route::delete('/filme/{id}', [FilmeController::class, 'destroy'])->name('filme.destroy');
    Route::post('/filme/search', [FilmeController::class, 'search'])->name('filme.search');

    Route::get('/sessao', [SessaoController::class, 'index']);
    Route::get('/sessao/create', [SessaoController::class, 'create']);
    Route::post('/sessao/store', [SessaoController::class, 'store'])->name('sessao.store');
    Route::get('/sessao/edit/{id}', [SessaoController::class, 'edit'])->name('sessao.edit');
    Route::put('/sessao/update/{id}', [SessaoController::class, 'update'])->name('sessao.update');
    Route::delete('/sessao/{id}', [SessaoController::class, 'destroy'])->name('sessao.destroy');
    Route::post('/sessao/search', [SessaoController::class, 'search'])->name('sessao.search');

    Route::get('/ingresso', [IngressoController::class, 'index']);
    Route::get('/ingresso/create', [IngressoController::class, 'create']);
    Route::post('/ingresso/store', [IngressoController::class, 'store'])->name('ingresso.store');
    Route::get('/ingresso/edit/{id}', [IngressoController::class, 'edit'])->name('ingresso.edit');
    Route::put('/ingresso/update/{id}', [IngressoController::class, 'update'])->name('ingresso.update');
    Route::delete('/ingresso/{id}', [IngressoController::class, 'destroy'])->name('ingresso.destroy');
    Route::post('/ingresso/search', [IngressoController::class, 'search'])->name('ingresso.search');

});
