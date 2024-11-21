<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" href="{{ asset('images/cart-shopping-solid.ico') }}" type="image/x-icon">
    @vite(['resources/scss/conta.scss', 'resources/css/app.css', 'resources/js/app.js', 'resources/js/loadingPage.js'])
    <title>HLVendas | Editar conta</title>
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
                        <h1 class="title">Editar Conta</h1>
                    </div>

                    <div class="buttonBack">
                        <a class="return" href="{{route('conta.create')}}">Cancelar</a>
                    </div>
                </div>
                <form class="formConta" action="{{route('conta.update', $contas->id)}}" method="POST">
                    @CSRF
                    @method('PUT')
                    <div class="contentInput">
                        <input class="inputWrapper showConta" type="text" name="id" value="{{$contas->id}}" disabled>
                        <label class="userLabel" for="id">
                            <p>Id:</p>
                        </label>
                    </div>
                    <div class="contentInput">
                        <input class="inputWrapper" type="text" name="nome" value="{{$contas->nome}}" required>
                        <label class="userLabel" for="nome">
                            <p>Nome:</p>
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
</body>

</html>