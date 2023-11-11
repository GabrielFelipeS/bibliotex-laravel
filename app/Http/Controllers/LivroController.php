<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Livro;

class LivroController extends Controller
{

    /**
     *  @param post $request : Informações para cadastrar um livro
     * @return null : redireciona para uma página
     */
    function store(Request $request) {
        $livro = new Livro;
        
        $livro->ISBN = $request->ISBN;
        $livro->valor = $request->valor;
        $livro->nome = $request->nome;
        $livro->descricao = $request->descricao;

        $livro->save();

        return redirect('/');

    }
}
