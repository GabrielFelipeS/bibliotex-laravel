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

    function exibirCompras() {
        if(Auth::user()->role === 'comum') {
            return redirect('/')->with('msg', session('msg') ?? 'Você não tem permissão para acessar essa página');
        }
        
        return view('Compras.exibirCompras');
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
            return redirect('/exibirCompras')->with('msg', 'Livro comprado com sucesso!');
    }

    function exibirEditarVendas() {
        return view('Compras.editarVenda');
    }


    public function update(Request $request) {

        $compra = Compra::find($request->id);
        $livro = Livro::where('ISBN', $compra->ISBNLivro)->first();
        DB::table('compras')
            ->where('id', $request->id)
            ->update([
                'cpfComprador' =>  $request->cpfComprador,
                'ISBNLivro' => $compra->ISBNLivro,
                'codVendedor' => $request->codVendedor,
                'valor' => $livro->valorLivro * $request->quantidade,
                'cartao' => $request->cartao,
            ]);
            
            return redirect('/exibirCompras')->with('msg', 'Venda editada com sucesso!');
    }

    public function delete($id) {
        DB::table('compras')
            ->where('id', $id)
            ->limit(1)
            ->delete();
            return redirect('/exibirCompras')->with('msg', 'Venda apagada com sucesso!');


    }
}
