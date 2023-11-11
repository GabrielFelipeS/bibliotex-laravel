<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Endereco;

class EnderecoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Inserção 1
        Endereco::create([
            'cpfDono' => '1234567891233',
            'bairro' => 'Pimentas',
            'endereco' => 'Av. Salgado FIlho',
            'cidade' => 'Guarulhos',
            'estado' => 'São Paulo',
            'cep' => '07115-0001',
            'complemento' => 'Dani Salgados',
        ]);

        // Inserção 2
        Endereco::create([
            'cpfDono' => '123456789124',
            'bairro' => 'Pimentas',
            'endereco' => 'Av. Salgado FIlho',
            'cidade' => 'Guarulhos',
            'estado' => 'São Paulo',
            'cep' => '07115-0001',
            'complemento' => 'Dani Salgados',
        ]);

        // Inserção 3
        Endereco::create([
            'cpfDono' => '12465887',
            'bairro' => 'Pimentas',
            'endereco' => 'Av. Salgado FIlho',
            'cidade' => 'Guarulhos',
            'estado' => 'São Paulo',
            'cep' => '07115-000',
            'complemento' => 'Dani Salgados',
        ]);
    }
}
