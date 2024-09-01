<div>
    <input type="search" wire:model.live="busca" placeholder="Digite um nome...">
    <table>
        <thead>
            <tr>
                <th>ID</th>
                <th>Nome</th>
                <th>Telefone</th>
                <th>CPF/CNPJ</th>
                <th>Cidade</th>
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
                    <td><a href="{{ route('cliente.' . $rota, $cliente->id) }}">{{$texto}}</a></td>
                </tr>
            @endforeach
        </tbody>
    </table>
    {{ $clientes->links() }}
</div>