<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" href="{{ asset('images/cart-shopping-solid.ico') }}" type="image/x-icon">
    @vite(['resources/scss/header.scss', 'resources/scss/estoque.scss', 'resources/css/app.css', 'resources/js/app.js', 'resources/js/loadingPage.js', 'resources/js/deleteAlert.js', 'resources/js/printPdf.js'])
    <title>HLVendas | Manutenção de estoque</title>
</head>

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
                    <h1 class="title">Visualizar Manutenção de estoque</h1>

                    <div class="buttonBack">
                        <a class="return" href="{{route('estoque.create')}}">Voltar</a>
                    </div>
                </div>

                <form class="formEstoque">
                    @CSRF
                    @method('PUT')
                    <div class="contentInput">
                        <input class="inputWrapper showEstoque" type="text" name="id" value="{{$movimentos->id}}"
                            readonly>
                        <label for="id" class="userLabel">
                            <p class="not-print">Id:</p>
                        </label>
                    </div>
                    <div class="contentInput">
                        <input class="inputWrapper showEstoque" type="text" name="motivo"
                            value="{{$movimentos->motivo}}" readonly>
                        <label for="motivo" class="userLabel">
                            <p class="not-print">Motivo:</p>
                        </label>
                    </div>
                    <div class="contentInput">
                        <div class="inputGroup">
                            <input class="inputWrapper showEstoque" type="text" name="produtoid"
                                value="{{$movimentos->produto->descricao}}" readonly>
                            <label for="produtoid" class="userLabel">
                                <p class="not-print">Produto:</p>
                            </label>
                        </div>
                        <div class="inputGroup">
                            <input class="inputWrapper showEstoque" type="text" name="quantidade"
                                value="{{$movimentos->quantidade}}" readonly>
                            <label class="userLabel" for="quantidade">
                                <p class="not-print">Quantidade:</p>
                            </label>
                        </div>
                    </div>
                    <div class="contentInput">
                        <label for="updated_at">Tipo de movimento:</label>
                        @if($movimentos->tipomovimentacao == 'E')
                            <p class="text"><label for="entrada">Entrada</label><br></p>
                        @elseif($movimentos->tipomovimentacao == 'S')
                            <p class="text"><label for="saida">Saída</label></p>
                        @endif
                    </div>
                    <div class="contentInput">
                        <input class="inputWrapper showEstoque" type="text" name="observacao"
                            value="{{$movimentos->observacao}}" readonly>
                        <label for="observacao" class="userLabel">
                            <p class="not-print">Observação:</p>
                        </label>
                    </div>
                    <div class="contentInput">
                        <div class="inputGroup">
                            <input class="inputWrapper placeholderActive" type="datetime-local" name="created_at"
                                value="{{$movimentos->created_at}}" readonly>
                            <label class="userLabel" for="created_at">
                                <p class="not-print">Data De Cadastro:</p>
                            </label>
                        </div>
                        <div class="inputGroup">
                            <input class="inputWrapper placeholderActive" type="datetime-local" name="updated_at"
                                value="{{$movimentos->updated_at}}" readonly>
                            <label class="userLabel" for="updated_at">
                                <p class="not-print">Última Alteração:</p>
                            </label>
                        </div>
                    </div>
                </form>
                <div class="contentFormAcao">
                    <form class="editEstoque" action="{{route('estoque.edit', $movimentos->id) }}">
                        <button type="submit">
                            Editar
                        </button>
                    </form>
                    <div class="pdfManutencao">
                        <button id="download-btn">
                            <p class="text not-print">Imprimir</p>
                        </button>
                    </div>
                    <form class="deleteEstoque" id="deleteForm" action="{{route('estoque.destroy', $movimentos->id)}}"
                        method="POST">
                        @csrf
                        @method('DELETE')
                        <button type="submit">Excluir</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</body>

</html>