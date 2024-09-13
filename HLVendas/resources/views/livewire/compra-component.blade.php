<?php 
    $rota = 2;
 ?>
<div>
    <div>
        <input type="text" wire:model="busca" placeholder="Buscar Produto...">
        @if($produtosCompra->count())
            <ul>
                @foreach($produtosCompra as $produto)
                    <li>
                        {{ $produto->descricao }} - R$ {{ $produto->preco_av }}
                        <input @click.prevent="open = true type="number" wire:model="quantidades.{{ $produto->id }}" placeholder="Quantidade" min="1">
                        <button @click.prevent="open = true" wire:click="addProduto({{ $produto->id }})">Adicionar</button>
                    </li>
                @endforeach
            </ul>
        @endif


    </div>

    <div>
        <h4>Produtos na Venda</h4>
        <table>
            <thead>
                <tr>
                    <th>Descrição</th>
                    <th>Quantidade</th>
                    <th>Preço</th>
                    <th>Total</th>
                    <th>Ações</th>
                </tr>
            </thead>
            <tbody>
                @foreach($vetProd as $index => $produto)
                    <tr>
                        <td>{{ $produto['descricao'] }}</td>
                        <td>{{ $produto['quantidade'] }}</td>
                        <td>R$ {{ $produto['preco_av'] }}</td>
                        <td>R$ {{ $produto['preco_ap'] }}</td>
                        <td>R$ {{ $produto['preco_av'] * $produto['quantidade'] }}</td>
                        <td>
                            <button @click.prevent="open = true" wire:click="removerProduto({{ $index }})">Remover</button>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>

    <button wire:click="salvarVenda">Salvar Venda</button>
</div>