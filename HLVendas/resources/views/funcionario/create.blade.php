<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    @vite(['resources/scss/header.scss', 'resources/scss/funcionario.scss', 'resources/css/app.css', 'resources/js/app.js', 'resources/js/inputValidation.js', 'resources/js/placeholder.js'])
    <title>Novo Funcionario</title>
    @livewireStyles
</head>

<body>
    <div class="contentFuncionario">
        <div class="box">
            @include('components.navbar') 
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
                        <button>
                            <p class="text">
                                <a href="/funcionario">Buscar funcionario</a>
                            </p>
                        </button>
                    </div>
                </div>
                <form class="formFuncionario" method="POST" action="{{ route('funcionario.store') }}">
                    @CSRF
                    <div class="contentInput">
                        <label for="nome" class="labelTop">
                            <p>Nome</p>
                        </label>
                        <input class="inputWrapper" type="text" name="nome" required>
                    </div>

                    <div class="contentInput" style="display: block;">
                        @livewire('verifica-email')
                    </div>
                    <div class="contentInput">
                        <div class="inputGroup">
                            <label for="telefone" class="labelTop">
                                <P>Telefone</P>
                            </label>
                            <input class="inputWrapper phone" type="text" name="telefone" required>
                        </div>

                        <div class="inputGroup">
                            <label for="cpfcnpj" class="labelTop">
                                <P>CPF</P>
                            </label>
                            <input class="inputWrapper cpf" type="text" name="cpfcnpj" required>
                        </div>
                    </div>

                    <div class="contentInput">
                        <label for="logradouro" class="labelTop">
                            <p>Logradouro</p>
                        </label>
                        <input class="inputWrapper" type="text" name="logradouro">
                    </div>

                    <div class="contentInput">
                        <div class="inputGroup">
                            <label for="numero" class="labelTop">
                                <p>NNúmero</p>
                            </label>
                            <input class="inputWrapper number" type="text" name="numero">
                        </div>
                        <div class="inputGroup">
                            <label for="bairro" class="labelTop">
                                <p>Bairro</p>
                            </label>
                            <input class="inputWrapper" type="text" name="bairro">
                        </div>
                    </div>

                    <div class="contentInput">
                        <label for="cidade" class="labelTop">
                            <p>Cidade</p>
                        </label>
                        <input class="inputWrapper" type="text" name="cidade">
                    </div>

                    <div class="contentInput">
                        <div class="inputGroup">
                            <label for="cep" class="labelTop">
                                <p>CEP</p>
                            </label>
                            <input class="inputWrapper cep" type="text" name="cep">
                        </div>
                        <div class="inputGroup">
                            <label for="estado" class="labelTop">
                                <p>Estado</p>
                            </label>
                            <input class="inputWrapper" type="text" name="estado">
                        </div>
                    </div>

                    <div class="contentInput not-gap">
                        <label for="datanasc">Data De Nascimento:</label>
                        <input class="inputWrapper" type="date" placeholder="Data De Nascimento" name="datanasc">
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