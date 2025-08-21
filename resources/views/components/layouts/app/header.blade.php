<header class="py-2 border-b-2 mx-5 mt-7 border-gray-200 dark:border-gray-700">
    <div class="flex items-center justify-between">
        <div class="flex my-1 space-x-3">
            <button x-on:click="sidebar.full = !sidebar.full" class="block lg:hidden focus:outline-none dark:text-white">
                <!-- Menu Icon -->
                <svg class="w-6 h-6" x-bind:class="sidebar.full ? 'hidden' : ''" xmlns="http://www.w3.org/2000/svg"
                    viewBox="0 0 24 24" fill="currentColor">
                    <path d="M3 4H21V6H3V4ZM3 11H21V13H3V11ZM3 18H21V20H3V18Z"></path>
                </svg>

                <!-- Close Icon -->
                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                    stroke="currentColor" class="w-6 h-6" x-bind:class="sidebar.full ? '' : 'hidden'">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M6 18L18 6M6 6l12 12" />
                </svg>

            </button>

            <div>
                <h1
                    class="font-black text-xl sm:text-3xl text-transparent bg-clip-text bg-gradient-to-r from-blue-600 to-purple-500">
                    Elolja Admin
                </h1>
            </div>
        </div>

        <ul class="flex justify-center items-center flex-shrink-0 space-x-3">
            {{-- <li class="hidden sm:flex">
                <div class="relative mx-auto text-gray-600">
                    <input
                        class="w-full bg-gray-200 border border-neutral-300 py-2 px-5 pr-16 rounded-full text-sm font-bold focus:outline-none"
                        type="search" name="search" placeholder="Pesquisar Aqui">
                    <button type="submit" class="absolute right-0 top-0 mt-2 mr-4">
                        <svg xmlns="http://www.w3.org/2000/svg" class="size-5 text-gray-700" viewBox="0 0 24 24"
                            fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                            stroke-linejoin="round" class="lucide lucide-search-icon lucide-search">
                            <path d="m21 21-4.34-4.34" />
                            <circle cx="11" cy="11" r="8" />
                        </svg>
                    </button>
                </div>
            </li> --}}

            <li class="flex">
                <button
                    class="bg-gray-200 border border-neutral-300 rounded-full transition-all hover:text-blue-500 hover:scale-95 hover:cursor-pointer"
                    aria-label="Toggle color mode">
                    <svg xmlns="http://www.w3.org/2000/svg" class="size-5 m-2" viewBox="0 0 24 24" fill="none"
                        stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
                        class="lucide lucide-bell-ring-icon lucide-bell-ring">
                        <path d="M10.268 21a2 2 0 0 0 3.464 0" />
                        <path d="M22 8c0-2.3-.8-4.3-2-6" />
                        <path
                            d="M3.262 15.326A1 1 0 0 0 4 17h16a1 1 0 0 0 .74-1.673C19.41 13.956 18 12.499 18 8A6 6 0 0 0 6 8c0 4.499-1.411 5.956-2.738 7.326" />
                        <path d="M4 2C2.8 3.7 2 5.7 2 8" />
                    </svg>
                </button>
            </li>

            <li class="flex">
                <button x-on:click="$dispatch('open-modal-small', { name : 'logout' })"
                    class="bg-gray-200 border border-neutral-300 rounded-full transition-all hover:text-red-500 hover:scale-95 hover:cursor-pointer"
                    aria-label="Toggle color mode">
                    <svg xmlns="http://www.w3.org/2000/svg" class="size-5 m-2" viewBox="0 0 24 24" fill="none"
                        stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
                        class="lucide lucide-log-out-icon lucide-log-out">
                        <path d="m16 17 5-5-5-5" />
                        <path d="M21 12H9" />
                        <path d="M9 21H5a2 2 0 0 1-2-2V5a2 2 0 0 1 2-2h4" />
                    </svg>
                </button>
            </li>

            <!-- Profile menu -->
            {{-- <li x-title="NavBar:ProfileMenu" x-data="{ isProfileMenuOpen: false }" class="relative" wfd-id="105">
                <button class="flex items-center gap-3 text-blue-500"
                    x-on:click="isProfileMenuOpen = !isProfileMenuOpen;" @keydown.escape="isProfileMenuOpen = false"
                    @click.away="isProfileMenuOpen = false;" aria-label="Account" aria-haspopup="true" wfd-id="146">

                    <span class="text-md font-bold tracking-widest hidden sm:block">
                        Conta
                    </span>

                    <svg class="w-6 h-6" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor">
                        <path
                            d="M11.9999 13.1714L16.9497 8.22168L18.3639 9.63589L11.9999 15.9999L5.63599 9.63589L7.0502 8.22168L11.9999 13.1714Z">
                        </path>
                    </svg>
                </button>

                <template x-if="isProfileMenuOpen">
                    <ul x-transition:leave="transition ease-in duration-150" x-transition:leave-start="opacity-100"
                        x-transition:leave-end="opacity-0" @keydown.escape="isProfileMenuOpen = false; "
                        class="absolute right-0 z-40 w-56 p-5 mt-4 space-y-4 text-gray-600 bg-white shadow-lg rounded-md dark:shadow-gray-800 dark:text-gray-300 dark:bg-gray-800"
                        aria-label="submenu">

                        <li>
                            <div class="tracking-widest">
                                <span class=" dark:text-gray-400">Acessando como:</span>
                                <h1 class="text-md">{{ Auth::user()->NOME }}</h1>
                            </div>
                        </li>

                        <div class="border dark:border-gray-700"></div>

                        <li class="flex">
                            <a href="{{ route('logout') }}"
                                onclick="event.preventDefault(); document.getElementById('logout-form').submit();"
                                class="inline-flex items-center w-full py-1 text-xs font-semibold uppercase transition-colors duration-150 rounded-md hover:bg-red-100 hover:text-gray-800 dark:hover:bg-red-800 dark:hover:text-gray-200">
                                <svg class="w-5 h-5 mr-3" aria-hidden="true" fill="none" stroke-linecap="round"
                                    stroke-linejoin="round" stroke-width="2" viewBox="0 0 24 24" stroke="currentColor">
                                    <path
                                        d="M11 16l-4-4m0 0l4-4m-4 4h14m-5 4v1a3 3 0 01-3 3H6a3 3 0 01-3-3V7a3 3 0 013-3h7a3 3 0 013 3v1">
                                    </path>
                                </svg>
                                <span>Sair</span>
                            </a>
                            <form id="logout-form" action="{{ route('logout') }}" method="GET" style="display: none;">
                                {{ csrf_field() }}
                            </form>
                        </li>
                    </ul>
                </template>
            </li> --}}
            <!-- Profile menu -->
        </ul>
    </div>
