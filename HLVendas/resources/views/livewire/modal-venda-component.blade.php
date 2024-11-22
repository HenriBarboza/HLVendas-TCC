<div>
    <div x-data="{ open: @entangle('isOpen') }">
        <!-- Botão para abrir o modal -->
        <div class="button">
            <button @click.prevent="open = true">
                <p class="text">Buscar Vendas</p>
            </button>
        </div>
        <!-- Modal -->
        <div x-show="open" @click.away="open = false"
            class="fixed inset-0 flex items-center justify-center bg-gray-500 bg-opacity-75 z-10">
            <div class="bg-white p-6 rounded-lg shadow-lg w-full max-w-4xl">
                <p class="text">Buscar Vendas</p>
                @livewire('busca-venda')
                <button @click.prevent="open = false" class="mt-4 buttonVendClose">
                    <p class="text">Fechar</p>
                </button>
            </div>
        </div>
    </div>

</div>