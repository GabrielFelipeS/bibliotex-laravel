<!DOCTYPE html>
<html lang="pt-br">
<head>
  <title>@yield('title')</title>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta http-equiv="x-ua-compatible" content="ie=edge">
  <link rel="stylesheet" type="text/css" href="/css/style.css" />
  <link rel="shortcut icon" href="images/livro_icon.png" type="image/png">
  <link href="https://fonts.googleapis.com/css?family=Montserrat:300,400,600,700&display=swap" rel="stylesheet" />
  <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.11.2/css/all.css">
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700&display=swap">
  <link rel="stylesheet" href="/mdb/css/bootstrap.min.css">
  <link rel="stylesheet" href="mdb/css/style.css">
</head>
<body>
    <header>
        <div class="header">
            <div class="logo">
                <div class="logoimg"><img src="/images/livro_icon.png" alt="icone livro"></div>
            </div>
            <div class="menu">
                <img class="menu-opener" src="images/menu.png" onclick="clickMenu()"/>
                <nav id="nav">
                    <ul>
                    <li class="active"><a href="/home">Home</a></li>
                <?php 
                
                ?> 
                
                                  
                        <li><a href="/projeto/index.php#Empresa">Empresa</a></li>
                        <li><a href="/projeto/index.php#Servicos">Serviços</a></li>
                        <li><a href="/projeto/index.php#Livros">Livros</a></li>
                        <li><a href="/projeto/index.php#autor">Autores</a></li>
                        <li><a href="/projeto/index.php#Clientes">Clientes</a></li>
                        <li><a href="/projeto/index.php#Preco">Preço</a></li>
                        <li><a href="/projeto/index.php#Detalhes">Detalhes</a></li>
                        <li><a href="/projeto/index.php#Sugestoes">Sugestoes</a></li>
                        <li><a href="/projeto/form_login.php">Login</a></li>
                        <li><a href="/usuario/cadastrarUsuario">Cadastrar</a></li>

                    </ul>
                </nav>
            </div>
        </div>
    </header>
        
    <main> 
        @yield('content')
    </main>    

    <footer>
        <div class="footer--area">
            <div class="footer--item area1">
                <div class="footer-social">
                    <a href=""><img src="/images/twitter.png" /></a>
                    <a href=""><img src="/images/linkedin.png" /></a>
                    <a href=""><img src="/images/facebook.png" /></a>
                    <a href=""><img src="/images/googleplus.png" /></a>
                    <a href=""><img src="/images/pinterest.png" /></a>
                </div>
            </div>
            <div class="footer--item area2">
                    A <span>Bibliotex</span> defende a melhoria continua, então sugestões e criticas construtivas dos nossos serviços são sempre bem-vindas, a felicidade do nossos clientes é a nossa felicidade.
                    <p>     
                        <span><a href="/projeto/inc/view/cadastrar_vendedor.php" class="no_decoration">VENHA TRABALHAR CONOSCO!!</a></span>
                    </p>
            </div>
            <div class="footer--item area3">
                <form method="POST" action="/projeto/inc/controller/ProcessamentoCadastrar_email.php">
                    <input type="email" name="email" placeholder="INSIRA UM EMAIL PARA SE CADASTRAR" required/>
                    <button class="button">Inscreva-se</button>
                </form>
            </div>
        </div>
    </footer>
</body>
</html>
 
 