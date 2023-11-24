@extends('layouts.mainComFooter')
@section('title', 'Blibiotex')
@section('content')
    <?php 
        use App\Http\Controllers\VendedorController;
        use App\Http\Controllers\EnderecoController;
        use App\Http\Controllers\Mylib;
        use App\Models\Vendedor;

        $vendedorController = new VendedorController;
        $mylib = new Mylib;
        $cod = $_GET['cod']; 
        $vendedor = Vendedor::where("codigo_vendedor", $cod)->first();

        $enderecoController = new EnderecoController;
        $endereco = $enderecoController->find($vendedor->cpf);
    ?>
    <?= $mylib->abertura_light(['titulo' => 'funcionarios', 'id' => 'JaCadastrados']) ?>


    <?= $mylib->abertura_dark(['titulo' => 'Gostaria de inserir um funcionario?', 'id' => 'JaCadastrados']) ?>
    <div class="section-contact">
        <form method="POST" enctype="multipart/form-data" action="{{ route('vendedor.update') }}">
            @csrf
            <input type="text" name="nomeCompleto" placeholder="NOME COMPLETO" value="<?= $vendedor->nomeCompleto ?>" required style="color: white;"/>
            <div class="section-contact--split">
                <input type="text" name="codigo_vendedor" placeholder="CODIGO DO VENDEDOR" value="<?= $vendedor->codigo_vendedor ?>" style="color: white;"/>
                <input type="text" name="cpf" placeholder="CPF" value="<?= $vendedor->cpf ?>" required style="color: white;"/>
            </div>
            <div class="section-contact--split">
                <input type="text" name="data_de_nascimento" placeholder="NASCIMENTO: Y-m-a" value="<?= $vendedor->data_de_nascimento ?>" required style="color: white;"/>
                <input type="text" name="nacionalidade" placeholder="NACIONALIDADE" value="<?= $vendedor->nacionalidade ?>" required style="color: white;"/>
            </div>
            <div class="section-contact--split">
                <input type="text" name="endereco" placeholder="ENDEREÇO" value="<?= $endereco->endereco ?>" required style="color: white;"/>
                <input type="text" name="cep" placeholder="CEP"  value="<?=  $endereco->cep ?>" required style="color: white;"/>
            </div>
            <div class="section-contact--split">
                <input type="text" name="cidade" placeholder="CIDADE" value="<?=  $endereco->cidade ?>" required style="color: white;"/>
                <input type="text" name="estado" placeholder="ESTADO" value="<?=  $endereco->estado ?>"  required style="color: white;"/>
            </div>

            <div class="section-contact--split">
                <input type="text" name="bairro" placeholder="BAIRRO" value="<?=  $endereco->bairro ?>"  required style="color: white;"/>
                <input type="text" name="complemento" placeholder="COMPLEMENTO" value="<?=  $endereco->complemento  ?>" style="color: white;"/>
            </div>
  
            <input type="submit" value="Cadastrar" class="button"/>
        </form>
        
    </div>
    
</section>

@endsection




