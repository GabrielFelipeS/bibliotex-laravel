<?php 
    use App\Models\Compra;
    use App\Models\Livro;
    use App\Http\Controllers\Mylib;
    //use App\Http\Controllers\LivroController;
    $mylib = new Mylib;
    //$livroController = new LivroController;
    //$livro = $livroController->find($_GET['ISBN']);
    

?>

@extends('layouts.mainComFooter')

@section('title', 'Comprar livro')

@section('content')
<?php
    session_start();
    

    //var_dump($_SESSION);
    //var_dump($_POST);
/*
    $partes = explode("-",$required['ISBN']);
    $ISBN = $partes[0];
    $id = empty($partes[1])? '': $partes[1];

    $titulo = empty($partes[2])? 'Comprando o livro!': $partes[2];

    $link = empty($partes[3])? 'ProcessamentoCadastrarCompra.php?ISBN='.$ISBN : "../controller/".$partes[3].$id.'&ISBN='.$ISBN;

    $dadosDoLivro = get('livros', "ISBN = $ISBN");
    
    
    if($id != '') {
        $_POST = get('compras', "id = $id");
        $quantidade = $_POST['valor']/$dadosDoLivro['valorLivro'];
    } else {
        $quantidade = '';
    }
    
    var_dump($_SESSION);
    var_dump($_POST);
    var_dump($required);
    */
    
    $ISBN = $_GET['ISBN'] ?? '';
    $id = $_GET['id'] ?? '1';
    $dadosDoLivro = Livro::where('ISBN', $ISBN)->first();

    $mensagemBotao = $_GET['mensagemBotao'] ?? 'Efetuar Compra!';
    $link = empty($_GET['link'])? '?ISBN='.$ISBN : $_GET['link'].$id.'&ISBN='.$ISBN;
    
    /*
    echo '<br>' . $_GET['link'] . '<br>';
    echo '<br>' . $link . '<br>';*/

   if(isset($_GET['id'])) {
        $titulo = $dadosDoLivro->nomeLivro;
        $compra = Compra::find($id);
        var_dump($_POST);
        $codigoVendedor = $compra->codVendedor;
        $cartao = $compra->cartao;
        $cpf = $compra->cpfComprador;
        $quantidade = $compra->valor / $dadosDoLivro->valorLivro;
    }

?>

<?= $mylib->abertura_light(['titulo' => 'Comprando livro', 'id' => 'inserir Livros', 'descricao' => 'inserirLivros']) ?>

    <section>
        <div style="display: flex; justify-content: center; align-items: start;">
            <?= $mylib->dados_do_livro($dadosDoLivro)?>
        </div>
        <div style="display: flex; justify-content: center; align-items: start;">
        <p><strong>O livro vai ser comprado por R$<?= number_format($dadosDoLivro->valorLivro, 2, ',', ' ');?></strong></p>
        </div>
        <div class="section-contact">
            <!-- ./inc/salvarAlteracoes.php?ISBN=<#?=$required['ISBN']?> -->
                <form method="POST" enctype="multipart/form-data" action="/comprarLivro<?=$link?>">
                @csrf
                    <div class="section-contact--split">
                        <input type="text" name = "codVendedor" value="" placeholder="CODIGO DO VENDEDOR" required />
                        <input type="text" value="" name="cpfComprador" placeholder="CPF" required />
                    </div>
                    <div class="section-contact--split">
                        <input type="text" name="quantidade" value="" placeholder="QUANTIDADE" required/>
                        <input type="text" value="" name="cartao" placeholder="CARTÃO" required />
                    </div>
                    <input type="submit" value="<?= $mensagemBotao?>" class="button"/>
                </form>
            </div>
    </section>
</div>
</section>


<?php unset($_SESSION['codigoVendedor'], $_SESSION['cartao'], $_SESSION['cpf'], $_SESSION['quantidade']); ?>
@endsection
