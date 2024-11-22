<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    @livewireStyles
    <script src="https://cdn.jsdelivr.net/npm/alpinejs@3.x.x/dist/cdn.min.js" defer></script>
    <link rel="icon" href="{{ asset('images/cart-shopping-solid.ico') }}" type="image/x-icon">
    @vite(['resources/js/messageAlert.js', 'resources/scss/cliente.scss', 'resources/scss/tableBusca.scss', 'resources/css/app.css', 'resources/js/app.js', 'resources/js/inputValidation.js', 'resources/js/loadingPage.js'])
    <title>HLVendas | Novo cliente</title>
</head>

<?php 
    $rota = 1;
 ?>

<body>
    <div class="contentCliente">
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

        <div class="clienteCrud">
            <div class="contentForms">
                <div class="contentButton">
                    <div class="newCliente">
                        <h1 class="title">Novo Cliente</h1>
                    </div>

                    <div id="div2" class="buscaCliente">
                        @livewire('modal-cliente-component', compact(var_name: 'rota'))
                    </div>
                </div>

                <form class="formCliente" action="{{route('cliente.store')}}" method="POST">
                    @CSRF
                    <div class="contentInput not-gap">
                        <input autocomplete="off" class="inputWrapper" type="text" name="nome" required="">
                        <label for="nome" class="userLabel">
                            <p>Nome</p>
                        </label>
                    </div>

                    <div class="contentInput">
                        <div class="inputGroup">
                            <input autocomplete="off" class="inputWrapper phone" type="text" name="telefone" required="">
                            <label for="nome" class="userLabel">
                                <p>Telefone</p>
                            </label>
                        </div>

                        <div class="inputGroup">
                            <input autocomplete="off" class="inputWrapper cpfcnpj" type="text" name="cpfcnpj" required="">
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
                            <label for="cep" class="userLabel">
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

                    <div class="contentInput not-gap">
                        <input class="inputWrapper showCliente" type="date" name="datanasc" required="">
                        <label class="userLabel" for="datanasc">
                            <p>Data de Nascimento:</p>
                        </label>
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
</body>
</html>