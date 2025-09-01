<div class="flex justify-between">

    <div x-cloak x-on:mouseover="sidebar.full = true"
        x-on:mouseleave="sidebar.full = false, dropdown.open = false, dropdownProduto.open = false, dropdownMovimentacao.open = false, dropdownContas.open = false"
        class="flex-shrink-0 bg-white transition-all duration-300 mx-5 my-4 rounded-xl shadow-lg shadow-gray-300 hidden sm:block"
        x-bind:class="{
            'w-64': sidebar.full,
            'w-64 sm:w-20': !sidebar.full,
            'left-0': sidebar
                .navOpen,
            '-left-64 sm:left-0': !sidebar.navOpen
        }">

        <a href=""
            class="flex items-center gap-2 "
            x-bind:class="sidebar.full ? 'justify-start m-2' : 'justify-center'">

            <img src="{{ asset('img/logo.png')}}"
                class="object-cover object-center rounded-full size-14" alt="ft-logo">

            <h1 class="font-black text-2xl text-transparent bg-clip-text bg-gradient-to-r from-blue-600 to-purple-500" x-bind:class="sidebar.full ? '' : 'hidden'">
                Eloja
            </h1>
        </a>

        <div class="relative space-y-4 text-md font-bold p-4">

            <div class="border border-gray-200"></div>

            <a href="{{ route('admin.dashboard') }}"
                class="relative flex justify-between items-center space-x-2 p-2 cursor-pointer hover:bg-gray-100 {{ request()->routeIs('admin.dashboard') ? 'text-blue-500 rounded-r-xl border-l-2 border-blue-500 ' : 'text-neutral-500 rounded-xl hover:text-blue-500' }}"
                x-bind:class="{
                    'justify-start': sidebar.full,
                    'sm:justify-center': !sidebar.full,
                }">
                <div class="flex items-center space-x-2">
                    <x-icons.dashboard />

                    <h1 x-clock
                        x-bind:class="!sidebar.full && tooltip.show ? visibleClass : '' || !sidebar.full && !tooltip.show ?
                            'sm:hidden' : ''">
                        Inicio
                    </h1>
                </div>
            </a>

            <a href="{{ route('admin.produtos.listagem') }}"
                class="relative flex justify-between items-center space-x-2 p-2 cursor-pointer hover:bg-gray-100 {{ request()->routeIs('admin.produtos.*') ? 'text-blue-500 rounded-r-xl border-l-2 border-blue-500 ' : 'text-neutral-500 rounded-xl hover:text-blue-500' }}"
                x-bind:class="{
                    'justify-start': sidebar.full,
                    'sm:justify-center': !sidebar.full,
                }">
                <div class="flex items-center space-x-2">
                    <x-icons.package />

                    <h1 x-clock
                        x-bind:class="!sidebar.full && tooltip.show ? visibleClass : '' || !sidebar.full && !tooltip.show ?
                            'sm:hidden' : ''">
                        Produtos
                    </h1>
                </div>
            </a>

            <a href="{{ route('admin.pedidos.listagem') }}"
                class="relative flex justify-between items-center space-x-2 p-2 cursor-pointer hover:bg-gray-100 {{ request()->routeIs('admin.pedidos.*') ? 'text-blue-500 rounded-r-xl border-l-2 border-blue-500 ' : 'text-neutral-500 rounded-xl hover:text-blue-500' }}"
                x-bind:class="{
                    'justify-start': sidebar.full,
                    'sm:justify-center': !sidebar.full,
                }">
                <div class="flex items-center space-x-2">
                    <x-icons.orders />

                    <h1 x-clock
                        x-bind:class="!sidebar.full && tooltip.show ? visibleClass : '' || !sidebar.full && !tooltip.show ?
                            'sm:hidden' : ''">
                        Pedidos
                    </h1>
                </div>
            </a>
        </div>

    </div>
</div>

