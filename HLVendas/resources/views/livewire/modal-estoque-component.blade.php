<div>
    <div x-data="{ open: $wire.entangle('isOpen').live }">
        <div class="flex justify-center items-center">
            <button @click.prevent="open = true" class=" inputWrapper buttonEsto">
                <p class="text">Buscar Manutenção de Est.</p>
            </button>
        </div>

        <div x-show="open" @click.away="open = false"
            class="fixed inset-0 flex items-center justify-center bg-gray-500 bg-opacity-75 z-10">
            <div class="bg-white p-6 rounded-lg shadow-lg w-full max-w-3xl">
                <h2 class="text-lg">Buscar Manutenção de Estoque</h2>
                @livewire('busca-estoque', compact('rota'))
                <button @click.prevent="open = false" class="mt-4 buttonEstoClose">
                    <p class="text">
                        Fechar
                    </p>
                </button>
            </div>
        </div>
    </div>
</div>