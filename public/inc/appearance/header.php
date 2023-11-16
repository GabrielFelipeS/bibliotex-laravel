<header>
    <div class="header">
        <div class="logo">
            <div class="logoimg"><img src="/projeto/assets/images/livro_icon.png" alt="icone livro"></div>
        </div>
        <div class="menu">
            <img class="menu-opener" src="/projeto/assets/images/menu.png" onclick="clickMenu()"/>
            <nav id="nav">
                <ul>
                <li class="active"><a href="/projeto/index.php#">Home</a></li>
            <?php 
            $mensagem = 'teste';
            
            if(validar($_SESSION['email'] ?? '')) {?> 
                <li><a href="/projeto/inc/view/cadastrarExibirlivros.php">Editar/Excluir livros</a></li>
                <li><a href="/projeto/inc/view/cadastrar_vendedor.php">Editar/Excluir funcionarios</a></li>
                <li><a href="/projeto/inc/view/exibirCompras.php">Vendas</a></li>

            <?php } else { ?>  
                    <li><a href="/projeto/index.php#Empresa">Empresa</a></li>
                    <li><a href="/projeto/index.php#Servicos">Serviços</a></li>
                    <li><a href="/projeto/index.php#Livros">Livros</a></li>
                    <li><a href="/projeto/index.php#autor">Autores</a></li>
                    <li><a href="/projeto/index.php#Clientes">Clientes</a></li>
                    <li><a href="/projeto/index.php#Preco">Preço</a></li>
                    <li><a href="/projeto/index.php#Detalhes">Detalhes</a></li>      
            <?php }?>

            <?php 
                if(isset($_SESSION['email'])) {
                    echo '<li><a href="/projeto/index.php#Sugestoes">Sugestoes</a></li>';
                    echo '<li><a href="/projeto/inc/controller/deslogar.php">Deslogar</a></li>';
                } else {
                    echo '<li><a href="/projeto/form_login.php">Login</a></li>';
                }

                
            ?>

                </ul>
            </nav>
        </div>
    </div>