<div x-cloak class="flex justify-between ">

    <div class="fixed z-50 flex-shrink-0 space-y-2 mx-4 my-4 p-2 h-full rounded-xl transition-all duration-300 bg-white sm:hidden"
        x-bind:class="{
            'top-0 left-0 w-54': sidebar
                .full,
            'top-0 -left-72': !sidebar.full
        }">

        <div class="flex justify-end">
            <button x-on:click="sidebar.full = !sidebar.full" class="block lg:hidden focus:outline-none">
                <!-- Close Icon -->
                <svg xmlns="http://www.w3.org/2000/svg" class="size-5" x-bind:class="sidebar.full ? '' : 'hidden'"
                    viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                    stroke-linejoin="round" class="lucide lucide-x-icon lucide-x">
                    <path d="M18 6 6 18" />
                    <path d="m6 6 12 12" />
                </svg>
            </button>
        </div>

        <div class="flex justify-center items-center gap-2">
            <a href="{{ route('admin.contas') }}"
                class="flex flex-col justify-center items-center gap-2 rounded-xl hover:bg-gray-100 hover:cursor-pointer">

                <img src="{{ auth()->user()->image ?? '' }}"
                    class="object-cover object-center rounded-full size-14 border border-gray-100" alt="ft-perfil">

                <h1 class="font-black text-neutral-600" x-bind:class="sidebar.full ? '' : 'hidden'">
                    {{ auth()->user()->name ?? '' }}
                </h1>
            </a>
        </div>

        <div class="relative space-y-4 text-xs uppercase font-bold">

            {{-- <div class="border border-gray-200"></div> --}}

            {{-- HOME --}}
            <a href="{{ route('admin.dashboard') }}"
                class="relative flex justify-between items-center space-x-2 p-2 cursor-pointer hover:bg-gray-100 {{ request()->routeIs('admin.dashboard') ? 'text-blue-500 rounded-r-xl border-l-2 border-blue-500 ' : 'text-neutral-500 rounded-xl hover:text-blue-500' }}"
                x-bind:class="{
                    'justify-start': sidebar.full,
                    'sm:justify-center': !sidebar.full,
                }">
                <div class="flex items-center space-x-2">
                    <x-icons.dashboard />

                    <h1 x-clock
                        x-bind:class="!sidebar.full && tooltip.show ? visibleClass : '' || !sidebar.full && !tooltip.show ?
                            'sm:hidden' : ''">
                        Inicio
                    </h1>
                </div>
            </a>

            <a href="{{ route('admin.produtos.listagem') }}"
                class="relative flex justify-between items-center space-x-2 p-2 cursor-pointer hover:bg-gray-100 {{ request()->routeIs('admin.produtos.*') ? 'text-blue-500 rounded-r-xl border-l-2 border-blue-500 ' : 'text-neutral-500 rounded-xl hover:text-blue-500' }}"
                x-bind:class="{
                    'justify-start': sidebar.full,
                    'sm:justify-center': !sidebar.full,
                }">
                <div class="flex items-center space-x-2">
                    <x-icons.package />

                    <h1 x-clock
                        x-bind:class="!sidebar.full && tooltip.show ? visibleClass : '' || !sidebar.full && !tooltip.show ?
                            'sm:hidden' : ''">
                        Produtos
                    </h1>
                </div>
            </a>

            <a href="{{ route('admin.pedidos.listagem') }}"
                class="relative flex justify-between items-center space-x-2 p-2 cursor-pointer hover:bg-gray-100 {{ request()->routeIs('admin.pedidos.*') ? 'text-blue-500 rounded-r-xl border-l-2 border-blue-500 ' : 'text-neutral-500 rounded-xl hover:text-blue-500' }}"
                x-bind:class="{
                    'justify-start': sidebar.full,
                    'sm:justify-center': !sidebar.full,
                }">
                <div class="flex items-center space-x-2">
                    <x-icons.orders />

                    <h1 x-clock
                        x-bind:class="!sidebar.full && tooltip.show ? visibleClass : '' || !sidebar.full && !tooltip.show ?
                            'sm:hidden' : ''">
                        Pedidos
                    </h1>
                </div>
            </a>


        </div>
    </div>
</div>
