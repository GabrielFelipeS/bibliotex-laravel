
@extends('layouts.mainComFooter')
@section('title', 'Login Bibliotex')
@section('content')
<style>
    html,
    body {
      overflow: hidden;
      height: 100%;
      background-color: black;      
    }
    .container {
      display: flex;
      justify-content: center;
      align-items: flex-end;
      height: 70vh;
    }
    .login-form {
      padding: 40px;
      border-radius: 20px;
      box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
      max-width: 600px;
      width: 100%;
      box-sizing: border-box;
      border: 2px solid black;
      border: fixed;
    }
    input {
      background-color: white;
    }
    #email,
    #senha {
      border: 2px solid black;
      border-radius: 10px;
      padding: 10px;
      width: 100%;
      margin-bottom: 20px;
    }
    
  .form-group {
    margin-bottom: 20px;
  }
  .button {
    padding: 15px 150px;
    border: none;
    margin-left: 5.5rem;
  }
  .rounded-input {
    width: 100%;
    padding: 15px 60px;
    border: none;
    border-radius: 10px;
    margin: 0;
  }
</style>
  @if(session('msg'))
    <p class="msg">{{ session('msg') }}</p>
  @endif

<div class="container">
      <div class="login-form">
      <form method="POST" action="/login">
        @csrf
          <h2 style="color:#fff; text-align: center;">LOGIN</h2>
          <div class="form-group" style="margin-top: 20px;"> 
          <input type="email" id="email" name="email" placeholder="Email" required class="rounded-input">
          </div>
          <div class="form-group">
          <input type="password" id="senha" name="senha" placeholder="Senha" required class="rounded-input">
          </div>
          <input type="submit" value="Login" class="button" />
        </form>
        <div class="section-fact"><p>Ainda não possui cadastro? <a href="/usuario/cadastrarUsuario">Cadastre-se</a>.</p></div>
      </div>
    </div>
  
@endsection
