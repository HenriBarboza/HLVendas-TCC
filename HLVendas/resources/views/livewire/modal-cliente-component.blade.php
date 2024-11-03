<div>
<div x-data="{ open: $wire.entangle('isOpen').live }">
        <div class="flex justify-center items-center">
            <button @click.prevent="open = true"
            class="border-solid border-2 border-corBorda w-1/2 flex justify-center rounded-custom-button text-lg p-1">
            <p class="text">Buscar Cliente</p>
            </button>
        </div>

        <div x-show="open" @click.away="open = false"
            class="fixed inset-0 flex items-center justify-center bg-gray-500 bg-opacity-75 z-10">
            <div class="bg-white p-6 rounded-lg shadow-lg">
                <h2 class="text-lg">Buscar Clientes</h2>
                @livewire('busca-clientes', compact('rota'))
                <button @click.prevent="open = false"
                    class="mt-4 bg-blue-500 text-black px-4 py-2 rounded">Fechar</button>
            </div>
        </div>
    </div>
</div>
