<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    @livewireStyles
    <script src="https://cdn.jsdelivr.net/npm/alpinejs@3.x.x/dist/cdn.min.js" defer></script>
    @vite(['resources/scss/home.scss', 'resources/css/app.css', 'resources/js/app.js'])
    <title>Nova Compra</title>
</head>

<body>
    @include('components.navbar')
    <div class="corpo">
        <div class="top">
            <h1>Novo Compra</h1>
            <a href="/cliente">Buscar compra</a>
            <!-- @if ($message = Session::get('success'))
            <div class="alert alert-success">
{{$message}}
            </div>



        @endif -->
        </div>
        <div>
            <form action="{{route('compra.store')}}" method="POST">
                @CSRF
                <div class="">
                    <div class="">
                        <label for="doc">Documento:</label>
                        <input type="number" value="{{$doc}}">
                    </div>
                    <div class="">
                        <label for="fornecedorid">Fornecedor:</label>
                        <input type="number" name="fornecedorid" placeholder="ID">
                        <!-- <input type="text" name="fornecedorid" placeholder="ID" required>  adicionar nome do fornecedor-->
                    </div>
                    <div class="">
                        <label for="formapg">Forma de pagamento:</label>
                        <input type="text" name="formapg">
                    </div>
                    <div class="">
                        <label for="usuarioid">Funcionário da Venda:</label>
                        <input type="text" name="usuarioid">
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

                    @livewire('modal-component')

                    <br>
                    <button type="submit">Salvar</button>
                </div>
        </div>
        </form>
    </div>
    @livewireScripts
    @include('components.footer')
</body>

</html>