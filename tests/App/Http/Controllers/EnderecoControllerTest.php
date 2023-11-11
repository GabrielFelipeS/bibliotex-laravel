<?php

namespace Tests\App\Http\Controllers;
use Illuminate\Http\Request;

use App\Http\Controllers\EnderecoController;
use App\Models\Endereco;

use Tests\TestCase;

class EnderecoControllerTest extends TestCase
{

    public function test_delete() {
        $quantidadeDeEnderecoAntesDeDeletar = Endereco::count();
        $controller = new EnderecoController;
        
        $controller->delete('12465887');

        $quantidadeDEnderecoAgora = Endereco::count();
        $this->assertNotEquals($quantidadeDeEnderecoAntesDeDeletar, $quantidadeDEnderecoAgora);
    }

    public function test_store() {
        $quantidadeDeEnderecoAntesDeInserir = Endereco::count();

        $controller = new EnderecoController;
        $requestData = [
            'cpfDono' => '12465887',
            'bairro' => 'Jardim testado',
            'endereco' => 'rua testada',
            'cidade' => 'Testroide',
            'estado' => 'São Testado',
            'cep' => '01234-5678',
            'complemento' => 'Dani Salgados',
        ];

        $request = new Request($requestData);
        $controller->store($request);

        $quantidadeDeEnderecosAgora = Endereco::count();

        $this->assertNotEquals($quantidadeDeEnderecoAntesDeInserir, $quantidadeDeEnderecosAgora);
    }

    public function test_store_ja_existe() {
        $quantidadeDeEnderecoAntesDeInserir = Endereco::count();

        $controller = new EnderecoController;
        $requestData = [
            'cpfDono' => '110000',
            'bairro' => 'Jardim testado',
            'endereco' => 'rua testada',
            'cidade' => 'Testroide',
            'estado' => 'São Testado',
            'cep' => '01234-5678',
            'complemento' => 'Dani Salgados',
        ];

        $request = new Request($requestData);
        $controller->store($request);

        $quantidadeDeEnderecosAgora = Endereco::count();

        $this->assertEquals($quantidadeDeEnderecoAntesDeInserir, $quantidadeDeEnderecosAgora);
    }

    public function test_find() {
        $controller = new EnderecoController; 
        $Endereco = $controller->find('12465887');
        $this->assertEquals('Jardim testado', $Endereco->bairro);
    }

    public function test_findAll() {
        $quantidadeDeEndereco = Endereco::count();
        $controller = new EnderecoController;
        $Enderecos = $controller->findAll();

        $this->assertEquals($quantidadeDeEndereco, $Enderecos->count());
    }

    public function test_update() {
        $controller = new EnderecoController;
        $requestData = [
            'cpf' => '12465887',
            'cpfDono' => '12465887',
            'bairro' => 'testado',
            'endereco' => 'rua testada',
            'cidade' => 'Testroide',
            'estado' => 'São Testado',
            'cep' => '01234-5678',
            'complemento' => 'Dani Salgados',
        ];

        $request = new Request($requestData);
        $controller->update($request);

        $endereco = $controller->find('12465887');

        $this->assertEquals('testado', $endereco->bairro);
    }

   
}
