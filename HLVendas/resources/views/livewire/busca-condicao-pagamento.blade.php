<div>
    <input class="search" type="search" wire:model.live="busca" placeholder="Digite uma descricão...">
    @if(count($condicoes) > 0)
        <table>
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Descricao</th>
                    <th>Quantidade de parcelas</th>
                    <th>Dias entre parcelas</th>
            </thead>
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
    @else
        <h2>Não há condições de pagamentos registradas</h2>
    @endif
    {{ $condicoes->links() }}
</div>