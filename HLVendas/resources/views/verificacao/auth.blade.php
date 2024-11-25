<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://cdn.jsdelivr.net/npm/alpinejs@3.x.x/dist/cdn.min.js" defer></script>
    @vite(['resources/scss/header.scss', 'resources/scss/cliente.scss', 'resources/css/app.css', 'resources/js/app.js', 'resources/js/inputValidation.js'])
    <title>HLVendas | Autorização Necessária</title>
</head>

<body>
    <div class="contentCliente">
        <div class="box">
            @include('components.navbar') 
        </div>

        <div class="clienteCrud">
            <div class="contentForms">
                <div class="contentButton">
                    <h1 class="title">Verificar usuário</h1>
                </div>
                @if($errors->any())
                    <div style="color: red;">
                        @foreach ($errors->all() as $error)
                            <p>{{ $error }}</p>
                        @endforeach
                    </div>
                @endif

                <form class="formCliente" method="POST" action="{{ route('verificacao.confirmar') }}">
                    @csrf
                    <div class="contentInput">
                        <div class="inputGroup">
                            <input class="inputWrapper" type="email" name="email" id="email" required>
                            <label for="email" class="userLabel">
                                <p>E-mail do Gerente</p>
                            </label>
                        </div>
                    </div>

                    <div class="contentInput ">
                        <div class="inputGroup">
                            <input type="password" class="inputWrapper" name="password" id="password" required>
                            <label for="password" class="userLabel">
                                <p>Senha</p>
                            </label>
                        </div>
                    </div>
                    <div class="button">
                        <button type="submit">
                            <p class="text"></p>Confirmar Acesso</p>
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
    @include('components.footer') 
</body>

</html>