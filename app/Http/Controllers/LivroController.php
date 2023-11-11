<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use App\Models\Livro;

class LivroController extends Controller
{
    /**
     *  @param $ISBN : Informarma o ISBN do livro
     * @return $livro : retorna o livro encontrado
     */
    public function findLivro($ISBN) {
        $livro = Livro::where('ISBN', $ISBN)->first();
        return $livro;
    }

    public function update(Request $request) {

        DB::table('livros')
            ->where('ISBN', $request->query('ISBNLivroEditar'))
            ->limit(1)
            ->update([
                'ISBN' => $request->ISBN,
                'valorLivro' => $request->valorLivro,
                'nomeLivro' => $request->nomeLivro,
                'descricao' => $request->descricao,
                'nomeDaFoto' => $request->nomeDaFoto,
            ]);
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

        //return response()->json(['message' => 'Livro criado com sucesso'], 201);
        return redirect('/')->with('message', 'Livro criado com sucesso');
    }

    /**
     *  @param $ISBN : Informarma o ISBN do livro
     * @return $livro : redireciona a pagina
     */
    public function delete($ISBN) {
        
        DB::table('livros')->where('ISBN', $ISBN)->delete();

        return redirect('/')->with('message', 'Livro deletado com sucesso!');
    }
}
