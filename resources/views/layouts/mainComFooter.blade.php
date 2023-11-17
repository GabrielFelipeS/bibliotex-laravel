<?php include './inc/appearance/cabecalho.php'; ?>
    <title>@yield('title')</title>
 <?php include './inc/appearance/header.php';?>
<body>    
    <main> 
        @if(session('msg'))
            <p class="msg" id="mensagem">{{ session('msg') }}</p>
            <script id="script" src="./js/deletarMensagem.js"></script>
        @endif
        
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
                <form method="post" action="/sugestoes/CadastrarEmail">
                    @csrf
                    <input type="email" name="email" placeholder="INSIRA UM EMAIL PARA SE CADASTRAR" required/>
                    <button class="button">Inscreva-se</button>
                </form>
            </div>
        </div>
    </footer>
</body>
</html>
 
 