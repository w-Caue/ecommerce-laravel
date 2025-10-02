<nav class="fixed w-full top-0 z-50 py-3 px-6 flex justify-between items-center gap-7 bg-white">
    <ul class="hidden sm:flex items-center gap-5">
        <li>Planos</li>
        <li>Sobre nós</li>
        <li>Contato</li>
    </ul>

    <div x-data="{ menu: false }" class="block sm:hidden">
        <button x-on:click="menu = !menu" class="text-[#366C90] p-2 cursor-pointer hover:scale-95 transition-all">
            <svg xmlns="http://www.w3.org/2000/svg" width="24"
                height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"
                stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-menu-icon lucide-menu">
                <path d="M4 5h16" />
                <path d="M4 12h16" />
                <path d="M4 19h16" />
            </svg>
        </button>

        <div x-show="menu" class="absolute bg-gray-100 w-72 rounded-lg">
            <ul class="p-2">
                <li>Planos</li>
                <li>Sobre nós</li>
                <li>Contato</li>
            </ul>
        </div>
    </div>

    {{-- <img class="absolute left-[45%] w-14" src="{{ asset('img/logo/logo-foco.png') }}" alt="logo foco"> --}}

    <a href="{{ route('admin.login') }}" class="flex items-center gap-1 hover:bg-gray-100 p-1 rounded-full">
        <svg xmlns="http://www.w3.org/2000/svg" class="size-6" viewBox="0 0 24 24" fill="none" stroke="currentColor"
            stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-user-icon lucide-user">
            <path d="M19 21v-2a4 4 0 0 0-4-4H9a4 4 0 0 0-4 4v2" />
            <circle cx="12" cy="7" r="4" />
        </svg>

        <h1>Fazer <span class="text-[#164482]">Login</span> </h1>
    </a>
</nav>
