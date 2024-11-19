<div>
    @if(count($vetProd) > 0)
        <div class="accordion">
            <div x-data="{ open: false }">
                <button @click.prevent class="accordion-header buttonOp" @click="open = !open">Opções de preço</button>
                <div class="accordion-content" x-show="open" x-transition>
                    <div class="contentInput">
                        <div class="inputGroup">
                            <input class="inputWrapper number" min="0" wire:model="percdesconto" name="percdesconto"
                                placeholder="Desconto %">
                            <label for="percdesconto" class="userLabel">
                                <p class="text">% Desconto</p>
                            </label>
                        </div>

                        <div class="inputGroup">
                            <input class="inputWrapper number" type="number" min="0" wire:model="percadicional"
                                name="percadicional" placeholder="Custo adicional %">
                            <label for="percadicional" class="userLabel">
                                <p class="text">% Adicional</p>
                            </label>
                        </div>
                        <button @click.prevent wire:click="calcularOutros" class="buttonCalc">Calcular</button>
                    </div>
                </div>
            </div>
            <h4 class="subtitle">Produtos da compra</h4>
            <div class="tableHead">
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
                </table>
            </div>
            <div class="tableBody">
                <table>
                    <tbody>
                        @foreach($vetProd as $index => $produto)
                            <tr>
                                <td>{{ $produto['descricao'] }}</td>
                                <td>{{ $produto['quantidade'] }}</td>
                                <td>R$ {{ $produto['custo'] }}</td>
                                <td>R$ {{ $produto['custo'] * $produto['quantidade'] }}</td>
                                <td class="acao"><button wire:click="removerProduto({{ $index }})" @click.prevent>Remover</button></td>
                                <input type="hidden" name="produtos[{{$index}}][produto_id]"
                                    value="{{ $produto['produto_id'] }}">
                                <input type="hidden" name="produtos[{{$index}}][quantidade]"
                                    value="{{ $produto['quantidade'] }}">
                                <input type="hidden" name="produtos[{{$index}}][custo]" value="{{ $produto['custo'] }}">
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
            <div>
                <div class="contentInput">
                    <input class="inputWrapper showCompra" type="number" name="totalcompra"
                        value="{{ $this->calcularTotal() }}" readonly>
                    <label for="totalcompra" class="userLabel">
                        <p class="text">Total R$</p>
                    </label>
                </div>
            </div>
        </div>
    @else
        <br>
        <h4>Adicione produtos na compra</h4>
        <input type="text" hidden required>
    @endif
</div>