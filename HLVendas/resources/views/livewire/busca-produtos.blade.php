<div>
    <input class="search" type="search" wire:model.live="busca" id="busca" placeholder="Digite uma descrição...">
    <div class="overflow">
        @if(count($produtos) > 0)
            @if($rota == 1)
                <div class="tableHead">
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
                    </table>
                </div>

                <div class="tableBody">
                    <table>
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
                    </table>
                </div>
            @elseif($rota == 2) 
                <div class="tableHead">
                    <table>
                        <thead>
                            <tr>
                                <th>ID</th>
                                <th>Descricao</th>
                                <th>Custo Atual</th>
                                <th>Categoria</th>
                                <th>Estoque</th>
                                <th>Ação</th>
                            </tr>
                        </thead>
                    </table>
                </div>
                <div class="tableBody">
                    <table>
                        <tbody>
                            @foreach ($produtos as $produto)
                                <tr>
                                    <td>{{$produto->id}}</td>
                                    <td>{{$produto->descricao}}</td>
                                    <td>R${{$produto->custo}}</td>
                                    <td>{{$produto->categoria}}</td>
                                    <td>{{$produto->estoque}}</td>
                                    <td class="acao" wire:key="{{$produto->id}}"><button
                                            wire:click="addProdutoCompra({{ $produto->id }})" @click="open = false"
                                            @click.prevent>Adicionar</button></td>
                                </tr>

                            @endforeach
                        </tbody>
                    </table>
                </div>
            @elseif($rota == 3) 
                <div class="tableHead">
                    <table>

                        <thead>
                            <tr>
                                <th>ID</th>
                                <th>Descricao</th>
                                <th>Preço AV</th>
                                <th>Preço AP</th>
                                <th>Estoque</th>
                                <th>Ação</th>
                            </tr>
                        </thead>
                    </table>
                </div>

                <div class="tableBody">
                    <table>
                        <tbody>
                            @foreach ($produtos as $produto)
                                <tr>
                                    <td>{{$produto->id}}</td>
                                    <td>{{$produto->descricao}}</td>
                                    <td>R${{$produto->precoavista}}</td>
                                    <td>R${{$produto->precoaprazo}}</td>
                                    <td>{{$produto->estoque}}</td>
                                    <td class="acao" wire:key="{{$produto->id}}"><button
                                            wire:click="addProdutoVenda({{ $produto->id }})" @click="open = false"
                                            @click.prevent>Adicionar</button></td>
                                </tr>

                            @endforeach
                        </tbody>
                    </table>
                </div>
            @elseif($rota == 4)
                <div class="tableHead">
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
                    </table>
                </div>

                <div class="tableBody">
                    <table>
                        <tbody>
                            @foreach ($produtos as $produto)
                                <tr>
                                    <td>{{$produto->id}}</td>
                                    <td>{{$produto->descricao}}</td>
                                    <td>{{$produto->precoavista}}</td>
                                    <td>{{$produto->precoaprazo}}</td>
                                    <td>{{$produto->categoria}}</td>
                                    <td>{{$produto->estoque}}</td>
                                    <td class="acao"><button @click.prevent class="btn-produto-id" value="{{$produto->id}}"
                                            data-nome="{{$produto->descricao}}" @click="open = false">Selecionar</button></td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            @endif
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
</div>