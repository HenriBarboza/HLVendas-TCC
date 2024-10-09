<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    @vite(['resources/scss/cliente.scss','resources/css/app.css', 'resources/js/app.js', 'resources/js/inputValidation.js', 'resources/js/placeholder.js'])
    <title>Nova Conta</title>
</head>

<?php 
    $rota = 1;
 ?>
<body>
    <div class="contentCliente">
        @include('components.navbar')

        <div class="clienteCrud">
            <div class="contentForms">
                <div class="contentButton">
                    <div class="newCliente">
                            <h1>Novo Conta</h1>
                        @if ($message = Session::get('success'))
                            <div class="alert alert-success">
                                {{$message}}
                            </div>
                        @endif
                    </div>
                    
                    <div class="buscaCliente">
                    @livewire('modal-conta-component', compact('rota'))
                    </div>
                </div>

                <form class="formCliente" action="{{route('conta.store')}}" method="POST">
                    @CSRF
                    <div class="contentInput not-gap">
                        <label for="nome" class="labelTop">
                            <p>Nome</p>
                        </label>
                        <input class="inputWrapper" type="text" name="nome"  required>
                        <input class="inputWrapper" type="text" value="{{Auth::user()->id}}" hidden name="funcionarioid"  required>
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