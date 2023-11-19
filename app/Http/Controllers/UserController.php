<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    public function index() {
        $usuarios = $this->findAll();
        return view('index');
    }

    public function create(){
        return view('usuario.cadastrarUsuario');
    }

    
    public function store(Request $request) {
        $usuarioExiste = User::where('email', $request->email)->first();
        
        if($usuarioExiste) {
            return redirect('/')->with('msg', 'E-mail já cadastrado');
        }

        $usuario = new User;
        $usuario->nome= $request->nome;
        $usuario->nascimento =  date('Y-m-d', strtotime(str_replace('/', '-', $request->nascimento)));
        $usuario->telefone= $request->telefone;
        $usuario->email = trim($request->email);

        $usuario->password = Hash::make($request->password);

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

        return redirect('/login')->with('msg', 'Cadastro realizado');
    }

    public function login(Request $request){        
        $email = trim($request->input('email'));
        $password = $request->input('password');

        if (Auth::attempt(['email' => $email, 'password' => $password])) {
            return redirect('/')->with('msg', 'Login realizado com sucesso');
        } else {
            return redirect('/login')->with('msg', 'E-mail ou senha inválidos');
        }
    }

    public function sair() {
        Auth::logout();
        return redirect('/')->with('msg', 'Deslogado com sucesso');('/');
    }

    

    public function find($email) {
        $usuario = User::where('email', $email)->first();
        return $usuario;
    }

    public function findAll() {
        $usuarios = User::all();
        return $usuarios;
    }

    public function update(Request $request) {
        $usuarioExiste = User::where('email', $request->emailDeUpdate)->first();
        if(!$usuarioExiste) {
            return redirect('/')->with('message', 'Não existe um cadastro com esse email');
        }

        DB::table('users')
            ->where('email', $request->query('emailDeUpdate'))
            ->limit(1)
            ->update([
                'nome' => $request->nome,
                'nascimento' => $request->nascimento,
                'telefone' => $request->telefone,
                'email' => $request->email,
                'password' => Hash::make($request->password),
                'fotoPerfil' => $request->fotoPerfil,
            ]);
    }

    public function delete($email) {
        DB::table('users')
            ->where('email', $email)
            ->limit(1)
            ->delete();
    }
}
