<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    @vite(['resources/scss/home.scss', 'resources/css/app.css', 'resources/js/app.js'])
    <title>Fornecedor</title>
</head>

<body>
    @include('components.navbar') 
    <div class="corpo">
        <div class="top">
            <h1>Editar Fornecedor</h1>
            <a href="/fornecedor">Buscar fornecedor</a>
        </div>
        <div>
            <form action="{{route('fornecedor.update', $fornecedores->id)}}" method="POST">
                @CSRF
                @method('PUT')
                <div class="">
                    <div class="">
                        <label for="id">Id:</label>
                        <input type="text" name="id" value="{{$fornecedores->pessoa->id}}" disabled>
                    </div>
                    <div class="">
                        <label for="nome">Nome:</label>
                        <input type="text" name="nome" value="{{$fornecedores->pessoa->nome}}" required>
                    </div>
                    <div class="">
                        <label for="nfantasia">Nome Fantasia:</label>
                        <input type="text" name="nfantasia" value="{{$fornecedores->pessoa->nfantasia}}" required>
                    </div>
                    <div class="">
                        <label for="telefone">Telefone:</label>
                        <input type="text" name="telefone" value="{{$fornecedores->pessoa->telefone}}" required>
                    </div>
                    <div class="">
                        <label for="cpfcnpj">CPF/CNPJ:</label>
                        <input type="text" name="cpfcnpj" value="{{$fornecedores->pessoa->cpfcnpj}}" required>
                    </div>
                    <div class="">
                        <label for="logradouro">Logradouro:</label>
                        <input type="text" name="logradouro" value="{{$fornecedores->pessoa->logradouro}}">
                    </div>
                    <div class="">
                        <label for="numero">Número:</label>
                        <input type="text" name="numero" value="{{$fornecedores->pessoa->numero}}">
                    </div>
                    <div class="">
                        <label for="bairro">Bairro:</label>
                        <input type="text" name="bairro" value="{{$fornecedores->pessoa->bairro}}">
                    </div>
                    <div class="">
                        <label for="cidade">Cidade:</label>
                        <input type="text" name="cidade" value="{{$fornecedores->pessoa->cidade}}">
                    </div>
                    <div class="">
                        <label for="cep">CEP:</label>
                        <input type="text" name="cep" value="{{$fornecedores->pessoa->cep}}">
                    </div>
                    <div class="">
                        <label for="estado">Estado:</label>
                        <input type="text" name="estado" value="{{$fornecedores->pessoa->estado}}">
                    </div>
                    <div class="">
                        <label for="datanasc">Data De Nascimento:</label>
                        <input type="date" name="datanasc" value="{{$fornecedores->pessoa->datanasc}}" required>
                    </div>
                    <div class="">
                        <button type="submit">Salvar</button>
                    </div>
                </form>
                </div>
        </div>
    </div>
    </div>
    @include('components.footer') 
</body>

</html>