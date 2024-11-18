<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" href="{{ asset('images/cart-shopping-solid.ico') }}" type="image/x-icon">
    @vite(['resources/scss/funcionario.scss', 'resources/css/app.css', 'resources/js/app.js'])
    <title>HLVendas | Editar funcionário</title>
</head>

<body>
    @include('components.navbar') 
    <div class="corpo">
        <div class="top">
            <h1>Fornecedor</h1>
            <a href="/fornecedor">Buscar fornecedor</a>
        </div>
        <div>
            <form action="{{route('funcionario.update', $funcionarios->id)}}" method="POST">
                @CSRF
                @method('PUT')
                <div class="">
                    <div class="">
                        <label for="id">Id:</label>
                        <input type="text" name="id" value="{{$funcionarios->id}}">
                    </div>
                    <div class="">
                        <label for="nome">Nome:</label>
                        <input type="text" name="nome" value="{{$funcionarios->nome}}">
                    </div>
                    <div class="">
                        <label for="email">Email:</label>
                        <input type="text" name="email" value="{{$funcionarios->email}}">
                    </div>
                    <div class="">
                        <label for="telefone">Telefone:</label>
                        <input type="text" name="telefone" value="{{$funcionarios->telefone}}">
                    </div>
                    <div class="">
                        <label for="cpfcnpj">CPF/CNPJ:</label>
                        <input type="text" name="cpfcnpj" value="{{$funcionarios->cpfcnpj}}">
                    </div>
                    <div class="">
                        <label for="logradouro">Logradouro:</label>
                        <input type="text" name="logradouro" value="{{$funcionarios->logradouro}}">
                    </div>
                    <div class="">
                        <label for="numero">Número:</label>
                        <input type="text" name="numero" value="{{$funcionarios->numero}}">
                    </div>
                    <div class="">
                        <label for="bairro">Bairro:</label>
                        <input type="text" name="bairro" value="{{$funcionarios->bairro}}">
                    </div>
                    <div class="">
                        <label for="cidade">Cidade:</label>
                        <input type="text" name="cidade" value="{{$funcionarios->cidade}}">
                    </div>
                    <div class="">
                        <label for="cep">CEP:</label>
                        <input type="text" name="cep" value="{{$funcionarios->cep}}">
                    </div>
                    <div class="">
                        <label for="estado">Estado:</label>
                        <input type="text" name="estado" value="{{$funcionarios->estado}}">
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