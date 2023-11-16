<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\User; 
use Illuminate\Support\Facades\Hash;

class UsersSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        User::create([
            'nome' => 'Administrador',
            'nascimento' => '2023-04-14',
            'telefone' => '(11) 2484-515',
            'email' => 'admin@admin.com',
            'password' => Hash::make('123456'), 
            'fotoPerfil' => 'fotosPerfil/Administrador.png',
        ]);
        
        // Inserção 2
        User::create([
            'nome' => 'Teste Testando',
            'nascimento' => '2023-04-14',
            'telefone' => '(11) 2484-515',
            'email' => 'teste@teste.com',
            'password' => Hash::make('teste'), 
            'fotoPerfil' => 'fotosPerfil/Teste Testando.png',
        ]);
    }
}
