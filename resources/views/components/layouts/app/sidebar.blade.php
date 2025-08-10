<div x-data="sidebar()" class="flex justify-between">

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

        <a href="{{ route('admin.contas') }}"
            class="flex items-center gap-2 p-2 rounded-xl hover:bg-gray-100 hover:cursor-pointer"
            x-bind:class="sidebar.full ? 'justify-start m-2' : 'justify-center'">

            <img src="{{ auth()->user()->image ?? '' }}"
                class="object-cover object-center rounded-full size-14 border border-gray-100" alt="ft-perfil">

            <h1 class="font-black text-neutral-600" x-bind:class="sidebar.full ? '' : 'hidden'">
                {{ auth()->user()->name ?? '' }}
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

<script>
    function sidebar() {
        return {
            sidebar: {
                full: false,
                navOpen: false
            },
            tooltip: {
                show: false,
                visibleClass: 'block sm:absolute  sm:border border-gray-500 left-16 sm:text-sm sm:bg-gray-800 sm:px-2 sm:py-1 sm:rounded'
            },
            dropdown: {
                open: false,
                toggle(tap) {
                    this.open = !this.open;
                },
            },

            dropdownProduto: {
                open: false,
                toggle(tap) {
                    this.open = !this.open;
                },
            },

            dropdownMovimentacao: {
                open: false,
                toggle(tap) {
                    this.open = !this.open;
                },
            },

            dropdownContas: {
                open: false,
                toggle(tap) {
                    this.open = !this.open;
                },
            }
        }
    }
</script>

<!-- DESKTOP -->
{{-- <div class="flex justify-between">

    <div
        class="flex-shrink-0 transition-all duration-300 mx-4 my-6 hidden lg:block dark:bg-gray-800 dark:shadow-gray-700">

        <div class="bg-white rounded-xl p-4">
            <button class="flex items-center gap-3">
                <div class="">
                    <img src="{{ asset('img/ft-perfil.jpeg') }}" class="object-cover object-center rounded-full size-14 border border-gray-100" alt="ft-perfil">
                </div>

                <span class="text-sm font-bold text-neutral-700">
                    Wanderson Cauê
                </span>
            </button>
        </div>

        <div class="relative justify-center items-center bg-white rounded-xl p-4 mt-4 text-sm font-bold">

            <a href="{{ route('dashboard') }}"
                class="relative w-full flex justify-between items-center space-x-2 p-1 cursor-pointer {{ request()->routeIs('dashboard') ? 'text-purple-500' : 'text-neutral-700 hover:text-purple-500' }}">
                <div class="w-full flex items-center gap-3">
                    <div
                        class="p-2 rounded-full {{ request()->routeIs('dashboard') ? 'bg-purple-500 text-white' : 'bg-white' }}">
                        <x-icons.dashboard />
                    </div>

                    <h1>
                        Dashboard
                    </h1>
                </div>
            </a>

            <a href="{{ route('produtos.listagem') }}"
                class="relative flex justify-between items-center space-x-2 p-1 cursor-pointer {{ request()->routeIs('produtos.*') ? 'text-purple-500' : 'text-neutral-700 hover:text-purple-500' }}">
                <div class="w-full flex items-center gap-3">
                    <div
                        class="p-2 rounded-full {{ request()->routeIs('produtos.*') ? 'bg-purple-500 text-white' : 'bg-white' }}">
                        <x-icons.package />
                    </div>

                    <h1>
                        Produtos
                    </h1>
                </div>
            </a>

            <a href="{{ route('pedidos.listagem') }}"
                class="relative flex justify-between items-center space-x-2 p-1 cursor-pointer {{ request()->routeIs('pedidos.listagem') ? 'text-purple-500' : 'text-neutral-700 hover:text-purple-500' }}">
                <div class="w-full flex items-center gap-3">
                    <div
                        class="p-2 rounded-full {{ request()->routeIs('pedidos.listagem') ? 'bg-purple-500 text-white' : 'bg-white' }}">
                        <x-icons.orders />
                    </div>

                    <h1>
                        Pedidos
                    </h1>
                </div>
            </a>
        </div>
    </div>
</div> --}}
<!-- /DESKTOP -->


