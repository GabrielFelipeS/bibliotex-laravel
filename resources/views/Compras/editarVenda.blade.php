<?php 
    use App\Models\Compra;
    use App\Models\Livro;
    use App\Http\Controllers\Mylib;
    use App\Http\Controllers\CompraController;
    //use App\Http\Controllers\LivroController;
    $mylib = new Mylib;
    //$livroController = new LivroController;
    //$livro = $livroController->find($_GET['ISBN']);
    $compraController = new CompraController;
 

?>

@extends('layouts.mainComFooter')

@section('title', 'Editar Venda')

@section('content')
<?php
    session_start();
    
    
    $ISBN = $_GET['ISBN'] ?? '';
    $id = $_GET['id'] ?? '1';
    
    $dadosDoLivro = Livro::where('iSBN', $ISBN)->first();

    $mensagemBotao = $_GET['mensagemBotao'] ?? 'Editar venda';
    $link = empty($_GET['link'])? '?ISBN='.$ISBN : $_GET['link'].$id.'&ISBN='.$ISBN;
    
    /*
    echo '<br>' . $_GET['link'] . '<br>';
    echo '<br>' . $link . '<br>';*/

   if(isset($_GET['id'])) {
        $titulo = $dadosDoLivro->nomeLivro;
        $compra = Compra::find($id);
        //var_dump($_POST);
        $codigoVendedor = $compra->codVendedor;
        $cartao = $compra->cartao;
        $cpf = $compra->cpfComprador;
        $quantidade = $compra->valor / $dadosDoLivro->valorLivro;
    }

?>

<?= $mylib->abertura_light(['titulo' => 'Editar venda', 'id' => 'inserir Livros', 'descricao' => '']) ?>

    <section>
        <div style="display: flex; justify-content: center; align-items: start;">
            <?= $mylib->dados_do_livro($dadosDoLivro)?>
        </div>
        <div style="display: flex; justify-content: center; align-items: start;">
        <p><strong>O livro vai ser comprado por R$<?= number_format($dadosDoLivro->valorLivro, 2, ',', ' ');?></strong></p>
        </div>
        <div class="section-contact">
            <!-- ./inc/salvarAlteracoes.php?ISBN=<#?=$required['ISBN']?> -->
                
        <form method="POST" enctype="multipart/form-data" action="/editarVendaUp?id={{ $compra->id }}&?ISBN={{ $dadosDoLivro->ISBN}}">
                @csrf
                    <div class="section-contact--split">
                        <input type="text" name = "codVendedor" value=" <?= $compra->codVendedor ?>" placeholder="CODIGO DO VENDEDOR" required />
                        <input type="text" value="<?= $cpf ?>" name="cpfComprador" placeholder="CPF" required />
                    </div>
                    <div class="section-contact--split">
                        <input type="text" name="quantidade" value="<?= $quantidade ?>" placeholder="QUANTIDADE" required/>
                        <input type="text" value="<?=  $compra->cartao ?>" name="cartao" placeholder="CARTÃO" required />
                    </div>
                    <input type="submit" value="<?= $mensagemBotao?>" class="button"/>
                </form>
            </div>
    </section>
</div>
</section>


<?php unset($_SESSION['codigoVendedor'], $_SESSION['cartao'], $_SESSION['cpf'], $_SESSION['quantidade']); ?>
@endsection
