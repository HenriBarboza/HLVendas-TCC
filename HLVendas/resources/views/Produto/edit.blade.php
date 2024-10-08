<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    @vite(['resources/scss/home.scss', 'resources/css/app.css', 'resources/js/app.js', 'resources/js/calculoCusto.js'])
    <title>Produto</title>
</head>

<body>
    @include('components.navbar') 
    <div class="corpo">
        <div class="top">
            <h1>Editar Produto</h1>
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
                        <label for="descricao">Descricao:</label>
                        <input type="text" name="descricao" value="{{$produtos->descricao}}" required>
                    </div>
                    <div class="">
                        <label for="custo">Custo:</label>
                        <input type="number" id="custo" step="0.01" name="custo" value="{{$produtos->custo}}" required>
                    </div>
                    <div class="">
                        <label for="perccusto">Perc. Custo:</label>
                        <input type="number" id="perccusto" step="0.01" name="perccusto" value="{{$produtos->perccusto}}" required>
                    </div>
                    <div class="">
                        <label for="precoavista">Preço À Vista:</label>
                        <input type="number" id="precoavista" name="precoavista" step="0.01" value="{{$produtos->precoavista}}" required>
                    </div>
                    <div class="">
                        <label for="percprazo">Perc. Prazo:</label>
                        <input type="number" id="percprazo" step="0.01" name="percprazo" value="{{$produtos->percprazo}}" required>
                    </div>
                    <div class="">
                        <label for="precoaprazo">Preço À Prazo:</label>
                        <input type="number" id="precoaprazo" step="0.01" name="precoaprazo" value="{{$produtos->precoaprazo}}" required>
                    </div>
                    <div class="">
                        <label for="unidade">Unidade:</label>
                        <input type="text" name="unidade" value="{{$produtos->unidade}}" required>
                    </div>
                    <div class="">
                        <label for="codigoBarras">Código de Barras:</label>
                        <input type="number" value="{{$produtos->codigoBarras}}" name="codigoBarras">
                    </div>
                    <div class="">
                        <label for="categoria">Categoria:</label>
                        <input type="text" name="categoria" value="{{$produtos->categoria}}" required>
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