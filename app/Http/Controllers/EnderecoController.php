<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use App\Models\Endereco;
use App\Models\Vendedor;

class EnderecoController extends Controller
{
    public function store(Request $request) {
        $donoNaoExiste = Vendedor::where('cpf', $request->cpfDono)->first();

        if(!$donoNaoExiste){
            return redirect('/')->with('message', 'O cpf do dono não esta registrado');
        }
        
        $endereco = new Endereco;
        $endereco->cpfDono = $request->cpfDono;
        $endereco->bairro = $request->bairro;
        $endereco->endereco = $request->endereco;
        $endereco->cidade = $request->cidade;
        $endereco->estado = $request->estado;
        $endereco->cep = $request->cep;
        $endereco->complemento = $request->complemento;
        
        $endereco->save();
       
        return redirect('/')->with('message', 'Endereco registrado com sucesso');
    }

    public function find($cpf) {
        $endereco = Endereco::where('cpfDono', $cpf)->first();
        return $endereco;
    }

    public function findAll() {
        $enderecos = Endereco::all();
        return $enderecos;
    }

    public function update(Request $request) {

        DB::table('enderecos')
            ->where('cpfDono', $request->query('cpf'))
            ->limit(1)
            ->update([
                'cpfDono' => $request->cpfDono,
                'bairro' => $request->bairro,
                'endereco' => $request->endereco,
                'cidade' => $request->cidade,
                'estado' => $request->estado,
                'cep' => $request->cep,
                'complemento' => $request->complemento,
            ]);


        return redirect('/')->with('message', 'Livro editado com sucesso');
    }

    public function delete($cpf) {
        DB::table('enderecos')
            ->where('cpfDono', $cpf)
            ->limit(1)
            ->delete();
    }
}
