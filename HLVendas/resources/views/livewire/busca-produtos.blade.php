<div>
    <input class="search" type="search" wire:model.live="busca" id="busca" placeholder="Digite uma descrição...">
    @if(count($produtos) > 0)
        <table>
            @if($rota == 1)
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
                            <td class="acao"><a href="{{route('produto.show', $produto->id) }}">Visualizar</a></td>
                        </tr>
                    @endforeach
                </tbody>
            @elseif($rota == 2)
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Descricao</th>
                        <th>Custo Atual</th>
                        <th>Categoria</th>
                        <th>Estoque</th>
                        <th>Custo</th>
                        <th>Quantidade</th>
                        <th>Ação</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($produtos as $produto)
                        <tr>
                            <td>{{$produto->id}}</td>
                            <td>{{$produto->descricao}}</td>
                            <td>R${{$produto->custo}}</td>
                            <td>{{$produto->categoria}}</td>
                            <td>{{$produto->estoque}}</td>
                            <td wire:key="{{$produto->id}}"><input type="number" wire:model="custos.{{ $produto->id }}" placeholder="{{$produto->custo}}" /></td>
                            <td wire:key="{{$produto->id}}"><input type="number" wire:model="quantidades.{{ $produto->id }}"
                                    step="0.01" placeholder="1" min="0.1"/></td>
                            <td wire:key="{{$produto->id}}"><button wire:click="addProdutoCompra({{ $produto->id }})"
                                    @click="open = false" @click.prevent>Adicionar</button></td>
                        </tr>
                    @endforeach
                </tbody>
            @elseif($rota == 3)
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Descricao</th>
                        <th>Preço AV</th>
                        <th>Preço AP</th>
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
                            <td>R${{$produto->precoavista}}</td>
                            <td>R${{$produto->precoaprazo}}</td>
                            <td>{{$produto->estoque}}</td>
                            <td wire:key="{{$produto->id}}"><input type="number" wire:model="quantidades.{{ $produto->id }}" step="0.01" placeholder="1" min="0.1" /></td>
                            <td wire:key="{{$produto->id}}"><button wire:click="addProdutoVenda({{ $produto->id }})" @click="open = false" @click.prevent>Adicionar</button></td>
                        </tr>
                    @endforeach
                </tbody>
            @endif
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