<?php

namespace Tests\App\Http\Controllers;
use Illuminate\Http\Request;

use App\Http\Controllers\VendedorController;
use App\Models\Vendedor;

use Tests\TestCase;


class VendedorControllerTest extends TestCase
{
    public function test_store() {
        $quantidadeDeVendoresAntesDeInserir = Vendedor::count();

        $controller = new VendedorController;
        $requestData = [
            'cpf' => '49960658028',
            'nomeCompleto' => 'Testador testando testavel',
            'data_de_nascimento' => '2023/11/11',
            'nacionalidade' => 'Testador',
        ];

        $request = new Request($requestData);
        $controller->store($request);

        $quantidadeDeVendoresAgora = Vendedor::count();

        $this->assertNotEquals($quantidadeDeVendoresAntesDeInserir, $quantidadeDeVendoresAgora);
    }

    public function test_store_ja_existente() {
        $quantidadeDeVendoresAntesDeInserir = Vendedor::count();

        $controller = new VendedorController;
        $requestData = [
            'cpf' => '49960658028',
            'nomeCompleto' => 'Testador testando testavel',
            'data_de_nascimento' => '2023/11/11',
            'nacionalidade' => 'Testador',
        ];

        $request = new Request($requestData);
        $controller->store($request);

        $quantidadeDeVendoresAgora = Vendedor::count();

        $this->assertEquals($quantidadeDeVendoresAntesDeInserir, $quantidadeDeVendoresAgora);
    }

    public function test_find() {
        $controller = new VendedorController; 
        $vendedor = $controller->find('49960658028');
        $this->assertEquals('Testador testando testavel', $vendedor->nomeCompleto);
    }

    public function test_findByCodigoDoVendedor() {
        $controller = new VendedorController; 
        $vendedor = $controller->findByCodigoDoVendedor(1);
        $this->assertEquals('Gabriel Felipe', $vendedor->nomeCompleto);
    }

    public function test_findAll() {
        $quantidadeDeVendedores = Vendedor::count();
        $controller = new VendedorController;
        $vendedores = $controller->findAll();

        $this->assertEquals($quantidadeDeVendedores, $vendedores->count());
    }

    public function test_update() {
        $controller = new VendedorController;
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
        $quantidadeDeVendoresAntesDeDeletar = Vendedor::count();
        $controller = new VendedorController;
        
        $controller->destroy('49960658028');

        $quantidadeDeVendoresAgora = Vendedor::count();
        $this->assertNotEquals($quantidadeDeVendoresAntesDeDeletar, $quantidadeDeVendoresAgora);
    }


}
