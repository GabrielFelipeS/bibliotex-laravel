@extends('layouts.mainComFooter')

@section('title', 'Blibiotex')

@section('content')
<?php
    use App\Http\Controllers\Mylib;
    $mylib = new Mylib;
?>
    
    <?= @$mylib->abertura_dark(['titulo' => 'Gostaria de editar um livro?', 'id' => 'inserirLivros']) ?>
    <div class="section-contact">
        <form method="POST" enctype="multipart/form-data" action="/projeto/inc/controller/salvarAlteracoes.php?ISBN=<?=$_GET['ISBN']?>">
            <div class="section-contact--split">
                <input type="text" value="<?= $mylib->setValue('ISBN') ?>" name="ISBN" placeholder="ISBN" required style="color: white;"/>
                <input type="text" value="<?= $mylib->setValue('valorLivro') ?>" name="VALOR" placeholder="VALOR"  required style="color: white;"/>
            </div>
            <input type="text" value="<?= $mylib->setValue('nomeLivro') ?>" name="NOME" placeholder="NOME" required style="color: white;"/>
            <textarea name="DESCRICAO" placeholder="DESCRIÇÃO" required style="color: white;"><?= $mylib->setValue('descricao') ?></textarea>
            <div class="custom-file">
                    <input type="file" accept="media/*" class="custom-file-input" id="imagem" name="imagem"  >                        
                    <label class="custom-file-label" for="imagem">Escolher arquivo</label>
            </div>
            <input type="submit" value="Editar" class="button"/>
        </form>
    </div>
</div>
</section>
@endsection