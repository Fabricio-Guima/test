<header class="bg-truegray-700 sticky top-0" x-data="dropdown()">
    <div class="container-menu flex items-center h-16 justify-between md:justify-start">
        <a href="#" @click.prevent.stop="show()" :class="{ 'bg-opacity-100 text-orange-500': open }"
            class="flex flex-col items-center justify-center order-last md:order-first px-6 md:px-4 bg-white bg-opacity-25 text-white cursor-pointer semibold h-full">
            <svg class="h-6 w-6" stroke="currentColor" fill="none" viewBox="0 0 24 24">
                <path class="inline-flex" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                    d="M4 6h16M4 12h16M4 18h16" />
                {{-- <path :class="{ 'hidden': !open, 'inline-flex': open }" class="hidden" stroke-linecap="round"
                    stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" /> --}}
            </svg>

            <span class="text-sm hidden md:block">
                Categorias
            </span>
        </a>

        <a href="/" class="mx-6">
            <x-application-mark class="block h-9 w-auto" />
        </a>
        {{-- livewire --}}
        <div class="flex-1 hidden md:block">
            @livewire('search')
        </div>

        <div class="mx-6 relative hidden md:block">
            @auth
                <x-dropdown align="right" width="48">
                    <x-slot name="trigger">
                        <button
                            class="flex text-sm border-2 border-transparent rounded-full focus:outline-none focus:border-gray-300 transition">
                            <img class="h-8 w-8 rounded-full object-cover" src="{{ Auth::user()->profile_photo_url }}"
                                alt="{{ Auth::user()->name }}" />
                        </button>

                    </x-slot>

                    <x-slot name="content">
                        <!-- Account Management -->
                        <div class="block px-4 py-2 text-xs text-gray-400">
                            {{ __('Manage Account') }}
                        </div>

                        <x-dropdown-link href="{{ route('profile.show') }}">
                            {{ __('Profile') }}
                        </x-dropdown-link>

                        {{-- @if (Laravel\Jetstream\Jetstream::hasApiFeatures())
                        <x-dropdown-link href="{{ route('api-tokens.index') }}">
                            {{ __('API Tokens') }}
                        </x-dropdown-link>
                        @endif --}}

                        <div class="border-t border-gray-200 dark:border-gray-600"></div>

                        <!-- Authentication -->
                        <form method="POST" action="{{ route('logout') }}" x-data>
                            @csrf

                            <x-dropdown-link href="{{ route('logout') }}" @click.prevent="$root.submit();">
                                {{ __('Log Out') }}
                            </x-dropdown-link>
                        </form>
                    </x-slot>
                </x-dropdown>
            @else
                <x-dropdown align="right" width="48">
                    <x-slot name="trigger">
                        <i class="fas fa-user-circle text-white text-3xl cursor-pointer"></i>
                    </x-slot>

                    <x-slot name="content">

                        <x-dropdown-link href="{{ route('login') }}">
                            {{ __('Login') }}
                        </x-dropdown-link>

                        <x-dropdown-link href="{{ route('register') }}">
                            {{ __('Register') }}
                        </x-dropdown-link>

                        {{-- @if (Laravel\Jetstream\Jetstream::hasApiFeatures())
                        <x-dropdown-link href="{{ route('api-tokens.index') }}">
                            {{ __('API Tokens') }}
                        </x-dropdown-link>
                        @endif --}}

                        {{-- <div class="border-t border-gray-200 dark:border-gray-600"></div> --}}


                    </x-slot>
                </x-dropdown>

            @endauth

        </div>

        <div class="hidden md:block">
            @livewire('dropdown-cart')
        </div>

    </div>

    {{-- mostrar ou não o menu --}}
    <nav id="navigation-menu" :class="{ 'block': open, 'hidden': !open }"
        class="bg-truegray-700 bg-opacity-25 w-full absolute hidden">
        {{-- menu desktop --}}
        <div class="container-menu h-full hidden md:block">
            {{-- fechar menu ao clicar fora dele --}}
            <div @click.away="close()" class="grid grid-cols-4 h-full relative">
                <ul class="bg-white">
                    @foreach ($categories as $category)
                        <li class="navigation-link text-truegray-500 hover:bg-orange-500 hover:text-white">
                            <a href="" class="py-2 px-4 text-sm flex items-center">
                                <span class="flex justify-center w-9">
                                    {!! $category->icon !!}
                                </span>

                                {{ $category->name }}
                            </a>

                            <div class="navigation-submenu bg-gray-100 absolute w-3/4 h-full top-0 right-0 hidden">
                                <x-navigation-subcategories :category="$category" />
                            </div>
                        </li>
                    @endforeach
                </ul>

                <div class="col-span-3 bg-gray-100">
                    <x-navigation-subcategories :category="$categories->first()" />

                </div>
            </div>
        </div>
        {{-- menu mobile --}}
        <div class="bg-white h-full overflow-y-auto">
            <div class="container-menu bg-gray-200 py-3 mb-2">
                @livewire('search')
            </div>
            <ul>
                @foreach ($categories as $category)
                    <li class="text-truegray-500 hover:bg-orange-500 hover:text-white">
                        <a href="" class="py-2 px-4 text-sm flex items-center">
                            <span class="flex justify-center w-9">
                                {!! $category->icon !!}
                            </span>

                            {{ $category->name }}
                        </a>

                        <div class="navigation-submenu bg-gray-100 absolute w-3/4 h-full top-0 right-0 hidden">
                            <x-navigation-subcategories :category="$category" />
                        </div>
                    </li>
                @endforeach
            </ul>

            <p class="text-truegray-500 px-6 my-2">Usuário</p>
            {{-- cart-mobile --}}
            @livewire('cart-mobile')

            @auth
                <a href="{{ route('profile.show') }}"
                    class="py-2 px-4 text-sm flex items-center text-truegray-500 hover:bg-orange-500 hover:text-white">
                    <span class="flex justify-center w-9">
                        <i class="fa-regular fa-address-card"></i>
                    </span>

                    Perfil
                </a>

                <a href=""
                    onclick="event.preventDefault();
                    document.getElementById('logout-form').submit()

                "
                    class="py-2 px-4 text-sm flex items-center text-truegray-500 hover:bg-orange-500 hover:text-white">
                    <span class="flex justify-center w-9">
                        <i class="fa-solid fa-right-from-bracket"></i>
                    </span>

                    Encerrar sessão
                </a>

                <form id="logout-form" action="{{ route('logout') }}" method="POST" class="hidden">
                    @csrf
                </form>
            @else
                <a href="{{ route('login') }}"
                    class="py-2 px-4 text-sm flex items-center text-truegray-500 hover:bg-orange-500 hover:text-white">
                    <span class="flex justify-center w-9">
                        <i class="fas fa-circle-user"></i>
                    </span>

                    Iniciar sessão
                </a>

                <a href="{{ route('register') }}"
                    class="py-2 px-4 text-sm flex items-center text-truegray-500 hover:bg-orange-500 hover:text-white">
                    <span class="flex justify-center w-9">
                        <i class="fa-solid fa-fingerprint"></i>
                    </span>

                    Registrar-se
                </a>

            @endauth
        </div>

    </nav>
</header>
