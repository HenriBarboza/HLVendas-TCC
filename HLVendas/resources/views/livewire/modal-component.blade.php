<div>

    <div x-data="{ open: @entangle('isOpen') }">
        <!-- Botão para abrir o modal -->
        <button @click.prevent="open = true">Open Modal</button>

        <!-- Modal -->
        <div x-show="open" @click.away="open = false"
            class="fixed inset-0 flex items-center justify-center bg-gray-500 bg-opacity-75">
            <div class="bg-white p-6 rounded-lg shadow-lg">
                <h2 class="text-lg">Buscar Produtos</h2>
                @livewire('busca-produtos', compact("rota"))
                <button @click.prevent="open = false" class="mt-4 bg-blue-500 text-white px-4 py-2 rounded">Close</button>
            </div>
        </div>
    </div>

</div>