<div>
    <div class="flex justify-center items-center text-blue-500 gap-2 p-4">
        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" class="size-6">
            <path fill-rule="evenodd"
                d="M5.25 2.25a3 3 0 0 0-3 3v4.318a3 3 0 0 0 .879 2.121l9.58 9.581c.92.92 2.39 1.186 3.548.428a18.849 18.849 0 0 0 5.441-5.44c.758-1.16.492-2.629-.428-3.548l-9.58-9.581a3 3 0 0 0-2.122-.879H5.25ZM6.375 7.5a1.125 1.125 0 1 0 0-2.25 1.125 1.125 0 0 0 0 2.25Z"
                clip-rule="evenodd" />
        </svg>

        <h1 class="text-2xl font-black uppercase">Promoção</h1>

    </div>

    <div x-data x-init="new Splide($refs.carousel, {
        type: 'loop',
        {{-- loop: true, --}}
        perPage: 4,
        gap: '1rem',
        autoplay: {
            delay: 5000,
        },
        pagination: {
            el: '.swiper-pagination',
            clickable: true,
        },
        breakpoints: {
            768: { perPage: 1 },
            1024: { perPage: 2 },
        }
    }).mount()" x-ref="carousel" class="splide w-full mt-4">
        <div class="splide__track">
            <ul class="splide__list">
                @foreach ($products as $product)
                    <li wire:key="{{ $product->id }}" class="splide__slide">
                        <div class="border border-neutral-200 w-56 rounded-xl cursor-pointer">
                            <div class="">
                                <img src="{{ $product->image }}"
                                    class="object-cover object-center rounded-t-xl h-40 w-full" alt="">
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
                                    class="flex justify-center items-center gap-2 text-white text-xs font-bold uppercase bg-blue-500 py-2 mt-3 w-full rounded-lg transition-all hover:scale-95 cursor-pointer">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="size-5" viewBox="0 0 24 24"
                                        fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                                        stroke-linejoin="round"
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
                    </li>
                @endforeach
            </ul>
        </div>
    </div>

    <div class="flex justify-center items-center gap-2 text-orange-500 p-4 mt-14">
        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" class="size-6">
            <path fill-rule="evenodd"
                d="M10.788 3.21c.448-1.077 1.976-1.077 2.424 0l2.082 5.006 5.404.434c1.164.093 1.636 1.545.749 2.305l-4.117 3.527 1.257 5.273c.271 1.136-.964 2.033-1.96 1.425L12 18.354 7.373 21.18c-.996.608-2.231-.29-1.96-1.425l1.257-5.273-4.117-3.527c-.887-.76-.415-2.212.749-2.305l5.404-.434 2.082-5.005Z"
                clip-rule="evenodd" />
        </svg>

        <h1 class="text-2xl font-black uppercase ">Destaques</h1>
    </div>

    <div x-data x-init="new Splide($refs.carousel, {
        type: 'loop',
        {{-- loop: true, --}}
        perPage: 4,
        gap: '1rem',
        autoplay: {
            delay: 5000,
        },
        breakpoints: {
            768: { perPage: 1 },
            1024: { perPage: 2 },
        }
    }).mount()" x-ref="carousel" class="splide w-full mt-4">
        <div class="splide__track">
            <ul class="splide__list">
                @foreach ($destaques as $destaque)
                    <li wire:key="{{ $destaque->id }}" class="splide__slide">
                        <div class="border border-neutral-200 w-56 rounded-xl">
                            <div class="">
                                <img src="{{ $destaque->image }}"
                                    class="object-cover object-center rounded-t-xl h-40 w-full" alt="">
                            </div>

                            <div class="p-3 w">
                                <div class="">
                                    <h1 class="text-sm font-bold text-neutral-700">{{ $destaque->name }}</h1>
                                    <p class="text-xs font-bold text-neutral-500">{{ $destaque->description }}</p>

                                    <span
                                        class="text-orange-500 font-bold">R${{ number_format($destaque->price, 2, ',', ' ') }}</span>
                                </div>

                                <button
                                    x-on:click="Livewire.dispatchTo('ecommerce.carrinho-botao', 'adicionarItem', {codigo:'{{ $destaque->id ?? '' }}', nome:'{{ $destaque->name ?? '' }}', descricao:'{{ $destaque->description ?? '' }}', quantidade: '{{ 1 }}', preco:'{{ $destaque->price ?? '' }}', img: '{{ $destaque->image ?? '' }}'})"
                                    class="flex justify-center items-center gap-2 text-white text-xs font-bold uppercase bg-blue-500 py-2 mt-3 w-full rounded-lg transition-all hover:scale-95 cursor-pointer">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="size-5" viewBox="0 0 24 24"
                                        fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                                        stroke-linejoin="round"
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
                    </li>
                @endforeach
            </ul>
        </div>
    </div>
</div>
