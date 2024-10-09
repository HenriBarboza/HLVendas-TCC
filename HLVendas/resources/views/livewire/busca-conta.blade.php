<div>
<input type="search" wire:model.live="busca" placeholder="Digite um nome...">
    @if(count($contas) > 0)
        <table >
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Descrição</th>
                    <th>Total</th>
                    <th>Ação</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($contas as $conta)
                    <tr>
                        <td>{{$conta->id}}</td>
                        <td>{{$conta->nome}}</td>
                        <td>{{$conta->total ?? 0}}</td>
                        @if($rota == 1)
                            <td><a href="{{ route('conta.show', $conta->id) }}">Visualizar</a></td>
                        @elseif($rota == 2)
                            //
                        @endif
                    </tr>
                @endforeach
            </tbody>
        </table>
    @else
        <h2>Não há contas registrados</h2>
    @endif
    {{ $contas->links() }}
</div>
