<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    @livewireStyles
    <link rel="icon" href="{{ asset('images/cart-shopping-solid.ico') }}" type="image/x-icon">
    @vite(['resources/js/messageAlert.js', 'resources/scss/produto.scss', 'resources/scss/tableBusca.scss', 'resources/css/app.css', 'resources/js/app.js', 'resources/js/calculoCusto.js', 'resources/js/inputValidation.js', 'resources/js/loadingPage.js'])
    <title>HLVendas | Novo produto</title>
</head>

<?php 
    $rota = 1;
 ?>

<body>
    <div class="contentProduto">
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

        <div class="produtoCrud">
            <div class="contentForms">
                <div class="contentButton">
                    <div class="newProduto">
                        <h1 class="title">Novo Produto</h1>
                    </div>
                    <div class="buscaEstoque">
                        <p class="text">
                        <div @click.prevent="open = true" class="inputWrapper buttonProd">
                            <button>
                                <a class="text" href="/estoque/create">
                                    Manutenção de Estoque
                                </a>
                            </button>
                        </div>
                        </p>
                    </div>
                    <div class="buscaProduto">
                        <p class="text">
                            @livewire('modal-component', compact('rota'))
                        </p>
                    </div>
                </div>
                <form class="formProduto" action="{{route('produto.store')}}" method="POST">
                    @CSRF
                    <div class="contentInput">
                        <input class="inputWrapper" autocomplete="off" type="text" name="descricao" required>
                        <label for="descricao" class="userLabel">
                            <p>Descrição</p>
                        </label>
                    </div>

                    <div class="contentInput">
                        <input class="inputWrapper number" autocomplete="off" type="text" id="custo" step="0.01"
                            name="custo" required>
                        <label for="custo" class="userLabel">
                            <p>Custo</p>
                        </label>
                    </div>

                    <div class="contentInput">
                        <div class="inputGroup">
                            <input class="inputWrapper number" autocomplete="off" type="text" id="perccusto" step="0.01"
                                name="perccusto" required>
                            <label for="perccusto" class="userLabel">
                                <p>% Custo</p>
                            </label>
                        </div>

                        <div class="inputGroup">
                            <input class="inputWrapper number" autocomplete="off" type="text" id="precoavista"
                                name="precoavista" step="0.01" required>
                            <label for="precoavista" class="userLabel">
                                <p>Preço à Vista</p>
                            </label>
                        </div>
                    </div>

                    <div class="contentInput">
                        <div class="inputGroup">
                            <input class="inputWrapper number" autocomplete="off" type="text" id="percprazo" step="0.01"
                                name="percprazo" required>
                            <label for="percprazo" class="userLabel">
                                <p>% Prazo</p>
                            </label>
                        </div>

                        <div class="inputGroup">
                            <input class="inputWrapper number" autocomplete="off" type="text" id="precoaprazo"
                                step="0.01" name="precoaprazo" required>
                            <label for="precoaprazo" class="userLabel">
                                <p>Preço à Prazo</p>
                            </label>
                        </div>
                    </div>

                    <div class="contentInput">
                        <input class="inputWrapper" type="text" autocomplete="off" name="unidade" required>
                        <label for="unidade" class="userLabel">
                            <p>Unidade de medida</p>
                        </label>
                    </div>

                    <div class="contentInput">
                        <input class="inputWrapper number" type="text" autocomplete="off" name="codigoBarras" required>
                        <label for="codigoBarras" class="userLabel">
                            <p>Código de Barras</p>
                        </label>
                    </div>

                    <div class="contentInput">
                        <input class="inputWrapper" type="text" autocomplete="off" name="categoria" required>
                        <label for="categoria" class="userLabel">
                            <p>Categoria (Ex. Alimento)</p>
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
        @livewireScripts
        @include('components.footer') 
    </div>
</body>

</html>