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
            @foreach ($fornecedores as $fornecedor)
                    <tr>
                        <td>{{$fornecedor->id}}</td>
                        <td>{{$fornecedor->nome}}</td>
                        <td>{{$fornecedor->telefone}}</td>
                        <td>{{$fornecedor->cpfcnpj}}</td>
                        <td>{{$fornecedor->cidade}}</td>
                        <td><a href="{{ route('fornecedor.' . $rota, $fornecedor->id) }}">{{$texto}}</a></td>
                    </tr>
            @endforeach
        </tbody>
    </table>
    {{ $fornecedores->links() }}
</div>