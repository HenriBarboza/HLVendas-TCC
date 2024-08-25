<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    @vite(['resources/scss/home.scss', 'resources/css/app.css', 'resources/js/app.js', 'resources/js/calculoCusto.js'])

    <title>Novo Produto</title>
</head>

<body>
    @include('components.navbar') 
    <div class="corpo">
        <div class="top">
            <h1>Novo Produto</h1>
            <a href="/produto">Buscar produto</a>
            @if ($message = Session::get('success'))
                <div class="alert alert-success">
                    {{$message}}
                </div>
            @endif
        </div>
        <div>
            <form action="{{route('produto.store')}}" method="POST">
                @CSRF
                <div class="">
                    <div class="">
                        <label for="descricao">Descricao:</label>
                        <input type="text" name="descricao" required autofocus>
                    </div>
                    <div class="">
                        <label for="custo">Custo:</label>
                        <input type="number" id="custo" step="0.01" name="custo" required>
                    </div>
                    <div class="">
                        <label for="perccusto">Perc. Custo:</label>
                        <input type="number" id="perccusto" step="0.01" name="perccusto" required>
                    </div>
                    <div class="">
                        <label for="precoavista">Preço À Vista:</label>
                        <input type="number" id="precoavista" name="precoavista" step="0.01"  required>
                    </div>
                    <div class="">
                        <label for="percprazo">Perc. Prazo:</label>
                        <input type="number" id="percprazo" step="0.01" name="percprazo" required>
                    </div>
                    <div class="">
                        <label for="precoaprazo">Preço À Prazo:</label>
                        <input type="number" id="precoaprazo" step="0.01" name="precoaprazo"  required>
                    </div>
                    <div class="">
                        <label for="unidade">Unidade:</label>
                        <input type="text" name="unidade" required>
                    </div>
                    <div class="">
                        <label for="codigoBarras">Código de Barras:</label>
                        <input type="number" name="codigoBarras">
                    </div>
                    <div class="">
                        <label for="categoria">Categoria:</label>
                        <input type="text" name="categoria" required>
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