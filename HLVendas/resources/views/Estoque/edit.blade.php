<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    @livewireStyles
    <script src="https://cdn.jsdelivr.net/npm/alpinejs@3.x.x/dist/cdn.min.js" defer></script>
    <link rel="icon" href="{{ asset('images/cart-shopping-solid.ico') }}" type="image/x-icon">
    @vite(['resources/scss/home.scss', 'resources/scss/estoque.scss', 'resources/scss/tableBusca.scss', 'resources/css/app.css', 'resources/js/app.js', 'resources/js/buttonSelect.js', 'resources/js/loadingPage.js'])
    <title>HLVendas | Editar Manutenção de Estoque</title>
</head>
<?php 
    $rota = 4;
 ?>

<body>
    <div class="contentEstoque">
        <div class="box">
            @include('components.navbar') 
        </div>
        <div class="loader">
            <div class="loading"></div>
        </div>

        <div class="estoqueCrud">
            <div class="contentForms">
                <div class="contentButton">
                    <h1 class="title">Editar Manutenção de Estoque</h1>

                    <div class="buttonBack">
                        <a class="return" href="{{ route('estoque.create') }}">Cancelar</a>
                    </div>
                </div>
                <form class="formEstoque" action="{{route('estoque.update', $movimentos->id)}}" method="POST">
                    @CSRF
                    @method('PUT')
                    <div class="contentInput">
                        <input class="inputWrapper showEstoque" type="text" name="id" value="{{$movimentos->id}}"
                            disabled>
                        <label for="id" class="userLabel">
                            <p>Id:</p>
                        </label>
                    </div>
                    <div class="contentInput">
                        <input class="inputWrapper" type="text" name="motivo" value="{{$movimentos->motivo}}" required>
                        <label for="motivo" class="userLabel">
                            <p>Motivo:</p>
                        </label>
                    </div>
                    <div class="contentInput">
                        <div class="inputGroup">
                            <input class="inputWrapper" type="number" value="{{$movimentos->produtoid}}" hidden
                                name="produtoid" value="" id="inpProdutoId" required>
                            <input style="border-color: #0B57D0;" class="inputWrapper" type="text" placeholder="Produto"
                                id="inpProdutoNome" value="{{$movimentos->produto->descricao}}" disabled>
                            <label for="produtoid" class="userLabel">
                                <p>Produto</p>
                            </label>
                        </div>
                        <div class="inputGroup">
                            <input class="inputWrapper" type="text" name="quantidade"
                                value="{{$movimentos->quantidade}}" required>
                            <label for="quantidade" class="userLabel">
                                <p>Quantidade:</p>
                            </label>
                        </div>
                    </div>
                    <div class="contentInput">
                        <div class="contentInput radio">
                            <p class="text"><label for="tipomovimentacao">Tipo de movimentação:</label></p>
                            @if($movimentos->tipomovimentacao == 'E')
                                <input type="radio" id="entrada" value="E" name="tipomovimentacao" checked>
                                <p class="text"><label for="entrada">Entrada</label></p>
                                <input type="radio" id="saida" value="S" name="tipomovimentacao">
                                <p class="text"><label for="saida">Saída</label><br></p>
                            @elseif($movimentos->tipomovimentacao == 'S')
                                <input type="radio" id="entrada" value="E" name="tipomovimentacao">
                                <p class="text"><label for="entrada">Entrada</label></p>
                                <input type="radio" id="saida" value="S" name="tipomovimentacao" checked>
                                <p class="text"><label for="saida">Saída</label><br></p>
                            @endif
                        </div>
                    </div>
                    <div class="contentInput">
                        <input class="inputWrapper" type="text" name="observacao" value="{{$movimentos->observacao}}">
                        <label for="observacao" class="userLabel">
                            <p>Observação:</p>
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