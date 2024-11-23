<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" href="{{ asset('images/cart-shopping-solid.ico') }}" type="image/x-icon">
    @vite(["resources/scss/tableBusca.scss", 'resources/js/messageAlert.js' ,'resources/scss/conta.scss', 'resources/css/app.css', 'resources/js/app.js', 'resources/js/inputValidation.js', 'resources/js/placeholder.js', 'resources/js/loadingPage.js'])
    <title>Condição de Pagamento</title>
</head>

<?php 
    $rota = 1;
 ?>

<body>
    <div class="contentConta">
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

        <div class="contaCrud">
            <div class="contentForms">
                <div class="contentButton">
                    <div class="newConta">
                        <h1 class="title">Nova condição de pagamento</h1>
                    </div>

                    <div class="buscaConta">
                        @livewire('modal-condicao-pagamento-component', compact('rota'))
                    </div>
                </div>

                <form class="formConta" action="{{route('condicaoPagamento.store')}}" method="POST">
                    @CSRF
                    <div class="contentInput not-gap">
                        <input class="inputWrapper" type="text" name="descricao" required>
                        <label for="descricao" class="userLabel">
                            <p>Descricao</p>
                        </label>
                    </div>
                    <div class="contentInput">
                        <div class="inputGroup">
                            <input class="inputWrapper number" type="text" name="quantparcelas" required>
                            <label for="quantparcelas" class="userLabel">
                                <p>Quantidade de parcelas</p>
                            </label>
                        </div>
                        <div class="inputGroup">
                            <input class="inputWrapper number" type="text" name="diasparcelas" required>
                            <label for="diasparcelas" class="userLabel">
                                <p>Quantidade de dias entre parcelas</p>
                            </label>
                        </div>
                    </div>
                    <div class="contentInput">
                        <div class="contentInput radio">
                            <p class="text"><label for="alterarvalor">Permitir alterar valor?</label></p>
                            <input type="radio" id="sim" value="1" name="alterarvalor" checked>
                            <p class="text"><label for="sim">Sim</label></p>
                            <input type="radio" id="nao" value="0" name="alterarvalor">
                            <p class="text"><label for="nao">Não</label><br></p>
                            <span
                                title="A opção permitir alterar valores caso esteja marcada como 'Sim', faz com que o usuário consiga definir o valor no momento do pagamento, ativando a função troco."><i
                                    class="fa-solid fa-question"></i></span>
                        </div>
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
    @include('components.footer') 
</body>

</html>