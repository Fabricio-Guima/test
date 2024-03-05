<div>
    <div class="bg-white rounded-lg shadow-lg mb-6">
        <div class="px-6 py-2 flex justify-between items-center">
            <h1 class="font-semibold text-orange-700 uppercase">{{ $category->name }}</h1>

            <div class="grid grid-cols-2 border border-gray-200 divide-x divide-gray-200 text-gray-500">
                <i class="fas fa-border-all p-3 cursor-pointer {{ $view == 'grid' ? 'text-orange-500' : '' }}"
                    wire:click.prevent="$set('view', 'grid')"></i>
                <i class="fas fa-th-list p-3 cursor-pointer {{ $view == 'list' ? 'text-orange-500' : '' }}"
                    wire:click.prevent="$set('view', 'list')"></i>
            </div>

        </div>

    </div>

    {{-- pai que tem o submenu e os produtos --}}
    <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-5 gap-6">
        <aside>
            <h2 class="font-semibold text-center mb-2">Subcategorias</h2>
            <ul class="divide-y divide-gray-200">
                {{-- método mágica que seta o valor de uma variavel via $set --}}
                @foreach ($category->subcategories as $subcategory)
                    <li class="py-2 text-sm">
                        <a href=""
                            class="cursor-pointer hover:text-orange-500 capitalize {{ $subcategoria == $subcategory->name ? 'text-orange-500 font-semibold' : '' }}"
                            wire:click.prevent="$set('subcategoria', '{{ $subcategory->name }}')">{{ $subcategory->name }}</a>
                    </li>
                @endforeach
            </ul>

            <h2 class="font-semibold text-center mt-4 mb-2">Marcas</h2>
            <ul class="divide-y divide-gray-200">
                {{-- método mágica que seta o valor de uma variavel via $set --}}
                @foreach ($category->brands as $brand)
                    <li class="py-2 text-sm">
                        <a href=""
                            class="cursor-pointer hover:text-orange-500 capitalize {{ $marca == $brand->name ? 'text-orange-500 font-semibold' : '' }}"
                            wire:click.prevent="$set('marca', '{{ $brand->name }}')">{{ $brand->name }}</a>
                    </li>
                @endforeach
            </ul>

            <x-button class="mt-4" wire:click.prevent="resetFilter">
                Remover Filtros
            </x-button>

        </aside>

        {{-- grid products --}}
        <div class="md:col-span-2 lg:col-span-4">
            {{-- grid --}}
            @if ($view == 'grid')
                <ul class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-6">
                    @foreach ($products as $product)
                        <li class="bg-white rounded-lg shadow">
                            <article class="">
                                <figure class="w-100">
                                    <img src="{{ Storage::url($product->images->first()->url) }}"
                                        class="w-full h-48 object-cover object-center" alt="">
                                </figure>
                                <div class="py-4 px-6">
                                    <h1 class="text-lg font-semibold">
                                        <a href="">
                                            {{ Str::limit($product->name, 20) }}
                                        </a>
                                    </h1>

                                    <p class="font-bold text-truegray-700">R$ {{ $product->price }}</p>
                                </div>
                            </article>
                        </li>
                    @endforeach
                </ul>
            @else
                {{-- list --}}
                <ul>
                    @foreach ($products as $product)
                        <li class="bg-white rounded-lg shadow mb-4">
                            <article class="flex flex-col sm:flex-row">
                                <figure class="img-produto">
                                    <img class="h-48 w-56 img-produto sm:h-48 sm:w-56 object-cover object-center"
                                        src="{{ Storage::url($product->images->first()->url) }}" alt="">
                                </figure>

                                {{-- descrição do produto --}}
                                <div class="flex-1 py-4 px-6 flex flex-col ">

                                    <div class="flex justify-between flex-col sm:flex-row">
                                        {{-- informações do produto --}}
                                        <div>
                                            <h1 class="text-lg font-semibold text-gray-700">{{ $product->name }}</h1>
                                            <p class="font-bold text-gray-700">R$ {{ $product->price }}</p>
                                        </div>
                                        {{-- Nota do produto --}}
                                        <div class="flex items-center my-1 sm:my-0">
                                            <ul class="flex text-sm">
                                                <li>
                                                    <i class="fas fa-star text-yellow-400 mr-1"></i>
                                                </li>
                                                <li>
                                                    <i class="fas fa-star text-yellow-400 mr-1"></i>
                                                </li>
                                                <li>
                                                    <i class="fas fa-star text-yellow-400 mr-1"></i>
                                                </li>
                                                <li>
                                                    <i class="fas fa-star text-yellow-400 mr-1"></i>
                                                </li>
                                                <li>
                                                    <i class="fas fa-star text-yellow-400 mr-1"></i>
                                                </li>
                                            </ul>
                                            <span class="text-gray-700 text-sm">(30)</span>
                                        </div>
                                    </div>

                                    <div class="mt-auto mb-6">
                                        <x-button class="bg-red-500 hover:bg-red-400 w-full sm:w-40 text-center">
                                            Ver Produto
                                        </x-button>
                                    </div>
                                </div>
                            </article>
                        </li>
                    @endforeach
                </ul>
            @endif


            <div class="mt-4">
                {{ $products->links() }}
            </div>
        </div>
    </div>
</div>
