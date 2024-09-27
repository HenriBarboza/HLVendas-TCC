<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    @livewireStyles
    @vite(['resources/scss/produto.scss', 'resources/css/app.css', 'resources/js/app.js', 'resources/js/calculoCusto.js', 'resources/js/inputValidation.js'])
    <title>Novo Produto</title>
</head>

<?php 
    $rota = 1;
 ?>

<body>
    <div class="contentProduto">
        @include('components.navbar') 

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
                        <input class="inputWrapper" type="text" name="descricao" placeholder="Descricao" required autofocus>
                    </div>

                    <div class="contentInput">
                        <input class="inputWrapper number" type="text" id="custo" step="0.01" name="custo" placeholder="Custo" required>
                    </div>

                    <div class="contentInput">
                        <input class="inputWrapper w50 number" type="text" id="perccusto" step="0.01" name="perccusto" placeholder="% Custo" required>

                        <input class="inputWrapper w50 number" type="text" id="precoavista" name="precoavista" step="0.01" placeholder="Preço À Vista" required>
                    </div>

                    <div class="contentInput">
                        <input class="inputWrapper w50 number" type="text" id="percprazo" step="0.01" name="percprazo" placeholder="% Prazo" required>

                        <input class="inputWrapper w50 number" type="text" id="precoaprazo" step="0.01" name="precoaprazo" placeholder="Preço À Prazo"required>
                    </div>

                    <div class="contentInput">
                        <input class="inputWrapper" type="text" name="unidade" placeholder="Unidade de medida" required>
                    </div>

                    <div class="contentInput">
                        <input class="inputWrapper number" type="text" name="codigoBarras" placeholder="Código de Barras">
                    </div>

                    <div class="contentInput">
                        <input class="inputWrapper" type="text" name="categoria" placeholder="Categoria (Ex. Alimento)" required>
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