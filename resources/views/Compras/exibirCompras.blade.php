<?php 
    use App\Models\Compra;
    use App\Models\Livro;
    use App\Http\Controllers\Mylib;
    use App\Http\Controllers\CompraController;
    use App\Http\Controllers\LivroController;
    $mylib = new Mylib;
    $compra = new CompraController;
    $vendas = $compra->findAll();
    $livro = new Livro;
    //$livro = Livro::where('ISBN', $ISBN)->first();
  
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
      @foreach ($vendas as $venda) 
       <?php
            $condicao = $venda->ISBNlivro;    
            $livro =  Livro::where('ISBN', $venda->ISBNLivro)->first();
            $quantidade = $venda->valor/$livro->valorLivro;
        ?>
          <tr>
            <td>{{ $venda->codVendedor}}</td>
            <td>{{ $venda->ISBNLivro}}</td>
            <td>{{ $livro->nomeLivro}}</td>
            <td>{{ $venda->cpfComprador}}</td>
            <td>{{ $quantidade }}</td>
            <td> R$ <?= number_format($venda->valor, 2, ',', ' ');?></td>
            <td> 
                <a href="/apagarCompra/{{ $venda->id }}"><button type="button" class="btn btn-primary" style="background-color: black; border-color: black; margin-right: 25px;"><img style="width: 30px;  filter: invert(1);" src="/images/excluir.png" alt="excluir" ></button></a> 
            </td>
            <td>      
                <a href='/editarVenda?id={{ $venda->id }}&ISBN={{ $venda->ISBNLivro }}'><button type="button" class="btn btn-primary" style="background-color: black; border-color: black;"><img style="width: 30px; filter: invert(1);" src="/images/editar.png" alt="editar"></button></a>           
            </td>
          </tr>
        @endforeach
      </tbody>
    </table>
  </div>
</div>
</div>
</section>
@endsection