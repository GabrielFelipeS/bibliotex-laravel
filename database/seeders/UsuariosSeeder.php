<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\User; 

class UsuariosSeeder extends Seeder
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
            'senha' => '$2y$10$AL2JJvjD0dqPojG0B/jGGei8Rq851T0NhaMTSipXXsq8nFlYELBBa', // Senha criptografada
            'fotoPerfil' => 'fotosPerfil/Administrador.png',
        ]);
        
        // Inserção 2
        User::create([
            'nome' => 'Teste Testando',
            'nascimento' => '2023-04-14',
            'telefone' => '(11) 2484-515',
            'email' => 'teste@teste.com',
            'senha' => '$2y$10$QgbyE/MweK0/HgwlVI5mqOc3R90KmsXXyf/qfiRFgYkzrqhfnPnci', // Senha criptografada
            'fotoPerfil' => 'fotosPerfil/Teste Testando.png',
        ]);
    }
}
