<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    @vite(['resources/scss/cliente.scss', 'resources/css/app.css', 'resources/js/app.js'])
    <title>Buscar Cliente</title>
    @livewireStyles
</head>

<?php 
    $rota = 'show';
$texto = 'Vizualizar';  
?>

<body>
    <div class="contentCliente">
            @include('components.navbar')

        <div class="top">
            <h1>Buscar Cliente</h1>
            <a href="/cliente/create">Novo cliente</a><br>
            @livewire('busca-clientes', compact('rota', 'texto'))
        </div>
    </div>
    @livewireScripts
</body>

</html>