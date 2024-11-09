<div>
    <div x-data="{ open: @entangle('isOpen').defer }">
        <div class="contentInput">
            <div @click.prevent="open = true" class="inputWrapper buttonProd">
                <button >
                    <p class="text">Produtos</p>
                </button>
            </div>
        </div>
        <div x-show="open" @click.away="open = false"
            class="fixed inset-0 flex items-center justify-center bg-gray-500 bg-opacity-75 z-10">
            <div class="bg-white p-6 rounded-lg shadow-lg">
                <p class="text">Buscar Produtos</p>
                @livewire('busca-produtos', compact('rota'))
                <button @click.prevent="open = false"
                    class="mt-4 bg-blue-500 text-black px-4 py-2 rounded">Fechar</button>
            </div>
        </div>
    </div>
</div>