<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
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
                        <input type="number" value="{{$doc}}" required>
                    </div>
                    <div class="">
                        <label for="serie">Série:</label>
                        <input type="number" name="serie" required>
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
                        <label for="usuarioid">Funcionário da Venda:</label>
                        <input type="text" name="usuarioid" required>
                        <!-- adicionar o campo mostrando o nome do Funcionário que fez a venda.  -->
                    </div>
                    <div class="">
                        <label for="desconto">Desconto R$:</label>
                        <input type="number" name="desconto" required>
                    </div>
                    <div class="">
                        <label for="perdesc">Desconto %:</label>
                        <input type="number" name="perdesc" required>
                    </div>
                    <div class="">
                        <label for="custoadicional">Custo adiocional R$:</label>
                        <input type="number" name="custoadicional" required>
                    </div>
                    <div class="">
                        <label for="peradd">Custo adiocional %:</label>
                        <input type="number" name="peradd" required>
                    </div>


                    <button type="submit">Salvar</button>
                </div>
        </div>
        </form>
    </div>
    </div>
    @include('components.footer')
</body>

</html>