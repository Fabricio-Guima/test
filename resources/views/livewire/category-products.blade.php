<div wire:init="loadProducts">
    <div wire:ignore id="glider"></div>
    @if (count($products))
        <div class="glider-contain" id="glider">
            <ul class="glider-{{ $category->id }}">
                @foreach ($products as $product)
                    <li class="bg-white rounded-lg shadow {{ $loop->last ? '' : 'sm:mr-4' }}">
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

            <button aria-label="Previous" class="glider-prev">«</button>
            <button aria-label="Next" class="glider-next">»</button>
            <div role="tablist" class="dots"></div>
        </div>
    @else
        <div class="mb-4 h-48 flex justify-center items-center bg-white shadow-xl border border-gray-100">
            <div class="rounded animate-spin-ease duration-300 w-10 h-10 border-2 border-indigo-500 rotate"></div>
        </div>
    @endif


</div>
