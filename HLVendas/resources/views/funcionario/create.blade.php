<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    @vite(['resources/scss/home.scss', 'resources/css/app.css', 'resources/js/app.js'])
    <title>Novo Funcionario</title>
</head>

<body>
    @include('components.navbar') 
    <div class="corpo">
        <div class="top">
            <h1>Novo Funcionario</h1>
            <a href="/funcionario">Buscar funcionario</a>
            @if ($message = Session::get('success'))
                <div class="alert alert-success">
                    {{$message}}
                </div>
            @endif
        </div>
        <div>
            <form method="POST" action="{{ route('funcionario.store') }}">
                @CSRF
                <div class="">
                    <div class="">
                        <label for="nome" >Nome:</label>
                        <input id="nome" type="text" name="nome" required autofocus>
                    </div>
                    <div class="">
                        <label for="email">Email:</label>
                        <input id="email" type="email" name="email" required><button>Verificar</button>
                        <input id="" type="text" name="" placeholder="Apelido" disabled>
                    </div>
                    <div class="">
                        <label for="telefone">Telefone:</label>
                        <input type="text" name="telefone" required>
                    </div>
                    <div class="">
                        <label for="cpfcnpj">CPF/CNPJ:</label>
                        <input type="text" name="cpfcnpj" required>
                    </div>
                    <div class="">
                        <label for="numero">Logradouro:</label>
                        <input type="text" name="logradouro">
                    </div>
                    <div class="">
                        <label for="numero">Número:</label>
                        <input type="text" name="numero">
                    </div>
                    <div class="">
                        <label for="bairro">Bairro:</label>
                        <input type="text" name="bairro">
                    </div>
                    <div class="">
                        <label for="cidade">Cidade:</label>
                        <input type="text" name="cidade">
                    </div>
                    <div class="">
                        <label for="cidade">CEP:</label>
                        <input type="text" name="cep">
                    </div>
                    <div class="">
                        <label for="estado">Estado:</label>
                        <input type="text" name="estado">
                    </div>
                    <div class="">
                        <label for="datanasc">Data De Nascimento:</label>
                        <input type="date" name="datanasc">
                    </div>
                    <div>
                        <label for="tipo">Nivel:</label>
                        <input type="radio" id="normal" value="f" name="tipo" checked>
                        <label for="normal">Normal</label>
                        <input type="radio" id="gerente" value="g" name="tipo">
                        <label for="gerente">Gerente</label><br>
                    </div>
                    <div class="">
                        <input type="number" name="idauth">
                    </div>
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