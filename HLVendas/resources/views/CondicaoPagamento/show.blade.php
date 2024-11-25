<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <link rel="icon" href="{{ asset('images/cart-shopping-solid.ico') }}" type="image/x-icon">
    @vite(['resources/scss/conta.scss', 'resources/css/app.css', 'resources/js/app.js', 'resources/js/loadingPage.js', 'resources/js/deleteAlert.js'])
    <title>Condição de Pagamento</title>
</head>

<body>
    <div class="contentConta">
        <div class="box">
            @include('components.navbar') 
        </div>
        <div class="loader">
            <div class="loading"></div>
        </div>

        <div class="contaCrud">
            <div class="contentForms">
                <div class="contentButton">
                    <div class="newConta">
                        <h1 class="title">Visualizar Condição de Pagamento</h1>
                    </div>

                    <div class="buttonBack">
                        <a class="return" href="{{route('condicaoPagamento.create')}}">Voltar</a>
                    </div>
                </div>

                <form class="formConta">
                    @CSRF
                    @method('PUT')
                    <div class="contentInput">
                        <input class="inputWrapper showConta" type="text" name="id" value="{{$condicoes->id}}" readonly>
                        <label for="id" class="userLabel">
                            <p>Id:</p>
                        </label>
                    </div>
                    <div class="contentInput">
                        <input class="inputWrapper showConta" type="text" name="descricao"
                            value="{{$condicoes->descricao}}" readonly>
                        <label for="descricao" class="userLabel">
                            <p>Descrição:</p>
                        </label>
                    </div>
                    <div class="contentInput">
                        <div class="inputGroup">
                            <input class="inputWrapper showConta" type="text" name="datanasc"
                                value="{{$condicoes->quantparcelas}}" disabled>
                            <label class="userLabel" for="datanasc">
                                <p>Quantidade de parcelas:</p>
                            </label>
                        </div>

                        <div class="inputGroup">
                            <input class="inputWrapper showConta" type="text" name="created_at"
                                value="{{$condicoes->diasparcelas}}" disabled>
                            <label class="userLabel" for="created_at">
                                <p>Quantidade de dias entre parcelas</p>
                            </label>
                        </div>
                    </div>
                    <div class="contentInput">
                        <div class="inputGroup">
                            <input class="inputWrapper placeholderActive" type="datetime-local" name="created_at"
                                value="{{$condicoes->created_at}}" disabled>
                            <label class="userLabel" for="created_at">
                                <p>Data De Cadastro:</p>
                            </label>
                        </div>
                        <div class="inputGroup">
                            <input class="inputWrapper placeholderActive" type="datetime-local" name="updated_at"
                                value="{{$condicoes->updated_at}}" disabled>
                            <label class="userLabel" for="updated_at">
                                <p>Última Alteração:</p>
                            </label>
                        </div>
                    </div>
                    <div class="contentInput">
                        <label class="labelDate" for="updated_at">Permitir alterar valor?</label>
                        @if($condicoes->alterarvalor == 0)
                            <p class="text"><label for="nao">Não</label><br></p>
                        @elseif($condicoes->alterarvalor == 1)
                            <p class="text"><label for="sim">Sim</label></p>
                        @endif
                    </div>
                </form>
                <div class="contentFormAcao">
                    <form class="editConta" action="{{route('condicaoPagamento.edit', $condicoes->id) }}">
                        <button type="submit">
                            Editar
                        </button>
                    </form>
                    <form class="deleteConta" id="deleteCondicaoForm"
                        action="{{route('condicaoPagamento.destroy', $condicoes->id)}}" method="POST">
                        @csrf
                        @method('DELETE')
                        <button type="button" class="btn-excluir-condicao" id="btnExcluirCondicao"
                            data-id="{{ $condicoes->id }}">Excluir</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</body>

</html>