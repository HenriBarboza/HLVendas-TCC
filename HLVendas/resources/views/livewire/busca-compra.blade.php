<div>
    <input type="search" wire:model.debounce.500ms="busca" id="busca" placeholder="Digite uma descrição...">
    @if(count($compras) > 0 )
    <table>
        <thead>
            <tr>
                <th>Doc</th>
                <th>Nome do Fornecedor</th>
                <th>Nome do Funcionario</th>
                <th>Total</th>
                <th>Data de craição</th>
                <th></th>
            </tr>
        </thead>
        <tbody>
            @foreach($compras as $compra)
                <tr>
                    <td>{{ $compra->doc }}</td>
                    <td>{{ $compra->fornecedor->nome ?? 'Fornecedor não encontrado' }}</td>
                    <td>{{ $compra->funcionario->nome ?? 'Fornecedor não encontrado' }}</td>
                    <td>{{ $compra->totalcompra ?? 'Fornecedor não encontrado' }}</td>
                    <td>{{ $compra->created_at }}</td>
                    <td><a href="{{ route('compra.show', $compra->id) }}">Visualizar</a></td>
                </tr>
            @endforeach
        </tbody>
    </table>
    @elseif($busca)
    <h2>Não há compras com essa busca</h2>
    @else
    <p>Não há compras registradas</p>
    @endif
    {{ $compras->links() }}

</div>