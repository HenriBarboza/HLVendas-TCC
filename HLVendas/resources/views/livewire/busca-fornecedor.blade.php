<div>
    <input type="search" wire:model.live="busca" placeholder="Digite um nome...">
    @if(count($fornecedores) > 0)
        <table >
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Nome</th>
                    <th>Telefone</th>
                    <th>CPF/CNPJ</th>
                    <th>Cidade</th>
                    <th>Ação</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($fornecedores as $fornecedor)
                    <tr>
                        <td>{{$fornecedor->id}}</td>
                        <td>{{$fornecedor->nome}}</td>
                        <td>{{$fornecedor->telefone}}</td>
                        <td>{{$fornecedor->cpfcnpj}}</td>
                        <td>{{$fornecedor->cidade}}</td>
                        @if($rota == 1)
                            <td><a href="{{ route('fornecedor.show', $fornecedor->id) }}">Visualizar</a></td>
                        @elseif($rota == 2)
                            <td>
                                <button @click.prevent class="btn-fornecedor-id" value="{{$fornecedor->id}}"
                                    data-nome="{{$fornecedor->nomefantasia}}" @click="open = false">Selecionar</button>
                            </td>
                        @endif
                    </tr>
                @endforeach
            </tbody>
        </table>
    @else
        <h2>Não há fornecedores registrados</h2>
    @endif
    {{ $fornecedores->links() }}
</div>
