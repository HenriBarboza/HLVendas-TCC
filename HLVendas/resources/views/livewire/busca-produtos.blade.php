<div>
    <input type="search" wire:model.live="busca" id="busca" placeholder="Digite uma descrição...">
    @if(count($produtos) > 0 && $busca)
        <table>
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Descricao</th>
                    <th>Preço AV</th>
                    <th>Preço AP</th>
                    <th>Categoria</th>
                    <th>Estoque</th>
                    <th>Quantidade</th>
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
                            <td wire:key="{{$produto->id}}">
                                <input type="number" wire:model="quantidades.{{ $produto->id }}" placeholder="Quantidade" min="1" />
                                <button wire:click="addProduto({{ $produto->id }})" @click.debounce.1000ms="open = false"
                                    @click.prevent>Adicionar</button>
                            </td>
                        @endif
                    </tr>

                @endforeach
            </tbody>
        </table>
        {{ $produtos->links() }}
    @elseif($busca)
        <h2>Não há produtos registrados</h2>
    @else
    <h2>Insira algo na barra de busca</h2>
    @endif

    <script>
    window.addEventListener('limparBusca', function () {
        document.getElementById('busca').value = '';
    });
</script>
</div>