</header>

<x-modal.modal-small name="logout" title="Sair da conta?">
    @slot('body')

        @slot('icone')
            <svg xmlns="http://www.w3.org/2000/svg" class="size-7" viewBox="0 0 24 24" fill="none" stroke="currentColor"
                stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
                class="lucide lucide-package-plus-icon lucide-package-plus">
                <path d="M16 16h6" />
                <path d="M19 13v6" />
                <path
                    d="M21 10V8a2 2 0 0 0-1-1.73l-7-4a2 2 0 0 0-2 0l-7 4A2 2 0 0 0 3 8v8a2 2 0 0 0 1 1.73l7 4a2 2 0 0 0 2 0l2-1.14" />
                <path d="m7.5 4.27 9 5.15" />
                <polyline points="3.29 7 12 12 20.71 7" />
                <line x1="12" x2="12" y1="22" y2="12" />
            </svg>
        @endslot

        <form action="">
            <div class="flex flex-col items-center shrink-0">
                <div>
                    <img id='preview_img' accept="image/png, image/jpeg" x-on:change="fileChosen"
                        class="h-30 w-30 object-cover rounded-full transition-all hover:scale-95"
                        src="{{ auth()->user()->image }}" alt="Current profile photo" />
                </div>

                <h1 class="font-black text-lg text-neutral-600">{{ auth()->user()->name }}</h1>
            </div>

            <div class="flex justify-center gap-3 mt-5">
                <button type="button" x-on:click="$dispatch('close-modal-small', { name : 'login' })"
                    class="flex items-center gap-1 text-xs uppercase text-neutral-600 bg-white border border-neutral-300 px-3 py-2 rounded-md transition-all hover:scale-95 hover:cursor-pointer">
                    Cancelar
                </button>

                <a href="{{ route('admin.logout') }}"
                    class="flex items-center gap-1 text-xs uppercase text-white bg-red-500 px-3 py-2 rounded-md hover:bg-red-700 transition-all hover:scale-95 hover:cursor-pointer">
                    Sair
                </a>
            </div>
        </form>


    @endslot
</x-modal.modal-small>
