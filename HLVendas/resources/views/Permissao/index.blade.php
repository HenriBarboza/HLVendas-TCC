<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    @livewireStyles
    <script src="https://cdn.jsdelivr.net/npm/alpinejs@3.x.x/dist/cdn.min.js" defer></script>
    <link rel="icon" href="{{ asset('images/cart-shopping-solid.ico') }}" type="image/x-icon">
    @vite(['resources/scss/cliente.scss', 'resources/scss/tableBusca.scss', 'resources/css/app.css', 'resources/js/app.js', 'resources/js/inputValidation.js', 'resources/js/placeholder.js'])
    <title>HLVendas | Acesso restrito</title>
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
                    <h1>Acesso restrito</h1>
                    <h1>Apenas funcionários com o nível de gerente podem acessar essa página.</h1>
                    </div>
                </div>
            </div>
        </div>
        @include('components.footer') 
</body>

</html>