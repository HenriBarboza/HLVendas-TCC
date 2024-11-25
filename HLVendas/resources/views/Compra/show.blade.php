<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    @livewireStyles
    <script src="https://cdn.jsdelivr.net/npm/alpinejs@3.x.x/dist/cdn.min.js" defer></script>
    <link rel="icon" href="{{ asset('images/cart-shopping-solid.ico') }}" type="image/x-icon">
    @vite(['resources/scss/compra.scss', 'resources/js/messageAlert.js', 'resources/css/app.css', 'resources/js/app.js', 'resources/js/buttonSelect.js', 'resources/js/inputValidation.js', 'resources/js/loadingPage.js', 'resources/js/printPdf.js', 'resources/js/deleteAlert.js'])
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

        @if ($message = Session::get('success'))
            <div id="success-message"
                class="notification bg-green-500 text-white px-4 py-3 rounded shadow-lg flex justify-between items-center opacity-0 transition-opacity duration-500 fixed top-4 right-4 z-50">
                <div>
                    <p class="font-bold text-white">Sucesso!</p>
                    <p class="text-white">{{ $message }}</p>
                </div>
            </div>
        @endif

        @if ($message = Session::get('error'))
            <div id="error-message"
                class="notification bg-red-500 text-white px-4 py-3 rounded shadow-lg flex justify-between items-center opacity-0 transition-opacity duration-500 fixed top-4 right-4 z-50">
                <div>
                    <p class="font-bold text-white">Erro!</p>
                    <p class="text-white">{{ $message }}</p>
                </div>
            </div>
        @endif

        <div class="compraCrud">
            <div class="contentForms">
                <div class="contentButton">
                    <div class="newCompra"></div>
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
                            <div class="contentInput">
                                <div class="inputGroup">
                                    <p class="text"><b>ID</b>: {{ $compra->id }}</p>
                                </div>

                                <div class="inputGroup">
                                    <p class="text"><b>Documento</b>: {{ $compra->doc }}</p>
                                </div>
                            </div>

                            <div class="contentInput">
                                <div class="inputGroup">
                                    <p class="text"><b>Conta</b>: {{ $compra->conta->nome }}</p>
                                </div>

                                <div class="inputGroup">
                                    <p class="text"><b>Fornecedor</b>: {{ $compra->fornecedor->nome }}</p>
                                </div>
                            </div>

                            <div class="contentInput">
                                <div class="inputGroup">
                                    <p class="text"><b>Funcionário</b>: {{ $compra->funcionario->nome }}</p>
                                </div>

                                <div class="inputGroup">
                                    <p class="text"><b>Desconto %</b>:
                                        {{ $compra->percdesconto == 0 ? 'Sem adicional' : $compra->percdesconto }}
                                    </p>
                                </div>
                            </div>

                            <div class="contentInput">
                                <div class="inputGroup">
                                    <p class="text"><b>Valor adicional %</b>:
                                        {{ $compra->percadicional == 0 ? 'Sem adicional' : $compra->percadiciona }}
                                    </p>
                                </div>

                                <div class="inputGroup">
                                    <p class="text"><b>Data</b>: {{ $compra->created_at }}</p>
                                </div>
                            </div>
                            <h3 class="subtitle">Produtos Comprados</h3>
                            <div class="tableHead">
                                <table class="tablePrint">
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
                                <table class="tablePrint">
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
                        <form class="deleteCompra" id="deleteCompraForm" action="{{route('compra.destroy', $compra->id)}}"
                            method="POST">
                            @csrf
                            @method('DELETE')
                            <div>
                                <button type="button" class="btn-excluir-compra" id="btnExcluirCompra" data-id="{{ $compra->id }}">
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