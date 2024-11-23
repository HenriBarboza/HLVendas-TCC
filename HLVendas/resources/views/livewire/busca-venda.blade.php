<div>
    <input class="search" type="search" wire:model.live="busca" id="busca" placeholder="Digite um cliente ou funcionário...">
    @if(count($vendas) > 0)
        <div class="tableHead06">
            <table>
                <thead>
                    <tr>
                        <th>Doc</th>
                        <th>Nome do Cliente</th>
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
                    @foreach($vendas as $venda)
                        <tr @if($venda->condicaopagid == null) style="color:red" @endif>
                            <td>{{ $venda->doc }}</td>
                            <td>{{ $venda->cliente->nome }}</td>
                            <td>{{ $venda->funcionario->nome}}</td>
                            <td>{{ $venda->totalvenda}}</td>
                            <td>{{ $venda->created_at }}</td>
                            <td class="acao"><a href="{{ route('venda.show', $venda->id) }}">Visualizar</a></td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    @elseif($busca)
        <h2>Não há vendas com essa busca</h2>
    @else
        <p>Não há vendas registradas</p>
    @endif
</div>