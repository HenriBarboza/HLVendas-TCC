<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" href="{{ asset('images/cart-shopping-solid.ico') }}" type="image/x-icon">
    @vite(['resources/scss/home.scss', 'resources/css/app.css', 'resources/js/app.js'])
    <title>HLVendas | Visualizar fornecedor</title>
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
                        <input type="text" name="id" value="{{$fornecedores->id}}" disabled>
                    </div>
                    <div class="">
                        <label for="nome">Nome:</label>
                        <input type="text" name="nome" value="{{$fornecedores->nome}}" disabled>
                    </div>
                    <div class="">
                        <label for="nomefantasia">Nome Fantasia:</label>
                        <input type="text" name="nomefantasia" value="{{$fornecedores->nomefantasia}}" disabled>
                    </div>
                    <div class="">
                        <label for="telefone">Telefone:</label>
                        <input type="text" name="telefone" value="{{$fornecedores->telefone}}" disabled>
                    </div>
                    <div class="">
                        <label for="cpfcnpj">CPF/CNPJ:</label>
                        <input type="text" name="cpfcnpj" value="{{$fornecedores->cpfcnpj}}" disabled>
                    </div>
                    <div class="">
                        <label for="logradouro">Logradouro:</label>
                        <input type="text" name="logradouro" value="{{$fornecedores->logradouro}}" disabled>
                    </div>
                    <div class="">
                        <label for="numero">Número:</label>
                        <input type="text" name="numero" value="{{$fornecedores->numero}}" disabled>
                    </div>
                    <div class="">
                        <label for="bairro">Bairro:</label>
                        <input type="text" name="bairro" value="{{$fornecedores->bairro}}" disabled>
                    </div>
                    <div class="">
                        <label for="cidade">Cidade:</label>
                        <input type="text" name="cidade" value="{{$fornecedores->cidade}}" disabled>
                    </div>
                    <div class="">
                        <label for="cep">CEP:</label>
                        <input type="text" name="cep" value="{{$fornecedores->cep}}" disabled>
                    </div>
                    <div class="">
                        <label for="estado">Estado:</label>
                        <input type="text" name="estado" value="{{$fornecedores->estado}}" disabled>
                    </div>
                    <div class="">
                        <label for="created_at">Data De Cadastro:</label>
                        <input type="datetime-local" name="created_at" value="{{$fornecedores->created_at}}" disabled>
                    </div>
                    <div class="">
                        <label for="updated_at">Última Alteração:</label>
                        <input type="datetime-local" name="updated_at" value="{{$fornecedores->updated_at}}" disabled>
                    </div>
                    <div class="">
                        <label for="ultimavenda">Última Venda:</label>
                        <input type="datetime-local" name="ultimavenda" value="{{$fornecedores->ultimavenda}}" disabled>
                    </div>
                    <div class="">
                        <label for="totalvendido">Total vendio:</label>
                        <input type="number" name="totalvendido" value="{{$fornecedores->totalvendido}}" disabled>
                    </div>
                    <a href="{{route('fornecedor.edit', $fornecedores->id) }}">Editar</a>
            </form>
            <form action="{{route('fornecedor.destroy', $fornecedores->id)}}" method="POST">
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