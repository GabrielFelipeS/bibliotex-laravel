@extends('layouts.mainComFooter')

@section('title', 'Blibiotex')

@section('content')
    <?php 
        use App\Http\Controllers\Mylib;
        $mylib = new Mylib;
    ?>


    <?= $mylib->abertura_dark(['titulo' => 'Cadastrar funcionario', 'id' => 'JaCadastrados']) ?>
    <div class="section-contact">
        <form method="POST" enctype="multipart/form-data" action="{{ route('vendedor.store') }}">
            @csrf
            <input type="text" name="nomeCompleto" placeholder="NOME COMPLETO" required style="color: white;"/>
            <div class="section-contact--split">
                <input type="text" name="codigo_vendedor" placeholder="CODIGO DO VENDEDOR" style="color: white;"/>
                <input type="text" name="cpf" placeholder="CPF" required style="color: white;"/>
            </div>
            <div class="section-contact--split">
                <input type="text" name="data_de_nascimento" placeholder="NASCIMENTO: Y-m-a" required style="color: white;"/>
                <input type="text" name="nacionalidade" placeholder="NACIONALIDADE" required style="color: white;"/>
            </div>
            <div class="section-contact--split">
                <input type="text" name="endereco" placeholder="ENDEREÇO" required style="color: white;"/>
                <input type="text" name="cep" placeholder="CEP" required style="color: white;"/>
            </div>
            <div class="section-contact--split">
                <input type="text" name="cidade" placeholder="CIDADE" required style="color: white;"/>
                <input type="text" name="estado" placeholder="ESTADO" required style="color: white;"/>
            </div>

            <div class="section-contact--split">
                <input type="text" name="bairro" placeholder="BAIRRO" required style="color: white;"/>
                <input type="text" name="complemento" placeholder="COMPLEMENTO" style="color: white;"/>
            </div>
  
            <input type="submit" value="Cadastrar" class="button"/>
        </form>
    </div>
    </br>
    </br>
</section>

@endsection




