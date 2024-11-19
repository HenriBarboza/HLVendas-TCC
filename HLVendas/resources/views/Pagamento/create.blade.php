<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    @livewireStyles
    <script src="https://cdn.jsdelivr.net/npm/alpinejs@3.x.x/dist/cdn.min.js" defer></script>
    <link rel="icon" href="{{ asset('images/cart-shopping-solid.ico') }}" type="image/x-icon">
    @vite(['resources/scss/venda.scss', 'resources/css/app.css', 'resources/js/app.js', 'resources/js/buttonSelect.js', 'resources/js/inputValidation.js', 'resources/js/placeholder.js', 'resources/js/selectPagamento.js', 'resources/js/loadingPage.js'])
    <title>HLVendas | Pagamento</title>
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
                    <h1 class="title">Pagamento</h1>

                    <form action="{{route('venda.destroy', $venda->id)}}" method="POST">
                        @csrf
                        @method('DELETE')
                        <div class="deleteVend">
                            <button type="submit">
                                <p class="text">Cancelar Venda</p>
                            </button>
                        </div>
                    </form>
                </div>
                <form class="formVenda" action="{{route('pagamento.store')}}" method="POST">
                    @CSRF
                    <div class="contentInput">
                        <input class="inputWrapper number showVend" type="number" name="vendaid" value="{{$venda->id}}"
                            readonly hidden required>
                        <input class="inputWrapper number" type="number" name="doc" value="{{$venda->doc}}" readonly
                            required>
                        <label for="doc" class="userLabel">
                            <p>Documento</p>
                        </label>
                    </div>
                    <div class="contentInput">
                        <input class="inputWrapper number showVend" type="number" id="valortotal" name="valortotal"
                            readonly value="{{$venda->totalvenda}}" required>
                        <label for="doc" class="userLabel">
                            <p>Valor Total</p>
                        </label>
                    </div>
                    <br>
                    <hr>
                    <div class="contentInput">
                        <select class="inputWrapper w50" id="formaPagamentoSelect" name="condicaopagid">
                            @foreach($formaPagamentos as $formaPagamento)
                                <option value="{{$formaPagamento->id}}" data-alterar="{{$formaPagamento->alterarvalor}}"
                                    data-qntparcelas="{{$formaPagamento->quantparcelas}}"
                                    data-diasparcelas="{{$formaPagamento->diasparcelas}}">{{$formaPagamento->descricao}}
                                </option>
                            @endforeach
                        </select>
                        <label for="doc" class="userLabel">
                            <p>Forma de pagamento</p>
                        </label>
                    </div>
                    <div class="contentInput">
                        <input class="inputWrapper showVend" type="text" id="valorpago" name="valorpago"
                            value="{{$venda->totalvenda}}" data-original-value="{{$venda->totalvenda}}" required>
                        <label for="doc" class="userLabel">
                            <p>Valor Pagamento</p>
                        </label>
                    </div>
                    <div id="troco" class="contentInput ">
                        <input class="inputWrapper number showVend" type="text" id="valortroco" value="0.0" name="troco"
                            readonly required>
                        <label for="doc" class="userLabel">
                            <p>Troco</p>
                        </label>
                    </div>
                    <div id="numerotransacao" class="contentInput ">
                        <input class="inputWrapper number" type="text" name="numerotransacao" value="Sem número"
                            required>
                        <label for="doc" class="userLabel">
                            <p>Numero da transação</p>
                        </label>
                    </div>
                    <input id="inputqntparcelas" type="text" name="quantparcelas" hidden required>
                    <input id="inputdiasparcelas" type="text" name="diasparcelas" hidden required>
                    <input type="text" name="tabelapreco" value="{{$venda->tabelapreco}}" hidden required>
                    <br>
                    <h4 style="color:red;" id="avisovalor">O valor do pagamento deve ser maior que o valor total.</h4>
                    <div class="button">
                        <button type="submit" id="btnsalvar">
                            <p class="text">
                                Salvar
                            </p>
                        </button>
                    </div>
                </form>
            </div>
        </div>
        <!-- </div> -->
        @livewireScripts
        @include('components.footer')
    </div>
</body>

</html>