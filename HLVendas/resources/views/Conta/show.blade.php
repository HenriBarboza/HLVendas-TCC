<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" href="{{ asset('images/cart-shopping-solid.ico') }}" type="image/x-icon">
    @vite(['resources/scss/conta.scss', 'resources/css/app.css', 'resources/js/app.js', 'resources/js/loadingPage.js', 'resources/scss/tableBusca.scss'])
    <title>HLVendas | Editar conta</title>
</head>

<?php 
    $rota = 1;
 ?>

<body>
    <div class="contentConta">
        <div class="box">
            @include('components.navbar')
        </div>
        <div class="loader">
            <div class="loading"></div>
        </div>

        <div class="contaCrud">
            <div class="contentForms">
                <div class="contentButton">
                    <div class="newConta">
                        <h1 class="title"> Visualizar Conta</h1>
                    </div>

                    <div class="buttonBack">
                        <a class="return" href="{{route('conta.create')}}">Voltar</a>
                    </div>
                </div>
                <form class="formConta">
                    @CSRF
                    @method('PUT')
                    <div class="contentInput">
                        <input class="inputWrapper showConta" type="text" name="id" value="{{$contas->id}}" disabled>
                        <label class="userLabel" for="id">
                            <p>Id:</p>
                        </label>
                    </div>
                    <div class="contentInput">
                        <input class="inputWrapper showConta" type="text" name="nome" value="{{$contas->nome}}"
                            disabled>
                        <label class="userLabel" for="nome">
                            <p>Nome:</p>
                        </label>
                    </div>
                    <div class="contentInput">
                        <input class="inputWrapper showConta" type="text" name="nome" value="{{$contas->total}}"
                            disabled>
                        <label class="userLabel" for="nome">
                            <p>Total da conta:</p>
                        </label>
                    </div>
                    <div class="contentInput">
                        <input class="inputWrapper showConta" type="text" name="nome" value="{{$contas->updated_at}}"
                            disabled>
                        <label class="userLabel" for="nome">
                            <p>Data de última movimentação:</p>
                        </label>
                    </div>
                    <div class="contentInput">
                        <input class="inputWrapper showConta" type="text" name="nome"
                            value="{{$contas->funcionario->nome}}" disabled>
                        <label class="userLabel" for="nome">
                            <p>Última movimentação feita por:</p>
                        </label>
                    </div>
                </form>
                <div class="contentFormAcao content02">
                    <form action="{{route('conta.edit', $contas->id)}}" class="editConta">
                        <button type="submit">
                            Editar
                        </button>
                    </form>
                </div>
                <div class="formConta">
                    <div class="contaShowTable">
                        <div class="tableCompra">
                            <h3 class="subtitle">Compras da conta</h3>
                            @if(count($compras) > 0)
                                <div class="tableHead">
                                    <table>
                                        <thead>
                                            <tr>
                                                <th>Doc</th>
                                                <th>Fornecedor</th>
                                                <th>Total da compra</th>
                                                <th>Ação</th>
                                            </tr>
                                        </thead>
                                    </table>
                                </div>
                                <div class="tableBody">
                                    <table>
                                        <tbody>
                                            @foreach ($compras as $compra)
                                                <tr>
                                                    <td>{{$compra->doc}}</td>
                                                    <td>{{$compra->fornecedor->nome}}</td>
                                                    <td>{{$compra->totalcompra}}</td>
                                                    <td class="acao"><a href="/compra/{{$compra->id}}">Visualizar</a></td>
                                                </tr>
                                            @endforeach
                                        </tbody>
                                    </table>
                                </div>
                            @else
                                <h2>Não há compras registrados nessa conta</h2>
                            @endif
                        </div>

                        <div class="tableVenda">
                            <h3 class="subtitle">Vendas da conta</h3>
                            @if(count($vendas) > 0)
                                <div class="tableHead">
                                    <table>
                                        <thead>
                                            <tr>
                                                <th>Doc</th>
                                                <th>Cliente</th>
                                                <th>Total da venda</th>
                                                <th>Ação</th>
                                            </tr>
                                        </thead>
                                    </table>
                                </div>

                                <div class="tableBody">
                                    <table>
                                        <tbody>
                                            @foreach ($vendas as $venda)
                                                <tr>
                                                    <td>{{$venda->doc}}</td>
                                                    <td>{{$venda->cliente->nome}}</td>
                                                    <td>{{$venda->totalvenda}}</td>
                                                    <td class="acao"><a href="/venda/{{$venda->id}}">Visualizar</a></td>
                                                </tr>
                                            @endforeach
                                        </tbody>
                                    </table>
                                </div>
                            @else
                                <h2>Não há vendas registrados nessa conta</h2>
                            @endif
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>

</html>