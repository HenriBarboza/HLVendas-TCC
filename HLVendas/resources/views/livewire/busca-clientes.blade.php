<div>
    <input class="search" type="search" wire:model.live="busca" placeholder="Digite um nome...">
    @if(count($clientes) > 0)
    <table>
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
            @foreach($clientes as $cliente)
                <tr>
                    <td>{{$cliente->id}}</td>
                    <td>{{$cliente->nome}}</td>
                    <td>{{$cliente->telefone}}</td>
                    <td>{{$cliente->cpfcnpj}}</td>
                    <td>{{$cliente->cidade}}</td>
                    @if($rota == 1)
                            <td class="acao"><a href="{{ route('cliente.show', $cliente->id) }}">Visualizar</a></td>
                        @elseif($rota == 2 || 3)
                            <td class="acao">
                                <button @click.prevent class="btn-cliente-id" value="{{$cliente->id}}"
                                    data-nome="{{$cliente->nome}}" @click="open = false">Selecionar</button>
                            </td>
                        @endif
                </tr>
            @endforeach
        </tbody>
    </table>
    @else
        <h2>Não há clientes registrados</h2>
    @endif
    {{ $clientes->links() }}
</div>