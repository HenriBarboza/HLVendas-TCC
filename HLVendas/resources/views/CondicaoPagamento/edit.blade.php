<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    @vite(['resources/scss/home.scss', 'resources/scss/cliente.scss', 'resources/css/app.css', 'resources/js/app.js', 'resources/js/loadingPage.js'])
    <title>Cliente</title>
</head>

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
                    <h1>Editar Cliente</h1>

                    <div class="buttonBack">
                        <a class="return" href="{{ route('condicaoPagamento.create') }}">Cancelar</a>
                    </div>
                </div>
                <form class="formCliente" action="{{route('condicaoPagamento.update', $condicoes->id)}}" method="POST">
                    @CSRF
                    @method('PUT')
                    <div class="contentInput">
                        <input class="inputWrapper showCliente" type="text" name="id" value="{{$condicoes->id}}"
                            disabled>
                        <label for="id" class="userLabel">
                            <p>Id:</p>
                        </label>
                    </div>
                    <div class="contentInput">
                        <input class="inputWrapper" type="text" name="descricao" value="{{$condicoes->descricao}}"
                            required>
                        <label for="descricao" class="userLabel">
                            <p>Descricao:</p>
                        </label>
                    </div>
                    <div class="contentInput">
                        <div class="inputGroup">
                            <input class="inputWrapper" type="text" name="quantparcelas"
                                value="{{$condicoes->quantparcelas}}" required>
                            <label for="quantparcelas" class="userLabel">
                                <p>Quantidade de parcelas:</p>
                            </label>
                        </div>
                        <div class="inputGroup">
                            <input class="inputWrapper" type="text" name="diasparcelas"
                                value="{{$condicoes->diasparcelas}}" required>
                            <label for="diasparcelas" class="userLabel">
                                <p>Quantidade de dias entre parcelas:</p>
                            </label>
                        </div>
                    </div>
                    <div class="contentInput">
                        <div class="contentInput radio">
                            <p class="text"><label for="alterarvalor">Permitir alterar valor?</label></p>
                            @if($condicoes->alterarvalor == 0)
                                <input type="radio" id="sim" value="1" name="alterarvalor">
                                <p class="text"><label for="sim">Sim</label></p>
                                <input type="radio" id="nao" value="0" name="alterarvalor" checked>
                                <p class="text"><label for="nao">Não</label><br></p>
                            @elseif($condicoes->alterarvalor == 1)
                                <input type="radio" id="sim" value="1" name="alterarvalor" checked>
                                <p class="text"><label for="sim">Sim</label></p>
                                <input type="radio" id="nao" value="0" name="alterarvalor" >
                                <p class="text"><label for="nao">Não</label><br></p>
                            @endif
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