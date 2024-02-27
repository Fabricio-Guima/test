<header class="bg-truegray-700">
    <div class="container-menu flex items-center h-16">
        <a href="#"
            class="flex flex-col items-center justify-center px-4 bg-white bg-opacity-25 text-white cursor-pointer semibold h-full">
            <svg class="h-6 w-6" stroke="currentColor" fill="none" viewBox="0 0 24 24">
                <path class="inline-flex" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                    d="M4 6h16M4 12h16M4 18h16" />
                {{-- <path :class="{ 'hidden': !open, 'inline-flex': open }" class="hidden" stroke-linecap="round"
                    stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" /> --}}
            </svg>

            <span>
                Categorias
            </span>
        </a>

        <a href="/" class="mx-6">
            <x-application-mark class="block h-9 w-auto" />
        </a>
        {{-- livewire --}}
        @livewire('search')

    </div>
</header>
