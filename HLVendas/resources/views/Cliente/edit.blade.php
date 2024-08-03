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
            <h1>Editar Cliente</h1>
            <a href="/cliente">Buscar cliente</a>
        </div>
        <div>
            <form action="{{route('cliente.update', $clientes->id)}}" method="POST">
                @CSRF
                @method('PUT')
                <div class="">
                    <div class="">
                        <label for="id">Id:</label>
                        <input type="text" name="id" value="{{$clientes->id}}" disabled>
                    </div>
                    <div class="">
                        <label for="nome">Nome:</label>
                        <input type="text" name="nome" value="{{$clientes->nome}}" required>
                    </div>
                    <div class="">
                        <label for="nfantasia">Nome Fantasia:</label>
                        <input type="text" name="nfantasia" value="{{$clientes->nfantasia}}" required>
                    </div>
                    <div class="">
                        <label for="telefone">Telefone:</label>
                        <input type="text" name="telefone" value="{{$clientes->telefone}}" required>
                    </div>
                    <div class="">
                        <label for="celular">Celular:</label>
                        <input type="text" name="celular" value="{{$clientes->celular}}" required>
                    </div>
                    <div class="">
                        <label for="cpfcnpj">CPF/CNPJ:</label>
                        <input type="text" name="cpfcnpj" value="{{$clientes->cpfcnpj}}" required>
                    </div>
                    <div class="">
                        <label for="rgi">RG/Insc. Estadual:</label>
                        <input type="text" value="{{$clientes->rgi}}" name="rgi">
                    </div>
                    <div class="">
                        <label for="logradouro">Logradouro:</label>
                        <input type="text" name="logradouro" value="{{$clientes->logradouro}}">
                    </div>
                    <div class="">
                        <label for="numero">Número:</label>
                        <input type="text" name="numero" value="{{$clientes->numero}}">
                    </div>
                    <div class="">
                        <label for="bairro">Bairro:</label>
                        <input type="text" name="bairro" value="{{$clientes->bairro}}">
                    </div>
                    <div class="">
                        <label for="cidade">Cidade:</label>
                        <input type="text" name="cidade" value="{{$clientes->cidade}}">
                    </div>
                    <div class="">
                        <label for="cep">CEP:</label>
                        <input type="text" name="cep" value="{{$clientes->cep}}">
                    </div>
                    <div class="">
                        <label for="estado">Estado:</label>
                        <input type="text" name="estado" value="{{$clientes->estado}}">
                    </div>
                    <div class="">
                        <label for="pais">País:</label>
                        <input type="text" name="pais" value="{{$clientes->pais}}">
                    </div>
                    <div class="">
                        <label for="datanasc">Data De Nascimento:</label>
                        <input type="date" name="datanasc" value="{{$clientes->datanasc}}" required>
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