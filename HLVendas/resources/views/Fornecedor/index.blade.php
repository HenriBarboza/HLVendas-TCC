<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    @vite(['resources/scss/fornecedor.scss', 'resources/css/app.css', 'resources/js/app.js'])
    <title>Buscar Fornecedor</title>
    @livewireStyles
</head>
<?php 
    $rota = 'show';  
    $texto = 'Vizualizar';  
?>
<body>
    <div class="contentFornecedor">
        @include('components.navbar') 
        
        <div class="top">
            <h1>Buscar Fornecedor</h1>
            <a href="/fornecedor/create">Novo Fornecedor</a><br>
            @livewire('busca-fornecedor', compact('rota' , 'texto'))
        </div>
    </div>
    </div>
    @include('components.footer') 
    @livewireScripts
</body>

</html>