<div>
    <input type="search" wire:model.debounce.500ms="busca" id="busca" placeholder="Digite uma descrição...">
    @if(count($compras) > 0)
        <div class="tableHead06">

            <table>
                <thead>
                    <tr>
                        <th>Doc</th>
                        <th>Nome do Fornecedor</th>
                        <th>Nome do Funcionario</th>
                        <th>Total</th>
                        <th>Data de craição</th>
                        <th>Ação</th>
                    </tr>
                </thead>
            </table>
        </div>
        <div class="tableBody06">
            <table>
                <tbody>
                    @foreach($compras as $compra)
                        <tr>
                            <td>{{ $compra->doc }}</td>
                            <td>{{ $compra->fornecedor->nome}}</td>
                            <td>{{ $compra->funcionario->nome}}</td>
                            <td>{{ $compra->totalcompra}}</td>
                            <td>{{ $compra->created_at }}</td>
                            <td class="acao"><a href="{{ route('compra.show', $compra->id) }}">Visualizar</a></td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    @elseif($busca)
        <h2>Não há compras com essa busca</h2>
    @else
        <p>Não há compras registradas</p>
    @endif
</div>