<div>
    <div class="grid grid-cols-4 gap-3 p-2">
        @foreach ($products as $product)
            <div class="border border-neutral-200 w-56 rounded-xl">
                <div class="">
                    <img src="{{ $product->image }}" class="object-cover object-center rounded-t-xl h-44 w-full"
                        alt="">
                </div>

                <div class="p-3 w">
                    <div class="">
                        <h1 class="text-sm font-bold text-neutral-700">{{ $product->name }}</h1>
                        <p class="text-xs font-bold text-neutral-500">{{ $product->description }}</p>

                        <span
                            class="text-orange-500 font-bold">R${{ number_format($product->price, 2, ',', ' ') }}</span>
                    </div>

                    <button
                        x-on:click="Livewire.dispatchTo('ecommerce.carrinho-botao', 'adicionarItem', {codigo:'{{ $product->id ?? '' }}', nome:'{{ $product->name ?? '' }}', descricao:'{{ $product->description ?? '' }}', quantidade: '{{ 1 }}', preco:'{{ $product->price ?? '' }}', img: '{{ $product->image ?? '' }}'})"
                        class="flex justify-center items-center gap-2 text-white text-xs font-bold uppercase bg-blue-500 py-2 mt-3 w-full rounded-lg transition-all hover:scale-95">
                        <svg xmlns="http://www.w3.org/2000/svg" class="size-5" viewBox="0 0 24 24" fill="none"
                            stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
                            class="lucide lucide-shopping-cart-icon lucide-shopping-cart">
                            <circle cx="8" cy="21" r="1" />
                            <circle cx="19" cy="21" r="1" />
                            <path
                                d="M2.05 2.05h2l2.66 12.42a2 2 0 0 0 2 1.58h9.78a2 2 0 0 0 1.95-1.57l1.65-7.43H5.12" />
                        </svg>

                        Comprar
                    </button>
                </div>
            </div>
        @endforeach
    </div>

</div>
