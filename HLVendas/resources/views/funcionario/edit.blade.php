<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" href="{{ asset('images/cart-shopping-solid.ico') }}" type="image/x-icon">
    @vite(['resources/scss/funcionario.scss', 'resources/css/app.css', 'resources/js/app.js', 'resources/js/loadingPage.js'])
    <title>HLVendas | Editar funcionário</title>
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
                    <div class="newFuncionario">
                        <h1 class="title">Editar Funcionário</h1>
                    </div>

                    <div class="buttonBack">
                        <a class="return" href="{{route('funcionario.create')}}">Cancelar</a>
                    </div>
                </div>

                <form class="formFuncionario" action="{{route('funcionario.update', $funcionarios->id)}}" method="POST">
                    @CSRF
                    @method('PUT')
                    <div class="contentInput">
                        <input class="inputWrapper placeholderActive" type="text" name="id" value="{{$funcionarios->id}}" disabled>
                        <label class="userLabel" for="id">
                            <p>Id:</p>
                        </label>
                    </div>
                    <div class="contentInput">
                        <input class="inputWrapper" type="text" name="nome" value="{{$funcionarios->nome}}">
                        <label class="userLabel" for="nome">
                            <p>Nome:</p>
                        </label>
                    </div>
                    <div class="contentInput">
                        <input class="inputWrapper" type="text" name="email" value="{{$funcionarios->email}}">
                        <label class="userLabel" for="email">
                            <p>Email:</p>
                        </label>
                    </div>
                    <div class="contentInput">
                        <div class="inputGroup">
                            <input class="inputWrapper" type="text" name="telefone" value="{{$funcionarios->telefone}}">
                            <label class="userLabel" for="telefone">
                                <p>Telefone:</p>
                            </label>
                        </div>

                        <div class="inputGroup">
                            <input class="inputWrapper" type="text" name="cpfcnpj" value="{{$funcionarios->cpfcnpj}}">
                            <label class="userLabel" for="cpfcnpj">
                                <p>CPF/CNPJ:</p>
                            </label>
                        </div>
                    </div>
                    <div class="contentInput">
                        <input class="inputWrapper" type="text" name="logradouro" value="{{$funcionarios->logradouro}}">
                        <label class="userLabel" for="logradouro">
                            <p>Logradouro:</p>
                        </label>
                    </div>
                    <div class="contentInput">
                        <div class="inputGroup">
                            <input class="inputWrapper" type="text" name="numero" value="{{$funcionarios->numero}}">
                            <label class="userLabel" for="numero">
                                <p>Número:</p>
                            </label>
                        </div>

                        <div class="inputGroup">
                            <input class="inputWrapper" type="text" name="bairro" value="{{$funcionarios->bairro}}">
                            <label class="userLabel" for="bairro">
                                <p>Bairro:</p>
                            </label>
                        </div>
                    </div>
                    <div class="contentInput">
                        <input class="inputWrapper" type="text" name="cidade" value="{{$funcionarios->cidade}}">
                        <label class="userLabel" for="cidade">
                            <p>Cidade:</p>
                        </label>
                    </div>
                    <div class="contentInput">
                        <div class="inputGroup">
                            <input class="inputWrapper" type="text" name="cep" value="{{$funcionarios->cep}}">
                            <label class="userLabel" for="cep">
                                <p>CEP:</p>
                            </label>
                        </div>

                        <div class="inputGroup">
                            <input class="inputWrapper" type="text" name="estado" value="{{$funcionarios->estado}}">
                            <label class="userLabel" for="estado">
                                <p>Estado:</p>
                            </label>
                        </div>
                    </div>
                    <div class="contentInput">
                        <input class="inputWrapper" type="date" name="datanasc" value="{{$funcionarios->datanasc}}">
                        <label class="userLabel" for="datanasc">
                            <p>Data de Nascimento:</p>
                        </label>
                    </div>
                    <div class="contentInput radio">
                        <p class="text"><label for="tipo">Nivel:</label></p>
                        <input type="radio" id="normal" value="f" name="tipo" {{$funcionarios->tipo == 'f' ? 'checked' : ''}}>
                        <p class="text"><label for="normal">Normal</label></p>
                        <input type="radio" id="gerente" value="g" name="tipo" {{$funcionarios->tipo == 'g' ? 'checked' : ''}}>
                        <p class="text"><label for="gerente">Gerente</label><br></p>
                    </div>

                    <div class="contentInput radio">
                        <p class="text"><label for="status">Situação:</label></p>
                        <input type="radio" id="ativo" value="a" name="status" {{$funcionarios->status == 'a' ? 'checked' : ''}}>
                        <p class="text"><label for="ativo">Ativo</label></p>
                        <input type="radio" id="inativo" value="i" name="status" {{$funcionarios->status == 'i' ? 'checked' : ''}}>
                        <p class="text"><label for="inativo">Inativo</label><br></p>
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
</body>

</html>