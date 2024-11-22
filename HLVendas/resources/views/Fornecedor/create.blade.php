<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    @livewireStyles
    <link rel="icon" href="{{ asset('images/cart-shopping-solid.ico') }}" type="image/x-icon">
    @vite(['resources/scss/tableBusca.scss', 'resources/js/messageAlert.js', 'resources/scss/fornecedor.scss', 'resources/css/app.css', 'resources/js/app.js', 'resources/js/inputValidation.js', 'resources/js/loadingPage.js'])
    <title>HLVendas | Novo fornecedor</title>
</head>

<?php 
    $rota = 1;
 ?>

<body>
    <div class="contentFornecedor">
        <div class="box">
            @include('components.navbar') 
        </div>
        <div class="loader">
            <div class="loading"></div>
        </div>

        @if ($message = Session::get('success'))
            <div id="success-message"
                class="notification bg-green-500 text-white px-4 py-3 rounded shadow-lg flex justify-between items-center opacity-0 transition-opacity duration-500 fixed top-4 right-4 z-50">
                <div>
                    <p class="font-bold text-white">Sucesso!</p>
                    <p class="text-white">{{ $message }}</p>
                </div>
            </div>
        @endif

        <div class="fornecedorCrud">
            <div class="contentForms">
                <div class="contentButton">
                    <div class="newFornecedor">
                        <h1 class="title">Novo Fornecedor</h1>
                    </div>

                    <div class="buscaFornecedor">
                        @livewire('modal-fornecedor-component', compact('rota'))
                    </div>
                </div>

                <form class="formFornecedor" action="{{route('fornecedor.store')}}" method="POST">
                    @CSRF
                    <div class="contentInput not-gap">
                        <input autocomplete="off" class="inputWrapper" type="text" name="nome" required="">
                        <label for="nome" class="userLabel">
                            <p>Nome</p>
                        </label>
                    </div>

                    <div class="contentInput">
                        <input autocomplete="off" class="inputWrapper" type="text" name="nomefantasia" required="">
                        <label for="nome" class="userLabel">
                            <p>Nome Fantasia</p>
                        </label>
                    </div>
                    <div class="contentInput">
                        <div class="inputGroup">
                            <input autocomplete="off" class="inputWrapper phone" type="text" name="telefone"
                                required="">
                            <label for="telefone" class="userLabel">
                                <p>Telefone</p>
                            </label>
                        </div>

                        <div class="inputGroup">
                            <input autocomplete="off" class="inputWrapper cpfcnpj" type="text" name="cpfcnpj"
                                required="">
                            <label for="cpfcnpj" class="userLabel">
                                <p>CPF/CNPJ</p>
                            </label>
                        </div>
                    </div>

                    <div class="contentInput">
                        <input autocomplete="off" class="inputWrapper" type="text" name="logradouro" required="">
                        <label for="logradouro" class="userLabel">
                            <p>Logradouro</p>
                        </label>
                    </div>
                    <div class="contentInput">
                        <div class="inputGroup">
                            <input autocomplete="off" class="inputWrapper number" type="text" name="numero" required="">
                            <label for="numero" class="userLabel">
                                <p>Número</p>
                            </label>
                        </div>

                        <div class="inputGroup">
                            <input autocomplete="off" class="inputWrapper" type="text" name="bairro" required="">
                            <label for="bairro" class="userLabel">
                                <p>Bairro</p>
                            </label>
                        </div>
                    </div>
                    <div class="contentInput">
                        <input autocomplete="off" class="inputWrapper" type="text" name="cidade" required="">
                        <label for="cidade" class="userLabel">
                            <p>Cidade</p>
                        </label>
                    </div>
                    <div class="contentInput">
                        <div class="inputGroup">
                            <input autocomplete="off" class="inputWrapper cep" type="text" name="cep" required="">
                            <label for="cidade" class="userLabel">
                                <p>CEP</p>
                            </label>
                        </div>

                        <div class="inputGroup">
                            <input autocomplete="off" class="inputWrapper" type="text" name="estado" required="">
                            <label for="estado" class="userLabel">
                                <p>Estado</p>
                            </label>
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