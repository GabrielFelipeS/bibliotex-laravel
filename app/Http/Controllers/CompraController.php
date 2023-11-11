<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\Compra;

class CompraController extends Controller
{
    public function find($id) {
        $compra = Compra::find($id);
        return $compra;
    }

    public function findAll() {
        $compras = Compra::all();
        return $compras;
    }

    public function store(Request $request) {
            $compra = new Compra;
            $compra->id = $request->id;
            $compra->cpfComprador = $request->cpfComprador;
            $compra->ISBNLivro = $request->ISBNLivro;
            $compra->codVendedor = $request->codVendedor;
            $compra->valor = $request->valor;
            $compra->cartao = $request->cartao;

            $compra->save();
            //return response()->json(['message' => 'Livro criado com sucesso'], 201);
            return redirect('/')->with('message', 'Livro criado com sucesso');
    }

    public function update(Request $request) {
        DB::table('compras')
            ->where('id', $request->id)
            ->update([
                'cpfComprador' =>  $request->cpfComprador,
                'ISBNLivro' => $request->ISBNLivro,
                'codVendedor' => $request->codVendedor,
                'valor' => $request->valor,
                'cartao' => $request->cartao,
            ]);
    }

    public function delete($id) {
        DB::table('compras')
            ->where('id', $id)
            ->limit(1)
            ->delete();
    }
}
