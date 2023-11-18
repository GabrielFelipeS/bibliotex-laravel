<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\Compra;
use App\Models\Livro;
use App\Http\Controllers\Mylib;


class CompraController extends Controller
{
    function exibirComprarlivro() {
        return view('Compras.comprarLivro');
    }

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
            $compra->ISBNLivro = $request->query('ISBN');
            $compra->codVendedor = $request->codVendedor;

            
            $mylib = new Mylib;
            $dadosDoLivro = Livro::where('ISBN', $request->query('ISBN'))->first();            
            $mylib->dados_do_livro($dadosDoLivro);
            $compra->valor = $dadosDoLivro->valorLivro;
            $compra->cartao = $request->cartao;
            $compra->save();
            //return response()->json(['message' => 'Livro criado com sucesso'], 201);
            return redirect('/')->with('msg', 'Livro comprado com sucesso!');
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
