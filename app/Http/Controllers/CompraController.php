<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\Compra;
use App\Models\Livro;
use App\Http\Controllers\Mylib;
use App\Models\Vendedor;

class CompraController extends Controller
{
    function exibirComprarlivro() {
        if (Auth::guest()){
            return redirect('/')->with('msg', 'Faça login para comprar');
        }

        if(!request('ISBN')) {
            return redirect('/')->with('msg', 'É necessario passar o ISBN do livro');
        }

        if(!Livro::where('ISBN', request('ISBN'))->first()) {
            return redirect('/')->with('msg', 'Livro não encontrado');
        }

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

            if(!Vendedor::where('codigo_vendedor', $request->codVendedor)->first()) {
                return redirect('/comprarLivro?ISBN='.$request->query('ISBN'))->with('msg', 'Vendedor não encontrado');
            }
            $compra->codVendedor = $request->codVendedor;

            $dadosDoLivro = Livro::where('ISBN', $request->query('ISBN'))->first();            

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
