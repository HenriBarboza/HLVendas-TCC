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
                        <tr>
                            <td @if($venda->condicaopagid == null) style="color:red !important" @endif>{{ $venda->doc }}</td>
                            <td @if($venda->condicaopagid == null) style="color:red !important" @endif>{{ $venda->cliente->nome }}</td>
                            <td @if($venda->condicaopagid == null) style="color:red !important" @endif>{{ $venda->funcionario->nome}}</td>
                            <td @if($venda->condicaopagid == null) style="color:red !important" @endif>{{ $venda->totalvenda}}</td>
                            <td @if($venda->condicaopagid == null) style="color:red !important" @endif>{{ $venda->created_at }}</td>
                            <td @if($venda->condicaopagid == null) style="color:red !important" @endif class="acao"><a href="{{ route('venda.show', $venda->id) }}">Visualizar</a></td>
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