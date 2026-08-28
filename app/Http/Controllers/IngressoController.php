<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Ingresso;
use App\Models\Sessao;

class IngressoController extends Controller
{
    public function index()
    {
        $dados = Ingresso::with('sessao.filme')->get();

        return view('ingresso.list')->with(['dados' => $dados]);
    }

    function create()
    {
        $sessoes = Sessao::with('filme')->get();

        return view('ingresso.form', compact('sessoes'));
    }

    function validateForm(Request $request)
    {
        $request->validate([
            'sessao_id' => 'required|exists:sessoes,id',
            'cliente_nome' => 'required',
            'assento' => 'required',
            'tipo_ingresso' => 'required',
        ], [
            'sessao_id.required' => "A sessão é obrigatoria",
            'cliente_nome.required' => "O nome do cliente é obrigatorio",
            'assento.required' => "O :attribute é obrigatorio",
            'tipo_ingresso.required' => "O tipo de ingresso é obrigatorio",
        ]);
    }

    function store(Request $request)
    {
        $this->validateForm($request);

        Ingresso::create($request->all());

        return redirect('ingresso')->with("success", 'Ingresso salvo com sucesso!');
    }

    function edit($id)
    {
        $data = Ingresso::find($id);
        $sessoes = Sessao::with('filme')->get();

        return view('ingresso.form', compact('data', 'sessoes'));
    }

    function update(Request $request, $id)
    {
        $this->validateForm($request);

        Ingresso::find($id)->update($request->all());

        return redirect('ingresso')->with("success", 'Ingresso atualizado com sucesso!');
    }

    function destroy($id)
    {
        Ingresso::destroy($id);

        return redirect('ingresso')->with("success", 'Ingresso removido com sucesso!');
    }

    public function search(Request $request)
    {
        if (!empty($request->valor)) {
            $dados = Ingresso::with('sessao.filme')->where(
                $request->tipo,
                'like',
                "%$request->valor%"
            )->get();
        } else {
            $dados = Ingresso::with('sessao.filme')->get();
        }

        return view('ingresso.list', compact('dados'));
    }
}
