<div>
    <div x-data="{ open: $wire.entangle('isOpen').live }">
        <div class="flex justify-center items-center">
            <button @click.prevent="open = true" class=" inputWrapper buttonFunc">
                <p class="text">Buscar funcionários</p>
            </button>
        </div>

        <div x-show="open" @click.away="open = false"
            class="fixed inset-0 flex items-center justify-center bg-gray-500 bg-opacity-75 z-10">
            <div class="bg-white p-6 rounded-lg shadow-lg w-full max-w-6xl">
                <h2 class="text-lg">Buscar Funcionrios</h2>
                @livewire('busca-funcionarios', compact('rota'))
                <button @click.prevent="open = false" class="mt-4 buttonFuncClose">
                    <p class="text">
                        Fechar
                    </p>
                </button>
            </div>
        </div>
    </div>
</div>