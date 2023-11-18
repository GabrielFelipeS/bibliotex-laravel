<?php 
    use App\Models\Compra;
    use App\Models\Livro;
    use App\Http\Controllers\Mylib;
    use App\Http\Controllers\CompraController;
    $mylib = new Mylib;
    $compraControler = new CompraController;
    $vendas = $compraControler->findAll();
    $livroController = new LivroController;
    $livro = $livroController->find($_GET['ISBN']);

?>

@extends('layouts.mainComFooter')

@section('title', 'Exibir Compras')

@section('content')



<?= $mylib->abertura_light(['titulo' => '<strong>Lista de Vendas</strong>', 'id' => 'LivrosCadastrados']) ?>

<?php 
//INICO- trecho de confirmação de exclusão
    $mensagem = '';
    if (isset($_SESSION['mensagem'])):
        $mensagem = "<p style='display: flex; color:".$_SESSION['cor']."; justify-content: center;'><strong>".$_SESSION['mensagem'].".</strong></p>";

        unset($_SESSION['cor'], $_SESSION['mensagem']);
    ?>
      <?php if ($mensagem): ?>
          <div class="mensagem" id="mensagem">
              <?= $mensagem ?>
          </div>
      <?php endif; ?>

        <script id="script">
            // Obtém a referência ao elemento da mensagem de erro
            //const mensagem = document.getElementById("mensagem");
            // Define um intervalo de tempo em milissegundos (por exemplo, 5000ms = 5 segundos)
            let tempoExibicao = 10000; // 10 segundos
            // Função para ocultar a mensagem após o tempo definido
            function deletaMensagem() {
                var node = document.getElementById("mensagem");
                if (node.parentNode) {
                    node.parentNode.removeChild(node);
                }

                var node = document.getElementById("script");
                if (node.parentNode) {
                    node.parentNode.removeChild(node);
                }
            }
            // Configura o temporizador para chamar a função após o tempo definido
            setTimeout(deletaMensagem, tempoExibicao);
            //FIM -trecho de confirmação de exclusão
      </script>
    <?php endif; ?>


<div style="color: black;">
<h4 style="display: flex; justify-content: center; margin: 10px;"></h4>
    <table class="table table-striped">
      <thead>
        <tr>
          <th>ID do vendedor</th>
          <th>ISBN</th>
          <th>Nome do livro</th>
          <th>CPF do comprador</th>
          <th>Quantidade</th>
          <th>Valor da compra</th>
          <th>Excluir</th>
          <th>Editar</th>
        </tr>
      </thead>
      <tbody>
        <?php foreach ($vendas as $venda) { 
            $condicao = $venda['ISBNlivro'];    
            $livro = get('livros', "ISBN =  $condicao");
            $quantidade = $venda['valor']/$livro['valorLivro']; ?>
          <tr>
            <td><?php echo $venda['codVendedor']; ?></td>
            <td><?php echo $venda['ISBNlivro']; ?></td>
            <td><?php echo $livro['nomeLivro']; ?></td>
            <td><?php echo $venda['cpfComprador']; ?></td>
            <td><?php echo $quantidade; ?></td>
            <td><?php echo $venda['valor']; ?></td>
            <td>
                <a href="/projeto/inc/controller/excluirCompra.php?id=<?= $venda['id']; ?>"><button type="button" class="btn btn-primary" style="background-color: black; border-color: black; margin-right: 25px;"><img style="width: 30px;  filter: invert(1);" src="/projeto/assets/images/excluir.png" alt="excluir" ></button></a> 
            </td>
            <td>      
                <a href="/projeto/inc/view/cadastrarCompra.php?ISBN=<?= $venda['ISBNlivro'].'&id='.$venda['id'].'&titulo='.'Editando o livro'.'&mensagemBotao=Editar Compra!'.'&link='.'salvarCompra.php?id='?>"><button type="button" class="btn btn-primary" style="background-color: black; border-color: black;"><img style="width: 30px; filter: invert(1);" src="/projeto/assets/images/editar.png" alt="editar"></button></a>           
            </td>
          </tr>
        <?php } ?>
      </tbody>
    </table>
  </div>
</div>
</div>
</section>
@endsection