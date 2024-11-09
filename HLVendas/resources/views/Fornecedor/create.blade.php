<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    @livewireStyles
    @vite(['resources/scss/header.scss','resources/scss/fornecedor.scss', 'resources/css/app.css', 'resources/js/app.js', 'resources/js/inputValidation.js', 'resources/js/placeholder.js'])
    <title>Novo Fornecedor</title>
</head>

<?php 
    $rota = 1;
 ?>

<body>
    <div class="contentFornecedor">
        <div class="box">
            @include('components.navbar') 
        </div>

        <div class="fornecedorCrud">
            <div class="contentForms">
                <div class="contentButton">
                    <div class="newFornecedor">
                        <h1>Novo Fornecedor</h1>
                    </div>

                    <div class="buscaFornecedor">
                        @livewire('modal-fornecedor-component', compact('rota'))
                        @if ($message = Session::get('success'))
                            <div class="alert alert-success">
                                {{$message}}
                            </div>
                        @endif
                    </div>
                </div>

                <form class="formFornecedor" action="{{route('fornecedor.store')}}" method="POST">
                    @CSRF
                    <div class="contentInput not-gap">
                        <label for="nome" class="labelTop">
                            <p>Nome</p>
                        </label>
                        <input class="inputWrapper" type="text" name="nome" required>
                    </div>

                    <div class="contentInput">
                        <label for="nome" class="labelTop">
                            <p>Nome Fantasia</p>
                        </label>
                        <input class="inputWrapper" type="text" name="nomefantasia">
                    </div>
                    <div class="contentInput">
                        <div class="inputGroup">
                            <label for="telefone" class="labelTop">
                                <p>Telefone</p>
                            </label>
                            <input class="inputWrapper phone" type="text" name="telefone" required>
                        </div>

                        <div class="inputGroup">
                            <label for="cpfcnpj" class="labelTop">
                                <p>CPF/CNPJ</p>
                            </label>
                            <input class="inputWrapper cpfcnpj" type="text" name="cpfcnpj" required>
                        </div>
                    </div>

                    <div class="contentInput">
                        <label for="logradouro" class="labelTop">
                            <p>Logradouro</p>
                        </label>
                        <input class="inputWrapper" type="text" name="logradouro" required>
                    </div>
                    <div class="contentInput">
                        <div class="inputGroup">
                            <label for="numero" class="labelTop">
                                <p>Número</p>
                            </label>
                            <input class="inputWrapper number" type="text" name="numero" required>
                        </div>

                        <div class="inputGroup">
                            <label for="bairro" class="labelTop">
                                <p>Bairro</p>
                            </label>
                            <input class="inputWrapper" type="text" name="bairro" required>
                        </div>
                    </div>
                    <div class="contentInput">
                        <label for="cidade" class="labelTop">
                            <p>Cidade</p>
                        </label>
                        <input class="inputWrapper" type="text" name="cidade" required>
                    </div>
                    <div class="contentInput">
                        <div class="inputGroup">
                            <label for="cidade" class="labelTop">
                                <p>CEP</p>
                            </label>
                            <input class="inputWrapper cep" type="text" name="cep">
                        </div>

                        <div class="inputGroup">
                            <label for="estado" class="labelTop">
                                <p>Estado</p>
                            </label>
                            <input class="inputWrapper" type="text" name="estado" required>
                        </div>
                    </div>

                    <div class="button">
                        <button type="submit">
                            <p class="text">
                                Salvar
                            </p>
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
    @livewireScripts
    @include('components.footer') 
</body>

</html>