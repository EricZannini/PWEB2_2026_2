<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Sessao;
use App\Models\Filme;

class SessaoController extends Controller
{
    public function index()
    {
        $dados = Sessao::with('filme')->get();

        return view('sessao.list')->with(['dados' => $dados]);
    }

    function create()
    {
        $filmes = Filme::all();

        return view('sessao.form', compact('filmes'));
    }

    function validateForm(Request $request)
    {
        $request->validate([
            'filme_id' => 'required|exists:filmes,id',
            'sala' => 'required',
            'data_sessao' => 'required|date',
            'hora_inicio' => 'required',
            'preco' => 'required|numeric',
        ], [
            'filme_id.required' => "O filme é obrigatorio",
            'sala.required' => "A :attribute é obrigatoria",
            'data_sessao.required' => "A data é obrigatoria",
            'hora_inicio.required' => "A hora é obrigatoria",
            'preco.required' => "O :attribute é obrigatorio",
        ]);
    }

    function store(Request $request)
    {
        $this->validateForm($request);

        Sessao::create($request->all());

        return redirect('sessao')->with("success", 'Sessão salva com sucesso!');
    }

    function edit($id)
    {
        $data = Sessao::find($id);
        $filmes = Filme::all();

        return view('sessao.form', compact('data', 'filmes'));
    }

    function update(Request $request, $id)
    {
        $this->validateForm($request);

        Sessao::find($id)->update($request->all());

        return redirect('sessao')->with("success", 'Sessão atualizada com sucesso!');
    }

    function destroy($id)
    {
        Sessao::destroy($id);

        return redirect('sessao')->with("success", 'Sessão removida com sucesso!');
    }

    public function search(Request $request)
    {
        if (!empty($request->valor)) {
            $dados = Sessao::with('filme')->where(
                $request->tipo,
                'like',
                "%$request->valor%"
            )->get();
        } else {
            $dados = Sessao::with('filme')->get();
        }

        return view('sessao.list', compact('dados'));
    }
}
