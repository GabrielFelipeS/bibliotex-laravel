<?php

namespace Tests\App\Http\Controllers;
use Illuminate\Http\Request;

use App\Http\Controllers\LivroController;
use App\Models\Livro;
use Illuminate\Support\Facades\Http;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class LivroControllerTest extends TestCase
{
    public function test_find(): void {
        $controller = new LivroController;
        $livro = $controller->findLivro("001");

         $this->assertEquals("O labirinto do fauno", $livro->nomeLivro);
     }

    public function test_store(): void {
        $quantidadeAntesDeInserir = Livro::count();

        $controller = new LivroController;
        $requestData = [
            'ISBN' => '1234567890', // Substitua pelos valores desejados
            'valorLivro' => 19.99,
            'nomeLivro' => 'titulo do livro',
            'descricao' => 'Descrição do Livro',
            'nomeDaFoto' => 'foto.jpg',
        ];

        $request = new Request($requestData);

        $controller->store($request);

        $quantidadeAtual = Livro::count();

        $this->assertNotEquals($quantidadeAntesDeInserir, $quantidadeAtual);
    }

    public function test_update() {
        $controller = new LivroController;

        $requestData = [
            'ISBN' => '2234567890', // Substitua pelos valores desejados
            'valorLivro' => 19.99,
            'nomeLivro' => 'titulo do livro apos dar update',
            'descricao' => 'Descrição do Livro apos dar update',
            'nomeDaFoto' => 'foto.jpg',
            'ISBNLivroEditar' => '1234567890',
        ];
        
        $request = new Request($requestData);

        $controller->update($request);

        $livroSendoBuscado = $controller->findLivro('2234567890');

        $this->assertNotEmpty($livroSendoBuscado);
    }

    public function test_delete() {
        $quantidadeAntesDeDeletar = Livro::count();
        $controller = new LivroController;
        $controller->delete('2234567890');

        $quantidadeAtual = Livro::count();
        $this->assertNotEquals($quantidadeAntesDeDeletar, $quantidadeAtual);
    }
}