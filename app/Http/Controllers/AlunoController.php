<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Aluno;

class AlunoController extends Controller
{
    // Exibe a listagem de alunos
    public function index()
    {
        $dados = Aluno::all();

        return view('aluno.list')->with(['dados' => $dados]);
    }

    // Mostra o formulário para cadastrar um novo aluno
    public function create()
    {
        return view('aluno.form');
    }

    // Armazena um novo aluno no banco de dados
    public function store(Request $request)
    {
        $request->validate([
            'nome' => 'required|max:150',
            'cpf' => 'required|max:16',
            'telefone' => 'nullable|max:20',
        ], [
            'nome.required' => 'O nome é obrigatório.',
            'nome.max' => 'O nome pode ter no máximo 150 caracteres.',
            'cpf.required' => 'O CPF é obrigatório.',
            'cpf.max' => 'O CPF pode ter no máximo 16 caracteres.',
            'telefone.max' => 'O telefone pode ter no máximo 20 caracteres.',
        ]);

        Aluno::create($request->all());

        return redirect('aluno')->with('success', 'Aluno cadastrado com sucesso!');
    }

    // Mostra o formulário para editar um aluno existente
    public function edit($id)
    {
        $dado = Aluno::findOrFail($id);

        return view('aluno.form')->with(['dado' => $dado]);
    }

    // Atualiza o aluno no banco de dados
    public function update(Request $request, $id)
    {
        $request->validate([
            'nome' => 'required|max:150',
            'cpf' => 'required|max:16',
            'telefone' => 'nullable|max:20',
        ], [
            'nome.required' => 'O nome é obrigatório.',
            'nome.max' => 'O nome pode ter no máximo 150 caracteres.',
            'cpf.required' => 'O CPF é obrigatório.',
            'cpf.max' => 'O CPF pode ter no máximo 16 caracteres.',
            'telefone.max' => 'O telefone pode ter no máximo 20 caracteres.',
        ]);

        $aluno = Aluno::findOrFail($id);
        $aluno->update($request->all());

        return redirect('aluno')->with('success', 'Aluno atualizado com sucesso!');
    }

    // Exclui o aluno do banco de dados
    public function destroy($id)
    {
        $aluno = Aluno::findOrFail($id);
        $aluno->delete();

        return redirect('aluno')->with('success', 'Aluno excluído com sucesso!');
    }
}
