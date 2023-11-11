<?php

namespace Tests\App\Http\Controllers;
use Illuminate\Http\Request;

use App\Http\Controllers\VendedorController;
use App\Models\Vendedor;

use Tests\TestCase;


class VendedorControllerTest extends TestCase
{
    public function test_find() {
        $controller = new VendedorController; 
        $vendedor = $controller->find(1);
        $this->assertEquals('Gabriel Felipe', $vendedor->nomeCompleto);
    }

    public function test_findAll() {
        $quantidadeDeVendedores = Vendedor::count();
        $controller = new VendedorController;
        $vendedores = $controller->findAll();

        $this->assertEquals($quantidadeDeVendedores, $vendedores->count());
    }

    


}
