<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    @livewireStyles
    <script src="https://cdn.jsdelivr.net/npm/alpinejs@3.x.x/dist/cdn.min.js" defer></script>
    @vite(['resources/scss/compra.scss', 'resources/css/app.css', 'resources/js/app.js', 'resources/js/buttonSelect.js', 'resources/js/inputValidation.js'])
    <title>Visualizar Venda</title>
</head>

<body>
    <div class="contentCompra">
        <div class="box">
            @include('components.navbar')
        </div>

        <!-- <div class="contentCompra"> -->
        <div class="compraCrud">
            <div class="contentForms">
                <div class="contentButton">
                    <div class="newCompra">
                        <!-- <button>
                            <p class="text">Nova Compra</p>
                        </button> -->
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
                    <div class="buscaCompra">
                        @livewire('modal-venda-component')
                    </div>
                </div>
                <div>
                    <div class="formCompra">
                        <h1>Detalhes da Venda</h1>
                        <h3>Informações da Venda</h3>
                        <p>ID: {{ $venda->id }}</p>
                        <p>Documento: {{ $venda->doc }}</p>
                        <p>Conta: {{ $venda->conta->nome }}</p>
                        <p>Cliente: {{ $venda->cliente->nome }}</p>
                        <p>Funcionário: {{ $venda->funcionario->nome }}</p>
                        <p>Tabela de preco:
                            {{ $venda->tabelapreco == 'AV' ? 'Avista' : ($venda->tabelapreco == 'AP' ? 'Aprazo' : '') }}
                        </p>
                        <p>Condição de pagamento:
                            {{$venda->condicaoPagamento == null ? 'Sem condição de pagamento' : $venda->condicaoPagamento->descricao}}
                        </p>
                        <p>Desconto %: {{ $venda->percdesconto == 0 ? 'Sem desconto' : $venda->percdesconto }}</p>
                        <p>Valor adicional %: {{ $venda->percadicional == 0 ? 'Sem adicional' : $venda->percadiciona }}
                        </p>

                        <p>Data: {{ $venda->created_at }}</p>

                        <h3>Produtos da venda</h3>
                        <table class="table">
                            <thead>
                                <tr>
                                    <th>Descrição do Produto</th>
                                    <th>Quantidade</th>
                                    <th>Unitário</th>
                                    <th>Total</th>
                                </tr>
                            </thead>
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
                        <p>Total da venda: R$ {{ $venda->totalvenda }}</p>
                        <div class="button">
                            <button @click.prevent type="submit">
                                <a href="{{ route('pagamento.show', $venda->id) }}">
                                    <p class="text">Ver pagamento </p>
                                </a>
                            </button>
                            <button @click.prevent type="submit">
                                <a href="{{ route('venda.index') }}">
                                    <p class="text">Voltar </p>
                                </a>
                            </button>
                            <button @click.prevent type="submit">
                                <a href="{{route('venda.edit', $venda->id) }}">
                                    <p class="text">Editar</p>
                                </a>
                            </button>
                            <form action="{{route('venda.destroy', $venda->id)}}" method="POST">
                                @csrf
                                @method('DELETE')
                                <div>
                                    <button type="submit">
                                        <p class="text">Excluir</p>
                                    </button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        @livewireScripts
        @include('components.footer')
    </div>
</body>

</html>