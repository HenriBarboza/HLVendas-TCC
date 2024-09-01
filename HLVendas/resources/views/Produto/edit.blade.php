<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    @vite(['resources/scss/home.scss', 'resources/css/app.css', 'resources/js/app.js'])
    <title>Produto</title>
</head>

<body>
    @include('components.navbar') 
    <div class="corpo">
        <div class="top">
            <h1>Novo Produto</h1>
            <a href="/produto">Buscar produto</a>
        </div>
        <div>
            <form action="{{route('produto.update', $produtos->id)}}" method="POST">
                @CSRF
                @method('PUT')
                <div class="">
                    <div class="">
                        <label for="id">Id:</label>
                        <input type="text" name="id" value="{{$produtos->id}}" disabled>
                    </div>
                    <div class="">
                        <label for="nome">Nome:</label>
                        <input type="text" name="nome" value="{{$produtos->nome}}" required>
                    </div>
                    <div class="">
                        <label for="custo">Custo:</label>
                        <input type="number" name="custo" value="{{$produtos->custo}}" required>
                    </div>
                    <div class="">
                        <label for="preço">Preço:</label>
                        <input type="number" name="preço" value="{{$produtos->preço}}" required>
                    </div>
                    <div class="">
                        <label for="codigoBarras">Código de Barras:</label>
                        <input type="number" value="{{$produtos->codigoBarras}}" name="codigoBarras">
                    </div>
                    <div class="">
                        <label for="lote">Lote:</label>
                        <input type="text" name="lote" value="{{$produtos->lote}}">
                    </div>
                    <div class="">
                        <label for="categoria">Categoria:</label>
                        <input type="text" name="categoria" value="{{$produtos->categoria}}" required>
                    </div>
                    <div class="">
                        <button type="submit">Editar</button>
                    </div>
                </form>
                <form action="{{route('produto.destroy', $produtos->id)}}" method="POST">
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