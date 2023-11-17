@extends('layouts.mainComFooter')

@section('title', 'Blibiotex')

@section('content')
<?php 
    use App\Http\Controllers\Mylib;
    $mylib = new Mylib;
?>

<?= $mylib->abertura_light(['titulo' => 'Livros já cadastrados', 'id' => 'LivrosCadastrados']) ?>
    <div class="section-livros">
        <div class="section-livros--photos">
            <?= @$mylib->carregarLivrosParaEditar()?>
        </div>
    </div>
</div>
</section>

<?= $mylib->abertura_dark(['titulo' => 'Gostaria de inserir um livro?', 'id' => 'inserirLivros']) ?>
    <div class="section-contact">
        <form method="POST" enctype="multipart/form-data" action="/CadastrarLivro">
            @csrf
            <div class="section-contact--split">
                <input type="text" name="ISBN" placeholder="ISBN" required style="color: white;"/>
                <input type="text" name="valorLivro" placeholder="VALOR" required style="color: white;"/>
            </div>
            <input type="text" name="nomeLivro" placeholder="NOME" required style="color: white;"/>
            <textarea name="descricao" placeholder="DESCRIÇÃO" required style="color: white;"></textarea>
            <div class="custom-file">
                        <input type="file" accept="media/*" class="custom-file-input" id="imagem" name="imagem" required>                        
                        <label class="custom-file-label" for="comprovonte">Escolher arquivo</label>
            </div>
            <input type="submit" value="Enviar livro" class="button"/>
        </form>
    </div>
</div>
</section>
@endsection