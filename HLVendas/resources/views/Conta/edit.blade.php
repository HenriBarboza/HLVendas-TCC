<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    @vite(['resources/scss/home.scss', 'resources/css/app.css', 'resources/js/app.js'])
    <title>Conta</title>
</head>

<body>
    @include('components.navbar') 
    <div class="corpo">
        <div class="top">
            <h1>Editar Conta</h1>
            <a href="/conta">Buscar conta</a>
        </div>
        <div>
            <form action="{{route('conta.update', $contas->id)}}" method="POST">
                @CSRF
                @method('PUT')
                <div class="">
                    <div class="">
                        <label for="id">Id:</label>
                        <input type="text" name="id" value="{{$contas->id}}" disabled>
                    </div>
                    <div class="">
                        <label for="nome">Nome:</label>
                        <input type="text" name="nome" value="{{$contas->nome}}" required>
                    </div>
                    <div class="">
                        <button type="submit">Salvar</button>
                    </div>
                </form>
                </div>
        </div>
    </div>
    </div>
    @include('components.footer') 
</body>

</html>