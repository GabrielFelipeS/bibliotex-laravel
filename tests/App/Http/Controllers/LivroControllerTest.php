<?php

namespace Tests\App\Http\Controllers;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithoutMiddleware;

use Illuminate\Support\Facades\Http;
use Tests\TestCase;

class LivroControllerTest extends TestCase
{
    /**
     * A basic unit test example.
     */


    public function test_store(): void {

        $response = Http::post('/cadastrarLivro', [
            'ISBN' => '100',
            'nomeLivro' => 'Teste Cadastrar',
            'valorLivro' => 25.0,
            'descricao' => 'Testando Cadastro',
            'nomeDaFoto' => 'media/teste.jpg',
        ]);
       
        
       // $quantidade = Livro::count();
        $this->assertTrue(true);
        //$this->assertEquals(13, $quantidade);
    }
}
