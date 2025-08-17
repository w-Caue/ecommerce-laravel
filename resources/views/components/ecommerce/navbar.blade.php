<nav class="py-2 px-6 flex justify-between items-center gap-7 bg-white">
    <a href="" class="text-lg text-blue-500">eLolja</a>

    <div class="w-[33%]">
        <x-ecommerce.search />
    </div>

    <div x-data="data()" class="flex gap-4">
        <div class="flex relative">
            @if (Auth::guard('customer')->user())
                <button x-on:click="openUser = !openUser"
                    class="flex items-center gap-2 font-black text-sm text-neutral-600 transition duration-300 cursor-pointer">
                    <img src="{{ auth()->guard('customer')->user()->image }}"
                        class="object-cover object-center rounded-full h-10 w-10" alt="Avatar Tailwind CSS Component" />
                    Olá, <span class=" text-purple-700">{{ auth()->guard('customer')->user()->name }}</span>

                    <svg xmlns="http://www.w3.org/2000/svg" class="size-6" viewBox="0 0 24 24" fill="none"
                        stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
                        class="lucide lucide-chevron-down-icon lucide-chevron-down">
                        <path d="m6 9 6 6 6-6" />
                    </svg>
                </button>
                <div x-show="openUser" class="">
                    <ul x-transition:leave="transition ease-in duration-150" x-transition:leave-start="opacity-100"
                        x-transition:leave-end="opacity-0" @click.away="openUser=false" @keydown.escape="openUser=false"
                        class="absolute right-10 z-50 p-2 mt-16 space-y-2 w-48 font-bold text-neutral-600 bg-white border border-gray-100 rounded-xl"
                        aria-label="submenu">

                        <li class="flex">
                            <a class="inline-flex items-center w-full px-2 py-1 text-sm transition-colors duration-150 rounded-md hover:bg-gray-100 hover:text-gray-800"
                                href="{{ route('ecommerce.perfil') }}">
                                <svg class="size-4 mr-3" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24"
                                    fill="currentColor">
                                    <path
                                        d="M4 22C4 17.5817 7.58172 14 12 14C16.4183 14 20 17.5817 20 22H18C18 18.6863 15.3137 16 12 16C8.68629 16 6 18.6863 6 22H4ZM12 13C8.685 13 6 10.315 6 7C6 3.685 8.685 1 12 1C15.315 1 18 3.685 18 7C18 10.315 15.315 13 12 13ZM12 11C14.21 11 16 9.21 16 7C16 4.79 14.21 3 12 3C9.79 3 8 4.79 8 7C8 9.21 9.79 11 12 11Z">
                                    </path>
                                </svg>
                                <span>Meus Dados</span>
                            </a>
                        </li>
                        <li class="flex">
                            <a class="inline-flex items-center w-full px-2 py-1 text-sm transition-colors duration-150 rounded-md hover:bg-gray-100 hover:text-gray-800"
                                href="{{ route('ecommerce.pedidos') }}">
                                <svg xmlns="http://www.w3.org/2000/svg" class="size-4 mr-3" viewBox="0 0 24 24"
                                    fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                                    stroke-linejoin="round"
                                    class="lucide lucide-shopping-cart-icon lucide-shopping-cart">
                                    <circle cx="8" cy="21" r="1" />
                                    <circle cx="19" cy="21" r="1" />
                                    <path
                                        d="M2.05 2.05h2l2.66 12.42a2 2 0 0 0 2 1.58h9.78a2 2 0 0 0 1.95-1.57l1.65-7.43H5.12" />
                                </svg>

                                <span>Meus Pedidos</span>
                            </a>
                        </li>

                        <li class="flex">
                            <a class="inline-flex items-center w-full px-2 py-1 text-sm transition-colors duration-150 rounded-md hover:bg-gray-100 hover:text-gray-800"
                                href="{{ route('ecommerce.logout') }}">

                                <svg xmlns="http://www.w3.org/2000/svg" class="size-4 mr-3" viewBox="0 0 24 24"
                                    fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                                    stroke-linejoin="round" class="lucide lucide-log-out-icon lucide-log-out">
                                    <path d="m16 17 5-5-5-5" />
                                    <path d="M21 12H9" />
                                    <path d="M9 21H5a2 2 0 0 1-2-2V5a2 2 0 0 1 2-2h4" />
                                </svg>

                                <span>Sair da Conta</span>
                            </a>
                        </li>
                    </ul>
                </div>
            @endif

            @if (Auth::guard('customer')->user() == null)
                <div class="flex items-center">
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                        stroke="currentColor" class="size-11 text-blue-500">
                        <path stroke-linecap="round" stroke-linejoin="round"
                            d="M17.982 18.725A7.488 7.488 0 0 0 12 15.75a7.488 7.488 0 0 0-5.982 2.975m11.963 0a9 9 0 1 0-11.963 0m11.963 0A8.966 8.966 0 0 1 12 21a8.966 8.966 0 0 1-5.982-2.275M15 9.75a3 3 0 1 1-6 0 3 3 0 0 1 6 0Z" />
                    </svg>

                    <div class="flex flex-col font-semibold text-sm text-start text-gray-700 hover:text-gray-900">
                        <h1>Bem vindo : ) </h1>
                        <div class="text-sm font-bold text-blue-500">
                            <a class="transition hover:underline" href="{{ route('login') }}"> Entrar</a>
                            <span class="text-gray-700">ou</span>
                            <a class="transition hover:underline" href="">Cadastra-se</a>
                        </div>
                    </div>
                </div>
            @endif
        </div>

        @livewire('ecommerce.carrinho-botao')
    </div>
</nav>

<div class="flex justify-center items-center gap-7 p-2 font-bold text-neutral-600 bg-orange-200">
    <a href="" class="hover:underline hover:underline-offset-4 decoration-2">Produtos</a>

    <a href="" class="hover:underline hover:underline-offset-4 decoration-2">Sobre nós</a>

    <a href="" class="hover:underline hover:underline-offset-4 decoration-2">Contato</a>
</div>
