<x-app-layout>

    <div class="container py-8">
        @foreach ($categories as $category)
            <section class="mb-6">
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
                            slidesToShow: 1,
                            slidesToScroll: 1,
                            draggable: true,
                            dots: '.glider-' + id + '~.dots',
                            arrows: {
                                prev: '.glider-' + id + '~.glider-prev',
                                next: '.glider-' + id + '~.glider-next'
                            },
                            responsive: [{
                                    breakpoint: 640,
                                    settings: {
                                        slidesToShow: 2.5,
                                        slidesToScroll: 2,
                                    }
                                },
                                {
                                    breakpoint: 768,
                                    settings: {
                                        slidesToShow: 3.5,
                                        slidesToScroll: 3,
                                    }
                                },
                                {
                                    breakpoint: 1024,
                                    settings: {
                                        slidesToShow: 4.5,
                                        slidesToScroll: 4,
                                    }
                                },
                                {
                                    breakpoint: 1280,
                                    settings: {
                                        slidesToShow: 5.5,
                                        slidesToScroll: 5,
                                    }
                                },

                            ]
                        });
                    }
                })
            })
        </script>
    @endpush


</x-app-layout>
