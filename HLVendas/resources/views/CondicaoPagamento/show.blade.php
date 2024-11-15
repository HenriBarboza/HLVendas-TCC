<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    @vite(['resources/scss/header.scss', 'resources/scss/cliente.scss', 'resources/css/app.css', 'resources/js/app.js', 'resources/js/loadingPage.js'])
    <title>Condição de Pagamento</title>
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
                    <h1>Condição de Pagamento</h1>

                    <div class="buttonBack">
                        <a class="return" href="{{route('condicaoPagamento.create')}}">Voltar</a>
                    </div>
                </div>

                <form class="formCliente">
                    @CSRF
                    @method('PUT')
                    <div class="contentInput">
                        <input class="inputWrapper showCliente" type="text" name="id" value="{{$condicoes->id}}"
                            readonly>
                        <label for="id" class="userLabel">
                            <p>Id:</p>
                        </label>
                    </div>
                    <div class="contentInput">
                        <input class="inputWrapper showCliente" type="text" name="descricao"
                            value="{{$condicoes->descricao}}" readonly>
                        <label for="descricao" class="userLabel">
                            <p>Descrição:</p>
                        </label>
                    </div>
                    <div class="contentInput">
                        <div class="inputGroup">
                            <input class="inputWrapper showCliente" type="text" name="datanasc"
                                value="{{$condicoes->quantparcelas}}" disabled>
                            <label class="userLabel" for="datanasc">
                                <p>Quantidade de parcelas:</p>
                            </label>
                        </div>

                        <div class="inputGroup">
                            <input class="inputWrapper showCliente" type="text" name="created_at"
                                value="{{$condicoes->diasparcelas}}" disabled>
                            <label class="userLabel" for="created_at">
                                <p>Quantidade de dias entre parcelas</p>
                            </label>
                        </div>
                    </div>
                    <div class="contentInput">
                        <div class="inputGroup">
                            <label class="labelDate" for="created_at">Data De Cadastro:</label>
                            <input class="inputWrapper" type="datetime-local" name="created_at"
                                value="{{$condicoes->created_at}}" disabled>
                        </div>
                        <div class="inputGroup">
                            <label class="labelDate" for="updated_at">Última Alteração:</label>
                            <input class="inputWrapper" type="datetime-local" name="updated_at"
                                value="{{$condicoes->updated_at}}" disabled>
                        </div>
                    </div>
                    <div class="contentInput">
                        <label class="labelDate" for="updated_at">Permitir alterar valor?</label>
                        @if($condicoes->alterarvalor == 0)
                            <p class="text"><label for="nao">Não</label><br></p>
                        @elseif($condicoes->alterarvalor == 1)
                            <p class="text"><label for="sim">Sim</label></p>
                        @endif
                    </div>
                </form>
                <div class="contentFormAcao">
                    <form class="editCliente" action="{{route('condicaoPagamento.edit', $condicoes->id) }}">
                        <button type="submit">
                            Editar
                        </button>
                    </form>
                    <form class="deleteCliente" id="deleteForm"
                        action="{{route('condicaoPagamento.destroy', $condicoes->id)}}" method="POST">
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