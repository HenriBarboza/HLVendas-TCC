<div>
    <div x-data="{ open: @entangle('isOpen') }">
        <div class="flex justify-center items-center">
            <button @click.prevent="open = true" class="inputWrapper buttonForn">
                <p class="text">Buscar Fornecedor</p>
            </button>
        </div>

        <div x-show="open" @click.away="open = false"
            class="fixed inset-0 flex items-center justify-center bg-gray-500 bg-opacity-75 z-10">
            <div class="bg-white p-6 rounded-lg shadow-lg w-full max-w-4xl">
                <h2 class="text-lg">Buscar Fornecedor</h2>
                @livewire('busca-fornecedor', compact('rota'))
                <button @click.prevent="open = false" class="mt-4 buttonFornClose">
                    <p class="text">Fechar</p>
                </button>
            </div>
        </div>
    </div>
</div>