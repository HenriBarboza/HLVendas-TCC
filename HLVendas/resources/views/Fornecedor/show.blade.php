<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <link rel="icon" href="{{ asset('images/cart-shopping-solid.ico') }}" type="image/x-icon">
    @vite(['resources/scss/fornecedor.scss', 'resources/css/app.css', 'resources/js/app.js', 'resources/js/loadingPage.js', 'resources/js/deleteAlert.js'])
    <title>HLVendas | Visualizar fornecedor</title>
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
                        <h1 class="title">Visualizar Fornecedor</h1>
                    </div>

                    <div class="buttonBack">
                        <a class="return" href="{{route('fornecedor.create')}}">Votlar</a>
                    </div>
                </div>
                <form class="formFornecedor">
                    @CSRF
                    @method('PUT')
                    <div class="contentInput">
                        <input class="inputWrapper showForne" type="text" name="id" value="{{$fornecedores->id}}"
                            disabled>
                        <label for="id" class="userLabel">
                            <p>Id:</p>
                        </label>
                    </div>
                    <div class="contentInput">
                        <input class="inputWrapper showForne" type="text" name="nome" value="{{$fornecedores->nome}}"
                            disabled>
                        <label for="nome" class="userLabel">
                            <p>Nome:</p>
                        </label>
                    </div>
                    <div class="contentInput">
                        <input class="inputWrapper showForne" type="text" name="nomefantasia"
                            value="{{$fornecedores->nomefantasia}}" disabled>
                        <label for="nomefantasia" class="userLabel">
                            <p>Nome Fantasia:</p>
                        </label>
                    </div>
                    <div class="contentInput">
                        <div class="inputGroup">
                            <input class="inputWrapper showForne" type="text" name="telefone"
                                value="{{$fornecedores->telefone}}" disabled>
                            <label for="telefone" class="userLabel">
                                <p>Telefone:</p>
                            </label>
                        </div>

                        <div class="inputGroup">
                            <input class="inputWrapper showForne" type="text" name="cpfcnpj"
                                value="{{$fornecedores->cpfcnpj}}" disabled>
                            <label for="cpfcnpj" class="userLabel">
                                <p>CPF/CNPJ:</p>
                            </label>
                        </div>
                    </div>
                    <div class="contentInput">
                        <input class="inputWrapper showForne" type="text" name="logradouro"
                            value="{{$fornecedores->logradouro}}" disabled>
                        <label for="logradouro" class="userLabel">
                            <p>Logradouro:</p>
                        </label>
                    </div>
                    <div class="contentInput">
                        <div class="inputGroup">
                            <input class="inputWrapper showForne" type="text" name="numero"
                                value="{{$fornecedores->numero}}" disabled>
                            <label for="numero" class="userLabel">
                                <p>Número:</p>
                            </label>
                        </div>

                        <div class="inputGroup">
                            <input class="inputWrapper showForne" type="text" name="bairro"
                                value="{{$fornecedores->bairro}}" disabled>
                            <label for="bairro" class="userLabel">
                                <p>Bairro:</p>
                            </label>
                        </div>
                    </div>
                    <div class="contentInput">
                        <input class="inputWrapper showForne" type="text" name="cidade"
                            value="{{$fornecedores->cidade}}" disabled>
                        <label for="cidade" class="userLabel">
                            <p>Cidade:</p>
                        </label>
                    </div>
                    <div class="contentInput">
                        <div class="inputGroup">
                            <input class="inputWrapper showForne" type="text" name="cep" value="{{$fornecedores->cep}}"
                                disabled>
                            <label for="cep" class="userLabel">
                                <p>CEP:</p>
                            </label>
                        </div>

                        <div class="inputGroup">
                            <input class="inputWrapper showForne" type="text" name="estado"
                                value="{{$fornecedores->estado}}" disabled>
                            <label for="estado" class="userLabel">
                                <p>Estado:</p>
                            </label>
                        </div>
                    </div>
                    <div class="contentInput">
                        <div class="inputGroup">
                            <input class="inputWrapper placeholderActive" type="datetime-local" name="created_at"
                                value="{{$fornecedores->created_at}}" disabled>
                            <label for="created_at" class="userLabel">
                                <p>Data De Cadastro:</p>
                            </label>
                        </div>

                        <div class="inputGroup">
                            <input class="inputWrapper placeholderActive" type="datetime-local" name="updated_at"
                                value="{{$fornecedores->updated_at}}" disabled>
                            <label for="updated_at" class="userLabel">
                                <p>Última Alteração:</p>
                            </label>
                        </div>
                    </div>
                    <div class="contentInput">
                        <input class="inputWrapper placeholderActive" type="datetime-local" name="ultimavenda"
                            value="{{$fornecedores->ultimavenda}}" disabled>
                        <label for="ultimavenda" class="userLabel">
                            <p>Última Venda:</p>
                        </label>
                    </div>
                    <div class="contentInput">
                        <input class="inputWrapper showForne" type="number" name="totalvendido"
                            value="{{$fornecedores->totalvendido}}" disabled>
                        <label for="totalvendido" class="userLabel">
                            <p>Total vendio:</p>
                        </label>
                    </div>
                </form>
                <div class="contentFormAcao">
                    <form class="editFornecedor" action="{{route('fornecedor.edit', $fornecedores->id)}}" method="GET">
                        <button type="submit">
                            Editar
                        </button>
                    </form>
                    <form class="deleteForne" id="deleteFornecedorForm"
                        action="{{route('fornecedor.destroy', $fornecedores->id)}}" method="POST">
                        @csrf
                        @method('DELETE')
                        <button type="button" class="btn-excluir-fornecedor" id="btnExcluirFornecedor"
                            data-id="{{ $fornecedores->id }}">Excluir</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
    @include('components.footer') 
</body>

</html>