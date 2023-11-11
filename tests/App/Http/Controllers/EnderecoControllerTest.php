<?php

namespace Tests\App\Http\Controllers;
use Illuminate\Http\Request;

use App\Http\Controllers\EnderecoController;
use App\Models\Endereco;

use Tests\TestCase;

class EnderecoControllerTest extends TestCase
{
    public function test_store() {
        $quantidadeDeEnderecoAntesDeInserir = Endereco::count();

        $controller = new EnderecoController;
        $requestData = [
            'cpfDono' => '1234567891233',
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

    public function test_find() {
        $controller = new EnderecoController; 
        $Endereco = $controller->find('12465887');
        $this->assertEquals('Pimentas', $Endereco->bairro);
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
            'cpfDono' => '1234567891233',
            'bairro' => 'testado',
            'endereco' => 'rua testada',
            'cidade' => 'Testroide',
            'estado' => 'São Testado',
            'cep' => '01234-5678',
            'complemento' => 'Dani Salgados',
        ];

        $request = new Request($requestData);
        $controller->update($request);

        $endereco = $controller->find('1234567891233');

        $this->assertEquals('Pimentas', $endereco->bairro);
    }



 

    public function test_delete() {
        $quantidadeDeEnderecoAntesDeDeletar = Endereco::count();
        $controller = new EnderecoController;
        
        $controller->delete('1234567891233');

        $quantidadeDEnderecoAgora = Endereco::count();
        $this->assertNotEquals($quantidadeDeEnderecoAntesDeDeletar, $quantidadeDEnderecoAgora);
    }


}
