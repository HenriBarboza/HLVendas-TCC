<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    @vite(['resources/scss/cliente.scss', 'resources/css/app.css', 'resources/js/app.js'])
    <title>Novo Cliente</title>
</head>

<body>
    <div class="contentCliente">
        <div class="navbar">
            @include('components.navbar')
        </div>

        <div class="clienteCrud">
            <div class="contentButton">
                <div class="newCliente">
                    <h1>Novo Cliente</h1>
                </div>

                <div class="buscaCliente">
                    <a href="/cliente">Buscar cliente</a>
                    @if ($message = Session::get('success'))
                        <div class="alert alert-success">
                            {{$message}}
                        </div>
                    @endif
                </div>
            </div>

            <form class="formCliente" action="{{route('cliente.store')}}" method="POST">
                @CSRF
                <div class="contentInput">
                    <input class="inputWrapper" type="text" name="nome" placeholder="Nome" required>
                </div>

                <div class="contentInput">
                    <input class="inputWrapper w50" type="text" name="telefone" placeholder="Telefone">

                    <input class="inputWrapper w50" type="text" name="cpfcnpj" placeholder="CPF/CNPJ" required>
                </div>

                <div class="contentInput">
                    <input class="inputWrapper" type="text" name="logradouro" placeholder="Logradouro" required>
                </div>

                <div class="contentInput">
                    <input class="inputWrapper w50" type="text" name="numero" placeholder="Número" required>

                    <input class="inputWrapper w50" type="text" name="bairro" placeholder="Bairro" required>
                </div>

                <div class="contentInput">
                    <input class="inputWrapper" type="text" name="cidade" placeholder="Cidade" required>
                </div>

                <div class="contentInput">
                    <input class="inputWrapper w50" type="text" name="cep" placeholder="CEP">

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
    @include('components.footer') 
</body>

</html>