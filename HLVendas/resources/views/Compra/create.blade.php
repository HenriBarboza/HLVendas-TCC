<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    @livewireStyles
    <script src="https://cdn.jsdelivr.net/npm/alpinejs@3.x.x/dist/cdn.min.js" defer></script>
    @vite(['resources/scss/compra.scss', 'resources/css/app.css', 'resources/js/app.js'])
    <title>Nova Compra</title>
</head>

<?php 
    $rota = 2;
 ?>

<body>
    <div class="contentCompra">
        @include('components.navbar')

        <div class="compraCrud">
            <div class="contentButton">
                <h1>Novo Compra</h1>
                <a href="/cliente">Buscar compra</a>
                @if ($message = Session::get('success'))
                    <div class="alert alert-success">
                        {{$message}}
                    </div>
                @elseif($message = Session::get('error'))
                    <div class="alert alert-success">
                        {{$message}}
                    </div>
                @endif
            </div>

            <form class="formCompra" action="{{route('compra.store')}}" method="POST">
                @CSRF
                <div class="">
                    <div class="">
                        <label for="doc">Documento:</label>
                        <input type="number" name="doc" required>
                    </div>
                    <div class="">
                        <label for="fornecedorid">Fornecedor:</label>
                        <input type="number" name="fornecedorid" placeholder="ID" required>
                        <!-- <input type="text" name="fornecedorid" placeholder="ID" required>  adicionar nome do fornecedor-->
                    </div>
                    <div class="">
                        <label for="formapg">Forma de pagamento:</label>
                        <input type="text" name="formapg" required>
                    </div>
                    <div class="">
                        <label for="funcionarioid">Funcionário da Venda:</label>
                        <input type="text" value="{{Auth::user()->id}}" hidden name="funcionarioid" required>
                        <input type="text" value="{{Auth::user()->name}}" disabled>
                        <!-- adicionar o campo mostrando o nome do Funcionário que fez a venda.  -->
                    </div>
                    <div class="">
                        <label for="desconto">Desconto R$:</label>
                        <input type="number" name="desconto">
                    </div>
                    <div class="">
                        <label for="perdesc">Desconto %:</label>
                        <input type="number" name="perdesc">
                    </div>
                    <div class="">
                        <label for="custoadicional">Custo adiocional R$:</label>
                        <input type="number" name="custoadicional">
                    </div>
                    <div class="">
                        <label for="peradd">Custo adiocional %:</label>
                        <input type="number" name="peradd">
                    </div>

                    @livewire('modal-component', compact('rota'))
                    @livewire('compra-component')
                    <br>
                    <!-- <button type="submit">Salvar</button> -->
                </div>
                <button type="submit">Salvar</button>
            </form>
        </div>
    </div>
    @livewireScripts
    @include('components.footer')
</body>

</html>