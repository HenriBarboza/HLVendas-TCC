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
            <h1>Produto</h1>
            <a href="/produto">Buscar produto</a>
        </div>
        <div>
            <form >
                @CSRF
                @method('PUT')
                <div class="">
                    <div class="">
                        <label for="id">Id:</label>
                        <input type="text" name="id" value="{{$produtos->id}}" disabled>
                    </div>
                    <div class="">
                        <label for="descricao">Descricao:</label>
                        <input type="text" name="descricao" value="{{$produtos->descricao}}" disabled>
                    </div>
                    <div class="">
                        <label for="custo">Custo:</label>
                        <input type="number" id="custo" step="0.01" name="custo" value="{{$produtos->custo}}" disabled>
                    </div>
                    <div class="">
                        <label for="perccusto">Perc. Custo:</label>
                        <input type="number" id="perccusto" step="0.01" name="perccusto" value="{{$produtos->perccusto}}" disabled>
                    </div>
                    <div class="">
                        <label for="precoavista">Preço À Vista:</label>
                        <input type="number" id="precoavista" name="precoavista" step="0.01" value="{{$produtos->precoavista}}" disabled>
                    </div>
                    <div class="">
                        <label for="percprazo">Perc. Prazo:</label>
                        <input type="number" id="percprazo" step="0.01" name="percprazo" value="{{$produtos->percprazo}}" disabled>
                    </div>
                    <div class="">
                        <label for="precoaprazo">Preço À Prazo:</label>
                        <input type="number" id="precoaprazo" step="0.01" name="precoaprazo" value="{{$produtos->precoaprazo}}" disabled>
                    </div>
                    <div class="">
                        <label for="unidade">Unidade:</label>
                        <input type="text" name="unidade" value="{{$produtos->unidade}}" disabled>
                    </div>
                    <div class="">
                        <label for="codigoBarras">Código de Barras:</label>
                        <input type="number" value="{{$produtos->codigoBarras}}" name="codigoBarras" disabled>
                    </div>
                    <div class="">
                        <label for="categoria">Categoria:</label>
                        <input type="text" name="categoria" value="{{$produtos->categoria}}" disabled>
                    </div>
                    <a href="{{route('produto.edit', $produtos->id) }}">Editar</a>
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