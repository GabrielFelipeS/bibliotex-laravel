<?php
#include '../DAO/LivroDAO.php';
#include '../DAO/VendedorDAO.php';
/**
* cria um slide
*
* @param array associativo | dados do slide_area(['titulo' => '', 'titulo_colorido' => '', 'subtitulo' => '', 'botao' => ''])
* @return string | cogido HTML
*
*/

function slide_area($data){
    $html = '<div class="slide "><div class="slidearea sem_fundo"><h1>'.$data['titulo'].'<br/><span>'.$data['titulo_colorido'].'</span></h1><h2>'.$data['subtitulo'].'</h2><a href="" class="button">'.$data['botao'].'!</a></div>
                <div class="sliders-pointers ">
                  <div class="pointer '. $data['button1'].'"></div>
                  <div class="pointer '. $data['button2'].'"></div>
                </div>
    </div>';
    return $html;
}


/**
 * Cria a abertura de um bloco ligth
 * 
 * @param array associativo | dados do abertura_light(['titulo' => 'Serviços', 'descricao' => 'SERVIÇOS QUE PRESTAMOS', 'id' => ' '])
 * @return string | cogido HTML
 * 
 */

function abertura_light($data) {
    $html = '<section class="default light " id="'.$data['id'].'">
    <div class="section-title">'.$data['titulo'].'</div>
    <div class="section-desc">'.$data['descricao'].'</div>
    <div class="section-body">';
    return $html;
}

/**
 * Cria a abertura de um bloco dark
 * 
 * @param array associativo | dados do abertura_dark(['titulo' => 'Serviços', 'descricao' => 'SERVIÇOS QUE PRESTAMOS', 'id' => ' '])
 * @return string | cogido HTML
 * 
 */

function abertura_dark($data) {
    $html = '
    <section class="default dark " id="'.$data['id'].'">
    <div class="section-title">'.$data['titulo'].'</div>
    <div class="section-desc">'.$data['descricao'].'</div>
    <div class="section-body ">';
    return $html;
}

/**
 * Cria a abertura de um bloco section_service
 * 
 * @param array associativo | dados do section_service(['imagem' => 'assets/images/balao.png', 'titulo' => 'Suporte rápido e gratuito', 'paragrafo' => 'Até os Deuses ficam com inveja'])
 * @return string | cogido HTML
 * 
 */

function section_service($data) {
    $html = ' 
    <div class="section-service">
        <img src="'.$data['imagem'].'"/>
        <h4>'.$data['titulo'].'</h4>
        <p>'.$data['paragrafo'].'</p>
    </div>';

    return $html;
}


/**
 * Cria um bloco de estrutura para mostrar um livro
 * 
 * @param array associativo | section_livros(['titulo' => ' ', 'paragrafo'=> ' ', 'imagem' => ' '])
 * @return string | cogido HTML
 */

function section_livros($data) {
    $botao = key_exists('botao', $data)? $data['botao']: '<button type="button" class="btn 
    btn-primary">Comprar</button>';
    $estilo = key_exists('estilo', $data)? $data['estilo']: '';
    $html = '
    <div class="section-livros--photo">
                      <div class="section-livros--photoarea">
                          <div class="section-livros--photoinfo">
                              <div class="card text-center ">
                                  <div class="bg-image hover-overlay ripple" data-mdb-ripple-color="light">
                                      <img src="'.$data['imagem'].'" style="'.$estilo.'" class="img-fluid" />
                                      <a href="#!">
                                          <div class="mask"></div>
                                      </a>
                                  </div>
                                  <div class="card-header">'.$data['titulo'].'</div>
                                  <div class="card-body">
                                      <p class="card-text">'.$data['paragrafo'].'</p>
                                      '.$data['botao'].'
                                  </div>
                              </div>
                          </div>
                          <img src="'.$data['imagem'].'" />
                      </div>
                  </div>';

    return $html;
}


