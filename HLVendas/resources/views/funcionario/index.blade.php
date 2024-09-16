<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    @vite(['resources/scss/funcionario.scss', 'resources/css/app.css', 'resources/js/app.js'])
    <title>Buscar Funcionario</title>
    @livewireStyles
</head>

<?php 
    $rota = 'show';  
    $texto = 'Vizualizar';  
?>

<body>
    <div class="contentFuncionario">
        @include('components.navbar') 
        <div class="top">
            <h1>Buscar Funcionario</h1>
            <a href="/funcionario/create">Novo Funcionario</a><br>
            @livewire('busca-funcionarios', compact('rota' , 'texto'))
        </div>
    </div>
    @include('components.footer') 
    @livewireScripts
</body>

</html>