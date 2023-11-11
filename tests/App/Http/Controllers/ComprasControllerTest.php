<?php

namespace Tests\App\Http\Controllers;
use Illuminate\Http\Request;

use App\Http\Controllers\CompraController;
use App\Models\Compra;

use Tests\TestCase;


class ComprasControllerTest extends TestCase
{
    public function test_store() {
        $quantidadeDeVendoresAntesDeInserir = Compra::count();

        $controller = new CompraController;
        $requestData = [
            'cpf' => '49960658028',
            'nomeCompleto' => 'Testador testando testavel',
            'data_de_nascimento' => '2023/11/11',
            'nacionalidade' => 'Testador',
        ];

        $request = new Request($requestData);
        $controller->store($request);

        $quantidadeDeVendoresAgora = Compra::count();

        $this->assertNotEquals($quantidadeDeVendoresAntesDeInserir, $quantidadeDeVendoresAgora);
    }

    public function test_store_ja_existente() {
        $quantidadeDeVendoresAntesDeInserir = Compra::count();

        $controller = new CompraController;
        $requestData = [
            'cpf' => '49960658028',
            'nomeCompleto' => 'Testador testando testavel',
            'data_de_nascimento' => '2023/11/11',
            'nacionalidade' => 'Testador',
        ];

        $request = new Request($requestData);
        $controller->store($request);

        $quantidadeDeVendoresAgora = Compra::count();

        $this->assertEquals($quantidadeDeVendoresAntesDeInserir, $quantidadeDeVendoresAgora);
    }

    public function test_find() {
        $controller = new CompraController; 
        $vendedor = $controller->find('49960658028');
        $this->assertEquals('Testador testando testavel', $vendedor->nomeCompleto);
    }

    public function test_findByCodigoDoCompra() {
        $controller = new CompraController; 
        $vendedor = $controller->findByCodigoDoCompra(1);
        $this->assertEquals('Gabriel Felipe', $vendedor->nomeCompleto);
    }

    public function test_findAll() {
        $quantidadeDeCompraes = Compra::count();
        $controller = new CompraController;
        $vendedores = $controller->findAll();

        $this->assertEquals($quantidadeDeCompraes, $vendedores->count());
    }

    public function test_update() {
        $controller = new CompraController;
        $requestData = [
            'codigo_vendedor' => 5,
            'cpf' => '49960658028',
            'nomeCompleto' => 'Testador testando testavel testado',
            'data_de_nascimento' => '2023/11/11',
            'nacionalidade' => 'Testador',
        ];

        $request = new Request($requestData);
        $controller->update($request);

        $vendedor = $controller->find('49960658028');

        $this->assertEquals('Testador testando testavel testado', $vendedor->nomeCompleto);
    }

    public function test_delete() {
        $quantidadeDeVendoresAntesDeDeletar = Compra::count();
        $controller = new CompraController;
        
        $controller->delete('49960658028');

        $quantidadeDeVendoresAgora = Compra::count();
        $this->assertNotEquals($quantidadeDeVendoresAntesDeDeletar, $quantidadeDeVendoresAgora);
    }


}
