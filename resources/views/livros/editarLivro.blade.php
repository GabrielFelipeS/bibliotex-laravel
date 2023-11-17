@extends('layouts.mainComFooter')

@section('title', 'Blibiotex')

@section('content')
<?php

use App\Http\Controllers\LivroController;
use App\Http\Controllers\mylib;

$livroController = new LivroController;
$mylib = new mylib;
$livro = $livroController->find($_GET['ISBN']);


?>
<style>
    .section-contact {
        margin-bottom: 145px;
    }
</style>

<?= @$mylib->abertura_dark(['titulo' => 'Gostaria de editar um livro?', 'id' => 'inserirLivros']) ?>
<div class="section-contact">
    <form method="POST" enctype="multipart/form-data" action="/updateLivro?ISBN=<?= $_GET['ISBN'] ?>">
        @csrf
        <div class="section-contact--split">
            <input type="text" value="<?= $livro->ISBN ?>" name="ISBN" placeholder="ISBN"  style="color: white;" required readonly/>
            <input type="text" value="<?=  $livro->valorLivro ?>" name="valorLivro" placeholder="VALOR"   style="color: white;" required/>
        </div>
        <input type="text" value="<?=  $livro->nomeLivro ?>" name="nomeLivro" placeholder="NOME" required style="color: white;" />
        <textarea name="descricao" placeholder="DESCRIÇÃO" style="color: white;" required ><?= $livro->descricao ?></textarea>
        <div class="custom-file">
            <input type="file" accept="media/*" class="custom-file-input" id="imagem" name="imagem">
            <label class="custom-file-label" for="imagem">Escolher arquivo</label>
        </div>
        <input type="submit" value="Editar" class="button" />
    </form>
</div>
</div>
</section>
@endsection