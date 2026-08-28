<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use App\Models\Usuario;

class LoginController extends Controller
{
    public function index()
    {
        return view('login');
    }

    public function autenticar(Request $request)
    {
        $request->validate([
            'login' => 'required',
            'senha' => 'required',
        ], [
            'login.required' => 'O login é obrigatorio',
            'senha.required' => 'A senha é obrigatoria',
        ]);

        $usuario = Usuario::where('login', $request->login)->first();

        if ($usuario && Hash::check($request->senha, $usuario->senha)) {
            session([
                'usuario_id' => $usuario->id,
                'usuario_nome' => $usuario->nome,
            ]);

            return redirect('filme')->with('success', 'Bem-vindo, ' . $usuario->nome . '!');
        }

        return redirect('login')->with('error', 'Login ou senha inválidos.');
    }

    public function logout()
    {
        session()->flush();

        return redirect('login')->with('success', 'Você saiu do sistema.');
    }
}
