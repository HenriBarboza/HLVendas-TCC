<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    @livewireStyles
    <script src="https://cdn.jsdelivr.net/npm/alpinejs@3.x.x/dist/cdn.min.js" defer></script>
    <link rel="icon" href="{{ asset('images/cart-shopping-solid.ico') }}" type="image/x-icon">
    @vite(['resources/scss/compra.scss', 'resources/css/app.css', 'resources/scss/tableBusca.scss' ,'resources/js/app.js', 'resources/js/buttonSelect.js', 'resources/js/inputValidation.js', 'resources/js/loadingPage.js'])
    <title>HLVendas | Editar compra</title>
</head>

<?php 
    $rota = 2;
 ?>

<body>
    <div class="contentCompra">
        <div class="box">
            @include('components.navbar')
        </div>
        <div class="loader">
            <div class="loading"></div>
        </div>

        <div class="compraCrud">
            <div class="contentForms">
                <div class="contentButton">
                    <div class="newCompra">
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
                    <div class="buttonBack">
                        <a class="return" href="{{ route('compra.create') }}">
                            Cancelar
                        </a>
                    </div>
                </div>
                <form class="formCompra" action="{{route('compra.update', $compra->id)}}" method="POST">
                    @CSRF
                    @method('PUT')
                    <div class="contentInput">
                        <input class="inputWrapper number showCompra" type="text" name="doc"
                            value="{{$compra->doc}}" disabled>
                        <label for="doc" class="userLabel">
                            <p class="text">
                                Documento
                            </p>
                        </label>
                    </div>
                    <div class="contentInput">
                        <div class="inputGroup">
                            <input class="inputWrapper placeholderActive" type="number" name="fornecedorid" id="inpFornecedorId" hidden
                            value="{{$compra->fornecedorid}}"  required>
                            <input class="inputWrapper" type="text"
                            value="{{$compra->fornecedor->nome}}" id="inpFornecedorNome" disabled>
                            <label for="fornecedorid" class="userLabel">
                                <p class="text">
                                    Fornecedor
                                </p>
                            </label>
                        </div>

                        <div class="inputGroup">
                            @livewire('modal-fornecedor-component', compact(var_name: 'rota'))
                        </div>
                    </div>

                    <div class="contentInput">
                        <div class="inputGroup">
                            <select class="inputWrapper w50" name="contaid">
                                <option value="{{$compra->contaid}}">{{$compra->conta->nome}}</option>
                                @foreach ($contas as $conta)
                                    <option value="{{$conta->id}}">{{$conta->nome}}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="inputGroup">
                            <input class="inputWrapper" type="text" value="{{Auth::user()->id}}" hidden name="funcionarioid"
                                placeholder="Funcionário da Venda" required>
                            <input class="inputWrapper" type="text" value="{{Auth::user()->name}}" disabled>
                        </div>
                    </div>
                    
                    <div class="livewire">
                        @livewire('modal-component', compact('rota'))
                        @livewire('compra-component', ['compra' => $produtos])
                    </div>
                    <br>
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
    </div>
</body>

</html>