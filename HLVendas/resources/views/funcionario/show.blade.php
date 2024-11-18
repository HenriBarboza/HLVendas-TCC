<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" href="{{ asset('images/cart-shopping-solid.ico') }}" type="image/x-icon">
    @vite(['resources/scss/funcionario.scss', 'resources/css/app.css', 'resources/js/app.js'])
    <title>HLVendas | Visualizar funcionário</title>
</head>

<body>
    @include('components.navbar') 
    <div class="corpo">
        <div class="top">
            <h1>Fornecedor</h1>
            <a href="/fornecedor">Buscar fornecedor</a>
        </div>
        <div>
            <form>
                @CSRF
                @method('PUT')
                <div class="">
                    <div class="">
                        <label for="id">Id:</label>
                        <input type="text" name="id" value="{{$funcionarios->id}}" disabled>
                    </div>
                    <div class="">
                        <label for="nome">Nome:</label>
                        <input type="text" name="nome" value="{{$funcionarios->nome}}" disabled>
                    </div>
                    <div class="">
                        <label for="email">Email:</label>
                        <input type="text" name="email" value="{{$funcionarios->email}}" disabled>
                    </div>
                    <div class="">
                        <label for="telefone">Telefone:</label>
                        <input type="text" name="telefone" value="{{$funcionarios->telefone}}" disabled>
                    </div>
                    <div class="">
                        <label for="cpfcnpj">CPF/CNPJ:</label>
                        <input type="text" name="cpfcnpj" value="{{$funcionarios->cpfcnpj}}" disabled>
                    </div>
                    <div class="">
                        <label for="logradouro">Logradouro:</label>
                        <input type="text" name="logradouro" value="{{$funcionarios->logradouro}}" disabled>
                    </div>
                    <div class="">
                        <label for="numero">Número:</label>
                        <input type="text" name="numero" value="{{$funcionarios->numero}}" disabled>
                    </div>
                    <div class="">
                        <label for="bairro">Bairro:</label>
                        <input type="text" name="bairro" value="{{$funcionarios->bairro}}" disabled>
                    </div>
                    <div class="">
                        <label for="cidade">Cidade:</label>
                        <input type="text" name="cidade" value="{{$funcionarios->cidade}}" disabled>
                    </div>
                    <div class="">
                        <label for="cep">CEP:</label>
                        <input type="text" name="cep" value="{{$funcionarios->cep}}" disabled>
                    </div>
                    <div class="">
                        <label for="estado">Estado:</label>
                        <input type="text" name="estado" value="{{$funcionarios->estado}}" disabled>
                    </div>
                    <div class="">
                        <label for="created_at">Data De Cadastro:</label>
                        <input type="datetime-local" name="created_at" value="{{$funcionarios->created_at}}" disabled>
                    </div>
                    <div class="">
                        <label for="updated_at">Última Alteração:</label>
                        <input type="datetime-local" name="updated_at" value="{{$funcionarios->updated_at}}" disabled>
                    </div>
                    <a href="{{route('funcionario.edit', $funcionarios->id) }}">Editar</a>
            </form>
            <form action="{{route('funcionario.destroy', $funcionarios->id)}}" method="POST">
                @csrf
                @method('DELETE')
                <div class="">
                    <div class="">
                        <button type="submit">Excluir</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
    </div>
    </div>
    @include('components.footer') 
</body>

</html>