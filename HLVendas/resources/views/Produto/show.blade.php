<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <link rel="icon" href="{{ asset('images/cart-shopping-solid.ico') }}" type="image/x-icon">
    @vite(['resources/scss/home.scss', 'resources/scss/produto.scss', 'resources/css/app.css', 'resources/js/app.js', 'resources/js/calculoCusto.js', 'resources/js/loadingPage.js', 'resources/js/deleteAlert.js'])
    <title>HLVendas | Visualizar produto</title>
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
                    <h1 class="title">Visualizar Produto</h1>

                    <div class="buttonBack">
                        <a class="return" href="{{route('produto.create')}}">Voltar</a>
                    </div>
                </div>
                <form class="formProduto">
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
                        <input class="inputWrapper showProduto" type="text" name="descricao"
                            value="{{$produtos->descricao}}" disabled>
                        <label for="descricao" class="userLabel">
                            <p>Descricao:</p>
                        </label>
                    </div>
                    <div class="contentInput">
                        <input class="inputWrapper showProduto" type="number" id="custo" step="0.01" name="custo"
                            value="{{$produtos->custo}}" disabled>
                        <label for="custo" class="userLabel">
                            <p>Custo:</p>
                        </label>
                    </div>
                    <div class="contentInput">
                        <input class="inputWrapper showProduto" type="number" id="estoque" step="0.01" name="estoque"
                            value="{{$produtos->estoque}}" disabled>
                        <label for="estoque" class="userLabel">
                            <p>Estoque:</p>
                        </label>
                    </div>
                    <div class="contentInput">
                        <div class="inputGroup">
                            <input class="inputWrapper showProduto" type="number" id="perccusto" step="0.01"
                                name="perccusto" value="{{$produtos->perccusto}}" disabled>
                            <label for="perccusto" class="userLabel">
                                <p>Perc. Custo:</p>
                            </label>
                        </div>

                        <div class="inputGroup">
                            <input class="inputWrapper showProduto" type="number" id="precoavista" name="precoavista"
                                step="0.01" value="{{$produtos->precoavista}}" disabled>
                            <label for="precoavista" class="userLabel">
                                <p>Preço À Vista:</p>
                            </label>
                        </div>
                    </div>
                    <div class="contentInput">
                        <div class="inputGroup">
                            <input class="inputWrapper showProduto" type="number" id="percprazo" step="0.01"
                                name="percprazo" value="{{$produtos->percprazo}}" disabled>
                            <label for="percprazo" class="userLabel">
                                <p>Perc. Prazo:</p>
                            </label>
                        </div>

                        <div class="inputGroup">
                            <input class="inputWrapper showProduto" type="number" id="precoaprazo" step="0.01"
                                name="precoaprazo" value="{{$produtos->precoaprazo}}" disabled>
                            <label for="precoaprazo" class="userLabel">
                                <p>Preço À Prazo:</p>
                            </label>
                        </div>
                    </div>
                    <div class="contentInput">
                        <input class="inputWrapper showProduto" type="text" name="unidade"
                            value="{{$produtos->unidade}}" disabled>
                        <label for="unidade" class="userLabel">
                            <p>Unidade de medida:</p>
                        </label>
                    </div>
                    <div class="contentInput">
                        <input class="inputWrapper showProduto" type="number" value="{{$produtos->codigoBarras}}"
                            name="codigoBarras" disabled>
                        <label for="codigoBarras" class="userLabel">
                            <p>Código de Barras:</p>
                        </label>
                    </div>
                    <div class="contentInput">
                        <input class="inputWrapper showProduto" type="text" name="categoria"
                            value="{{$produtos->categoria}}" disabled>
                        <label for="categoria" class="userLabel">
                            <p>Categoria:</p>
                        </label>
                    </div>
                    <div class="contentInput">
                        <div class="inputGroup">

                            <input class="inputWrapper showProduto" type="text" name="ultimacompra"
                                value="{{ empty($produtos->ultimacompra) ? 'Sem compras' : $produtos->ultimacompra }}"
                                disabled>
                            <label for="ultimacompra" class="userLabel">
                                <p>Última compra:</p>
                            </label>
                        </div>

                        <div class="inputGroup">
                            <input class="inputWrapper showProduto" type="text" name="ultimavenda"
                                value="{{ empty($produtos->ultimavenda) ? 'Sem vendas' : $produtos->ultimavenda }}"
                                disabled>
                            <label for="ultimavenda" class="userLabel">
                                <p>Última venda:</p>
                            </label>
                        </div>
                    </div>
                </form>
                <div class="contentFormAcao">
                    <form class="editProduto" action="{{route('produto.edit', $produtos->id) }}">
                        <button type="submit">
                            Editar
                        </button>
                    </form>
                    <form class="deleteProduto" id="deleteProdutoForm"
                        action="{{route('produto.destroy', $produtos->id)}}" method="POST">
                        @csrf
                        @method('DELETE')
                        <div class="">
                            <div class="">
                                <button type="button" class="btn-excluir-produto" id="btnExcluirProduto"
                                    data-id="{{ $produtos->id }}">Excluir</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <script>

    </script>
</body>

</html>