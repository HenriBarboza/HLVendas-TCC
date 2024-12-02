<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" href="{{ asset('images/cart-shopping-solid.ico') }}" type="image/x-icon">
    @vite(['resources/scss/tableBusca.scss', 'resources/js/messageAlert.js' ,'resources/scss/funcionario.scss', 'resources/css/app.css', 'resources/js/app.js', 'resources/js/inputValidation.js', 'resources/js/loadingPage.js'])
    <title>HLVendas | Novo funcionário</title>
    @livewireStyles
</head>

<?php 
    $rota = 1;
 ?>

<body>
    <div class="contentFuncionario">
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

        <div class="funcionarioCrud">
            <div class="contentForms">
                <div class="contentButton">
                    <div class="newFuncionario">
                       <h1 class="title">Novo Funcionário</h1>
                    </div>

                    <div class="buscaFuncionario">
                        @livewire('modal-funcionario-component', compact(var_name: 'rota'))
                    </div>
                </div>
                <form class="formFuncionario" method="POST" action="{{ route('funcionario.store') }}">
                    @CSRF
                    <div class="contentInput">
                        <input autocomplete="off" class="inputWrapper" type="text" name="nome" required="">
                        <label for="nome" class="userLabel">
                            <p>Nome</p>
                        </label>
                    </div>

                    <div class="contentInput" style="display: block;">
                        @livewire('verifica-email')
                    </div>
                    <div class="contentInput">
                        <div class="inputGroup">
                            <input autocomplete="off" class="inputWrapper phone" type="text" name="telefone"
                                required="">
                            <label for="telefone" class="userLabel">
                                <P>Telefone</P>
                            </label>
                        </div>

                        <div class="inputGroup">
                            <input autocomplete="off" class="inputWrapper cpf" type="text" name="cpfcnpj" required="">
                            <label for="cpfcnpj" class="userLabel">
                                <P>CPF</P>
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
                        <input class="inputWrapper showFunc" type="date" name="datanasc"
                        required="">
                        <label for="datanasc" class="userLabel">
                            <p>Data De Nascimento:</p>
                        </label>
                    </div>

                    <div class="contentInput radio">
                        <p class="text"><label for="tipo">Nivel:</label></p>
                        <input type="radio" id="normal" value="f" name="tipo" checked>
                        <p class="text"><label for="normal">Normal</label></p>
                        <input type="radio" id="gerente" value="g" name="tipo">
                        <p class="text"><label for="gerente">Gerente</label><br></p>
                    </div>

                    <div class="contentInput radio">
                        <p class="text"><label for="status">Situação:</label></p>
                        <input type="radio" id="ativo" value="a" name="status" checked>
                        <p class="text"><label for="ativo">Ativo</label></p>
                        <input type="radio" id="inativo" value="i" name="status">
                        <p class="text"><label for="inativo">Inativo</label><br></p>
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
        @include('components.footer') 
        @livewireScripts
    </div>
</body>

</html>