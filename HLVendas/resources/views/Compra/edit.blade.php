<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    @livewireStyles
    <script src="https://cdn.jsdelivr.net/npm/alpinejs@3.x.x/dist/cdn.min.js" defer></script>
    <link rel="icon" href="{{ asset('images/cart-shopping-solid.ico') }}" type="image/x-icon">
    @vite(['resources/scss/compra.scss', 'resources/css/app.css', 'resources/scss/tableBusca.scss', 'resources/js/app.js', 'resources/js/buttonSelect.js', 'resources/js/inputValidation.js', 'resources/js/loadingPage.js'])
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

        @if ($message = Session::get('success'))
            <div id="success-message"
                class="notification bg-green-500 text-white px-4 py-3 rounded shadow-lg flex justify-between items-center opacity-0 transition-opacity duration-500 fixed top-4 right-4 z-50">
                <div>
                    <p class="font-bold text-white">Sucesso!</p>
                    <p class="text-white">{{ $message }}</p>
                </div>
            </div>
        @endif

        @if ($message = Session::get('error'))
            <div id="error-message"
                class="notification bg-red-500 text-white px-4 py-3 rounded shadow-lg flex justify-between items-center opacity-0 transition-opacity duration-500 fixed top-4 right-4 z-50">
                <div>
                    <p class="font-bold text-white">Erro!</p>
                    <p class="text-white">{{ $message }}</p>
                </div>
            </div>
        @endif

        <div class="compraCrud">
            <div class="contentForms">
                <div class="contentButton">
                    <div class="newCompra">
                        <h1 class="title">Editar Compra</h1>
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
                        <input class="inputWrapper number placeholderActive" type="text" name="doc"
                            value="{{$compra->doc}}" disabled>
                        <label for="doc" class="userLabel">
                            <p class="text">
                                Documento
                            </p>
                        </label>
                    </div>
                    <div class="contentInput">
                        <div class="inputGroup">
                            <input class="inputWrapper" type="number" name="fornecedorid" id="inpFornecedorId" hidden
                                value="{{$compra->fornecedorid}}" required>
                            <input class="inputWrapper showCompra" type="text" value="{{$compra->fornecedor->nome}}"
                                id="inpFornecedorNome" disabled>
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
                            <label for="contaid" class="userLabel">
                                <p class="text">
                                    Conta
                                </p>
                            </label>
                        </div>
                        <div class="inputGroup">
                            <input class="inputWrapper" type="text" value="{{Auth::user()->id}}" hidden
                                name="funcionarioid" placeholder="Funcionário da Venda" required>
                            <input class="inputWrapper showCompra" type="text" value="{{Auth::user()->name}}" disabled>

                            <label for="funcionarioid" class="userLabel">
                                <p class="text">
                                    Funcionário da venda
                                </p>
                            </label>
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
    <script>
        function mostrarMensagem() {
            // Cria a div de sucesso
            const successMessage = document.createElement('div');
            successMessage.id = 'success-message';
            successMessage.classList.add('notification', 'bg-yellow-500', 'text-white', 'px-4', 'py-3', 'rounded', 'shadow-lg', 'flex', 'justify-between', 'items-center', 'fixed', 'top-4', 'right-4', 'z-50');

            // Cria o conteúdo da mensagem
            const messageContent = `
            <div>
                <p class="font-bold text-white">Aviso!</p>
                <p class="text-white">O produto já foi adicionado na compra!</p>
            </div>
        `;

            // Adiciona o conteúdo à div
            successMessage.innerHTML = messageContent;

            // Adiciona a mensagem ao body da página
            document.body.appendChild(successMessage);

            const notifications = document.querySelectorAll(".notification");

            notifications.forEach((notification) => {
                // Mostra a notificação com transição
                setTimeout(() => {
                    notification.classList.add("opacity-100"); // Aparece
                }, 700);

                // Esconde a notificação após 5 segundos
                setTimeout(() => {
                    notification.classList.remove("opacity-100"); // Desaparece
                    setTimeout(() => {
                        notification.style.display = "none"; // Remove do DOM após a transição
                    }, 500); // Tempo da transição (500ms)
                }, 5000); // Tempo de exibição (5 segundos)
            });
        }
    </script>
</body>

</html>