<div>
    @if(count($vetProd) > 0)
        <div class="accordion">
            <div x-data="{ open: false }">
                <button @click.prevent class="accordion-header buttonOp" @click="open = !open">Opções de preço</button>
                <div class="accordion-content" x-show="open" x-transition>
                    <div class="contentInput">
                        <div class="inputGroup">
                            <input class="inputWrapper number" type="number" min="0" wire:model="percdesconto"
                                name="percdesconto" placeholder="Desconto %">
                            <label for="percdesconto" class="userLabel">
                                <p>% Desconto</p>
                            </label>
                        </div>

                        <div class="inputGroup">
                            <input class="inputWrapper number" type="number" min="0" wire:model="percadicional"
                                name="percadicional" placeholder="Preço adicional %">
                            <label for="percadicional" class="userLabel">
                                <p>% Adicional</p>
                            </label>
                        </div>
                        <button @click.prevent wire:click="calcularOutros" class="buttonCalc">Calcular</button>
                    </div>
                </div>
            </div>
            <h4 class="subtitle">Produtos da venda</h4>
            <div class="tableHead">
                <table>
                    <thead>
                        <tr>
                            <th>Código</th>
                            <th>Descrição</th>
                            <th>Quantidade</th>
                            <th>Preco</th>
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
                                <td>{{ $produto['produto_id'] }}</td>
                                <td>{{ $produto['descricao'] }}</td>
                                <td>{{ $produto['quantidade'] }}</td>
                                <td>R$ {{ $produto['preco'] }}</td>
                                <td>R$ {{ $produto['preco'] * $produto['quantidade'] }}</td>
                                <td class="acao"><button wire:click="removerProduto({{ $index }})" @click.prevent>Remover</button></td>
                                <input type="hidden" name="produtos[{{$index}}][produto_id]"
                                    value="{{ $produto['produto_id'] }}">
                                <input type="hidden" name="produtos[{{$index}}][quantidade]"
                                    value="{{ $produto['quantidade'] }}">
                                <input type="hidden" name="produtos[{{$index}}][preco]" value="{{ $produto['preco'] }}">
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
            <div>
                <div class="contentInput">
                    <input class="inputWrapper showVend" type="number" name="totalvenda"
                        value="{{ $this->calcularTotal() }}" readonly>
                    <label for="totalvenda" class="userLabel">
                        <p>Total R$</p>
                    </label>
                </div>
            </div>
        </div>
    @else
        <h4 style="margin-top: 0.5rem;">Adicione produtos na venda</h4>
        <input type="text" hidden required>
    @endif
</div>