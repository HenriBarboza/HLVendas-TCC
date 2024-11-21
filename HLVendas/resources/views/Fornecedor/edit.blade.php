<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" href="{{ asset('images/cart-shopping-solid.ico') }}" type="image/x-icon">
    @vite(['resources/scss/fornecedor.scss', 'resources/css/app.css', 'resources/js/app.js', 'resources/js/loadingPage.js'])
    <title>HLVendas | Editar fornecedor</title>
</head>

<body>
    <div class="contentFornecedor">
        <div class="box">
            @include('components.navbar') 
        </div>

        <div class="loader">
            <div class="loading"></div>
        </div>
        <div class="fornecedorCrud">
            <div class="contentForms">
                <div class="contentButton">
                    <div class="newFornecedor">
                        <h1>Editar Fornecedor</h1>
                    </div>

                    <div class="buttonBack">
                        <a class="return" href="{{route("fornecedor.create")}}">Cancelar</a>
                    </div>
                </div>
                <form class="formFornecedor" action="{{route('fornecedor.update', $fornecedores->id)}}" method="POST">
                    @CSRF
                    @method('PUT')
                    <div class="contentInput">
                        <input class="inputWrapper" type="text" name="nome" value="{{$fornecedores->nome}}" required>
                        <label for="nome" class="userLabel">
                            <p>Nome:</p>
                        </label>
                    </div>
                    <div class="contentInput">
                        <input class="inputWrapper" type="text" name="nomefantasia"
                            value="{{$fornecedores->nomefantasia}}" required>
                        <label for="nomefantasia" class="userLabel">
                            <p>Nome Fantasia:</p>
                        </label>
                    </div>
                    <div class="contentInput">
                        <div class="inputGroup">
                            <input class="inputWrapper" type="text" name="telefone" value="{{$fornecedores->telefone}}"
                                required>
                            <label for="telefone" class="userLabel">
                                <p>Telefone:</p>
                            </label>
                        </div>

                        <div class="inputGroup">
                            <input class="inputWrapper" type="text" name="cpfcnpj" value="{{$fornecedores->cpfcnpj}}"
                                required>
                            <label for="cpfcnpj" class="userLabel">
                                <p>CPF/CNPJ:</p>
                            </label>
                        </div>
                    </div>
                    <div class="contentInput">
                        <input class="inputWrapper" type="text" name="logradouro" value="{{$fornecedores->logradouro}}">
                        <label for="logradouro" class="userLabel">
                            <p>Logradouro:</p>
                        </label>
                    </div>
                    <div class="contentInput">
                        <div class="inputGroup">
                            <input class="inputWrapper" type="text" name="numero" value="{{$fornecedores->numero}}">
                            <label for="numero" class="userLabel">
                                <p>Número:</p>
                            </label>
                        </div>

                        <div class="inputGroup">
                            <input class="inputWrapper" type="text" name="bairro" value="{{$fornecedores->bairro}}">
                            <label for="bairro" class="userLabel">
                                <p>Bairro:</p>
                            </label>
                        </div>
                    </div>
                    <div class="contentInput">
                        <input class="inputWrapper" type="text" name="cidade" value="{{$fornecedores->cidade}}">
                        <label for="cidade" class="userLabel">
                            <p>Cidade:</p>
                        </label>
                    </div>
                    <div class="contentInput">
                        <div class="inputGroup">
                            <input class="inputWrapper" type="text" name="cep" value="{{$fornecedores->cep}}">
                            <label for="cep" class="userLabel">
                                <p>CEP:</p>
                            </label>
                        </div>

                        <div class="inputGroup">
                            <input class="inputWrapper" type="text" name="estado" value="{{$fornecedores->estado}}">
                            <label for="estado" class="userLabel">
                                <p>Estado:</p>
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
    @include('components.footer') 
</body>

</html>