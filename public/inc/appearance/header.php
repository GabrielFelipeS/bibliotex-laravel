<?php 
    use Illuminate\Support\Facades\Auth;
?>

<header>
    <div class="header">
        <div class="logo">
            <div class="logoimg"><img src="/images/livro_icon.png" alt="icone livro"></div>
        </div>
        <div class="menu">
            <img class="menu-opener" src="images/menu.png" onclick="clickMenu()"/>
            <nav id="nav">
                <ul>
                <li class="active"><a href="/">Home</a></li>
            <?php 
            
            if(Auth::check() && Auth::user()->role === 'admin') {?> 
                <li><a href="/cadastrarExibirlivros">Editar/Excluir livros</a></li>
                <li><a href="/cadastrarvendedor">Editar/Excluir funcionarios</a></li>
                <li><a href="/exibirCompras">Vendas</a></li>

            <?php } else { ?>  
                    <li><a href="/index.php#Empresa">Empresa</a></li>
                    <li><a href="/index.php#Servicos">Serviços</a></li>
                    <li><a href="/index.php#Livros">Livros</a></li>
                    <li><a href="/index.php#autor">Autores</a></li>
                    <li><a href="/index.php#Clientes">Clientes</a></li>
                    <li><a href="/index.php#Preco">Preço</a></li>
                    <li><a href="/index.php#Detalhes">Detalhes</a></li> 
            <?php }?>

                <?php if (Auth::check()) {?>
                    <li><a href="/index.php#Sugestoes">Sugestoes</a></li>
                    <li><a href="/sair">Sair</a></li>

                <?php } else { ?> 
                    
                    <li><a href="/usuario/login">Login</a></li>
                    <li><a href="/usuario/cadastrar">Cadastrar</a></li>
                <?php }?>

                </ul>
            </nav>
        </div>
    </div>
</header>