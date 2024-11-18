<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    @livewireStyles
    <script src="https://cdn.jsdelivr.net/npm/alpinejs@3.x.x/dist/cdn.min.js" defer></script>
    <link rel="icon" href="{{ asset('images/cart-shopping-solid.ico') }}" type="image/x-icon">
    @vite(['resources/scss/venda.scss', 'resources/css/app.css', 'resources/js/app.js', 'resources/js/buttonSelect.js', 'resources/js/inputValidation.js', 'resources/js/loadingPage.js'])
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
                        <button @click.prevent type="submit">
                            <a href="{{ route('venda.index') }}">
                                <p class="text">Voltar </p>
                            </a>
                        </button>
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
                    <div class="buscaVenda">
                        @livewire('modal-venda-component')
                    </div>
                </div>
                <div>
                    <div class="formVenda">
                        <div class="contentShowVend">
                            <h1 class="title">Detalhes da Venda</h1>
                            <h3 class="subtitle">Informações da Venda</h3>
                            <p class="text">ID: {{ $venda->id }}</p>
                            <p class="text">Documento: {{ $venda->doc }}</p>
                            <p class="text">Conta: {{ $venda->conta->nome }}</p>
                            <p class="text">Cliente: {{ $venda->cliente->nome }}</p>
                            <p class="text">Funcionário: {{ $venda->funcionario->nome }}</p>
                            <p class="text">Tabela de preco:
                                {{ $venda->tabelapreco == 'AV' ? 'Avista' : ($venda->tabelapreco == 'AP' ? 'Aprazo' : '') }}
                            </p>
                            <p class="text">Condição de pagamento:
                                {{$venda->condicaoPagamento == null ? 'Sem condição de pagamento' : $venda->condicaoPagamento->descricao}}
                            </p>
                            <p class="text">Desconto %:
                                {{ $venda->percdesconto == 0 ? 'Sem desconto' : $venda->percdesconto }}
                            </p>
                            <p class="text">Valor adicional %:
                                {{ $venda->percadicional == 0 ? 'Sem adicional' : $venda->percadiciona }}
                            </p>

                            <p class="text">Data: {{ $venda->created_at }}</p>

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
                            <p class="text">Total da venda: R$ {{ $venda->totalvenda }}</p>
                        </div>
                    </div>

                    <div class="contentFormAcao">
                        <form class="PagVenda" action="{{route('pagamento.show', $venda->id) }}">
                            <button type="submit">
                                Ver pagamento
                            </button>
                        </form>
                        <form class="editVenda" action="{{route('venda.edit', $venda->id) }}">
                            <button type="submit">
                                Editar
                            </button>
                        </form>
                        <form class="deleteVenda" action="{{route('venda.destroy', $venda->id)}}" method="POST">
                            @csrf
                            @method('DELETE')
                            <div>
                                <button type="submit">
                                    Excluir
                                </button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        @livewireScripts
        @include('components.footer')
    </div>
</body>

</html>