/**
 * Cria um bloco de estrutura para mostrar um livro
 * 
 * @param array associativo | slider_autor(['nome' => '' , 'role' => '' , 'imagem' => '']); ?>
 * @return string | cogido HTML
 */
function slider_team($data) {
    $html = '  
    <div class="slide">                                
        <div class="slidearea slider_time">
            <img class="section-team--avatar" src="'.$data['imagem'].'" />
            <div class="section-team--name">'.$data['nome'].'</div>
            <div class="section-team--role">'.$data['role'].'</div>
            <div class="section-team--social">
                <a href=""><img src="assets/images/facebook.png" /></a>
                <a href=""><img src="assets/images/googleplus.png" /></a>
                <a href=""><img src="assets/images/linkedin.png" /></a>
                <a href=""><img src="assets/images/pinterest.png" /></a>
                <a href=""><img src="assets/images/twitter.png" /></a>
            </div>
        </div>
    </div>';


    return $html;
}

/**
 * @param array associativo | price_item(['nome' => '', 'preco' => '', 'periodo' => '','point1' => '', 'point2' => '', 'point3' => '', 'point4' => '']
 * @return string | codigo HTML
 */

function price_item($data) {
    $html = '<div class="section-price--item">
        <div class="section-price--item-name">'.$data['nome'].'</div>
            <div class="section-price--item-money">'.$data['preco'].'</div>
            <div class="section-price--item-period">/'.$data['periodo'].'</div>
            <div class="section-price--item-point">'.$data['item'].'<br />'.$data['desc'].'</div>
        <a href="" class="button button--dark">ASSINE esse plano</a>
    </div>';

    return $html;
}

/**
 * Escreve uma linha em um arquivo
 * @param $file | Nome do arquivo
 * @param $txt |  Texto a ser escrito
*/

function wline($file, $txt){
    fwrite($file, "$txt\r\n");
}

/**
 * Lê uma linha em um arquivo
 * @param $filename | Nome do arquivo
 * @return string | codigo HTML
 */
function rfile($filename){
    $myfile = fopen($filename, "r") or die("Você não tem permissão para gravar neste diretório!");
    $slide = [];
    
    while(!feof($myfile)){
        $nome = fgets($myfile);
        if ($nome == ''){
            break;
        }
        $email = fgets($myfile);
        $assunto = fgets($myfile);
        $sugestao = fgets($myfile);
        $imagem = fgets($myfile);

        $slide[] = '<div class="slide">
                    <div class="slidearea">
                        <img class="section-testimonials--avatar" src="./lib/imagens/'.$imagem.'" />
                        <div class="section-testimonials--name">'.$nome.'</div>
                        <div class="section-testimonials--role">'.$assunto.'</div>
                        <img class="section-testimonials--quoteimg" src="assets/images/quote.png" />
                        <div class="section-testimonials--quote">'.$sugestao.'</div>
                    </div>
                </div>';
    }
    fclose($myfile);
    return $slide;
}

/**
 * Carrega todos os livros do banco de dados
 * @return string | codigo HTML
 */
function carregarLivros() {
    $html = "";
    GLOBAL $conn;
    $livroDAO = new LivroDAO($conn);
    $livros = $livroDAO->getAll();
    
    foreach($livros as $livro) {               
        $html .= section_livros(carregarInformacoesDoLivro($livro));
    }        
    echo $html;
}


/**
 * Carrega todos os livros do banco de dados, mostrando suas informações
 * @return string | codigo HTML
 */

function carregarInformacoesDoLivro($livro) {
    $livro['nome_da_foto'] = '/projeto//'.$livro['nome_da_foto'];
    return ['titulo' => $livro['nomeLivro'], 'paragrafo' => $livro['descricao'], 'imagem' => $livro['nome_da_foto'], 'botao' => '<a href="/projeto/inc/view/cadastrarCompra.php?ISBN='.$livro['ISBN'].'"><button type="button" class="btn btn-primary">Comprar</button></a>'];
}

/**
 * Carrega todos os livros do banco de dados, mostrando opçoes para deletar e excluir
 * @return string | codigo HTML
 */

