<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    @livewireStyles
    <script src="https://cdn.jsdelivr.net/npm/alpinejs@3.x.x/dist/cdn.min.js" defer></script>
    <link rel="icon" href="{{ asset('images/cart-shopping-solid.ico') }}" type="image/x-icon">
    @vite(['resources/scss/compra.scss', 'resources/css/app.css', 'resources/js/app.js', 'resources/js/buttonSelect.js', 'resources/js/inputValidation.js', 'resources/js/placeholder.js', 'resources/js/selectPagamento.js', 'resources/js/printPdf.js'])
    <title>HLVendas | Visualizar pagamento</title>
</head>

<body>
    <div class="contentCompra">
        <div class="box not-print">
            @include('components.navbar')
        </div>

        <!-- <div class="contentCompra"> -->
        <div class="compraCrud">
            <div class="contentForms">
                <div class="contentButton">
                    <h1 class="not-print">Pagamento</h1>
                    <div class="newCompra">
                        <div class="button">
                            <button>
                                <a href="/venda">
                                    <p class="text not-print">Nova venda</p>
                                </a>
                            </button>
                            <button>
                                <a href={{route('venda.show', $pagamentos[0]->vendaid)}}>
                                    <p class="text not-print">Ver venda</p>
                                </a>
                            </button>
                            <button id="download-btn">
                                <p class="text not-print">Imprimir</p>
                            </button>
                        </div>
                    </div>
                </div>
                <table>
                    <thead>
                        <tr>
                            <th>Parcela</th>
                            <th>Nome do cliente</th>
                            <th>Número da transação</th>
                            <th>Valor da venda</th>
                            <th>Valor da pago</th>
                            <th>Valor da parcela</th>
                            <th>Tabela de preço</th>
                            <th>Data de baixa</th>
                            <th>Condição de pagamento</th>
                            <th>Troco</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($pagamentos as $pagamento)
                            <tr>
                                <td>{{$pagamento->parcela}}</td>
                                <td>{{$pagamento->venda->cliente->nome}}</td>
                                <td>{{$pagamento->numerotransacao}}</td>
                                <td>R${{$pagamento->valorvenda}}</td>
                                <td>R${{$pagamento->valorpago}}</td>
                                <td>R${{$pagamento->valorparcela}}</td>
                                <td>{{$pagamento->tabelapreco}}</td>
                                <td>{{$pagamento->databaixa}}</td>
                                <td>{{$pagamento->condicaoPagamento->descricao}}</td>
                                <td>{{$pagamento->trocovenda == null ? 'Sem troco' : 'R$' . $pagamento->trocovenda}} </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
        @livewireScripts
    </div>
</body>

</html>