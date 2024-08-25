<div>
    <input type="search" wire:model.live="busca" placeholder="Digite um nome...">
    <table>
        <thead>
            <tr>
                <th></th>
                <th>ID</th>
                <th>Nome</th>
                <th>Telefone</th>
                <th>CPF/CNPJ</th>
                <th>Cidade</th>
                <th></th>
            </tr>
        </thead>
        <tbody>
            @foreach ($pessoas as $pessoa)
                @if($pessoa->tipo == 'F')
                    <tr>
                        <td>{{$pessoa->id}}</td>
                        <td>{{$pessoa->nome}}</td>
                        <td>{{$pessoa->telefone}}</td>
                        <td>{{$pessoa->cpfcnpj}}</td>
                        <td>{{$pessoa->cidade}}</td>
                        <td><a href="{{ route('fornecedor.' . $rota, $pessoa->fornecedor->id) }}">{{$texto}}</a></td>
                    </tr>
                @endif
            @endforeach
        </tbody>
    </table>
    {{ $pessoas->links() }}
</div>