<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    @vite(['resources/scss/header.scss', 'resources/scss/cliente.scss', 'resources/css/app.css', 'resources/js/app.js', 'resources/js/loadingPage.js'])
    <title>Manutenção de estoque</title>
</head>

<body>
    <div class="contentCliente">
        <div class="box">
            @include('components.navbar') 
        </div>
        <div class="loader">
            <div class="loading"></div>
        </div>

        <div class="clienteCrud">
            <div class="contentForms">
                <div class="contentButton">
                    <h1>Manutenção de estoque</h1>

                    <div class="buttonBack">
                        <a class="return" href="{{route('estoque.create')}}">Voltar</a>
                    </div>
                </div>

                <form class="formCliente">
                    @CSRF
                    @method('PUT')
                    <div class="contentInput">
                        <input class="inputWrapper showCliente" type="text" name="id" value="{{$movimentos->id}}"
                            readonly>
                        <label for="id" class="userLabel">
                            <p>Id:</p>
                        </label>
                    </div>
                    <div class="contentInput">
                        <input class="inputWrapper showCliente" type="text" name="motivo"
                            value="{{$movimentos->motivo}}" readonly>
                        <label for="motivo" class="userLabel">
                            <p>Motivo:</p>
                        </label>
                    </div>
                    <div class="contentInput">
                        <div class="inputGroup">
                            <input class="inputWrapper showCliente" type="text" name="produtoid"
                                value="{{$movimentos->produto->descricao}}" readonly>
                            <label for="produtoid" class="userLabel">
                                <p>Produto:</p>
                            </label>
                        </div>
                        <div class="inputGroup">
                            <input class="inputWrapper showCliente" type="text" name="quantidade"
                                value="{{$movimentos->quantidade}}" readonly>
                            <label class="userLabel" for="quantidade">
                                <p>Quantidade:</p>
                            </label>
                        </div>
                    </div>
                    <div class="contentInput">
                        <label class="labelDate" for="updated_at">Tipo de movimento:</label>
                        @if($movimentos->tipomovimentacao == 'E')
                            <p class="text"><label for="entrada">Entrada</label><br></p>
                        @elseif($movimentos->tipomovimentacao == 'S')
                            <p class="text"><label for="saida">Saída</label></p>
                        @endif
                    </div>
                    <div class="contentInput">
                        <input class="inputWrapper showCliente" type="text" name="observacao"
                            value="{{$movimentos->observacao}}" readonly>
                        <label for="observacao" class="userLabel">
                            <p>Observação:</p>
                        </label>
                    </div>
                    <div class="contentInput">
                        <div class="contentInput">
                            <div class="inputGroup">
                                <label class="labelDate" for="created_at">Data De Cadastro:</label>
                                <input class="inputWrapper" type="datetime-local" name="created_at"
                                    value="{{$movimentos->created_at}}" readonly>
                            </div>
                            <div class="inputGroup">
                                <label class="labelDate" for="updated_at">Última Alteração:</label>
                                <input class="inputWrapper" type="datetime-local" name="updated_at"
                                    value="{{$movimentos->updated_at}}" readonly>
                            </div>
                        </div>
                </form>
                <div class="contentFormAcao">
                    <form class="editCliente" action="{{route('estoque.edit', $movimentos->id) }}">
                        <button type="submit">
                            Editar
                        </button>
                    </form>
                    <form class="deleteCliente" id="deleteForm"
                        action="{{route('estoque.destroy', $movimentos->id)}}" method="POST">
                        @csrf
                        @method('DELETE')
                        <div class="">
                            <div class="">
                                <button type="button" onclick="confirmarExclusao()">Excluir</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script>
        function confirmarExclusao() {
            Swal.fire({
                title: 'Tem certeza?',
                text: 'Você não poderá reverter isso!',
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Sim, excluir!',
                cancelButtonText: 'Cancelar'
            }).then((result) => {
                if (result.isConfirmed) {
                    document.getElementById('deleteForm').submit();
                }
            });
        }
    </script>
</body>

</html>