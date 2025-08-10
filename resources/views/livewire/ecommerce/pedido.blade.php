<div>
    <div class="flex flex-col items-start gap-5 my-10 mx-7 md:flex-row">
        <div class="w-full md:w-2/3">

            <div class="rounded-xl shadow-md bg-white px-10 py-5">
                <h1 class="text-sm tracking-widest font-semibold uppercase text-gray-400 mb-4">Itens</h1>

                @foreach ($carrinho as $produto)
                    <div class="relative flex justify-between items-center p-2 -mx-8 my-1 ">
                        <div class="flex w-2/5">
                            <!-- product -->
                            <div class="w-20">
                                <div class="relative flex justify-center h-16 overflow-hidden rounded ">
                                    <img src="{{ $produto['image'] }}" class="object-cover object-center rounded w-full"
                                        alt="">
                                </div>
                            </div>
                            <div class="flex flex-col justify-center ml-4 cursor-pointer">
                                <span class="text-neutral-600">
                                    {{ $produto['nome'] ?? '' }}
                                </span>

                                <span class="text-sm font-bold text-neutral-500">
                                    {{ $produto['descricao'] ?? '' }}
                                </span>

                                <span
                                    class="text-xs font-bold text-orange-500">R${{ number_format($produto['preco'], 2, ',') }}
                                </span>

                            </div>
                        </div>
                        <div class="flex justify-center w-1/5 my-auto">

                            <input class="w-12 mx-2 p-1 text-center font-semibold text-gray-600 border rounded-full"
                                disabled value="{{ $produto['quantidade'] }}">

                        </div>
                        <span
                            class="text-lg font-bold text-orange-500 text-center">R${{ number_format($produto['total'], 2, ',') }}</span>


                    </div>
                @endforeach
            </div>

            {{-- <div class="rounded-md shadow-md bg-white px-10 py-5 mt-10">
                <h1 class="text-sm tracking-widest font-semibold uppercase text-gray-400 mb-4">Observação do Pedido</h1>
    
                <div class="">
                    <h1 class="uppercase tracking-wide text-gray-600 text-md font-semibold">
                        Observação:
                    </h1>
    
                    <textarea class="w-2/3 text-xs text-gray-600 font-semibold tracking-widest uppercase pt-2 pl-2 border-2 rounded-md" name="" id="" placeholder="..." rows="10"></textarea>
    
    
                    
                </div>
    
            </div> --}}
        </div>

        <div class="w-full h-auto px-8 py-10 rounded-xl shadow-md bg-white md:w-1/3">
            <div class="flex justify-between py-4 text-neutral-600 border-b">
                <h1>Itens: </h1>
                <span>R${{ number_format($valorProdutos, 2, ',', '') }} </span>
            </div>

            <div class="flex items-center justify-between py-4 text-neutral-600 border-b">
                <h1>Pagamento: </h1>
                <span class="text-neutral-500">{{ $pagamento }}</span>
            </div>

            <div class="flex justify-between py-4 text-lg text-neutral-600">
                <span>Total: </span>
                <span class="text-xl font-bold text-orange-500">R${{ number_format($valorProdutos, 2, ',', '') }}
                </span>
            </div>

            <button wire:click="finalizar()"
                class="flex justify-center items-center gap-2 text-white text-xs font-bold uppercase bg-purple-500 py-2 mt-3 w-full rounded-lg transition-all hover:scale-95 hover:cursor-pointer">
                Finalizar Compra
            </button>
        </div>

    </div>
</div>
