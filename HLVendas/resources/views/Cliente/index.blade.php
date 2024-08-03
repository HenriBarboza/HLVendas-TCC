<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    @vite(['resources/scss/home.scss', 'resources/css/app.css', 'resources/js/app.js'])
    <title>Buscar Cliente</title>
</head>

<body>
    @include('components.navbar') 
    <div class="corpo">
        <div class="top">
            <h1>Buscar Cliente</h1>
            <a href="/cliente/create">Novo cliente</a><br>
        </div>
        <div>
            <table>
                <thead>
                    <tr>
                        <th></th>
                        <th>ID</th>
                        <th>Nome</th>
                        <th>Celular</th>
                        <th>CPF/CNPJ</th>
                        <th>Logradouro</th>
                        <th>Cidade</th>
                        <th>Data nascimento</th>
                        <th></th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($clientes as $cliente)
                        @if($cliente->tipo == 'C')
                        <tr>
                            <td><input type="checkbox"></td>
                            <td>{{$cliente->id}}</td>
                            <td>{{$cliente->nome}}</td>
                            <td>{{$cliente->celular}}</td>
                            <td>{{$cliente->cpfcnpj}}</td>
                            <td>{{$cliente->logradouro}}</td>
                            <td>{{$cliente->cidade}}</td>
                            <td>{{$cliente->datanasc}}</td>
                            <td><a href="{{route('cliente.show', $cliente->id) }}">Visualizar</a></td>
                        </tr>
                        @endif
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
    </div>
    @include('components.footer') 
</body>

</html>