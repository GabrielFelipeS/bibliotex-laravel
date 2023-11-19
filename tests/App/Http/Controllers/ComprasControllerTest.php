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
            'id' => 100,
            'cpfComprador' => '1234567891233',
            'ISBN' => '001',
            'codVendedor' => 1,
            'cartao' => '1234-5119',
        ];

        $request = new Request($requestData);
        $controller->store($request);

        $quantidadeDeVendoresAgora = Compra::count();

        $this->assertNotEquals($quantidadeDeVendoresAntesDeInserir, $quantidadeDeVendoresAgora);
    }

    public function test_find() {
        $controller = new CompraController; 
        $compra = $controller->find(1);
        $this->assertEquals('1234567891233', $compra->cpfComprador);
    }

    public function test_findAll() {
        $quantidadeDeCompraes = Compra::count();
        $controller = new CompraController;
        $compraes = $controller->findAll();

        $this->assertEquals($quantidadeDeCompraes, $compraes->count());
    }

    public function test_update() {
        $controller = new CompraController;
        $requestData = [
            'id' => 100,
            'cpfComprador' => '1234567891233',
            'codVendedor' => 1,
            'cartao' => '1234-5119',
            'quantidade' => 2,
        ];

        $request = new Request($requestData);
        $controller->update($request);

        $compra = $controller->find(100);

        $this->assertEquals('1234567891233', $compra->cpfComprador);
        $this->assertEquals(50, $compra->valor);
    }

    public function test_delete() {
        $quantidadeDeVendoresAntesDeDeletar = Compra::count();
        $controller = new CompraController;
        
        $controller->delete(100);

        $quantidadeDeVendoresAgora = Compra::count();
        $this->assertNotEquals($quantidadeDeVendoresAntesDeDeletar, $quantidadeDeVendoresAgora);
    }
}
