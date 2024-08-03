<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    @vite(['resources/scss/home.scss', 'resources/css/app.css', 'resources/js/app.js'])
    <title>Buscar Produto</title>
</head>

<body>
    @include('components.navbar') 
    <div class="corpo">
        <div class="top">
            <h1>Buscar Produto</h1>
            <a href="/produto/create">Novo produto</a><br>
        </div>
        <div>
            <table>
                <thead>
                    <tr>
                        <th></th>
                        <th>ID</th>
                        <th>Descricao</th>
                        <th>Custo</th>
                        <th>Preço AV</th>
                        <th>Preço AP</th>
                        <th>Categoria</th>
                        <th>Estoque</th>
                        <th></th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($produtos as $produto)
                        <tr>
                            <td><input type="checkbox"></td>
                            <td>{{$produto->id}}</td>
                            <td>{{$produto->descricao}}</td>
                            <td>{{$produto->custo}}</td>
                            <td>{{$produto->precoavista}}</td>
                            <td>{{$produto->precoaprazo}}</td>
                            <td>{{$produto->categoria}}</td>
                            <td>{{$produto->estoque}}</td>
                            <td><a href="{{route('produto.show', $produto->id) }}">Visualizar</a></td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
    </div>
    @include('components.footer') 
</body>

</html>