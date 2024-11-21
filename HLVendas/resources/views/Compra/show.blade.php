<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    @livewireStyles
    <script src="https://cdn.jsdelivr.net/npm/alpinejs@3.x.x/dist/cdn.min.js" defer></script>
    <link rel="icon" href="{{ asset('images/cart-shopping-solid.ico') }}" type="image/x-icon">
    @vite(['resources/scss/compra.scss', 'resources/css/app.css', 'resources/js/app.js', 'resources/js/buttonSelect.js', 'resources/js/inputValidation.js', 'resources/js/loadingPage.js', 'resources/js/printPdf.js','resources/js/deleteAlert.js'])
    <title>HLVendas | Visualizar compra</title>
</head>

<body>
    <div class="contentCompra">
        <div class="box">
            @include('components.navbar')
        </div>
        <div class="loader">
            <div class="loading"></div>
        </div>

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
                    <div class="buttonBack">
                        <a class="return" href="{{ route('venda.index') }}">
                            Voltar
                        </a>
                    </div>
                </div>
                <div>
                    <div class="formCompra">
                        <div class="contentShowCompra">
                            <h1 class="title">Detalhes da Compra</h1>
                            <h3 class="subtitle">Informações da Compra</h3>
                            <p class="text"><b>ID</b>: {{ $compra->id }}</p>
                            <p class="text"><b>Documento</b>: {{ $compra->doc }}</p>
                            <p class="text"><b>Conta</b>: {{ $compra->conta->nome }}</p>
                            <p class="text"><b>Fornecedor</b>: {{ $compra->fornecedor->nome }}</p>
                            <p class="text"><b>Funcionário</b>: {{ $compra->funcionario->nome }}</p>
                            <p class="text"><b>Desconto %</b>:
                                {{ $compra->percdesconto == 0 ? 'Sem adicional' : $compra->percdesconto }}
                            </p>
                            <p class="text"><b>Valor adicional %</b>:
                                {{ $compra->percadicional == 0 ? 'Sem adicional' : $compra->percadiciona }}
                            </p>
                            <p class="text"><b>Data</b>: {{ $compra->created_at }}</p>

                            <h3 class="subtitle">Produtos Comprados</h3>
                            <div class="tableHead">

                                <table>
                                    <thead>
                                        <tr>
                                            <th>Descrição do Produto</th>
                                            <th>Quantidade</th>
                                            <th>Custo Unitário</th>
                                            <th>Total</th>
                                        </tr>
                                    </thead>
                                </table>
                            </div>
                            <div class="tableBody">
                                <table>
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
                            </div>
                            <p class="text"><b>Total da Compra</b>: R$ {{ $compra->totalcompra }}</p>
                        </div>
                    </div>
                    <div class="contentFormAcao">
                        <div class="pdfVenda">
                            <button id="download-btn">
                                <p class="text not-print">Imprimir</p>
                            </button>
                        </div>
                        <form class="editCompra" action="{{route('compra.edit', $compra->id) }}">
                            <button type="submit">
                                Editar
                            </button>
                        </form>
                        <form class="deleteCompra" id="deleteForm" action="{{route('compra.destroy', $compra->id)}}" method="POST">
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
            @livewireScripts
        </div>
    </div>
</body>

</html>