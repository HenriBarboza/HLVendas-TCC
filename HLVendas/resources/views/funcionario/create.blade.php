<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    @vite(['resources/scss/funcionario.scss', 'resources/css/app.css', 'resources/js/app.js', 'resources/js/inputValidation.js'])
    <title>Novo Funcionario</title>
    @livewireStyles
</head>

<body>
    <div class="contentFuncionario">
        @include('components.navbar') 

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
                        <!-- <label for="nome">Nome:</label> -->
                        <input class="inputWrapper" type="text" name="nome" placeholder="Nome" required autofocus>
                    </div>
                    <!-- <div class="">
                        <label for="email">Email:</label>
                        <input id="email" type="email" name="email" required><button>Verificar</button>
                        <input id="" type="text" name="" placeholder="Apelido" disabled>
                    </div> -->
                    <div class="contentInput">
                        @livewire('verifica-email')
                    </div>
                    <div class="contentInput">
                        <input class="inputWrapper w50 phone" type="text" placeholder="Telefone" name="telefone"
                            required>
                        <input class="inputWrapper w50 cpf" type="text" placeholder="CPF" name="cpfcnpj" required>
                    </div>

                    <div class="contentInput">
                        <input class="inputWrapper" type="text" placeholder="Logradouro" name="logradouro">
                    </div>

                    <div class="contentInput">
                        <input class="inputWrapper w50 number" type="text" placeholder="Número" name="numero">
                        <input class="inputWrapper w50" type="text" placeholder="Bairro" name="bairro">
                    </div>

                    <div class="contentInput">
                        <input class="inputWrapper" type="text" placeholder="Cidade" name="cidade">
                    </div>

                    <div class="contentInput">
                        <input class="inputWrapper w50 cep" type="text" placeholder="CEP" name="cep">
                        <input class="inputWrapper w50" type="text" placeholder="Estado" name="estado">
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