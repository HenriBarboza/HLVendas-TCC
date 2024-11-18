<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" href="{{ asset('images/cart-shopping-solid.ico') }}" type="image/x-icon">
    @vite(['resources/scss/home.scss', 'resources/css/app.css', 'resources/js/app.js'])
    <title>HLVendas | Editar conta</title>
</head>

<?php 
    $rota = 1;
 ?>

<body>
    @include('components.navbar') 
    <div class="corpo">
        <div class="top">
            <h1>Conta</h1>
            <div class="buscaCliente">
                @livewire('modal-conta-component', compact('rota'))
            </div>
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
                <h3>Compras da conta</h3>
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
                    <h2>Não há compras registrados nessa conta</h2>
                @endif
            </div>
            <div>
                <h3>Vendas da conta</h3>
                @if(count($vendas) > 0)
                    <table>
                        <thead>
                            <tr>
                                <th>Doc</th>
                                <th>Cliente</th>
                                <th>Total da venda</th>
                                <th>Ação</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($vendas as $venda)
                                <tr>
                                    <td>{{$venda->doc}}</td>
                                    <td>{{$venda->cliente->nome}}</td>
                                    <td>{{$venda->totalvenda}}</td>
                                    <td><a href="/venda/{{$venda->id}}">Visualizar</a></td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                @else
                    <h2>Não há vendas registrados nessa conta</h2>
                @endif
            </div>
        </div>
    </div>
    </div>
    </div>
    @include('components.footer') 
</body>

</html>