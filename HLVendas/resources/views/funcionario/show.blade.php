<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" href="{{ asset('images/cart-shopping-solid.ico') }}" type="image/x-icon">
    @vite(['resources/scss/funcionario.scss', 'resources/css/app.css', 'resources/js/app.js', 'resources/js/loadingPage.js', 'resources/js/deleteAlert.js'])
    <title>HLVendas | Visualizar funcionário</title>
</head>

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
                    <div class="nweFuncionario">
                        <h1>Funcionário</h1>
                    </div>

                    <div class="buttonBack">
                        <a class="return" href="{{route('funcionario.create')}}">Voltar</a>
                    </div>
                </div>
                <form class="formFuncionario">
                    @CSRF
                    @method('PUT')
                    <div class="contentInput">
                        <input class="inputWrapper showFunc" type="text" name="id" value="{{$funcionarios->id}}"
                            disabled>
                        <label class="userLabel" for="id">
                            <p>Id:</p>
                        </label>
                    </div>
                    <div class="contentInput">
                        <input class="inputWrapper showFunc" type="text" name="nome" value="{{$funcionarios->nome}}"
                            disabled>
                        <label class="userLabel" for="nome">
                            <p>Nome:</p>
                        </label>
                    </div>
                    <div class="contentInput">
                        <input class="inputWrapper showFunc" type="text" name="email" value="{{$funcionarios->email}}"
                            disabled>
                        <label class="userLabel" for="email">
                            <p>Email:</p>
                        </label>
                    </div>
                    <div class="contentInput">
                        <div class="inputGroup">
                            <input class="inputWrapper showFunc" type="text" name="telefone"
                                value="{{$funcionarios->telefone}}" disabled>
                            <label class="userLabel" for="telefone">
                                <p>Telefone:</p>
                            </label>
                        </div>

                        <div class="inputGroup">
                            <input class="inputWrapper showFunc" type="text" name="cpfcnpj"
                                value="{{$funcionarios->cpfcnpj}}" disabled>
                            <label class="userLabel" for="cpfcnpj">
                                <p>CPF/CNPJ:</p>
                            </label>
                        </div>
                    </div>
                    <div class="contentInput">
                        <input class="inputWrapper showFunc" type="text" name="logradouro"
                            value="{{$funcionarios->logradouro}}" disabled>
                        <label class="userLabel" for="logradouro">
                            <p>Logradouro:</p>
                        </label>
                    </div>
                    <div class="contentInput">
                        <div class="inputGroup">
                            <input class="inputWrapper showFunc" type="text" name="numero"
                                value="{{$funcionarios->numero}}" disabled>
                            <label class="userLabel" for="numero">
                                <p>Número:</p>
                            </label>
                        </div>

                        <div class="inputGroup">
                            <input class="inputWrapper showFunc" type="text" name="bairro"
                                value="{{$funcionarios->bairro}}" disabled>
                            <label class="userLabel" for="bairro">
                                <p>Bairro:</p>
                            </label>
                        </div>
                    </div>
                    <div class="contentInput">
                        <input class="inputWrapper showFunc" type="text" name="cidade" value="{{$funcionarios->cidade}}"
                            disabled>
                        <label class="userLabel" for="cidade">
                            <p>Cidade:</p>
                        </label>
                    </div>
                    <div class="contentInput">
                        <div class="inputGroup">
                            <input class="inputWrapper showFunc" type="text" name="cep" value="{{$funcionarios->cep}}"
                                disabled>
                            <label class="userLabel" for="cep">
                                <p>CEP:</p>
                            </label>
                        </div>

                        <div class="inputGroup">
                            <input class="inputWrapper showFunc" type="text" name="estado"
                                value="{{$funcionarios->estado}}" disabled>
                            <label class="userLabel" for="estado">
                                <p>Estado:</p>
                            </label>
                        </div>
                    </div>
                    <div class="contentInput">
                        <div class="inputGroup">
                            <input class="inputWrapper placeholderActive" type="datetime-local" name="created_at"
                                value="{{$funcionarios->created_at}}" disabled>
                            <label class="userLabel" for="created_at">
                                <p>Data De Cadastro:</p>
                            </label>
                        </div>

                        <div class="inputGroup">
                            <input class="inputWrapper placeholderActive" type="datetime-local" name="updated_at"
                                value="{{$funcionarios->updated_at}}" disabled>
                            <label class="userLabel" for="updated_at">
                                <p>Última Alteração:</p>
                            </label>
                        </div>
                    </div>
                    <div class="contentInput">
                        <input class="inputWrapper placeholderActive" type="datetime-local" name="datanasc"
                            value="{{$funcionarios->datanasc}}" disabled>
                        <label class="userLabel" for="datanasc">
                            <p>Data de Nascimento:</p>
                        </label>
                    </div>
                </form>

                <div class="contentFormAcao">
                    <form class="editFunc" action="{{route('funcionario.edit', $funcionarios->id) }}">
                        <button type="submit">
                            Editar
                        </button>
                    </form>
                    <form class="deleteFunc" id="deleteForm" action="{{route('funcionario.destroy', $funcionarios->id)}}" method="POST">
                        @csrf
                        @method('DELETE')
                        <button type="submit">
                            Excluir
                        </button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</body>

</html>