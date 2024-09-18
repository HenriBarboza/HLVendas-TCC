<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    @vite(['resources/scss/fornecedor.scss', 'resources/css/app.css', 'resources/js/app.js'])
    @livewireStyles
    <title>Novo Fornecedor</title>
</head>

<?php 
    $rota = 1;
 ?>
<body>
    <div class="contentFornecedor">
        @include('components.navbar') 

        <div class="fornecedorCrud">
            <div class="contentButton">
                <h1>Novo Fornecedor</h1>
                @livewire('modal-fornecedor-component', compact('rota'))
                <a href="/fornecedor">Buscar fornecedor</a>
                @if ($message = Session::get('success'))
                    <div class="alert alert-success">
                        {{$message}}
                    </div>
                @endif
            </div>

            <form class="formFornecedor" action="{{route('fornecedor.store')}}" method="POST">
                @CSRF
                <div class="">
                    <div class="">
                        <label for="nome">Nome:</label>
                        <input type="text" name="nome" required>
                    </div>
                    <div class="">
                        <label for="nomefantasia">Nome Fantasia:</label>
                        <input type="text" name="nomefantasia">
                    </div>
                    <div class="">
                        <label for="telefone">Telefone:</label>
                        <input type="text" name="telefone">
                    </div>
                    <div class="">
                        <label for="cpfcnpj">CPF/CNPJ:</label>
                        <input type="text" name="cpfcnpj" required>
                    </div>
                    <div class="">
                        <label for="numero">Logradouro:</label>
                        <input type="text" name="logradouro" required>
                    </div>
                    <div class="">
                        <label for="numero">Número:</label>
                        <input type="text" name="numero" required>
                    </div>
                    <div class="">
                        <label for="bairro">Bairro:</label>
                        <input type="text" name="bairro" required>
                    </div>
                    <div class="">
                        <label for="cidade">Cidade:</label>
                        <input type="text" name="cidade" required>
                    </div>
                    <div class="">
                        <label for="cidade">CEP:</label>
                        <input type="text" name="cep">
                    </div>
                    <div class="">
                        <label for="estado">Estado:</label>
                        <input type="text" name="estado" required>
                    </div>
                    <div class="">
                        <button type="submit">Salvar</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
    </div>
    @livewireScripts
    @include('components.footer') 
</body>

</html>