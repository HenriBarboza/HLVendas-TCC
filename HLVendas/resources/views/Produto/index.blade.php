<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    @vite(['resources/scss/home.scss', 'resources/css/app.css', 'resources/js/app.js'])
    <title>Buscar Produto</title>
    @livewireStyles
</head>
<?php 
    $rota = 'show';  
    $texto = 'Vizualizar';  
?>
<body>
    @include('components.navbar') 
    <div class="corpo">
        <div class="top">
            <h1>Buscar Produto</h1>
            <a href="/produto/create">Novo produto</a><br>
            @livewire('busca-produtos', compact('rota' , 'texto'))
        </div>
    </div>
    </div>
    @include('components.footer')
    @livewireScripts
</body>

</html>