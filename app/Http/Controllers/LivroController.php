<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Livro;

class LivroController extends Controller
{

    public function findLivro($id) {
        $livro = Livro::where('ISBN', $id)->first();
        return $livro;
    }

    /**
     *  @param post $request : Informações para cadastrar um livro
     * @return null : redireciona para uma página
     */
    public function store(Request $request) {
        $livro = new Livro;
        
        $livro->ISBN = $request->ISBN;
        $livro->valorLivro = $request->valorLivro;
        $livro->nomeLivro = $request->nomeLivro;
        $livro->descricao = $request->descricao;
        $livro->nomeDaFoto = $request->nomeDaFoto;
        
        $livro->save();

        return response()->json(['message' => 'Livro criado com sucesso'], 201);
    }
}
