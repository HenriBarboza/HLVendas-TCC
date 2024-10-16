<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    @livewireStyles
    <script src="https://cdn.jsdelivr.net/npm/alpinejs@3.x.x/dist/cdn.min.js" defer></script>
    @vite(['resources/scss/cliente.scss', 'resources/css/app.css', 'resources/js/app.js', 'resources/js/inputValidation.js', 'resources/js/placeholder.js'])
    <title>Novo Cliente</title>
</head>

<?php 
    $rota = 1;
 ?>


<body>
    <div class="contentCliente">
        @include('components.navbar')

        <div class="clienteCrud">
            <div class="contentForms">
                <div class="contentButton">
                    <div class="newCliente">
                        <!-- <button>
                            <p class="text">Novo Cliente</p>
                        </button> -->
                        @if ($message = Session::get('success'))
                            <div class="alert alert-success">
                                {{$message}}
                            </div>
                        @endif
                    </div>

                    <div class="buscaCliente">
                        @livewire('modal-cliente-component', compact(var_name: 'rota'))
                    </div>
                </div>

                <form class="formCliente" action="{{route('cliente.store')}}" method="POST">
                    @CSRF
                    <div class="contentInput not-gap">
                        <label for="nome" class="labelTop">
                            <p>Nome</p>
                        </label>
                        <input class="inputWrapper" type="text" name="nome" required>
                    </div>

                    <div class="contentInput">
                        <div class="inputGroup">
                            <label for="nome" class="labelTop">
                                <p>Telefone</p>
                            </label>
                            <input class="inputWrapper w50 phone" type="text" name="telefone">
                        </div>

                        <div class="inputGroup">
                            <label for="cpfcnpj" class="labelTop">
                                <p>CPF/CNPJ</p>
                            </label>
                            <input class="inputWrapper w50 cpfcnpj" type="text" name="cpfcnpj" required>
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
                            <input class="inputWrapper w50 number" type="text" name="numero" required>
                        </div>
                        <div class="inputGroup">
                            <label for="bairro" class="labelTop">
                                <p>Bairro</p>
                            </label>
                            <input class="inputWrapper w50" type="text" name="bairro" required>
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
                            <label for="cep" class="labelTop">
                                <p>CEP</p>
                            </label>
                            <input class="inputWrapper w50 cep" type="text" name="cep">
                        </div>

                        <div class="inputGroup">
                            <label for="estado" class="labelTop">
                                <p>Estado</p>
                            </label>
                            <input class="inputWrapper w50" type="text" name="estado" required>
                        </div>
                    </div>

                    <div class="contentInput not-gap">
                        <label class="labelDate" for="datanasc">Data de Nascimento:</label>
                        <input class="inputWrapper" type="date" name="datanasc">
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