<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    @vite(['resources/scss/header.scss', 'resources/scss/funcionario.scss', 'resources/css/app.css', 'resources/js/app.js', 'resources/js/inputValidation.js', 'resources/js/loadingPage.js'])
    <title>Novo Funcionario</title>
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

        <div class="funcionarioCrud">
            <div class="contentForms">
                <div class="contentButton">
                    <div class="newFuncionario">
                        @if ($message = Session::get('success'))
                            <div class="alert alert-success">
                                {{$message}}
                            </div>
                        @endif
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
                        <label for="datanasc" class="labelDate">
                            <p>Data De Nascimento:</p>
                        </label>
                        <input class="inputWrapper" type="date" placeholder="Data De Nascimento" name="datanasc"
                            required="">
                    </div>

                    <div class="contentInput radio">
                        <p class="text"><label for="tipo">Nivel:</label></p>
                        <input type="radio" id="normal" value="f" name="tipo" checked>
                        <p class="text"><label for="normal">Normal</label></p>
                        <input type="radio" id="gerente" value="g" name="tipo">
                        <p class="text"><label for="gerente">Gerente</label><br></p>
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