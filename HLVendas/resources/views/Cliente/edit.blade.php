<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" href="{{ asset('images/cart-shopping-solid.ico') }}" type="image/x-icon">
    @vite(['resources/scss/home.scss', 'resources/scss/cliente.scss', 'resources/css/app.css', 'resources/js/app.js', 'resources/js/loadingPage.js'])
    <title>HLVendas | Editar cliente</title>
</head>

<body>
    <div class="contentCliente">
        <div class="box">
            @include('components.navbar') 
        </div>
        <div class="loader">
            <div class="loading"></div>
        </div>

        <div class="clienteCrud">
            <div class="contentForms">
                <div class="contentButton">
                    <h1>Editar Cliente</h1>

                    <div class="buttonBack">
                        <a class="return" href="{{ route('cliente.create') }}">Cancelar</a>
                    </div>
                </div>
                <form class="formCliente" action="{{route('cliente.update', $clientes->id)}}" method="POST">
                    @CSRF
                    @method('PUT')
                    <div class="contentInput">
                        <input class="inputWrapper showCliente" type="text" name="id" value="{{$clientes->id}}"
                            disabled>
                        <label for="id" class="userLabel">
                            <p>Id:</p>
                        </label>
                    </div>
                    <div class="contentInput">
                        <input class="inputWrapper" type="text" name="nome" value="{{$clientes->nome}}" required>
                        <label for="nome" class="userLabel">
                            <p>Nome:</p>
                        </label>
                    </div>
                    <div class="contentInput">
                        <div class="inputGroup">
                            <input class="inputWrapper" type="text" name="telefone" value="{{$clientes->telefone}}"
                                required>
                            <label for="telefone" class="userLabel">
                                <p>Telefone:</p>
                            </label>
                        </div>

                        <div class="inputGroup">
                            <input class="inputWrapper" type="text" name="cpfcnpj" value="{{$clientes->cpfcnpj}}"
                                required>
                            <label for="cpfcnpj" class="userLabel">
                                <p>CPF/CNPJ:</p>
                            </label>
                        </div>
                    </div>
                    <div class="contentInput">
                        <input class="inputWrapper" type="text" name="logradouro" value="{{$clientes->logradouro}}"
                            required>
                        <label for="logradouro" class="userLabel">
                            <p>Logradouro:</p>
                        </label>
                    </div>
                    <div class="contentInput">
                        <div class="inputGroup">
                            <input class="inputWrapper" type="text" name="numero" value="{{$clientes->numero}}"
                                required>
                            <label for="numero" class="userLabel">
                                <p>Número:</p>
                            </label>
                        </div>

                        <div class="inputGroup">
                            <input class="inputWrapper" type="text" name="bairro" value="{{$clientes->bairro}}"
                                required>
                            <label for="bairro" class="userLabel">
                                <p>Bairro:</p>
                            </label>
                        </div>
                    </div>
                    <div class="contentInput">
                        <input class="inputWrapper" type="text" name="cidade" value="{{$clientes->cidade}}" required>
                        <label for="cidade" class="userLabel">
                            <p>Cidade:</p>
                        </label>
                    </div>
                    <div class="contentInput">
                        <div class="inputGroup">
                            <input class="inputWrapper" type="text" name="cep" value="{{$clientes->cep}}">
                            <label for="cep" class="userLabel">
                                <p>CEP:</p>
                            </label>
                        </div>

                        <div class="inputGroup">
                            <input class="inputWrapper" type="text" name="estado" value="{{$clientes->estado}}"
                                required>
                            <label for="estado" class="userLabel">
                                <p>Estado:</p>
                            </label>
                        </div>
                    </div>
                    <div class="contentInput not-gap">
                        <label class="labelDate" for="datanasc">Data De Nascimento:</label>
                        <input class="inputWrapper" type="date" name="datanasc" value="{{$clientes->datanasc}}"
                            required>
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