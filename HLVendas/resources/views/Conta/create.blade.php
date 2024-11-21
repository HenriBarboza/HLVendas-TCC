<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" href="{{ asset('images/cart-shopping-solid.ico') }}" type="image/x-icon">
    @vite(['resources/scss/tableBusca.scss','resources/scss/conta.scss', 'resources/css/app.css', 'resources/js/app.js', 'resources/js/inputValidation.js', 'resources/js/loadingPage.js'])
    <title>HLVendas | Nova conta</title>
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

        <div class="contaCrud">
            <div class="contentForms">
                <div class="contentButton">
                    <div class="newConta">
                        <h1 class="title">
                            Conta
                        </h1>
                        @if ($message = Session::get('success'))
                            <div class="alert alert-success">
                                {{$message}}
                            </div>
                        @endif
                    </div>

                    <div class="buscaConta">
                        @livewire('modal-conta-component', compact('rota'))
                    </div>
                </div>

                <form class="formConta" action="{{route('conta.store')}}" method="POST">
                    @CSRF
                    <div class="contentInput not-gap">
                        <input class="inputWrapper placeholderActive" type="text" name="nome" required>
                        <input class="inputWrapper" type="text" value="{{Auth::user()->id}}" hidden name="funcionarioid"
                        required>
                        <label for="nome" class="userLabel">
                            <p>Nome</p>
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