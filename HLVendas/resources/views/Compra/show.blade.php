<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    @livewireStyles
    <script src="https://cdn.jsdelivr.net/npm/alpinejs@3.x.x/dist/cdn.min.js" defer></script>
    @vite(['resources/scss/compra.scss', 'resources/css/app.css', 'resources/js/app.js', 'resources/js/buttonSelect.js', 'resources/js/inputValidation.js'])
    <title>Visualizar Compra</title>
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
                        @livewire('modal-compra-component')
                    </div>
                </div>
                <div>
                    <div class="formCompra">
                        <h1>Detalhes da Compra</h1>

                        <h3>Informações da Compra</h3>
                        <p>ID: {{ $compra->id }}</p>
                        <p>Documento: {{ $compra->doc }}</p>
                        <p>Conta: {{ $compra->conta->nome }}</p>
                        <p>Fornecedor: {{ $compra->fornecedor->nome }}</p>
                        <p>Funcionário: {{ $compra->funcionario->nome }}</p>
                        <p>Desconto %: {{ $compra->precdesconto ?? 'Sem desconto' }}</p>
                        <p>Valor adicional %: {{ $compra->precadicional ?? 'Sem adicional' }}</p>

                        <p>Data: {{ $compra->created_at }}</p>

                        <h3>Produtos Comprados</h3>
                        <table class="table">
                            <thead>
                                <tr>
                                    <th>Descrição do Produto</th>
                                    <th>Quantidade</th>
                                    <th>Custo Unitário</th>
                                    <th>Total</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($produtos as $prodCompra)
                                    <tr>
                                        <td>{{ $prodCompra->produto->descricao }}</td>
                                        <td>{{ $prodCompra->quantidade }}</td>
                                        <td>R$ {{ $prodCompra->custo }}</td>
                                        <td>R$ {{ $prodCompra->custo * $prodCompra->quantidade }}</td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                        <p>Total da Compra: R$ {{ $compra->totalcompra }}</p>
                        <div class="button">
                            <button @click.prevent type="submit">
                                <a href="{{ route('compra.index') }}">
                                    <p class="text">Voltar </p>
                                </a>
                            </button>
                            <button @click.prevent type="submit">
                                <a href="{{route('compra.edit', $compra->id) }}">
                                    <p class="text">Editar</p>
                                </a>
                            </button>
                            <form action="{{route('compra.destroy', $compra->id)}}" method="POST">
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
        <!-- </div> -->
        @livewireScripts
        @include('components.footer')
    </div>
</body>

</html>