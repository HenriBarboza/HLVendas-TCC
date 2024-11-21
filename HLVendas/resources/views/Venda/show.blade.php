<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    @livewireStyles
    <script src="https://cdn.jsdelivr.net/npm/alpinejs@3.x.x/dist/cdn.min.js" defer></script>
    <link rel="icon" href="{{ asset('images/cart-shopping-solid.ico') }}" type="image/x-icon">
    @vite(['resources/scss/venda.scss', 'resources/css/app.css', 'resources/js/app.js', 'resources/js/buttonSelect.js', 'resources/js/inputValidation.js', 'resources/js/loadingPage.js', 'resources/js/printPdf.js', 'resources/js/deleteAlert.js'])
    <title>HLVendas | Visualizar venda</title>
</head>

<body>
    <div class="contentVenda">
        <div class="box">
            @include('components.navbar')
        </div>
        <div class="loader">
            <div class="loading"></div>
        </div>

        <div class="vendaCrud">
            <div class="contentForms">
                <div class="contentButton">
                    <div class="newVenda">
                        @if ($message = Session::get('success'))
                            <div class="alert alert-success">
                                {{$message}}
                            </div>
                        @elseif($message = Session::get('error'))
                            <div class="alert alert-success">
                                {{$message}}
                            </div>
                        @endif
                    </div>
                    <div class="buttonBack">
                        <a class="return" href="{{ route('venda.index') }}">
                            Voltar
                        </a>
                    </div>
                </div>
                <div>
                    <div class="formVenda">
                        <div class="contentShowVend">
                            <h1 class="title">Detalhes da Venda</h1>
                            <h3 class="subtitle">Informações da Venda</h3>
                            <p class="text"><b>ID</b>: {{ $venda->id }}</p>
                            <p class="text"><b>Documento</b>: {{ $venda->doc }}</p>
                            <p class="text"><b>Conta</b>: {{ $venda->conta->nome }}</p>
                            <p class="text"><b>Cliente</b>: {{ $venda->cliente->nome }}</p>
                            <p class="text"><b>Funcionário</b>: {{ $venda->funcionario->nome }}</p>
                            <p class="text"><b>Tabela de preco</b>:
                                {{ $venda->tabelapreco == 'AV' ? 'Avista' : ($venda->tabelapreco == 'AP' ? 'Aprazo' : '') }}
                            </p>
                            <p class="text"><b>Condição de pagamento</b>:
                                {{$venda->condicaoPagamento == null ? 'Sem condição de pagamento' : $venda->condicaoPagamento->descricao}}
                            </p>
                            <p class="text"><b>Desconto %</b>:
                                {{ $venda->percdesconto == 0 ? 'Sem desconto' : $venda->percdesconto }}
                            </p>
                            <p class="text"><b>Valor adicional %</b>:
                                {{ $venda->percadicional == 0 ? 'Sem adicional' : $venda->percadiciona }}
                            </p>

                            <p class="text"><b>Data</b>: {{ $venda->created_at }}</p>

                            <h3 class="subtitle">Produtos da venda</h3>
                            <div class="tableHead">
                                <table>
                                    <thead>
                                        <tr>
                                            <th>Descrição do Produto</th>
                                            <th>Quantidade</th>
                                            <th>Unitário</th>
                                            <th>Total</th>
                                        </tr>
                                    </thead>
                                </table>
                            </div>
                            <div class="tableBody">
                                <table>
                                    <tbody>
                                        @foreach($produtos as $prodVenda)
                                            <tr>
                                                <td>{{ $prodVenda->produto->descricao }}</td>
                                                <td>{{ $prodVenda->quantidade }}</td>
                                                <td>R$ {{ $prodVenda->precovenda }}</td>
                                                <td>R$ {{ $prodVenda->precovenda * $prodVenda->quantidade }}</td>
                                            </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                            <p class="text"><b>Total da venda</b>: R$ {{ $venda->totalvenda }}</p>
                        </div>

                        <div class="for-print">
                            <div class="overflow">
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
                                                <td>{{$pagamento->trocovenda == null ? 'Sem troco' : 'R$' . $pagamento->trocovenda}}
                                                </td>
                                            </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>

                    <div class="contentFormAcao">
                        <form class="PagVenda" action="{{route('pagamento.show', $venda->id) }}">
                            <button type="submit">
                                Ver pagamento
                            </button>
                        </form>
                        <div class="pdfVenda">
                            <button id="download-btn">
                                <p class="text not-print">Imprimir</p>
                            </button>
                        </div>
                        <form class="editVenda" action="{{route('venda.edit', $venda->id) }}">
                            <button type="submit">
                                Editar
                            </button>
                        </form>
                        <form class="deleteVenda" id="deleteForm" action="{{route('venda.destroy', $venda->id)}}" method="POST">
                            @csrf
                            @method('DELETE')
                            <button type="submit">
                                Excluir
                            </button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        @livewireScripts
    </div>
</body>

</html>