function carregarLivrosParaEditar() {
    $html = "";
    GLOBAL $conn;
    $livroDAO = new LivroDAO($conn);
    $livros = $livroDAO->getAll();
    #$livros = getAll("livros");
    #var_dump($livros);
    $callback = '';
    if(validar($_SESSION['email'])) {
        $callback = 'opcoesEditarExcluir';
    } else {
        $callback = 'carregarInformacoesDoLivro';
    }

    foreach($livros as $livro) {               
        $html .= section_livros($callback($livro));
    }

    echo $html;    
}

function opcoesEditarExcluir($livro) {
    return ['titulo' => $livro['nomeLivro'], 'paragrafo' => '
    <a href="/projeto/inc/controller/excluirLivro.php?ISBN='.$livro['ISBN'].'"><button type="button" class="btn btn-primary" style="background-color: black; border-color: black; margin-right: 25px;"><img style="width: 30px;  filter: invert(1);"" src="/projeto/assets/images/excluir.png" alt="excluir" ></button></a>  
    <a href="/projeto/inc/view/editarLivro.php?ISBN='.$livro['ISBN'].'"><button type="button" class="btn btn-primary" style="background-color: black; border-color: black;"><img style="width: 30px; filter: invert(1);" src="/projeto/assets/images/editar.png" alt="editar"></button></a>', 'imagem' => '/projeto//'.$livro['nome_da_foto']];
}



function carregarfunc() {
    $html = "";
    GLOBAL $conn;
    $vendedorDAO = new VendedorDAO($conn);
    $vendedores = $vendedorDAO->getAll();
    #$vendedores = getAll("vendedor");
    foreach($vendedores as $vendedor) {               
        $html .= "<div class='space'> Codigo do vendedor: ".$vendedor['codigo_vendedor']."</br>".
                "Nome: ".$vendedor['nomeCompleto']."</br>".
                "CPF: ".$vendedor['cpf']."</br>".
                 "Data de nascimento: ".$vendedor['data_de_nascimento']."</br>".
                 "Nacionalidade: ".$vendedor['nacionalidade'].

                 '</br><a href="../controller/excluirVendedor.php?cod='.$vendedor['codigo_vendedor'].'"><button type="button" class="btn btn-primary" style="background-color: black; border-color: black; margin-top: 20px;"><img style="width: 30px; filter: invert(1);"" src="/projeto/assets/images/excluir.png" alt="excluir" ></button></a>  

                 <a href="../view/editarVendedor.php?cod='.$vendedor['codigo_vendedor'].'"><button type="button" class="btn btn-primary" style="background-color: black; border-color: black; margin-top: 20px;"><img style="width: 30px; filter: invert(1);" src="/projeto/assets/images/editar.png" alt="editar"></button></a>'."</div>";
    }
    echo $html;
}

function dados_do_livro($dadosDoLivro) {
    $html = '';

    $html .= @section_livros(['titulo' => $dadosDoLivro['nomeLivro'], 'paragrafo' => $dadosDoLivro['descricao'], 'imagem' => '/projeto/'.$dadosDoLivro['nome_da_foto'],'botao' => '<a href="comprarLivro.php?ISBN='.$dadosDoLivro['ISBN'].'"><button type="button" class="btn btn-primary">Comprar</button></a>', 'botao' => '']);

    #$html = "<img style=' width:200px; height:280px;' src= ./".$dadosDoLivro['nome_da_foto']." alt='Capa do livro> '";
    #$html .= '<div "><p><strong> '.$dadosDoLivro['nomeLivro'].'</strong></p></br>';
    #$html .= '';
    


    return $html;
}

function validar($email) {
    if(empty($email)) {
        return false;
    }

    $admin = "admin@admin.com";
    return (strcmp($email, $admin) == 0);
}

function mostrarMensagemDeAviso() {
    if (isset($_SESSION['mensagem'])) {
        include '../inc/view/mostrarMensagem.php';   
    }
}