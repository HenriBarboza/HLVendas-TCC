<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    @vite(['resources/scss/home.scss', 'resources/css/app.css', 'resources/js/app.js'])
    <title>Cliente</title>
</head>

<body>
    @include('components.navbar') 
    <div class="corpo">
        <div class="top">
            <h1>Cliente</h1>
            <a href="/cliente">Buscar cliente</a>
        </div>
        <div>
            <form>
                @CSRF
                @method('PUT')
                <div class="">
                    <div class="">
                        <label for="id">Id:</label>
                        <input type="text" name="id" value="{{$clientes->id}}" disabled>
                    </div>
                    <div class="">
                        <label for="nome">Nome:</label>
                        <input type="text" name="nome" value="{{$clientes->nome}}" disabled>
                    </div>
                    <div class="">
                        <label for="telefone">Telefone:</label>
                        <input type="text" name="telefone" value="{{$clientes->telefone}}" disabled>
                    </div>
                    <div class="">
                        <label for="cpfcnpj">CPF/CNPJ:</label>
                        <input type="text" name="cpfcnpj" value="{{$clientes->cpfcnpj}}" disabled>
                    </div>
                    <div class="">
                        <label for="logradouro">Logradouro:</label>
                        <input type="text" name="logradouro" value="{{$clientes->logradouro}}" disabled>
                    </div>
                    <div class="">
                        <label for="numero">Número:</label>
                        <input type="text" name="numero" value="{{$clientes->numero}}" disabled>
                    </div>
                    <div class="">
                        <label for="bairro">Bairro:</label>
                        <input type="text" name="bairro" value="{{$clientes->bairro}}" disabled>
                    </div>
                    <div class="">
                        <label for="cidade">Cidade:</label>
                        <input type="text" name="cidade" value="{{$clientes->cidade}}" disabled>
                    </div>
                    <div class="">
                        <label for="cep">CEP:</label>
                        <input type="text" name="cep" value="{{$clientes->cep}}" disabled>
                    </div>
                    <div class="">
                        <label for="estado">Estado:</label>
                        <input type="text" name="estado" value="{{$clientes->estado}}" disabled>
                    </div>
                    <div class="">
                        <label for="datanasc">Data De Nascimento:</label>
                        <input type="date" name="datanasc" value="{{$clientes->datanasc}}" disabled>
                    </div>
                    <div class="">
                        <label for="created_at">Data De Cadastro:</label>
                        <input type="datetime-local" name="created_at" value="{{$clientes->created_at}}" disabled>
                    </div>
                    <div class="">
                        <label for="updated_at">Última Alteração:</label>
                        <input type="datetime-local" name="updated_at" value="{{$clientes->updated_at}}" disabled>
                    </div>
                    <div class="">
                        <label for="ultimacompra">Última Compra:</label>
                        <input type="datetime-local" name="ultimacompra" value="{{$clientes->ultimacompra}}" disabled>
                    </div>
                    <div class="">
                        <label for="totalgasto">Total gasto:</label>
                        <input type="number" name="totalgasto" value="{{$clientes->totalgasto}}" disabled>
                    </div>
                    <a href="{{route('cliente.edit', $clientes->id) }}">Editar</a>
            </form>
            <form action="{{route('cliente.destroy', $clientes->id)}}" method="POST">
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