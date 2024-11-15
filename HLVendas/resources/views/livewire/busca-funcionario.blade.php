<div>
<input type="search" wire:model.live="busca" placeholder="Digite um nome...">
    <table>
        <thead>
            <tr>
                <th>ID</th>
                <th>Nome</th>
                <th>Email</th>
                <th>Telefone</th>
                <th>CPF/CNPJ</th>
                <th></th>
            </tr>
        </thead>
        <tbody>
            @foreach($funcionarios as $funcionario)
                <tr>
                    <td>{{$funcionario->id}}</td>
                    <td>{{$funcionario->nome}}</td>
                    <td>{{$funcionario->email}}</td>
                    <td>{{$funcionario->telefone}}</td>
                    <td>{{$funcionario->cpfcnpj}}</td>
                    @if($rota == 1)
                    <td><a href="{{ route('funcionario.show', $funcionario->id) }}">Visaualizar</a></td>
                    @endif
                </tr>
            @endforeach
        </tbody>
    </table>
    {{ $funcionarios->links() }}
</div>
