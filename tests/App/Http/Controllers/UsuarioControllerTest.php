<?php

namespace Tests\App\Http\Controllers;
use Illuminate\Http\Request;

use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\UserController;
use App\Models\User;

use Tests\TestCase;

class UsuarioControllerTest extends TestCase
{
    public function test_store() {
        $quantidadeDeUserAntesDeInserir = User::count();

        $controller = new UserController;
        $requestData = [
            'nome' => 'Testando',
            'nascimento' => '2023-04-14',
            'telefone' => '(11) 2484-515',
            'email' => 'teste@abacate.com',
            'password' => '$2y$10$AL2JJvjD0dqPojG0B/jGGei8Rq851T0NhaMTSipXXsq8nFlYELBBa',
            'fotoPerfil' => 'fotosPerfil/Administrador.png',
        ];

        $request = new Request($requestData);
        $controller->store($request);

        $quantidadeDeUsersAgora = User::count();

        $this->assertNotEquals($quantidadeDeUserAntesDeInserir, $quantidadeDeUsersAgora);
    }

    public function test_store_ja_existe() {
        $quantidadeDeUserAntesDeInserir = User::count();

        $controller = new UserController;
        $requestData = [
            'nome' => 'Testando',
            'nascimento' => '2023-04-14',
            'telefone' => '(11) 2484-515',
            'email' => 'teste@abacate.com',
            'password' => '$2y$10$AL2JJvjD0dqPojG0B/jGGei8Rq851T0NhaMTSipXXsq8nFlYELBBa',
            'fotoPerfil' => 'fotosPerfil/Administrador.png',
        ];

        $request = new Request($requestData);
        $controller->store($request);

        $quantidadeDeUsersAgora = User::count();

        $this->assertEquals($quantidadeDeUserAntesDeInserir, $quantidadeDeUsersAgora);
    }

    public function test_find() {
        $controller = new UserController; 
        $usuario = $controller->find('teste@abacate.com');
        //$this->assertNotEmpty($usuario);
        $this->assertEquals('Testando', $usuario->nome);
    }

    public function test_findAll() {
        $quantidadeDeUser = User::count();
        $controller = new UserController;
        $Users = $controller->findAll();

        $this->assertEquals($quantidadeDeUser, $Users->count());
    }

    /*public function teste_index() {
        $response = $this->get('/');
        $usuarios = $response->original['usuarios'];

        $this->assertNotEmpty($usuarios);
    }*/

    public function test_update() {
        $controller = new UserController;
        $requestData = [
            'emailDeUpdate' => 'teste@abacate.com',
            'nome' => 'testavel',
            'nascimento' => '2023-04-14',
            'telefone' => '(11) 2484-515',
            'email' => 'abacate@teste.com',
            'password' => '$2y$10$AL2JJvjD0dqPojG0B/jGGei8Rq851T0NhaMTSipXXsq8nFlYELBBa',
            'fotoPerfil' => 'fotosPerfil/Administrador.png',
        ];

        $request = new Request($requestData);
        $controller->update($request);

        $User = $controller->find('abacate@teste.com');
        
        $this->assertEquals('testavel', $User->nome);
    }

    public function test_update_email_nao_existe() {
        $controller = new UserController;
        $requestData = [
            'emailDeUpdate' => '1234@abacate.com',
            'nome' => 'testavel',
            'nascimento' => '2023-04-14',
            'telefone' => '(11) 2484-515',
            'email' => '1234@abacate.com',
            'password' => '$2y$10$AL2JJvjD0dqPojG0B/jGGei8Rq851T0NhaMTSipXXsq8nFlYELBBa',
            'fotoPerfil' => 'fotosPerfil/Administrador.png',
        ];

        $request = new Request($requestData);
        $controller->update($request);

        $User = $controller->find('1234@abacate.com');
        
        $this->assertEmpty($User);
    }

    public function test_login() {
        $controller = new UserController;
        $requestData = [
            'email' => 'abacate@teste.com',
            'senha' => '123456',
        ];
        $request = new Request($requestData);
        $controller->login($request);

        $this->assertTrue(Auth::check());
    }

    public function test_delete() {
        $quantidadeDeUserAntesDeDeletar = User::count();
        $controller = new UserController;
        
        $controller->delete('abacate@teste.com');
        
        $quantidadeDeUserAgora = User::count();
        $this->assertNotEquals($quantidadeDeUserAntesDeDeletar, $quantidadeDeUserAgora);
    }
}
