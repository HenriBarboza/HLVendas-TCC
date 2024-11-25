<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <link rel="icon" href="{{ asset('images/cart-shopping-solid.ico') }}" type="image/x-icon">
    @vite(['resources/scss/cliente.scss', 'resources/css/app.css', 'resources/js/app.js', 'resources/js/loadingPage.js','resources/js/deleteAlert.js'])
    <title>HLVendas | Visualizar cliente</title>
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
                    <h1 class="title">Visualizar Cliente</h1>

                    <div class="buttonBack">
                        <a class="return" href="{{route('cliente.create')}}">Voltar</a>
                    </div>
                </div>

                <form class="formCliente">
                    @CSRF
                    @method('PUT')
                    <div class="contentInput">
                        <input class="inputWrapper showCliente" type="text" name="id" value="{{$clientes->id}}" readonly>
                        <label for="id" class="userLabel">
                            <p>Id:</p>
                        </label>
                    </div>
                    <div class="contentInput">
                        <input class="inputWrapper showCliente" type="text" name="nome" value="{{$clientes->nome}}" disabled>
                        <label for="nome" class="userLabel">
                            <p>Nome:</p>
                        </label>
                    </div>
                    <div class="contentInput">
                        <div class="inputGroup">
                            <input class="inputWrapper showCliente" type="text" name="telefone" value="{{$clientes->telefone}}"
                                disabled>
                            <label for="telefone" class="userLabel">
                                <p>Telefone:</p>
                            </label>
                        </div>

                        <div class="inputGroup">
                            <input class="inputWrapper showCliente" type="text" name="cpfcnpj" value="{{$clientes->cpfcnpj}}"
                                disabled>
                            <label for="cpfcnpj" class="userLabel">
                                <p>CPF/CNPJ:</p>
                            </label>
                        </div>
                    </div>
                    <div class="contentInput">
                        <input class="inputWrapper showCliente" type="text" name="logradouro" value="{{$clientes->logradouro}}"
                            disabled>
                        <label for="logradouro" class="userLabel">
                            <p>Logradouro:</p>
                        </label>
                    </div>
                    <div class="contentInput">
                        <div class="inputGroup">
                            <input class="inputWrapper showCliente" type="text" name="numero" value="{{$clientes->numero}}"
                                disabled>
                            <label for="numero" class="userLabel">
                                <p>Número:</p>
                            </label>
                        </div>

                        <div class="inputGroup">
                            <input class="inputWrapper showCliente" type="text" name="bairro" value="{{$clientes->bairro}}"
                                disabled>
                            <label for="bairro" class="userLabel">
                                <p>Bairro:</p>
                            </label>
                        </div>
                    </div>
                    <div class="contentInput">
                        <input class="inputWrapper showCliente" type="text" name="cidade" value="{{$clientes->cidade}}" disabled>
                        <label for="cidade" class="userLabel">
                            <p>Cidade:</p>
                        </label>
                    </div>
                    <div class="contentInput">
                        <div class="inputGroup">
                            <input class="inputWrapper showCliente" type="text" name="cep" value="{{$clientes->cep}}" disabled>
                            <label for="cep" class="userLabel">
                                <p>CEP:</p>
                            </label>
                        </div>
                        <div class="inputGroup">
                            <input class="inputWrapper showCliente" type="text" name="estado" value="{{$clientes->estado}}"
                                disabled>
                            <label for="estado" class="userLabel">
                                <p>Estado:</p>
                            </label>
                        </div>
                    </div>
                    <div class="contentInput">
                        <div class="inputGroup">
                            <input class="inputWrapper placeholderActive" type="date" name="datanasc" value="{{$clientes->datanasc}}"
                            disabled>
                            <label class="userLabel" for="datanasc"><p>Data De Nascimento:</p></label>
                        </div>

                        <div class="inputGroup">
                            <input class="inputWrapper placeholderActive" type="datetime-local" name="created_at"
                            value="{{$clientes->created_at}}" disabled>
                            <label class="userLabel" for="created_at"><p>Data De Cadastro:</p></label>
                        </div>
                    </div>
                    <div class="contentInput">
                        <div class="inputGroup">
                            <input class="inputWrapper placeholderActive" type="datetime-local" name="updated_at"
                            value="{{$clientes->updated_at}}" disabled>
                            <label class="userLabel" for="updated_at"><p>Última Alteração:</p></label>
                        </div>

                        <div class="inputGroup">
                            <input class="inputWrapper placeholderActive" type="datetime-local" name="ultimacompra"
                            value="{{$clientes->ultimacompra}}" disabled>
                            <label class="userLabel" for="ultimacompra"><p>Última Compra:</p></label>
                        </div>
                    </div>
                    <div class="contentInput">
                        <input class="inputWrapper showCliente" type="number" name="totalgasto" value="{{$clientes->totalgasto}}"
                            disabled>
                        <label for="totalgasto" class="userLabel">
                            <p>Total gasto:</p>
                        </label>
                    </div>
                </form>
                <div class="contentFormAcao">
                    <form class="editCliente" action="{{route('cliente.edit', $clientes->id) }}">
                        <button type="submit">
                            Editar
                        </button>
                    </form>
                    <form class="deleteCliente" id="deleteClienteForm" action="{{ route('cliente.destroy', $clientes->id) }}" method="POST">
                        @csrf
                        @method('DELETE')
                        <button type="button" class="btn-excluir-cliente" id="btnExcluirCliente" data-id="{{ $clientes->id }}">
                            Excluir
                        </button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</body>

</html>