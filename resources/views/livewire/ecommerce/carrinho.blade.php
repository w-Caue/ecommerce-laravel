<div>

    <div class="flex flex-col items-start gap-5 mx-7 md:flex-row">

        <div class="w-full px-10 py-5 rounded-xl shadow-md bg-white md:w-2/3">

            @foreach ($carrinho as $produto)
                <div class="relative flex justify-between items-center p-2 -mx-8 my-1 ">
                    <div class="flex w-2/5">
                        <!-- product -->
                        <div class="w-20">
                            <div class="relative flex justify-center h-20 overflow-hidden rounded ">
                                <img src="{{ $produto['image'] }}" class="object-cover object-center rounded w-full"
                                    alt="">
                            </div>
                        </div>
                        <div class="flex flex-col justify-center ml-4 font-bold">
                            <span class=" text-neutral-600">{{ $produto['nome'] ?? '' }}</span>
                            <span class="text-neutral-500">{{ $produto['descricao'] ?? '' }}</span>
                            <span class="text-sm text-orange-500">R${{ number_format($produto['preco'], 2, ',') }}
                            </span>
                        </div>
                    </div>
                    <div class="flex justify-center w-1/5 my-auto">
                        <button wire:click="removerItem({{ $produto['codigo'] }}, {{ '-1' }})" class="p-1 rounded-full transition-all hover:bg-red-200 hover:scale-95 hover:cursor-pointer">
                            <svg class="size-6" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24"
                                fill="currentColor">
                                <path d="M19 11H5V13H19V11Z"></path>
                            </svg>
                        </button>


                        <input class="w-12 mx-2 p-1 text-center font-semibold text-gray-600 border rounded-full"
                            type="text" value="{{ $produto['quantidade'] }}">

                        <button
                            wire:click="adicionarItem({{ $produto['codigo'] }}, {{ '+1' }}, {{ $produto['preco'] }})"
                            class="p-1 rounded-full transition-all hover:bg-blue-200 hover:scale-95 hover:cursor-pointer">
                            <svg class="w-6 h-6" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24"
                                fill="currentColor">
                                <path d="M11 11V5H13V11H19V13H13V19H11V13H5V11H11Z"></path>
                            </svg>
                        </button>
                    </div>
                    <span
                        class="w-1/5 font-bold text-orange-500 text-center">R${{ number_format($produto['total'], 2, ',') }}</span>

                    {{-- REMOVER --}}
                    <button wire:click="remover({{ $produto['codigo'] }})"
                        class="absolute top-1 right-0 text-gray-500 hover:text-red-500 hover:cursor-pointer">
                        <svg class="w-5 h-5" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor">
                            <path
                                d="M11.9997 10.5865L16.9495 5.63672L18.3637 7.05093L13.4139 12.0007L18.3637 16.9504L16.9495 18.3646L11.9997 13.4149L7.04996 18.3646L5.63574 16.9504L10.5855 12.0007L5.63574 7.05093L7.04996 5.63672L11.9997 10.5865Z">
                            </path>
                        </svg>
                    </button>
                </div>
            @endforeach

        </div>

        <div class="w-full h-auto px-8 py-10 rounded-xl shadow-md bg-white md:w-1/3">
            <div class="flex justify-between py-4 font-bold text-neutral-600 border-b">
                <span>Total: </span>
                <span class="text-orange-500">R${{ number_format($valorTotal, 2, ',', '') }} </span>
            </div>

            <a href="{{ route('cliente') }}"
                class="flex justify-center items-center gap-2 text-white text-xs font-bold uppercase bg-purple-500 py-2 mt-3 w-full rounded-lg transition-all hover:scale-95">
                <svg xmlns="http://www.w3.org/2000/svg" class="size-5" viewBox="0 0 24 24" fill="none"
                    stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
                    class="lucide lucide-shopping-cart-icon lucide-shopping-cart">
                    <circle cx="8" cy="21" r="1" />
                    <circle cx="19" cy="21" r="1" />
                    <path d="M2.05 2.05h2l2.66 12.42a2 2 0 0 0 2 1.58h9.78a2 2 0 0 0 1.95-1.57l1.65-7.43H5.12" />
                </svg>

                Finalizar
            </a>


            <a href="{{ route('home') }}"
                class="flex justify-center items-center gap-2 text-neutral-600 text-xs font-bold uppercase bg-white-500 border border-neutral-500 py-2 mt-3 w-full rounded-lg transition-all hover:scale-95">
                Voltar à loja
            </a>
        </div>

    </div>

</div>
