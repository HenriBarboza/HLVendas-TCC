<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    @livewireStyles
    <script src="https://cdn.jsdelivr.net/npm/alpinejs@3.x.x/dist/cdn.min.js" defer></script>
    @vite(['resources/scss/compra.scss', 'resources/css/app.css', 'resources/js/app.js', 'resources/js/inputValidation.js'])
    <title>Nova Compra</title>
</head>

<?php 
    $rota = 2;
 ?>

<body>
    <div class="contentCompra">
        @include('components.navbar')

        <div class="compraCrud">
            <div class="contentForms">
                <div class="contentButton">
                    <div class="newCompra">
                        <button>
                            <p class="text">Novo Compra</p>
                        </button>
                    </div>

                    <div class="buscaCompra">
                        <button>
                            <p class="text">
                                <a href="/cliente">Buscar compra</a>
                            </p>
                            @if ($message = Session::get('success'))
                            <div class="alert alert-success">
                                {{$message}}
                            </div>
                            @elseif($message = Session::get('error'))
                            <div class="alert alert-success">
                                {{$message}}
                            </div>
                            @endif
                        </button>
                    </div>
                </div>

                <form class="formCompra" action="{{route('compra.store')}}" method="POST">
                    @CSRF
                    <div class="contentInput">
                        <input class="inputWrapper number" type="text" name="doc" placeholder="Documento" required>
                    </div>

                    <div class="contentInput">
                        <input class="inputWrapper w50 number" type="text" name="fornecedorid" placeholder="ID Fornecedor" required>
                        <!-- <input type="text" name="fornecedorid" placeholder="ID" required>  adicionar nome do fornecedor-->
                        <input class="inputWrapper w50" type="text" name="formapg" placeholder="Forma de pagamento" required>
                    </div>

                    <div class="contentInput">
                        <input class="inputWrapper" type="text" value="{{Auth::user()->id}}" hidden name="funcionarioid" placeholder="Funcionário da Venda" required>
                        <input class="inputWrapper" type="text" value="{{Auth::user()->name}}" disabled>
                        <!-- adicionar o campo mostrando o nome do Funcionário que fez a venda.  -->
                    </div>
                    <div class="contentInput">
                        <input class="inputWrapper w50 number" type="text" name="desconto" placeholder="Desconto R$">
                        <input class="inputWrapper w50 number" type="text" name="perdesc" placeholder="Desconto %">
                    </div>

                    <div class="contentInput">
                        <input class="inputWrapper w50 number" type="text" name="custoadicional" placeholder="Custo adiocional R$">
                        <input class="inputWrapper w50 number" type="text" name="peradd" placeholder="Custo adiocional %">
                    </div>
 
                    @livewire('modal-component', compact('rota'))
                    @livewire('compra-component')
                    <br>
                    <!-- <button type="submit">Salvar</button> -->
                    <div class="button">
                        <button type="submit">
                            <p class="text">
                                Salvar
                            </p>
                        </button>
                    </div>
                </form>
            </div>
        </div>
        @livewireScripts
        @include('components.footer')
    </div>
</body>

</html>