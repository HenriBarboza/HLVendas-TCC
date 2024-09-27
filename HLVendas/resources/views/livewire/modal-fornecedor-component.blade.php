<div>
    <div x-data="{ open: @entangle('isOpen') }">
        <div class="flex justify-center items-center">
            <button @click.prevent="open = true"
            class="border-solid border-2 border-corBorda mt-5 mb-3 w-1/2 flex justify-center rounded-custom-button text-lg p-1">
                Fornecedor
            </button>
        </div>

        <div x-show="open" @click.away="open = false"
            class="fixed inset-0 flex items-center justify-center bg-gray-500 bg-opacity-75">
            <div class="bg-white p-6 rounded-lg shadow-lg">
                <h2 class="text-lg">Buscar Fornecedor</h2>
                @livewire('busca-fornecedor', compact('rota'))
                <button @click.prevent="open = false"
                    class="mt-4 bg-blue-500 text-white px-4 py-2 rounded">Fechar</button>
            </div>
        </div>
    </div>
</div>