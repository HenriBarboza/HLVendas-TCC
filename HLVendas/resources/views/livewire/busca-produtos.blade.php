<div>
    @if(count($produtos) > 0)
        <input type="search" wire:model.live="busca" placeholder="Digite uma descrição...">
        <table>
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Descricao</th>
                    <th>Preço AV</th>
                    <th>Preço AP</th>
                    <th>Categoria</th>
                    <th>Estoque</th>
                    <th>Ação</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($produtos as $produto)
                    <tr>
                        <td>{{$produto->id}}</td>
                        <td>{{$produto->descricao}}</td>
                        <td>{{$produto->precoavista}}</td>
                        <td>{{$produto->precoaprazo}}</td>
                        <td>{{$produto->categoria}}</td>
                        <td>{{$produto->estoque}}</td>
                        @if($rota == 1)
                            <td><a href="{{route('produto.show', $produto->id) }}">Visualizar</a></td>
                        @elseif($rota == 2)
                            <td><button @click.prevent="open = true"  wire:click="adicionarProduto({{ $produto->id }})">Adicionar</button></td>
                        @endif
                    </tr>
                @endforeach
            </tbody>
        </table>
    @else
        <h2>Não há produtos registrados</h2>
    @endif
    {{ $produtos->links() }}
</div>