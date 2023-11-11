<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use App\Models\Vendedor;

class VendedorController extends Controller
{


    /**
     * @return vendedor| Retorna o vendedores baseado no codigo_vendedor
     */
    public function find($cpf) {
        $vendedor = Vendedor::where('cpf', $cpf)->first();
        
        return $vendedor;
    }

    /**
     * @return vendedor| Retorna o vendedores baseado no codigo_vendedor
     */
    public function findByCodigoDoVendedor($codigo_do_vendedor) {
        $vendedor = Vendedor::where('codigo_vendedor', $codigo_do_vendedor)->first();
        
        return $vendedor;
    }

        /**
     * @return vendedores | Retorna todos os vendedores 
     */
    public function findAll() {
        $vendedores = Vendedor::all();
        return $vendedores;
    }


    /**
     * @param request | dados para cadastrar um vendedor 
     * @return redirect | Redireciona para um página
     */
    public function store(Request $request) {
        $vendedor = Vendedor::where('cpf', $request->cpf)->first();

        if($vendedor) {
            return redirect('/')->with('O cpf informado já foi cadastrado');
        }

        $vendedor = new Vendedor;
        $vendedor->cpf = $request->cpf;
        $vendedor->nomeCompleto = $request->nomeCompleto;
        $vendedor->data_de_nascimento = $request->data_de_nascimento;
        $vendedor->nacionalidade = $request->nacionalidade;

        $vendedor->save();

        return redirect('/')->with('Vendedor cadastrado!');
    }

    /**
     * @param cpf | Cpf do vendedor a ser editado
     * @return null | redireciona a pagina
     */
    public function update(Request $request) {
        DB::table('vendedores')
            ->where('cpf', $request->cpf)
            ->update([
                'codigo_vendedor' => $request->codigo_vendedor,
                'cpf' => $request->cpf,
                'nomeCompleto' => $request->nomeCompleto,
                'data_de_nascimento' => $request->data_de_nascimento,
                'nacionalidade' => $request->nacionalidade,
            ]);

        return redirect('/')->with('Vendedor deltado com sucesso!');
    }

    /**
     * @param cpf | Cpf do vendedor a ser deletado
     * @return null | redireciona a pagina
     */
    public function delete($cpf) {
        DB::table('vendedores')
            ->where('cpf', $cpf)
            ->delete();

        return redirect('/')->with('Vendedor deltado com sucesso!');
    }

    


}
