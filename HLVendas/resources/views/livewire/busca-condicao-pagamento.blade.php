<div>
    <input class="search" type="search" wire:model.live="busca" placeholder="Digite uma descricão...">
    @if(count($condicoes) > 0)
        <div class="tableHead06">
            <table>
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Descricao</th>
                        <th>Quantidade de parcelas</th>
                        <th>Dias entre parcelas</th>
                        <th>Ação</th>
                </thead>
            </table>
        </div>
        <div class="tableBody06">
            <table>
                <tbody>
                    @foreach($condicoes as $condicao)
                        <tr>
                            <td>{{$condicao->id}}</td>
                            <td>{{$condicao->descricao}}</td>
                            <td>{{$condicao->quantparcelas}}</td>
                            <td>{{$condicao->diasparcelas}}</td>
                            @if($rota == 1)
                                <td class="acao"><a href="{{ route('condicaoPagamento.show', $condicao->id) }}">Visualizar</a></td>
                            @endif
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    @else
        <h2>Não há condições de pagamentos registradas</h2>
    @endif
</div>