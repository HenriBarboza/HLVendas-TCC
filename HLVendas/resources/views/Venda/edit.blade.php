<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    @livewireStyles
    <script src="https://cdn.jsdelivr.net/npm/alpinejs@3.x.x/dist/cdn.min.js" defer></script>
    @vite(['resources/scss/venda.scss', 'resources/css/app.css', 'resources/js/app.js', 'resources/js/buttonSelect.js', 'resources/js/inputValidation.js'])
    <title>Editar Venda</title>
</head>

<?php 
    $rota = 3;
 ?>

<body>
    <div class="contentCompra">
        <div class="box">
            @include('components.navbar')
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
                    <div class="buscaCompra">
                        @livewire('modal-venda-component')
                    </div>
                </div>
                <form class="formCompra" action="{{route('venda.update', $venda->id)}}" method="POST">
                    @CSRF
                    @method('PUT')
                    <div class="contentInput">
                        <input class="inputWrapper number" type="text" name="doc" value="{{$venda->doc}}" readonly
                            placeholder="Documento" required>
                    </div>
                    <input class="inputWrapper number" type="text" name="condicaopagid" hidden>
                    @livewire('modal-cliente-component', compact(var_name: 'rota'))
                    <div class="contentInput">
                        <input class="inputWrapper" type="number" name="clienteid" value="{{$venda->clienteid}}"
                            id="inpClienteId" hidden required>
                        <input class="inputWrapper w50" type="text" placeholder="Cliente"
                            value="{{$venda->cliente->nome}}" id="inpClienteNome" disabled>

                        <select class="inputWrapper w50" name="contaid">
                            <option value="{{$venda->contaid}}">{{$venda->conta->nome}}</option>
                            @foreach($contas as $conta)
                                <option value="{{$conta->id}}">{{$conta->nome}}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="contentInput">
                        <input class="inputWrapper" type="text" value="{{Auth::user()->id}}" hidden name="funcionarioid"
                            placeholder="Funcionário da Venda" required>
                        <input class="inputWrapper w50" type="text" value="{{Auth::user()->name}}" disabled>
                        <div x-data="{ tabelapreco: '{{$venda->tabelapreco == 'AP' ? 'AP' : 'AV' }}' }">
                            <select x-model="tabelapreco" class="inputWrapper w50" name="tabelapreco"
                                @change="$dispatch('tabelaPrecoAtualizada', {tabelaPreco: tabelapreco})">
                                <option value="AV">À vista</option>
                                <option value="AP">À prazo</option>
                            </select>
                        </div>
                    </div>
                    <br>
                    @livewire('modal-component', compact('rota'))
                    @livewire('venda-component', ['venda' => $produtos])
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