<div>
    <input type="search" wire:model.live="busca" placeholder="Digite uma descrição...">
    <table>
                <thead>
                    <tr>
                        <th></th>
                        <th>ID</th>
                        <th>Descricao</th>
                        <th>Custo</th>
                        <th>Preço AV</th>
                        <th>Preço AP</th>
                        <th>Categoria</th>
                        <th>Estoque</th>
                        <th></th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($produtos as $produto)
                        <tr>
                            <td><input type="checkbox"></td>
                            <td>{{$produto->id}}</td>
                            <td>{{$produto->descricao}}</td>
                            <td>{{$produto->custo}}</td>
                            <td>{{$produto->precoavista}}</td>
                            <td>{{$produto->precoaprazo}}</td>
                            <td>{{$produto->categoria}}</td>
                            <td>{{$produto->estoque}}</td>
                            <td><a href="{{route('produto.show', $produto->id) }}">Visualizar</a></td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
            {{ $produtos->links() }}
</div>
