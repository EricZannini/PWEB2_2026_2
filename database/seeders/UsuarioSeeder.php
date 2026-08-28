<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use App\Models\Usuario;

class UsuarioSeeder extends Seeder
{
    public function run(): void
    {
        Usuario::create([
            'nome' => 'Administrador',
            'telefone' => '(49) 99999-0000',
            'email' => 'admin@tapcine.com',
            'login' => 'admin',
            'senha' => Hash::make('admin123'),
        ]);
    }
}
