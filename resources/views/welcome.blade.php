<x-app-layout>

    <div class="container py-8">
        @foreach ($categories as $category)
            <section>
                <h1 class="text-lg uppercase font-semibold text-gray-700">
                    {{ $category->name }}
                </h1>

                @livewire('category-products', ['category' => $category])
            </section>
        @endforeach
    </div>

    {{-- estou enviado este script para ser carregado no layout principal, ao final --}}
    @push('script')
        <script>
            // só execute o carousel após eu carregar todos os produtos
            // tem colocar esse livewire.hook('morph.added')
            // https://laracasts.com/discuss/channels/livewire/livewire-v3-does-not-wait-until-dom-changes-are-finished-to-dispatch-events-on-js-side
            document.addEventListener('glider', function(event) {
                // pegando cada id do componente 'category-products' para o js do glider funcionar para instancia de componente
                var id = event.detail.id

                Livewire.hook('morph.added', (element) => {

                    var gliderElement = document.querySelector('.glider-' + id);
                    if (gliderElement) {
                        new Glider(gliderElement, {
                            slidesToShow: 4.5,
                            slidesToScroll: 4.5,
                            draggable: true,
                            dots: '.dots',
                            arrows: {
                                prev: '.glider-prev',
                                next: '.glider-next'
                            }
                        });
                    }
                })
            })
        </script>
    @endpush


</x-app-layout>
