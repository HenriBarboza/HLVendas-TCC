<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" href="{{ asset('images/cart-shopping-solid.ico') }}" type="image/x-icon">
    @vite(['resources/scss/home.scss', 'resources/scss/produto.scss', 'resources/css/app.css', 'resources/js/app.js', 'resources/js/calculoCusto.js', 'resources/js/loadingPage.js'])
    <title>HLVendas | Editar produto</title>
</head>

<body>
    <div class="contentProduto">
        <div class="box">
            @include('components.navbar') 
        </div>

        <div class="loader">
            <div class="loading"></div>
        </div>

        <div class="produtoCrud">
            <div class="contentForms">
                <div class="contentButton">
                    <h1>Editar Produto</h1>

                    <div class="buttonBack">
                        <a class="return" href="{{route('produto.create')}}">Cancelar</a>
                    </div>
                </div>

                <form class="formProduto" action="{{route('produto.update', $produtos->id)}}" method="POST">
                    @CSRF
                    @method('PUT')
                    <div class="contentInput">
                        <input class="inputWrapper showProduto" type="text" name="id" value="{{$produtos->id}}"
                            disabled>
                        <label for="id" class="userLabel">
                            <p>Id:</p>
                        </label>
                    </div>
                    <div class="contentInput">
                        <input class="inputWrapper" type="text" name="descricao" value="{{$produtos->descricao}}"
                            required>
                        <label for="descricao" class="userLabel">
                            <p>Descricao:</p>
                        </label>
                    </div>
                    <div class="contentInput">
                        <input class="inputWrapper" type="number" id="custo" step="0.01" name="custo"
                            value="{{$produtos->custo}}" required>
                        <label for="custo" class="userLabel">
                            <p>Custo:</p>
                        </label>
                    </div>
                    <div class="contentInput">
                        <div class="inputGroup">
                            <input class="inputWrapper" type="number" id="perccusto" step="0.01" name="perccusto"
                                value="{{$produtos->perccusto}}" required>
                            <label for="perccusto" class="userLabel">
                                <p>Perc. Custo:</p>
                            </label>
                        </div>

                        <div class="inputGroup">
                            <input class="inputWrapper" type="number" id="precoavista" name="precoavista" step="0.01"
                                value="{{$produtos->precoavista}}" required>
                            <label for="precoavista" class="userLabel">
                                <p>Preço À Vista:</p>
                            </label>
                        </div>
                    </div>
                    <div class="contentInput">
                        <div class="inputGroup">
                            <input class="inputWrapper" type="number" id="percprazo" step="0.01" name="percprazo"
                                value="{{$produtos->percprazo}}" required>
                            <label for="percprazo" class="userLabel">
                                <p>Perc. Prazo:</p>
                            </label>
                        </div>

                        <div class="inputGroup">
                            <input class="inputWrapper" type="number" id="precoaprazo" step="0.01" name="precoaprazo"
                                value="{{$produtos->precoaprazo}}" required>
                            <label for="precoaprazo" class="userLabel">
                                <p>Preço À Prazo:</p>
                            </label>
                        </div>
                    </div>
                    <div class="contentInput">
                        <input class="inputWrapper" type="text" name="unidade" value="{{$produtos->unidade}}" required>
                        <label for="unidade" class="userLabel">
                            <p>Unidade de medida:</p>
                        </label>
                    </div>
                    <div class="contentInput">
                        <input class="inputWrapper" type="number" value="{{$produtos->codigoBarras}}"
                            name="codigoBarras">
                        <label for="codigoBarras" class="userLabel">
                            <p>Código de Barras:</p>
                        </label>
                    </div>
                    <div class="contentInput">
                        <input class="inputWrapper" type="text" name="categoria" value="{{$produtos->categoria}}"
                            required>
                        <label for="categoria" class="userLabel">
                            <p>Categoria:</p>
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
    </div>
    @include('components.footer') 
</body>

</html>