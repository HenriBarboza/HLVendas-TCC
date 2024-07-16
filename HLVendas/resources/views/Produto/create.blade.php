<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    @vite(['resources/scss/home.scss', 'resources/css/app.css', 'resources/js/app.js'])
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
                        <label for="nome">Nome:</label>
                        <input type="text" name="nome" required>
                    </div>
                    <div class="">
                        <label for="custo">Custo:</label>
                        <input type="number" name="custo" required>
                    </div>
                    <div class="">
                        <label for="preço">Preço:</label>
                        <input type="number" name="preço" required>
                    </div>
                    <div class="">
                        <label for="codigoBarras">Código de Barras:</label>
                        <input type="number" name="codigoBarras">
                    </div>
                    <div class="">
                        <label for="lote">Lote:</label>
                        <input type="text" name="lote" required>
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