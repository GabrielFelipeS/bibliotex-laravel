<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\Usuario;

class UsuarioController extends Controller
{
    public function index() {
        $usuarios = $this->findAll();
        return view('welcome');
    }

    public function create(){
        return view('usuario.cadastrarUsuario');
    }

    
    public function store(Request $request) {
        $usuarioExiste = Usuario::where('email', $request->email)->first();
        
        if($usuarioExiste) {
            return redirect('/')->with('msg', 'E-mail já cadastrado');
        }

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
        }else {
            $usuario->fotoPerfil = "Sem Foto";
        }
        
        $usuario->save();

        return redirect('/')->with('msg', 'Cadastro realizado');
    }

    public function login(Request $request){        
        $email = $request->input('email');
        $senha = $request->input('senha');

        $usuario = Usuario::where('email', $email)->first();

        if(!$usuario || !password_verify($senha, $usuario->senha)){
            return redirect('/')->with('msg', 'E-mail ou senha inválidos');
        }

        auth()->login($usuario);
        return redirect()->route('/')->with('msg', 'Login realizado com sucesso');
    }

    

    public function find($email) {
        $usuario = Usuario::where('email', $email)->first();
        return $usuario;
    }

    public function findAll() {
        $usuarios = Usuario::all();
        return $usuarios;
    }

    public function update(Request $request) {
        $usuarioExiste = Usuario::where('email', $request->emailDeUpdate)->first();
        if(!$usuarioExiste) {
            return redirect('/')->with('message', 'Não existe um cadastro com esse email');
        }

        DB::table('usuarios')
            ->where('email', $request->query('emailDeUpdate'))
            ->limit(1)
            ->update([
                'nome' => $request->nome,
                'nascimento' => $request->nascimento,
                'telefone' => $request->telefone,
                'email' => $request->email,
                'senha' => $request->senha,
                'fotoPerfil' => $request->fotoPerfil,
            ]);
    }

    public function delete($email) {
        DB::table('usuarios')
            ->where('email', $email)
            ->limit(1)
            ->delete();
    }
}
