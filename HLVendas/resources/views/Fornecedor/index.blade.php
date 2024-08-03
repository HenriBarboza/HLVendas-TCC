<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    @vite(['resources/scss/home.scss', 'resources/css/app.css', 'resources/js/app.js'])
    <title>Buscar Fornecedor</title>
</head>

<body>
    @include('components.navbar') 
    <div class="corpo">
        <div class="top">
            <h1>Buscar Fornecedor</h1>
            <a href="/fornecedor/create">Novo fornecedor</a><br>
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
                    @foreach ($fornecedores as $fornecedor)
                        @if($fornecedor->tipo == 'F')
                        <tr>
                            <td><input type="checkbox"></td>
                            <td>{{$fornecedor->id}}</td>
                            <td>{{$fornecedor->nome}}</td>
                            <td>{{$fornecedor->celular}}</td>
                            <td>{{$fornecedor->cpfcnpj}}</td>
                            <td>{{$fornecedor->logradouro}}</td>
                            <td>{{$fornecedor->cidade}}</td>
                            <td>{{$fornecedor->datanasc}}</td>
                            <td><a href="{{route('fornecedor.show', $fornecedor->id) }}">Visualizar</a></td>
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