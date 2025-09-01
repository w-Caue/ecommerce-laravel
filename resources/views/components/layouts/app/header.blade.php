<header class="py-2 border-b-2 mx-5 mt-3 border-gray-200 dark:border-gray-700">
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
                @hasSection('titulo')
                    <span class="text-xl font-bold text-blue-500">@yield('titulo')</span>
                @endif
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

            {{-- <li class="flex">
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
            </li> --}}

            <!-- Profile menu -->
            <li x-title="NavBar:ProfileMenu" x-data="{ isProfileMenuOpen: false }" class="relative" wfd-id="105">
                <button x-on:click="isProfileMenuOpen = !isProfileMenuOpen;" @keydown.escape="isProfileMenuOpen = false"
                    @click.away="isProfileMenuOpen = false;"
                    class="size-10 m-2 transition-all hover:text-red-500 hover:scale-95 hover:cursor-pointer"
                    aria-label="Toggle color mode">
                    <img src="{{ auth()->user()->image ?? '' }}"
                        class="object-cover object-center rounded-full  border border-gray-100" alt="ft-perfil">
                </button>

                <template x-if="isProfileMenuOpen">
                    <ul x-transition:leave="transition ease-in duration-150" x-transition:leave-start="opacity-100"
                        x-transition:leave-end="opacity-0" @keydown.escape="isProfileMenuOpen = false; "
                        class="absolute right-0 z-40 w-56 p-5 mt-4 space-y-4 text-gray-600 bg-white shadow-lg rounded-md dark:shadow-gray-800 dark:text-gray-300 dark:bg-gray-800"
                        aria-label="submenu">

                        <li>
                            <div class="">
                                <span class=" dark:text-neutral-500">Acessando como:</span>
                                <h1 class="text-blue-500">{{ auth()->user()->name }}</h1>
                            </div>
                        </li>

                        <div class="border dark:border-gray-700"></div>

                        <li class="flex">
                            <a href="{{ route('admin.contas') }}"
                                class="inline-flex items-center w-full p-1 text-xs font-semibold uppercase transition-colors duration-150 rounded-md hover:bg-blue-100 hover:text-gray-800">
                                <svg xmlns="http://www.w3.org/2000/svg" class="size-5 mr-3" viewBox="0 0 24 24"
                                    fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                                    stroke-linejoin="round"
                                    class="lucide lucide-user-round-cog-icon lucide-user-round-cog">
                                    <path d="m14.305 19.53.923-.382" />
                                    <path d="m15.228 16.852-.923-.383" />
                                    <path d="m16.852 15.228-.383-.923" />
                                    <path d="m16.852 20.772-.383.924" />
                                    <path d="m19.148 15.228.383-.923" />
                                    <path d="m19.53 21.696-.382-.924" />
                                    <path d="M2 21a8 8 0 0 1 10.434-7.62" />
                                    <path d="m20.772 16.852.924-.383" />
                                    <path d="m20.772 19.148.924.383" />
                                    <circle cx="10" cy="8" r="5" />
                                    <circle cx="18" cy="18" r="3" />
                                </svg>
                                <span>Conta</span>
                            </a>
                        </li>
                        <li class="flex">
                            <button x-on:click="$dispatch('open-modal-small', { name : 'logout' })"
                                class="inline-flex items-center w-full p-1 text-xs font-semibold uppercase transition-colors duration-150 rounded-md hover:bg-red-100 hover:text-gray-800 cursor-pointer">
                                <svg xmlns="http://www.w3.org/2000/svg" class="size-5 mr-3" viewBox="0 0 24 24"
                                    fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                                    stroke-linejoin="round" class="lucide lucide-log-out-icon lucide-log-out">
                                    <path d="m16 17 5-5-5-5" />
                                    <path d="M21 12H9" />
                                    <path d="M9 21H5a2 2 0 0 1-2-2V5a2 2 0 0 1 2-2h4" />
                                </svg>
                                <span>Sair</span>
                            </button>
                        </li>
                    </ul>
                </template>
            </li>
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
