<div>
    <div class="flex flex-col items-start gap-5 mx-7 md:flex-row">

        <div class="grid grid-cols-2 justify-center w-full px-10 py-5 rounded-xl shadow-md bg-white md:w-2/3">
            <div class=" flex justify-center">
                <img src="{{ $product->image }}" class="rounded-xl w-[70%]" alt="">
            </div>

            <div class="space-y-3 uppercase font-black">
                <span class="text-sm  text-blue-500">Elolja</span>
                <div>
                    <h1 class="text-2xl text-neutral-600">{{ $product->name }}</h1>
                    <p class="text-xs text-neutral-500">{{ $product->description }}</p>
                </div>

            </div>
        </div>

        <div class="w-full h-auto px-8 py-10 rounded-xl shadow-md bg-white md:w-1/3">
            <h1 class="text-3xl uppercase font-black text-orange-500" >R$ {{ number_format($product->price, 2, ',', ' ') }}</h1> 

            <button
                x-on:click="Livewire.dispatchTo('ecommerce.carrinho-botao', 'adicionarItem', {codigo:'{{ $product->id ?? '' }}', nome:'{{ $product->name ?? '' }}', descricao:'{{ $product->description ?? '' }}', quantidade: '{{ 1 }}', preco:'{{ $product->price ?? '' }}', img: '{{ $product->image ?? '' }}'})"
                class="flex justify-center items-center gap-2 text-white text-xs font-bold uppercase bg-blue-500 py-2 mt-3 w-full rounded-lg transition-all hover:scale-95 cursor-pointer">
                <svg xmlns="http://www.w3.org/2000/svg" class="size-5" viewBox="0 0 24 24" fill="none"
                    stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
                    class="lucide lucide-shopping-cart-icon lucide-shopping-cart">
                    <circle cx="8" cy="21" r="1" />
                    <circle cx="19" cy="21" r="1" />
                    <path d="M2.05 2.05h2l2.66 12.42a2 2 0 0 0 2 1.58h9.78a2 2 0 0 0 1.95-1.57l1.65-7.43H5.12" />
                </svg>

                Adicionar ao carrinho
            </button>


            <a href="{{ route('home') }}"
                class="flex justify-center items-center gap-2 text-neutral-600 text-xs font-bold uppercase bg-white-500 border border-neutral-500 py-2 mt-3 w-full rounded-lg transition-all hover:scale-95">
                Voltar à loja
            </a>
        </div>

    </div>
</div>
