<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    @livewireStyles
    <script src="https://cdn.jsdelivr.net/npm/alpinejs@3.x.x/dist/cdn.min.js" defer></script>
    @vite(['resources/scss/header.scss', 'resources/scss/cliente.scss', 'resources/scss/tableBusca.scss', 'resources/css/app.css', 'resources/js/app.js', 'resources/js/inputValidation.js', 'resources/js/placeholder.js'])
    <title>Novo Cliente</title>
    <style>
        /* Inicialmente, a div é ocultada */
        .buscaCliente {
            display: none;
            /* Inicialmente, ambas as divs são ocultadas */
        }

        #div1 {
            display: block;
            /* A div1 será visível inicialmente */
        }
    </style>
</head>

<?php 
    $rota = 1;
 ?>


<body>
    <div class="contentCliente">
        <div class="box">
            @include('components.navbar')
        </div>

        <div class="clienteCrud">
            <div class="contentForms">
                <div class="contentButton">
                    <div class="newCliente">
                    <h1>Cadastro inativo</h1>
                    <h1>Para que voce consiga acessar com esse login, peça para um gerente te registrar como funcionário.</h1>
                    </div>
                </div>
            </div>
        </div>
        @include('components.footer') 
</body>

</html>