<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    @livewireStyles
    <script src="https://cdn.jsdelivr.net/npm/alpinejs@3.x.x/dist/cdn.min.js" defer></script>
    <link rel="icon" href="{{ asset('images/cart-shopping-solid.ico') }}" type="image/x-icon">
    @vite(['resources/scss/venda.scss', 'resources/css/app.css', 'resources/scss/tableBusca.scss','resources/js/app.js', 'resources/js/buttonSelect.js', 'resources/js/inputValidation.js', 'resources/js/loadingPage.js'])
    <title>HLVendas | Nova venda</title>
</head>

<?php 
    $rota = 3;
 ?>

<body>
    <div class="contentVenda">
        <div class="box">
            @include('components.navbar')
        </div>
        <div class="loader">
            <div class="loading"></div>
        </div>

        <div class="vendaCrud">
            <div class="contentForms">
                <div class="contentButton">
                    <div class="newVenda">
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
                    <div class="buscaVenda">
                        @livewire('modal-venda-component')
                    </div>
                </div>
                <form class="formVenda" action="{{route('venda.store')}}" method="POST">
                    @CSRF
                    <div class="contentInput">
                        <input autocomplete="off" class="inputWrapper number" type="text" name="doc" required="">
                        <label for="doc" class="userLabel">
                            <p>Documento</p>
                        </label>
                    </div>
                    <div class="contentInput">
                        <div class="inputGroup">
                            <input class="inputWrapper" type="number" name="clienteid" id="inpClienteId" required="" hidden>
                            <input style="border-color: #0B57D0;" class="inputWrapper" type="text" id="inpClienteNome" disabled>
                            <label for="clienteid" class="userLabel">
                                <p>Cliente</p>
                            </label>
                        </div>
                        <div class="inputGroup">
                            <div class="livewire">
                                @livewire('modal-cliente-component', compact(var_name: 'rota'))
                            </div>
                        </div>
                    </div>
                    <div class="contentInput">
                        <input class="inputWrapper" type="text" value="{{Auth::user()->id}}" hidden name="funcionarioid"
                         required="">
                        <input style="border-color: #0B57D0;" class="inputWrapper" type="text" value="{{Auth::user()->name}}" disabled>
                        <label for="funcionarioid" class="userLabel">
                            <p>Funcionário da venda</p>
                        </label>
                    </div>
                    <div class="contentInput">
                        <div class="inputGroup">
                            <select class="inputWrapper" name="contaid" required>
                                @foreach($contas as $conta)
                                    <option value="{{$conta->id}}">{{$conta->nome}}</option>
                                @endforeach
                            </select>
                        </div>

                        <div class="inputGroup">
                            <div x-data="{ tabelapreco: 'AV' }" required="">
                                <select x-model="tabelapreco" class="inputWrapper" name="tabelapreco"
                                    @change="$dispatch('tabelaPrecoAtualizada', {tabelaPreco: tabelapreco})" required="">
                                    <option value="AV">À vista</option>
                                    <option value="AP">A prazo</option>
                                </select>
                            </div>
                        </div>
                    </div>
                    <div class="livewire">
                        @livewire('modal-component', compact('rota'))
                        @livewire('venda-component')
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
        <!-- </div> -->
        @livewireScripts
        @include('components.footer')
    </div>
</body>

</html>