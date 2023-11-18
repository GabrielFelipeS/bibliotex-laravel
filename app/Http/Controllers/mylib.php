<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Livro;
use App\Models\Vendedor;
use Illuminate\Support\Facades\Auth;

class mylib extends Controller {

    /**
     * @param request | sugestão para ser cadastrada
     */
    function cadastrarSugestao(Request $request) {
        $new_name = '';
        if(isset($_FILES['imagem'])) {
            echo '<br>teste 3';
            $ext = strtolower(substr($_FILES['imagem']['name'],-4)); //Pegando extensão do arquivo
            $new_name = date("Y.m.d-H.i.s") . $ext; //Definindo um novo nome para o arquivo
            $dir = './assets/imagens/'; //Diretório para uploads, coloquei em lib pra facilitar o senhor achar
            move_uploaded_file($_FILES['imagem']['tmp_name'], $dir.$new_name); //Fazer upload do arquivo     
        }
       
        $myfile = fopen('./inc/sugestoes', "a") or die("Você não tem permissão para gravar neste diretório!");

        $this->wline($myfile, $_POST['name']);
        $this->wline($myfile, $_POST['email']);
        $this->wline($myfile, $_POST['assunto']);
        $this->wline($myfile, $_POST['message']);
        $this->wline($myfile, $new_name);

        return redirect('/#Sugestoes')->with('mensagemSugestao', 'Sugestão enviada!');;
    }


    /**
     * @param request | email para cadastrar no arquivo emails do /public/inc
     */
    function cadastrarEmail(Request $request) {
        $email = $request->email; 
    
        $email_post = fopen('./inc/arquivo_temp', "w") or die("Você não tem permissão para gravar neste diretório!");
        $this->wline($email_post, $email);
        fclose($email_post);
    
        $email_post = fopen('./inc/arquivo_temp', "r") or die("Você não tem permissão para gravar neste diretório!");
        $post = fgets($email_post);
        fclose($email_post);
    
        $myfile = fopen('./inc/emails', "r") or die("Você não tem permissão para gravar neste diretório!");
    
        while(!feof($myfile)){      
            $email_arquivo = fgets($myfile);
    
            if (strcasecmp($email_arquivo, $post) == 0){  //Verifica se já não existe
                fclose($myfile);
                fclose($email_post);
                return redirect('/');
            }
        }
        fclose($myfile);
    
        $myfile = fopen('./inc/emails', "a") or die("Você não tem permissão para gravar neste diretório!");
        $this->wline($myfile, $email);
        fclose($myfile);
        return redirect('/');
    }

    /**
     * @param key | char de busca
     * @return 
     */
    function setValue($key){ 
        return request($key) ?? '';
       // return isset(request($key)) ? request($key) : '';
    }

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
        $desc = $data['descricao'] ?? '';
        $html = '<section class="default light " id="'.$data['id'].'">
        <div class="section-title">'.$data['titulo'].'</div>
        <div class="section-desc">'. $desc .'</div>
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
        $desc = $data['descricao'] ?? '';
        $html = '
        <section class="default dark " id="'.$data['id'].'">
        <div class="section-title">'.$data['titulo'].'</div>
        <div class="section-desc">'. $desc .'</div>
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

    public function section_livros($data) {
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
        
        $livros = Livro::all();
        
        foreach($livros as $livro) {               
            $html .= $this->section_livros($this->carregarInformacoesDoLivro($livro));
        }        
        echo $html;
    }

    /**
     * Carrega todos os livros do banco de dados, mostrando suas informações
     * @return string | codigo HTML
     */
    function carregarInformacoesDoLivro($livro) {
        $livro['nome_da_foto'] = '/'.$livro['nomeDaFoto'];

        return ['titulo' => $livro['nomeLivro'], 'paragrafo' => $livro['descricao'], 'imagem' => $livro['nome_da_foto'], 'botao' => '<a href="/comprarLivro?ISBN='.$livro['ISBN'].'"><button type="button" class="btn btn-primary">Comprar</button></a>'];
    }

    /**
     * Carrega todos os livros do banco de dados, mostrando opçoes para deletar e excluir
     * @return string | codigo HTML
     */
    function carregarLivrosParaEditar() {
        $html = "";
    
        $livros = Livro::all();

        $callback = '';
        if(Auth::check() && Auth::user()->role === 'admin') {
            $callback = 'opcoesEditarExcluir';
        } else {
            $callback = 'carregarInformacoesDoLivro';
        }

        foreach($livros as $livro) {               
            $html .= $this->section_livros($this->$callback($livro));
        }

        echo $html;    
    }

    function opcoesEditarExcluir($livro) {
        return ['titulo' => $livro['nomeLivro'], 'paragrafo' => '
        <a href="/excluirLivro?ISBN='.$livro['ISBN'].'"><button type="button" class="btn btn-primary" style="background-color: black; border-color: black; margin-right: 25px;"><img style="width: 30px;  filter: invert(1);"" src="/assets/images/excluir.png" alt="excluir" ></button></a>  
        <a href="/editarLivro?ISBN='.$livro['ISBN'].'"><button type="button" class="btn btn-primary" style="background-color: black; border-color: black;"><img style="width: 30px; filter: invert(1);" src="/assets/images/editar.png" alt="editar"></button></a>', 'imagem' => $livro['nomeDaFoto']];
    }



    function carregarfunc() {
        $html = "";
        $vendedores = Vendedor::All();

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

        $html .= @$this->section_livros(['titulo' => $dadosDoLivro['nomeLivro'], 'paragrafo' => $dadosDoLivro['descricao'], 'imagem' => $dadosDoLivro['nomeDaFoto'],'botao' => '<a href="comprarLivro?ISBN='.$dadosDoLivro['ISBN'].'"><button type="button" class="btn btn-primary">Comprar</button></a>', 'botao' => '']);

        return $html;
    }

    function mostrarMensagemDeAviso() {
        if (isset($_SESSION['mensagem'])) {
            include '../inc/view/mostrarMensagem.php';   
        }
    }


}