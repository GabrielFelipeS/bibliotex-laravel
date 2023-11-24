<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Compra;

class ComprasSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
      // Inserção 1
    Compra::create([
        'cpfComprador' => '1234567891233',
        'ISBNLivro' => '004',
        'codVendedor' => 2,
        'valor' => 240,
        'cartao' => '1234-5119',
    ]);

    // Inserção 2
    Compra::create([
        'cpfComprador' => '12345675268',
        'ISBNLivro' => '001',
        'codVendedor' => 2,
        'valor' => 50,
        'cartao' => '1234-6125',
    ]);

    // Inserção 3
    Compra::create([
        'cpfComprador' => '46522714552',
        'ISBNLivro' => '002',
        'codVendedor' => 1,
        'valor' => 17,
        'cartao' => '1234-5612',
    ]);

    // Inserção 4
    Compra::create([
        'cpfComprador' => '246579158228',
        'ISBNLivro' => '006',
        'codVendedor' => 2,
        'valor' => 47,
        'cartao' => '1234-5699',
    ]);

    // Inserção 5
    Compra::create([
        'cpfComprador' => '49960670828',
        'ISBNLivro' => '012',
        'codVendedor' => 1,
        'valor' => 72,
        'cartao' => '1234-4568',
    ]);

    // Inserção 6
    Compra::create([
        'cpfComprador' => '46125781212',
        'ISBNLivro' => '005',
        'codVendedor' => 2,
        'valor' => 45,
        'cartao' => '1234-1234',
    ]);

    // Inserção 7
    Compra::create([
        'cpfComprador' => '46125781212',
        'ISBNLivro' => '005',
        'codVendedor' => 1,
        'valor' => 90,
        'cartao' => '1234-1234',
    ]);
    }
}
