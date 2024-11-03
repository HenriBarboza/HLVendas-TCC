<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    @livewireStyles
    <script src="https://cdn.jsdelivr.net/npm/alpinejs@3.x.x/dist/cdn.min.js" defer></script>
    @vite(['resources/scss/compra.scss', 'resources/css/app.css', 'resources/js/app.js', 'resources/js/buttonSelect.js', 'resources/js/inputValidation.js', 'resources/js/placeholder.js', 'resources/js/selectPagamento.js'])
    <title>Pagamento</title>
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
                    <h1>Pagamento</h1>
                </div>
                <form class="formCompra" action="{{route('pagamento.store')}}" method="POST">
                    @CSRF
                    <div class="contentInput">
                        <input class="inputWrapper number" type="number" name="vendaid" value="{{$venda->id}}" readonly hidden required>
                        <label for="doc" class="labelTop">
                            <p>Documento</p>
                        </label>
                        <input class="inputWrapper number" type="number" name="doc" value="{{$venda->doc}}" readonly required>
                    </div>
                    <div class="contentInput">
                        <label for="doc" class="labelTop">
                            <p>Valor Total</p>
                        </label>
                        <input class="inputWrapper number" type="number" id="valortotal" name="valortotal" readonly
                            value="{{$venda->totalvenda}}" required>
                    </div>
                    <br>
                    <hr>
                    <div class="contentInput">
                        <label for="doc" class="labelTop">
                            <p>Forma de pagamento</p>
                        </label>
                        <select class="inputWrapper w50" id="formaPagamentoSelect" name="condicaopagid">
                            @foreach($formaPagamentos as $formaPagamento)
                                <option value="{{$formaPagamento->id}}"
                                    data-alterar="{{$formaPagamento->alterarvalor}}"
                                    data-qntparcelas="{{$formaPagamento->quantparcelas}}"
                                    data-diasparcelas="{{$formaPagamento->diasparcelas}}"
                                    >{{$formaPagamento->descricao}}
                                </option>
                            @endforeach
                        </select>
                    </div>
                    <div class="contentInput">
                        <label for="doc" class="labelTop">
                            <p>Valor Pagamento</p>
                        </label>
                        <input class="inputWrapper" type="text" id="valorpago"  name="valorpago" 
                            value="{{$venda->totalvenda}}" data-original-value="{{$venda->totalvenda}}" required>
                    </div>
                    <div id="troco" class="contentInput ">
                        <label for="doc" class="labelTop">
                            <p>Troco</p>
                        </label>
                        <input class="inputWrapper number" type="text" id="valortroco" value="0.0" name="troco" readonly required>
                    </div>
                    <div id="numerotransacao" class="contentInput ">
                        <label for="doc" class="labelTop">
                            <p>Numero da transação</p>
                        </label>
                        <input class="inputWrapper number" type="text" name="numerotransacao" value="Sem número" required>
                    </div>
                    <input id="inputqntparcelas" type="text" name="quantparcelas" hidden required>
                    <input id="inputdiasparcelas"  type="text" name="diasparcelas" hidden required>
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
                <form action="{{route('venda.destroy', $venda->id)}}" method="POST">
                @csrf
                @method('DELETE')
                <div class="">
                    <div class="">
                        <button type="submit">Cancelar Venda</button>
                    </div>
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