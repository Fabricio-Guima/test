<div x-data>
    <p class="text-gray-700 mb-4"><span class="font-semibold text-lg">Estoque:</span> {{ $totalQuantityProduct }}</p>
    <div class="flex">
        <div class="mr-4">
            <x-button-generic wire:click="decrement" x-bind:disabled="$wire.qty <= 1 ? true : false"
                class="bg-white hover:bg-gray-200 text-gray-700">
                -
            </x-button-generic>
            <span class="mx-2 text-gray-700">{{ $qty }}</span>
            <x-button-generic wire:click="increment" class="bg-white hover:bg-gray-200 text-gray-700">
                +
            </x-button-generic>
        </div>
        <div class="flex-1">
            <x-button-generic class="w-full bg-orange-500 hover:bg-orange-400 text-white">
                Adicionar ao Carrinho
            </x-button-generic>
        </div>

    </div>
</div>
