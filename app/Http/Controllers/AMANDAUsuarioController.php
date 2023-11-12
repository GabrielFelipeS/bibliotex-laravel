<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Usuario;

class UsuarioController extends Controller
{
    public function index() {
        $usuario = Usuario::all();
        return view('welcome');
    }

    public function create(){
        return view('usuario.cadastrarUsuario');
    }

    public function store(Request $request){
        $usuario = new Usuario;
        $usuario->nome= $request->nome;
        $usuario->nascimento =  date('Y-m-d', strtotime(str_replace('/', '-', $request->nascimento)));
        $usuario->telefone= $request->telefone;
        $usuario->email = $request->email;

        $usuario->senha= password_hash($request->senha, PASSWORD_DEFAULT);

        if($request->hasFile('fotoPerfil') && $request->file('fotoPerfil')->isValid()){
            $requestFotoPerfil = $request->fotoPerfil;
            $extension = $requestFotoPerfil->extension();
            $fotoPerfilNome = $request->nome.".".$extension;
            $request->fotoPerfil->move(public_path('images/fotoPerfil'), $fotoPerfilNome);
            $usuario->fotoPerfil = $fotoPerfilNome;
        }else
        $usuario->fotoPerfil = "Sem Foto";

        $usuario->save();

        return redirect('/')->with('msg');

    }
}
