<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    @livewireStyles
    <script src="https://cdn.jsdelivr.net/npm/alpinejs@3.x.x/dist/cdn.min.js" defer></script>
    <link rel="icon" href="{{ asset('images/cart-shopping-solid.ico') }}" type="image/x-icon">
    @vite(['resources/scss/venda.scss', 'resources/css/app.css', 'resources/scss/tableBusca.scss', 'resources/js/app.js', 'resources/js/buttonSelect.js', 'resources/js/inputValidation.js', 'resources/js/placeholder.js', 'resources/js/selectPagamento.js', 'resources/js/printPdf.js', 'resources/js/loadingPage.js'])
    <title>HLVendas | Visualizar pagamento</title>
</head>

<body>
    <div class="contentVenda">
        <div class="box not-print">
            @include('components.navbar')
        </div>
        <div class="loader">
            <div class="loading"></div>
        </div>

        <div class="vendaCrud">
            <div class="contentForms tables">
                <div class="contentButton">
                    <h1 class="title not-print">Pagamento</h1>
                    <div class="newVenda">
                        <button>
                            <a href="/venda">
                                <p class="text not-print">Nova venda</p>
                            </a>
                        </button>
                    </div>

                    <div class="showVenda">
                        <button>
                            <a href={{route('venda.show', $pagamentos[0]->vendaid)}}>
                                <p class="text not-print">Ver venda</p>
                            </a>
                        </button>
                    </div>

                    <div class="pdfVenda">
                        <button id="download-btn">
                            <p class="text not-print">Imprimir</p>
                        </button>
                    </div>
                </div>

                <div class="formVenda">
                    <div class="contentInput">
                        <div class="inputGroup">
                            <p class="text"><b>Número da transação</b>: {{ $pagamentos[0]->numerotransacao}}</p>
                        </div>

                        <div class="inputGroup">
                            <p class="text"><b>Cliente</b>: {{ $pagamentos[0]->venda->cliente->nome}}</p>
                        </div>
                    </div>
                    <div class="contentInput">
                        <div class="inputGroup">
                            <p class="text"><b>Tabela de preço</b>: {{ $pagamentos[0]->tabelapreco}}</p>
                        </div>

                        <div class="inputGroup">
                            <p class="text"><b>Condição de
                                    pagamento</b>:{{ $pagamentos[0]->condicaoPagamento->descricao }}</p>
                        </div>
                    </div>
                </div>

                <div class="overflow">
                    <table>
                        <thead>
                            <tr>
                                <th>Parcela</th>
                                <th>Valor da venda</th>
                                <th>Valor da pago</th>
                                <th>Valor da parcela</th>
                                @if($pagamentos[0]->trocovenda != null)<th>Troco da venda</th>@endif
                                <th>Data de baixa</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($pagamentos as $pagamento)
                                <tr>
                                    <td>{{$pagamento->parcela}}</td>
                                    <td>R${{$pagamento->valorvenda}}</td>
                                    <td>R${{$pagamento->valorpago}}</td>
                                    <td>R${{$pagamento->valorparcela}}</td>
                                    @if($pagamento->trocovenda != null)<td>R${{$pagamento->trocovenda}}</td>@endif
                                    <td>{{$pagamento->databaixa}}</td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
        @livewireScripts
    </div>
</body>

</html>