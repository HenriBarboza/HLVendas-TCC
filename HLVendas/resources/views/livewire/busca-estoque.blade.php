<div>
    <input class="search" type="search" wire:model.live="busca" placeholder="Digite um nome...">
    @if(count($movimentos) > 0)
        <table>
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Motivo</th>
                    <th>Produto</th>
                    <th>Data</th>
                    <th>Ação</th>
                </tr>
            </thead>
            <tbody>
                @foreach($movimentos as $movimento)
                    <tr>
                        <td>{{$movimento->id}}</td>
                        <td>{{$movimento->motivo}}</td>
                        <td>{{$movimento->produto->descricao}}</td>
                        <td>{{$movimento->created_at}}</td>
                        @if($rota == 4)
                            <td class="acao"><a href="{{ route('estoque.show', $movimento->id) }}">Visualizar</a></td>
                        @endif
                    </tr>
                @endforeach
            </tbody>
        </table>
    @else
        <h2>Não há movimentos de estoque registrados</h2>
    @endif
</div>