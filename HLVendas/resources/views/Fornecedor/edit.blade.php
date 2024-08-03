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
                        <input type="text" name="id" value="{{$fornecedores->id}}" disabled>
                    </div>
                    <div class="">
                        <label for="nome">Nome:</label>
                        <input type="text" name="nome" value="{{$fornecedores->nome}}" required>
                    </div>
                    <div class="">
                        <label for="nfantasia">Nome Fantasia:</label>
                        <input type="text" name="nfantasia" value="{{$fornecedores->nfantasia}}" required>
                    </div>
                    <div class="">
                        <label for="telefone">Telefone:</label>
                        <input type="text" name="telefone" value="{{$fornecedores->telefone}}" required>
                    </div>
                    <div class="">
                        <label for="celular">Celular:</label>
                        <input type="text" name="celular" value="{{$fornecedores->celular}}" required>
                    </div>
                    <div class="">
                        <label for="cpfcnpj">CPF/CNPJ:</label>
                        <input type="text" name="cpfcnpj" value="{{$fornecedores->cpfcnpj}}" required>
                    </div>
                    <div class="">
                        <label for="rgi">RG/Insc. Estadual:</label>
                        <input type="text" value="{{$fornecedores->rgi}}" name="rgi">
                    </div>
                    <div class="">
                        <label for="logradouro">Logradouro:</label>
                        <input type="text" name="logradouro" value="{{$fornecedores->logradouro}}">
                    </div>
                    <div class="">
                        <label for="numero">Número:</label>
                        <input type="text" name="numero" value="{{$fornecedores->numero}}">
                    </div>
                    <div class="">
                        <label for="bairro">Bairro:</label>
                        <input type="text" name="bairro" value="{{$fornecedores->bairro}}">
                    </div>
                    <div class="">
                        <label for="cidade">Cidade:</label>
                        <input type="text" name="cidade" value="{{$fornecedores->cidade}}">
                    </div>
                    <div class="">
                        <label for="cep">CEP:</label>
                        <input type="text" name="cep" value="{{$fornecedores->cep}}">
                    </div>
                    <div class="">
                        <label for="estado">Estado:</label>
                        <input type="text" name="estado" value="{{$fornecedores->estado}}">
                    </div>
                    <div class="">
                        <label for="pais">País:</label>
                        <input type="text" name="pais" value="{{$fornecedores->pais}}">
                    </div>
                    <div class="">
                        <label for="datanasc">Data De Nascimento:</label>
                        <input type="date" name="datanasc" value="{{$fornecedores->datanasc}}" required>
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