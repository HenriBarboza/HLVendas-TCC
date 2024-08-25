<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    @vite(['resources/scss/home.scss', 'resources/css/app.css', 'resources/js/app.js'])
    <title>Novo Cliente</title>
</head>

<body>
    @include('components.navbar') 
    <div class="corpo">
        <div class="top">
            <h1>Novo Cliente</h1>
            <a href="/cliente">Buscar cliente</a>
            @if ($message = Session::get('success'))
                <div class="alert alert-success">
                    {{$message}}
                </div>
            @endif
        </div>
        <div>
            <form action="{{route('cliente.store')}}" method="POST">
                @CSRF
                <div class="">
                    <input type="number" value="{{$novoid}}" name="idpessoa" hidden>
                    <div class="">
                        <label for="nome">Nome:</label>
                        <input type="text" name="nome" required>
                    </div>
                    <div class="">
                        <label for="nfantasia">Nome Fantasia:</label>
                        <input type="text" name="nfantasia">
                    </div>
                    <div class="">
                        <label for="telefone">Telefone:</label>
                        <input type="text" name="telefone">
                    </div>
                    <div class="">
                        <label for="cpfcnpj">CPF/CNPJ:</label>
                        <input type="text" name="cpfcnpj" required>
                    </div>
                    <div class="">
                        <label for="numero">Logradouro:</label>
                        <input type="text" name="logradouro" required>
                    </div>
                    <div class="">
                        <label for="numero">Número:</label>
                        <input type="text" name="numero" required>
                    </div>
                    <div class="">
                        <label for="bairro">Bairro:</label>
                        <input type="text" name="bairro" required>
                    </div>
                    <div class="">
                        <label for="cidade">Cidade:</label>
                        <input type="text" name="cidade" required>
                    </div>
                    <div class="">
                        <label for="cidade">CEP:</label>
                        <input type="text" name="cep">
                    </div>
                    <div class="">
                        <label for="estado">Estado:</label>
                        <input type="text" name="estado" required>
                    </div>
                    <div class="">
                        <label for="datanasc">Data De Nascimento:</label>
                        <input type="date" name="datanasc" required>
                    </div>
                    <input type="text" name="tipo" value="C" hidden required>
                    <div class="">
                        <button type="submit">Salvar</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
    </div>
    @include('components.footer') 
</body>

</html>