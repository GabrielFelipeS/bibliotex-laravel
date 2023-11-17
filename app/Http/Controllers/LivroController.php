<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use App\Models\Livro;
use Exception;

class LivroController extends Controller
{

    function cadastrarExibirlivros() {
        return view('cadastrarExibirLivros');
    }


      /**
     *  @param ISBN : Informarma o ISBN do livro
     * @return livro : retorna o livro encontrado
     */
    public function find($ISBN) {
        $livro = Livro::where('ISBN', $ISBN)->first();
        return $livro;
    }

    /**
     * @return livros : retorna os livros cadastrados no banco de dados
     */
    public function findAll() {
        $livros = Livro::all();
        return $livros;
    }

    /**
     *  @param post $request : Informações para editar um livro
     * @return redireciona para uma página
     */
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

        return redirect('/')->with('message', 'Livro editado com sucesso');
    }


    /**
     *  @param post $request : Informações para cadastrar um livro
     * @return redireciona para uma página
     */
    public function store(Request $request) {
        $livroJaExiste = Livro::where('ISBN', $request->ISBN)->first();

        if(!$livroJaExiste) {
            $livro = new Livro;
            $livro->ISBN = $request->ISBN;
            $livro->valorLivro = $request->valorLivro;
            $livro->nomeLivro = $request->nomeLivro;
            $livro->descricao = $request->descricao;
            $livro->nomeDaFoto = $this->caminhoImagem($request->ISBN);
            
            $livro->save();
            //return response()->json(['message' => 'Livro criado com sucesso'], 201);
            return redirect('/')->with('message', 'Livro criado com sucesso');
        } else {
            return redirect('/')->with('message', 'Livro já existe');
        }
    }

    private function caminhoImagem($ISBN) {
        $caminho = "";
        if(isset($_FILES['imagem'])) {
            $ext = strtolower(substr($_FILES['imagem']['name'],-4)); //Pegando extensão do arquivo
            $new_name =  $ISBN .'.'.$ext; //Definindo um novo nome para o arquivo
            $dir = './media/'; //Diretório para uploads, coloquei em lib pra facilitar o senhor achar
            move_uploaded_file($_FILES['imagem']['tmp_name'], $dir.$new_name); //Fazer upload do arquivo 
            $caminho = 'media/'.$new_name;
        }
        return $caminho;
    }

    /**
     *  @param require : pega do corpo da requisição o ISBN
     * @return redireciona a pagina
     */
    public function delete(Request $request) {
        $ISBN = $request->ISBN;

        try {
            DB::table('livros')->where('ISBN', $ISBN)->delete();
            return redirect('/cadastrarExibirlivros')->with('msg', 'Livro deletado com sucesso!');
        } catch (Exception $e) {
            return redirect('/cadastrarExibirlivros')->with('msg', 'Este livro não pode ser deletado!');
        }
    }
}
