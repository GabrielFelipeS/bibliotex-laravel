<?php

namespace Tests\App\Http\Controllers;
use Illuminate\Http\Request;

use App\Http\Controllers\UsuarioController;
use App\Models\Usuario;

use Tests\TestCase;

class UsuarioControllerTest extends TestCase
{
    public function test_store() {
        $quantidadeDeUsuarioAntesDeInserir = Usuario::count();

        $controller = new UsuarioController;
        $requestData = [
            'nome' => 'Testando',
            'nascimento' => '2023-04-14',
            'telefone' => '(11) 2484-515',
            'email' => 'teste@abacate.com',
            'senha' => '$2y$10$AL2JJvjD0dqPojG0B/jGGei8Rq851T0NhaMTSipXXsq8nFlYELBBa',
            'fotoPerfil' => 'fotosPerfil/Administrador.png',
        ];

        $request = new Request($requestData);
        $controller->store($request);

        $quantidadeDeUsuariosAgora = Usuario::count();

        $this->assertNotEquals($quantidadeDeUsuarioAntesDeInserir, $quantidadeDeUsuariosAgora);
    }

    public function test_store_ja_existe() {
        $quantidadeDeUsuarioAntesDeInserir = Usuario::count();

        $controller = new UsuarioController;
        $requestData = [
            'nome' => 'Testando',
            'nascimento' => '2023-04-14',
            'telefone' => '(11) 2484-515',
            'email' => 'teste@abacate.com',
            'senha' => '$2y$10$AL2JJvjD0dqPojG0B/jGGei8Rq851T0NhaMTSipXXsq8nFlYELBBa',
            'fotoPerfil' => 'fotosPerfil/Administrador.png',
        ];

        $request = new Request($requestData);
        $controller->store($request);

        $quantidadeDeUsuariosAgora = Usuario::count();

        $this->assertEquals($quantidadeDeUsuarioAntesDeInserir, $quantidadeDeUsuariosAgora);
    }

    public function test_find() {
        $controller = new UsuarioController; 
        $usuario = $controller->find('teste@abacate.com');
        //$this->assertNotEmpty($usuario);
        $this->assertEquals('Testando', $usuario->nome);
    }

    public function test_findAll() {
        $quantidadeDeUsuario = Usuario::count();
        $controller = new UsuarioController;
        $Usuarios = $controller->findAll();

        $this->assertEquals($quantidadeDeUsuario, $Usuarios->count());
    }

    /*public function teste_index() {
        $response = $this->get('/');
        $usuarios = $response->original['usuarios'];

        $this->assertNotEmpty($usuarios);
    }*/

    public function test_update() {
        $controller = new UsuarioController;
        $requestData = [
            'emailDeUpdate' => 'teste@abacate.com',
            'nome' => 'testavel',
            'nascimento' => '2023-04-14',
            'telefone' => '(11) 2484-515',
            'email' => 'abacate@teste.com',
            'senha' => '$2y$10$AL2JJvjD0dqPojG0B/jGGei8Rq851T0NhaMTSipXXsq8nFlYELBBa',
            'fotoPerfil' => 'fotosPerfil/Administrador.png',
        ];

        $request = new Request($requestData);
        $controller->update($request);

        $Usuario = $controller->find('abacate@teste.com');
        
        $this->assertEquals('testavel', $Usuario->nome);
    }

    public function test_update_email_nao_existe() {
        $controller = new UsuarioController;
        $requestData = [
            'emailDeUpdate' => '1234@abacate.com',
            'nome' => 'testavel',
            'nascimento' => '2023-04-14',
            'telefone' => '(11) 2484-515',
            'email' => '1234@abacate.com',
            'senha' => '$2y$10$AL2JJvjD0dqPojG0B/jGGei8Rq851T0NhaMTSipXXsq8nFlYELBBa',
            'fotoPerfil' => 'fotosPerfil/Administrador.png',
        ];

        $request = new Request($requestData);
        $controller->update($request);

        $Usuario = $controller->find('1234@abacate.com');
        
        $this->assertEmpty($Usuario);
    }

    public function test_delete() {
        $quantidadeDeUsuarioAntesDeDeletar = Usuario::count();
        $controller = new UsuarioController;
        
        $controller->delete('abacate@teste.com');
        
        $quantidadeDeUsuarioAgora = Usuario::count();
        $this->assertNotEquals($quantidadeDeUsuarioAntesDeDeletar, $quantidadeDeUsuarioAgora);
    }
}
