<?php 
    $rota = 2;
 ?>
<div>
    <div>
        @if($vetProd)
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
                            <td>R$ {{ $produto['preco'] }}</td>
                            <td>R$ {{ $produto['preco'] * $produto['quantidade'] }}</td>
                            <td><button wire:click="removerProduto({{ $index }})" @click.prevent>Remover</button></td>

                            <input type="text" name="produtos[{{$index}}][produto_id]" value="{{ $produto['produto_id']}}">
                            <input type="text" name="produtos[{{$index}}][quantidade]" value="{{$produto['quantidade']}}">
                            <input type="text" name="produtos[{{$index}}][desconto]" value="{{$produto['desconto']}}">
                            <input type="text" name="produtos[{{$index}}][preco]" value="{{$produto['preco'] * $produto['quantidade']}}">

                        </tr>
                    @endforeach
                </tbody>
            </table>
            <div>
                <label for="total">Total R$</label>
                <input type="number" name="totalcompra" value="{{$this->calcularTotal()}}" disable>
            </div>
        @else
            <br>
            <h4>Adicione produtos na venda</h4>
            <input type="text" hidden required>
        @endif
    </div>
</div>