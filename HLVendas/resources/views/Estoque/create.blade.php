<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    @livewireStyles
    <script src="https://cdn.jsdelivr.net/npm/alpinejs@3.x.x/dist/cdn.min.js" defer></script>
    @vite(['resources/scss/header.scss', 'resources/scss/cliente.scss', 'resources/scss/tableBusca.scss', 'resources/css/app.css', 'resources/js/app.js', 'resources/js/inputValidation.js', 'resources/js/buttonSelect.js', 'resources/js/loadingPage.js'])
    <title>Manutenção de estoque</title>
</head>

<?php 
    $rota = 4;
 ?>

<body>
    <div class="contentCliente">
        <div class="box">
            @include('components.navbar')
        </div>
        <div class="loader">
            <div class="loading"></div>
        </div>

        <div class="clienteCrud">
            <div class="contentForms">
                <div class="contentButton">
                    <div class="newCliente">
                        @if ($message = Session::get('success'))
                            <div class="alert alert-success">
                                {{$message}}
                            </div>
                        @endif
                    </div>

                    <div id="div2" class="buscaCliente">
                        @livewire('modal-estoque-component', compact(var_name: 'rota'))
                    </div>
                </div>

                <form class="formCliente" action="{{route('estoque.store')}}" method="POST">
                    @CSRF
                    <div class="contentInput not-gap">
                        <input autocomplete="off" class="inputWrapper" type="text" name="motivo" required="">
                        <label for="motivo" class="userLabel">
                            <p>Motivo</p>
                        </label>
                    </div>

                    <div class="contentInput">
                        <div class="inputGroup">
                            <input class="inputWrapper" type="number" name="produtoid" id="inpProdutoId" required
                                hidden>
                            <input style="border-color: #0B57D0;" class="inputWrapper" type="text" placeholder="Produto"
                                id="inpProdutoNome" disabled>
                        </div>
                        <div class="inputGroup">
                            @livewire('modal-component', compact(var_name: 'rota'))
                        </div>
                    </div>
                    <div class="contentInput">
                        <div class="inputGroup">
                            <input autocomplete="off" class="inputWrapper" type="text" name="quantidade" required>
                            <label for="quantidade" class="userLabel">
                                <p>Quantidade</p>
                            </label>
                        </div>
                        <div class="contentInput radio">
                            <p class="text"><label for="tipomovimentacao">Tipo de movimentação:</label></p>
                            <input type="radio" id="entrada" value="E" name="tipomovimentacao" checked>
                            <p class="text"><label for="entrada">Entrada</label></p>
                            <input type="radio" id="saida" value="S" name="tipomovimentacao">
                            <p class="text"><label for="saida">Saída</label><br></p>
                        </div>
                    </div>
                    <div class="contentInput not-gap">
                        <input  class="inputWrapper" type="text" name="observacao">
                        <label for="observacao" class="userLabel" >
                            <p>Observação</p>
                        </label>
                    </div>
                    <div class="button">
                        <button type="submit">
                            <p class="text">
                                Salvar
                            </p>
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
    @livewireScripts
</body>

</html>