<!-- Mobile -->
{{-- <div class="flex justify-between ">

    <div class="fixed z-50 flex-shrink-0 space-y-2 mx-4 my-4 p-2 h-full rounded-lg transition-all duration-300 bg-white lg:hidden dark:bg-gray-800"
        x-bind:class="{
            'top-0 -left-80': !sidebar
        }">

        <div>
            <div class="flex justify-between h-10 m-1">
                <img aria-hidden="true" class="object-cover md:p-2"
                    src="data:image/jpeg;base64,{{ base64_encode(session('logo')) }}" alt="Logo" />

                <button x-on:click="sidebar = !sidebar" class="block lg:hidden focus:outline-none dark:text-white">
                    <!-- Close Icon -->
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                        stroke="currentColor" class="w-6 h-6" x-bind:class="sidebar ? '' : 'hidden'">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M6 18L18 6M6 6l12 12" />
                    </svg>
                </button>
            </div>
        </div>

        <div class="relative mt-4 space-y-4 text-xs uppercase font-bold">

            <div class="border dark:border-gray-700"></div>

            <a href="{{ route('app.dashboard') }}"
                class="relative w-full flex justify-between items-center space-x-2 p-2 cursor-pointer {{ request()->routeIs('app.dashboard') ? 'text-blue-500 border-l-2 border-blue-500 ' : 'text-gray-500 hover:text-blue-500' }}">
                <div class="w-full flex items-center gap-3">
                    <x-icons.inicio class="size-6"></x-icons.inicio>

                    <h1>
                        Inicio
                    </h1>
                </div>
            </a>

            <a href="{{ route('app.produtos.listagem-produtos.listagem') }}"
                class="relative flex justify-between items-center space-x-2 p-2 cursor-pointer {{ request()->routeIs('app.produtos.listagem-produtos.*') ? 'text-blue-500 border-l-2 border-blue-500 ' : 'text-gray-500 dark:text-gray-300 hover:text-blue-500' }}">
                <div class="w-full flex items-center gap-3">
                    <x-icons.produtos class="size-6"></x-icons.produtos>

                    <h1>
                        Produtos
                    </h1>
                </div>
            </a>

            <a href="{{ route('app.movimentacao.contagem-produtos.listagem') }}"
                class="relative flex justify-between items-center space-x-2 p-2 cursor-pointer {{ request()->routeIs('app.movimentacao.contagem-produtos.*') ? 'text-blue-500 border-l-2 border-blue-500 ' : 'text-gray-500 dark:text-gray-300 hover:text-blue-500' }}">
                <div class="w-full flex items-center gap-3">
                    <x-icons.contagem class="size-6"></x-icons.contagem>

                    <h1>
                        Contagem Produtos
                    </h1>
                </div>
            </a>

            <a href="{{ route('app.produtos.confere-produtos.listagem') }}"
                class="relative flex justify-between items-center space-x-2 p-2 cursor-pointer {{ request()->routeIs('app.produtos.confere-produtos.*') ? 'text-blue-500 border-l-2 border-blue-500 ' : 'text-gray-500 dark:text-gray-300 hover:text-blue-500' }}">
                <div class="w-full flex items-center gap-3">
                    <x-icons.confere-produtos class="size-6"></x-icons.confere-produtos>

                    <h1>
                        Conferência Produtos
                    </h1>
                </div>
            </a>

            <a href="{{ route('app.produtos.confere-nfe.listagem') }}"
                class="relative flex justify-between items-center space-x-2 p-2 cursor-pointer {{ request()->routeIs('app.produtos.confere-nfe.*') ? 'text-blue-500 border-l-2 border-blue-500 ' : 'text-gray-500 dark:text-gray-300 hover:text-blue-500' }}">
                <div class="w-full flex items-center gap-3">
                    <x-icons.confere-nfe class="size-6"></x-icons.confere-nfe>

                    <h1>
                        Confere NFe
                    </h1>
                </div>
            </a>

            <a href="{{ route('app.movimentacao.romaneio-entrega.listagem') }}"
                class="relative flex justify-between items-center space-x-2 p-2 cursor-pointer {{ request()->routeIs('app.movimentacao.romaneio-entrega.*') ? 'text-blue-500 border-l-2 border-blue-500 ' : 'text-gray-500 dark:text-gray-300 hover:text-blue-500' }}">
                <div class="w-full flex items-center gap-3">
                    <x-icons.romaneio-entrega class="size-6"></x-icons.romaneio-entrega>

                    <h1>
                        Romaneio Entrega
                    </h1>
                </div>
            </a>

            <div class="border dark:border-gray-600 mx-9"></div>

        </div>
    </div>
</div> --}}
