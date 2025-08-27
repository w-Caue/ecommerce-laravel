<div>

    <!-- Loading -->
    @include('includes.loading')
    <!-- ./Loading -->

    <div class="relative flex flex-col items-start gap-10 mx-7 md:flex-row">
        <div class="relative md:w-1/4">
            <div class="fixed w-1/4 p-2 ">
                <h1 class="text-md font-black text-neutral-700">Categorias</h1>

                <div class="mt-3">
                    <div class="flex items-center gap-1">
                        <x-form.radio wire:model="categoria" name="status" value="S"></x-form.radio>
                        <h1 class="text-sm font-bold text-neutral-600">Tstes</h1>
                    </div>
                </div>
            </div>
        </div>

        <div class="md:w-2/3">
            <div class="mb-5 flex justify-between">
                <div class="flex gap-5 items-center">
                    <div class="flex items-center gap-2">
                        <h1 class="text-md font-black text-neutral-700">Ordenar:</h1>
                        <x-form.select wire:model="form.category">
                            <option value="">Escolha</option>
                        </x-form.select>
                    </div>

                    <div class="flex items-center gap-2">
                        <h1 class="text-md font-black text-neutral-700">Exibir:</h1>
                        <x-form.select wire:model.live="porPagina">
                            <option value="20" class="font-black text-neutral-600 text-md">20 por pagina</option>
                            <option value="40" class="font-black text-neutral-600 text-md">40 por pagina</option>
                            <option value="60" class="font-black text-neutral-600 text-md">60 por pagina</option>
                            <option value="80" class="font-black text-neutral-600 text-md">80 por pagina</option>
                            <option value="100" class="font-black text-neutral-600 text-md">100 por pagina</option>
                        </x-form.select>
                    </div>
                </div>

                <div class="flex gap-1 items-center">
                    <h1 class="text-md font-black text-neutral-700">{{ $products->count() }}</h1>
                    <p class="text-md font-bold text-neutral-500">produtos</p>
                </div>
            </div>
            <div class="grid grid-cols-3 gap-7">
                @foreach ($products as $product)
                    <div onclick="javascript:location.href='{{ route('detalhe-produto', ['product' => $product->id]) }}'" class="bg-white border border-neutral-200 rounded-xl cursor-pointer">
                        <div class="">
                            <img src="{{ $product->image }}" class="object-cover object-center rounded-t-xl h-56 w-full"
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
                @endforeach
            </div>
        </div>
    </div>
</div>
