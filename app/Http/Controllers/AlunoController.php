<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Aluno;

class AlunoController extends Controller
{
    public function index()
    {
        $dados = Aluno::All();

        return view('aluno.list')->with(['dados' => $dados]);
    }

    function create()
    {
        return view('aluno.form');
    }
    
    function validateForm(Request $request)
    {
        $request->validate([
            'nome' => 'required',
            'cpf' => 'required',
        ], [
            'nome.required' => "O :attribute é obrigatório",
            'cpf.required' => "O :attribute é obrigatório"
        ]);
    }

    function store(Request $request)
    {
        // dd($request->all());
        $this->validateForm($request);

        aluno::create($request->all());

        return redirect('aluno') ->with("success", 'Registro Salvo com Sucesso!');
    }
    
    function edit($id)
    {
        $data = Aluno::find($id);

        return view('aluno.form', compact('data'));
    }

    function update(Request $request,$id)
    {
        // dd($request->all());
        $this->validateForm($request);

        aluno::find($id)->update($request->all());

        return redirect('aluno') ->with("success", 'Registro Atualizado com Sucesso!');
    }

    function destroy($id)
    {
        Aluno::destroy($id);

        return redirect('aluno') ->with("success", 'Registro Removido com Sucesso!');
    }

    public function search(Request $request)
    {
        if(!empty($request->valor)) {
            $dados = Aluno::where(
                $request->tipo,
                'like',
                "%request->valor%"
            )->get();
        } else {
            $dados = Aluno::All();
        }

        return view('aluno.list')->with(['dados' => $dados]);
    }
}