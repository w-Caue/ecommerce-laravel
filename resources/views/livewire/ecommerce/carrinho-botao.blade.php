<div>
    <div class="block sm:hidden">
        <a href="" x-cloak x-on:click="openCarrinho = !openCarrinho"
            class="relative inline-flex items-center p-2 m-1 font-semibold text-purple-600 align-middle duration-300 transition-all cursor-pointer text-md hover:scale-95">
            <svg xmlns="http://www.w3.org/2000/svg" class="size-6" viewBox="0 0 24 24" fill="none" stroke="currentColor"
                stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
                class="lucide lucide-shopping-cart-icon lucide-shopping-cart">
                <circle cx="8" cy="21" r="1" />
                <circle cx="19" cy="21" r="1" />
                <path d="M2.05 2.05h2l2.66 12.42a2 2 0 0 0 2 1.58h9.78a2 2 0 0 0 1.95-1.57l1.65-7.43H5.12" />
            </svg>

            <span aria-hidden="true" title="Adicionar ao carrinho"
                class="absolute top-0 right-0 inline-block w-5 h-5 mb-1 text-sm text-center font-bold text-purple-600 transform translate-x-1 -translate-y-1 rounded-full">
                {{ $totalItens }}
            </span>
        </a>
    </div>

    <div class="hidden sm:block">
        <button x-cloak x-on:click="openCarrinho = !openCarrinho"
            class="relative inline-flex items-center p-2 m-1 font-semibold text-blue-500 align-middle duration-300 rounded-full transition-all cursor-pointer text-md hover:bg-gray-200 hover:scale-95">
            <svg xmlns="http://www.w3.org/2000/svg" class="size-7" viewBox="0 0 24 24" fill="none"
                stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
                class="lucide lucide-shopping-cart-icon lucide-shopping-cart">
                <circle cx="8" cy="21" r="1" />
                <circle cx="19" cy="21" r="1" />
                <path d="M2.05 2.05h2l2.66 12.42a2 2 0 0 0 2 1.58h9.78a2 2 0 0 0 1.95-1.57l1.65-7.43H5.12" />
            </svg>

            {{-- @if ($totalItens != 0) --}}
            <span aria-hidden="true" title="Adicionar ao carrinho"
                class="absolute top-0 right-0 inline-block size-5 text-center text-xs text-white transform translate-x-1 -translate-y-1 bg-blue-500 border-2 border-white rounded-full">
                {{ $totalItens }}
            </span>
            {{-- @endif --}}
        </button>

        <div x-cloak x-show="openCarrinho" @click.outside="openCarrinho=false" @keydown.escape="openCarrinho=false"
            class="absolute my-4 right-10 z-20 px-3 w-96 bg-white border rounded-xl">

            <h1 class="text-md font-semibold text-center text-neutral-600 tracking-widest mb-4">
                Produtos Adicionados
            </h1>

            @if ($carrinho)
                <div style="height: auto; max-height: 16rem;" class="relative overflow-y-auto">
                    @foreach ($carrinho as $produto)
                        <div class="flex flex-col mb-4">
                            <div class="flex justify-between">
                                <!-- product -->
                                <div class="flex gap-2">
                                    <div class="w-20">
                                        <div class="relative flex justify-center h-12 overflow-hidden rounded ">
                                            <img src="{{ $produto['image'] }}"
                                                class="object-cover object-center rounded w-full" alt="">
                                        </div>
                                    </div>
                                    <div class="">
                                        <h1 class="text-xs uppercase tracking-wider text-neutral-600">
                                            {{ $produto['nome'] }}
                                        </h1>
                                        <span class="text-xs">{{ $produto['descricao'] }}</span>
                                    </div>
                                </div>

                                <button wire:click="remover({{ $produto['codigo'] }})"
                                    class="text-xs font-semibold text-left text-red-500 hover:text-red-600 hover:cursor-pointer">
                                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                        stroke-width="2" stroke="currentColor" class="w-5 h-5">
                                        <path stroke-linecap="round" stroke-linejoin="round"
                                            d="m14.74 9-.346 9m-4.788 0L9.26 9m9.968-3.21c.342.052.682.107 1.022.166m-1.022-.165L18.16 19.673a2.25 2.25 0 0 1-2.244 2.077H8.084a2.25 2.25 0 0 1-2.244-2.077L4.772 5.79m14.456 0a48.108 48.108 0 0 0-3.478-.397m-12 .562c.34-.059.68-.114 1.022-.165m0 0a48.11 48.11 0 0 1 3.478-.397m7.5 0v-.916c0-1.18-.91-2.164-2.09-2.201a51.964 51.964 0 0 0-3.32 0c-1.18.037-2.09 1.022-2.09 2.201v.916m7.5 0a48.667 48.667 0 0 0-7.5 0" />
                                    </svg>
                                </button>
                            </div>
                            <div class="flex justify-between my-1">
                                <div class="flex w-20 border rounded p-1">
                                    <button wire:click="removerItem({{ $produto['codigo'] }}, {{ '-1' }})">
                                        <svg class="w-4 h-4" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24"
                                            fill="currentColor">
                                            <path d="M19 11H5V13H19V11Z"></path>
                                        </svg>
                                    </button>

                                    <span
                                        class="w-12 mx-2 font-semibold text-center text-sm">{{ $produto['quantidade'] }}</span>

                                    <button
                                        wire:click="adicionar({{ $produto['codigo'] }}, {{ '+1' }}, {{ $produto['preco'] }})">
                                        <svg class="w-4 h-4" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24"
                                            fill="currentColor">
                                            <path d="M11 11V5H13V11H19V13H13V19H11V13H5V11H11Z"></path>
                                        </svg>
                                    </button>
                                </div>

                                <span class=" text-sm font-bold text-center text-orange-500">
                                    R${{ number_format($produto['total'], 2, ',') }}
                                </span>
                            </div>
                        </div>
                    @endforeach

                </div>

                <div class="flex justify-between py-6 text-neutral-600 border-t">
                    <span>Total: </span>
                    <span class="font-bold text-orange-500">R${{ number_format($valorTotal, 2, ',') }}</span>
                </div>

                <a href="{{ route('carrinho') }}"
                    class="flex justify-center items-center gap-2 mb-2 text-white text-xs font-bold uppercase bg-purple-500 py-2 mt-3 w-full rounded-lg transition-all hover:scale-95">
                    <svg xmlns="http://www.w3.org/2000/svg" class="size-5" viewBox="0 0 24 24" fill="none"
                        stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
                        class="lucide lucide-shopping-cart-icon lucide-shopping-cart">
                        <circle cx="8" cy="21" r="1" />
                        <circle cx="19" cy="21" r="1" />
                        <path d="M2.05 2.05h2l2.66 12.42a2 2 0 0 0 2 1.58h9.78a2 2 0 0 0 1.95-1.57l1.65-7.43H5.12" />
                    </svg>

                    Finalizar
                </a>
            @else
                <div class="flex flex-col items-center text-gray-600 border-t">
                    <h1 class="text-sm tracking-wider text-center font-semibold">
                        Nenhum item no carrinho
                    </h1>
                    <a href=""
                        class="text-sm text-center text-neutral-500 font-semibold transition-all hover:underline">
                        Ver Produtos
                    </a>
                </div>
            @endif
        </div>

    </div>
</div>
