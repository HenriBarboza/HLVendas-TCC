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
                        <input type="text" name="id" value="{{$contas->id}}" disabled>
                    </div>
                    <div class="">
                        <label for="nome">Nome:</label>
                        <input type="text" name="nome" value="{{$contas->nome}}" disabled>
                    </div>
                    <div class="">
                        <label for="nome">Total da conta:</label>
                        <input type="text" name="nome" value="{{$contas->total}}" disabled>
                    </div>
                    <div class="">
                        <label for="nome">Data de última movimentação:</label>
                        <input type="text" name="nome" value="{{$contas->updated_at}}" disabled>
                    </div>
                    <div class="">
                        <label for="nome">Última movimentação feita por:</label>
                        <input type="text" name="nome" value="{{$contas->funcionario->nome}}" disabled>
                    </div>
                    <a href="{{route('conta.edit', $contas->id) }}">Editar</a>
            </form>
            <div>
                <h3>Documentos da conta</h3>
                @if(count($compras) > 0)
                    <table>
                        <thead>
                            <tr>
                                <th>Doc</th>
                                <th>Fornecedor</th>
                                <th>Total da compra</th>
                                <th>Ação</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($compras as $compra)
                                <tr>
                                    <td>{{$compra->doc}}</td>
                                    <td>{{$compra->fornecedor->nome}}</td>
                                    <td>{{$compra->totalcompra}}</td>
                                    <td><a href="/compra/{{$compra->id}}">Visualizar</a></td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                @else
                    <h2>Não há documentos registrados nessa compra</h2>
                @endif
            </div>
        </div>
    </div>
    </div>
    </div>
    @include('components.footer') 
</body>

</html>