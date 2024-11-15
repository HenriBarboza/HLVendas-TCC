<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    @vite(['resources/scss/cliente.scss', 'resources/css/app.css', 'resources/js/app.js', 'resources/js/inputValidation.js', 'resources/js/placeholder.js', 'resources/js/loadingPage.js'])
    <title>Condição de Pagamento</title>
</head>

<?php 
    $rota = 1;
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
                        <h1>Nova condição de pagamento</h1>
                        @if ($message = Session::get('success'))
                            <div class="alert alert-success">
                                {{$message}}
                            </div>
                        @endif
                    </div>

                    <div class="buscaCliente">
                        @livewire('modal-condicao-pagamento-component', compact('rota'))
                    </div>
                </div>

                <form class="formCliente" action="{{route('condicaoPagamento.store')}}" method="POST">
                    @CSRF
                    <div class="contentInput not-gap">
                        <input class="inputWrapper" type="text" name="descricao" required>
                        <label for="descricao" class="userLabel">
                            <p>Descricao</p>
                        </label>
                    </div>
                    <div class="contentInput">
                        <div class="inputGroup">
                            <input class="inputWrapper" type="number" name="quantparcelas" required>
                            <label for="quantparcelas" class="userLabel">
                                <p>Quantidade de parcelas</p>
                            </label>
                        </div>
                        <div class="inputGroup">
                            <input class="inputWrapper" type="number" name="diasparcelas" required>
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
                        </div>
                    </div>
                    <span
                        title="A opção permitir alterar valores caso esteja marcada como 'Sim', faz com que o usuário consiga definir o valor no momento do pagamento, ativando a função troco."><i
                            class="fa-solid fa-question"></i></span>
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