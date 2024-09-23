<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    @livewireStyles
    <script src="https://cdn.jsdelivr.net/npm/alpinejs@3.x.x/dist/cdn.min.js" defer></script>
    @vite(['resources/scss/compra.scss', 'resources/css/app.css', 'resources/js/app.js', 'resources/js/buttonSelect.js', 'resources/js/inputValidation.js'])
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
                        <!-- <button>
                            <p class="text">Nova Compra</p>
                        </button> -->
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

                    <div class="buscaCompra">
                        <button>
                            <p class="text">
                                <a href="/cliente">Buscar compra</a>
                            </p>
                        </button>
                    </div>
                </div>
                <form class="formCompra" action="{{route('compra.store')}}" method="POST">
                    @CSRF
                    <div class="contentInput">
                        <input class="inputWrapper number" type="text" name="doc" placeholder="Documento" required>
                    </div>
                    <div class="">
                        <label for="fornecedorid">Fornecedor:</label>
                        @livewire('modal-fornecedor-component', compact(var_name: 'rota'))
                        <input type="number" name="fornecedorid" id="inpFornecedorId" hidden required>
                        <input type="text" placeholder="Fornecedor" id="inpFornecedorNome" disabled>
                    </div>
                    <div class="">
                        <label for="conta">Conta:</label>
                        <select name="conta">
                            <option value="1">Conta Padrão</option>
                            <option value="2">Conta caixa</option>
                        </select>
                    </div>
                    <div class="contentInput">
                        <input class="inputWrapper" type="text" value="{{Auth::user()->id}}" hidden name="funcionarioid"
                            placeholder="Funcionário da Venda" required>
                        <input class="inputWrapper" type="text" value="{{Auth::user()->name}}" disabled>
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