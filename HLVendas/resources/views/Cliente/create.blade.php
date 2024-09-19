<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    @vite(['resources/scss/cliente.scss', 'resources/css/app.css', 'resources/js/app.js', 'resources/js/inputValidation.js'])
    <title>Novo Cliente</title>
</head>

<body>
    <div class="contentCliente">
        @include('components.navbar')

        <div class="clienteCrud">
            <div class="contentForms">
                <div class="contentButton">
                    <div class="newCliente">
                        <button>
                            <p class="text">Novo Cliente</p>
                        </button>
                    </div>

                    <div class="buscaCliente">
                        <button>
                            <p class="text">
                                <a href="/cliente">Buscar cliente</a>
                            </p>
                            @if ($message = Session::get('success'))
                            <div class="alert alert-success">
                                {{$message}}
                            </div>
                            @endif
                        </button>
                    </div>
                </div>

                <form class="formCliente" action="{{route('cliente.store')}}" method="POST">
                    @CSRF
                    <div class="contentInput">
                        <input class="inputWrapper" type="text" name="nome" placeholder="Nome" required>
                    </div>

                    <div class="contentInput">
                        <input class="inputWrapper w50 phone" type="text" name="telefone" placeholder="Telefone">

                        <input class="inputWrapper w50 cpfcnpj" type="text" name="cpfcnpj" placeholder="CPF/CNPJ"
                            required>
                    </div>

                    <div class="contentInput">
                        <input class="inputWrapper" type="text" name="logradouro" placeholder="Logradouro" required>
                    </div>

                    <div class="contentInput">
                        <input class="inputWrapper w50 number" type="text" name="numero" placeholder="Número" required>

                        <input class="inputWrapper w50" type="text" name="bairro" placeholder="Bairro" required>
                    </div>

                    <div class="contentInput">
                        <input class="inputWrapper" type="text" name="cidade" placeholder="Cidade" required>
                    </div>

                    <div class="contentInput">
                        <input class="inputWrapper w50 cep" type="text" name="cep" placeholder="CEP">

                        <input class="inputWrapper w50" type="text" name="estado" placeholder="Estado" required>
                    </div>

                    <div class="contentInput not-gap">
                        <label class="label" for="datanasc">Data de Nascimento:</label>
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
    @include('components.footer') 
</body>

</html>