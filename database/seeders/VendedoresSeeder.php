<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Vendedor;

class VendedoresSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Inserção 1
        Vendedor::create([
            'codigo_vendedor' => 1,
            'cpf' => '1234567891233',
            'nomeCompleto' => 'Gabriel Felipe',
            'data_de_nascimento' => '2003-04-14',
            'nacionalidade' => 'Brasileiro',
        ]);

        // Inserção 2
        Vendedor::create([
            'codigo_vendedor' => 2,
            'cpf' => '123456789124',
            'nomeCompleto' => 'Gabriely Cavalcante',
            'data_de_nascimento' => '2003-04-14',
            'nacionalidade' => 'Brasileiro',
        ]);

        // Inserção 3
        Vendedor::create([
            'codigo_vendedor' => 3,
            'cpf' => '12465887',
            'nomeCompleto' => 'Antônio Morrendo das Dores',
            'data_de_nascimento' => '1996-07-14',
            'nacionalidade' => 'Brasileiro',
        ]);
    }
}
