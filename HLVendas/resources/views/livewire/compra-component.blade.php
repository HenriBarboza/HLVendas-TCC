<div>
    <style>

    </style>

    @if(count($vetProd) > 0)
        <div class="accordion">
            <div x-data="{ open: false }">
                <button @click.prevent class="accordion-header" @click="open = !open">Opções de preço</button>
                <div class="accordion-content" x-show="open" x-transition>
                    <div class="contentInput">
                        <label for="percdesconto">% Desconto</label>
                        <input class="inputWrapper w50 number" min="0" wire:model="percdesconto" name="percdesconto"
                            placeholder="Desconto %">
                        <label for="percadicional">% Adicional</label>
                        <input class="inputWrapper w50 number" type="number" min="0" wire:model="percadicional"
                            name="percadicional" placeholder="Custo adicional %">
                        <button @click.prevent wire:click="calcularOutros">Calcular</button>
                    </div>
                </div>
            </div>
            <h4>Produtos na compra</h4>
            <table>
                <thead>
                    <tr>
                        <th>Descrição</th>
                        <th>Quantidade</th>
                        <th>Custo</th>
                        <th>Total</th>
                        <th>Ações</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($vetProd as $index => $produto)
                        <tr>
                            <td>{{ $produto['produto_id'] }}</td>
                            <td>{{ $produto['descricao'] }}</td>
                            <td>{{ $produto['quantidade'] }}</td>
                            <td>R$ {{ $produto['custo'] }}</td>
                            <td>R$ {{ $produto['custo'] * $produto['quantidade'] }}</td>
                            <td><button wire:click="removerProduto({{ $index }})" @click.prevent>Remover</button></td>
                            <input type="hidden" name="produtos[{{$index}}][produto_id]" value="{{ $produto['produto_id'] }}">
                            <input type="hidden" name="produtos[{{$index}}][quantidade]" value="{{ $produto['quantidade'] }}">
                            <input type="hidden" name="produtos[{{$index}}][custo]" value="{{ $produto['custo'] }}">
                        </tr>
                    @endforeach
                </tbody>
            </table>
            <div>
                <label for="total">Total R$</label>
                <input type="number" name="totalcompra" value="{{ $this->calcularTotal() }}" readonly>
            </div>
        </div>
    @else
        <br>
        <h4>Adicione produtos na compra</h4>
        <input type="text" hidden required>
    @endif

    <script src="../../../resources/js/placeholder.js"></script>
</div>