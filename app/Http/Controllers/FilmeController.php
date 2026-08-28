<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Filme;

class FilmeController extends Controller
{
    public function index()
    {
        $dados = Filme::all();

        return view('filme.list')->with(['dados' => $dados]);
    }

    function create()
    {
        return view('filme.form');
    }

    function validateForm(Request $request)
    {
        $request->validate([
            'titulo' => 'required',
            'genero' => 'required',
            'duracao' => 'required',
            'classificacao' => 'required',
        ], [
            'titulo.required' => "O :attribute é obrigatorio",
            'genero.required' => "O :attribute é obrigatorio",
            'duracao.required' => "A :attribute é obrigatoria",
            'classificacao.required' => "A :attribute é obrigatoria",
        ]);
    }

    function store(Request $request)
    {
        $this->validateForm($request);

        Filme::create($request->all());

        return redirect('filme')->with("success", 'Filme salvo com sucesso!');
    }

    function edit($id)
    {
        $data = Filme::find($id);

        return view('filme.form', compact('data'));
    }

    function update(Request $request, $id)
    {
        $this->validateForm($request);

        Filme::find($id)->update($request->all());

        return redirect('filme')->with("success", 'Filme atualizado com sucesso!');
    }

    function destroy($id)
    {
        Filme::destroy($id);

        return redirect('filme')->with("success", 'Filme removido com sucesso!');
    }

    public function search(Request $request)
    {
        if (!empty($request->valor)) {
            $dados = Filme::where(
                $request->tipo,
                'like',
                "%$request->valor%"
            )->get();
        } else {
            $dados = Filme::all();
        }

        return view('filme.list', compact('dados'));
    }
}
