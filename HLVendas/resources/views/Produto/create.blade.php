<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    @livewireStyles
    @vite(['resources/scss/header.scss','resources/scss/produto.scss','resources/scss/tableBusca.scss', 'resources/css/app.css', 'resources/js/app.js', 'resources/js/calculoCusto.js', 'resources/js/inputValidation.js', "resources/js/placeholder.js"])
    <title>Novo Produto</title>
</head>

<?php 
    $rota = 1;
 ?>

<body>
    <div class="contentProduto">
        <div class="box">
            @include('components.navbar') 
        </div>

        <div class="produtoCrud">
            <div class="contentForms">

                <div class="contentButton">
                    <div class="newProduto">
                        <!-- <button>
                            <p class="text">Novo Produto</p>
                        </button> -->
                    </div>

                    @if ($message = Session::get('success'))
                        <div class="alert alert-success">
                            {{$message}}
                        </div>
                    @endif
                    <div class="buscaProduto">
                        <!-- <button> -->
                        <!-- <a href="/produto">Buscar produto</a> -->
                        <p class="text">
                            @livewire('modal-component', compact('rota'))
                        </p>
                        <!-- </button> -->
                    </div>
                </div>
                <form class="formProduto" action="{{route('produto.store')}}" method="POST">
                    @CSRF
                    <div class="contentInput">
                        <label for="descricao" class="labelTop">
                            <p>Descrição</p>
                        </label>
                        <input class="inputWrapper" type="text" name="descricao" required>
                    </div>

                    <div class="contentInput">
                        <label for="custo" class="labelTop">
                            <p>Custo</p>
                        </label>
                        <input class="inputWrapper number" type="text" id="custo" step="0.01" name="custo" required>
                    </div>

                    <div class="contentInput">
                        <div class="inputGroup">
                            <label for="perccusto" class="labelTop">
                                <p>% Custo</p>
                            </label>
                            <input class="inputWrapper number" type="text" id="perccusto" step="0.01" name="perccusto"
                                required>
                        </div>

                        <div class="inputGroup">
                            <label for="precoavista" class="labelTop">
                                <p>Preço à Vista</p>
                            </label>
                            <input class="inputWrapper number" type="text" id="precoavista" name="precoavista"
                                step="0.01" required>
                        </div>
                    </div>

                    <div class="contentInput">
                        <div class="inputGroup">
                            <label for="percprazo" class="labelTop">
                                <p>% Prazo</p>
                            </label>
                            <input class="inputWrapper number" type="text" id="percprazo" step="0.01" name="percprazo"
                                required>
                        </div>

                        <div class="inputGroup">
                            <label for="precoaprazo" class="labelTop">
                                <p>Preço à Prazo</p>
                            </label>
                            <input class="inputWrapper number" type="text" id="precoaprazo" step="0.01"
                                name="precoaprazo" required>
                        </div>
                    </div>

                    <div class="contentInput">
                        <label for="unidade" class="labelTop">
                            <p>Unidade de medida</p>
                        </label>
                        <input class="inputWrapper" type="text" name="unidade" required>
                    </div>

                    <div class="contentInput">
                        <label for="codigoBarras" class="labelTop">
                            <p>Código de Barras</p>
                        </label>
                        <input class="inputWrapper number" type="text" name="codigoBarras" required>
                    </div>

                    <div class="contentInput">
                        <label for="categoria" class="labelTop">
                            <p>Categoria (Ex. Alimento)</p>
                        </label>
                        <input class="inputWrapper" type="text" name="categoria" required>
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
        @livewireScripts
        @include('components.footer') 
    </div>
</body>

</html>