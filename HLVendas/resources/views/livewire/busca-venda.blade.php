<div>
    <input type="search" wire:model.debounce.500ms="busca" id="busca" placeholder="Digite uma descrição...">
    @if(count($vendas) > 0)
        <table>
            <thead>
                <tr>
                    <th>Doc</th>
                    <th>Nome do Cliente</th>
                    <th>Nome do Funcionario</th>
                    <th>Total</th>
                    <th>Data de craição</th>
                    <th></th>
                </tr>
            </thead>
            <tbody>
                @foreach($vendas as $venda)
                    <tr @if($venda->condicaopagid == null) style="color:red" @endif>
                        <td>{{ $venda->doc }}</td>
                        <td>{{ $venda->cliente->nome }}</td>
                        <td>{{ $venda->funcionario->nome}}</td>
                        <td>{{ $venda->totalvenda}}</td>
                        <td>{{ $venda->created_at }}</td>
                        <td><a href="{{ route('venda.show', $venda->id) }}">Visualizar</a></td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    @elseif($busca)
        <h2>Não há vendas com essa busca</h2>
    @else
        <p>Não há vendas registradas</p>
    @endif
    {{ $vendas->links() }}

</div>