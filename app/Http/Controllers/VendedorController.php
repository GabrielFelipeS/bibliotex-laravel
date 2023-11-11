<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Vendedor;

class VendedorController extends Controller
{
    /**
     * @return $vendedores | Retorna todos os vendedores 
     */
    public function findAll() {
        $vendedores = Vendedor::all();
        return $vendedores;
    }

    /**
     * @return $vendedor| Retorna o vendedores baseado no codigo_vendedor
     */
    public function find($codigo_do_vendedor) {
        $vendedor = Vendedor::where('codigo_vendedor', $codigo_do_vendedor)->first();
        
        return $vendedor;
    }


}
