<div>
    <!-- Loading -->
    @include('includes.loading')
    <!-- ./Loading -->

    <nav class="flex items-center justify-between" aria-label="Breadcrumb">
        <h1 class="text-3xl text-neutral-600">
            Produtos
        </h1>

        <ol class="inline-flex items-center space-x-1 md:space-x-2 rtl:space-x-reverse">
            <li class="inline-flex items-center">
                <a href="{{ route('admin.dashboard') }}"
                    class="inline-flex items-center text-sm font-bold text-neutral-500">
                    Dashboard
                </a>
            </li>
            <li>
                <div class="flex items-center">
                    <svg class="rtl:rotate-180 w-3 h-3 text-gray-400 mx-1" aria-hidden="true"
                        xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 6 10">
                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="m1 9 4-4-4-4" />
                    </svg>
                    <a href="#" class="ms-1 text-md font-bold text-blue-500">Listagem</a>
                </div>
            </li>
        </ol>
    </nav>

    <div class="p-4 bg-white rounded-2xl mt-7 border border-neutral-200">

        <div class="flex justify-between items-center">
            <div class="relative text-gray-600">
                <input class="w-full bg-gray-100 py-2 px-5 pr-16 rounded-full text-sm font-bold focus:outline-none"
                    type="search" name="search" placeholder="Pesquisar Aqui">
                <button type="submit" class="absolute right-0 top-0 mt-2 mr-4">
                    <svg xmlns="http://www.w3.org/2000/svg" class="size-5 text-gray-700" viewBox="0 0 24 24"
                        fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                        stroke-linejoin="round" class="lucide lucide-search-icon lucide-search">
                        <path d="m21 21-4.34-4.34" />
                        <circle cx="11" cy="11" r="8" />
                    </svg>
                </button>
            </div>

            <button x-on:click="$dispatch('open-modal', { name : 'new-package' })"
                class="flex items-center gap-1 text-xs uppercase text-white bg-purple-500 px-3 py-2 rounded-md hover:bg-purple-700 transition-all hover:scale-95 hover:cursor-pointer">
                <svg xmlns="http://www.w3.org/2000/svg" class="size-6" viewBox="0 0 24 24" fill="none"
                    stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
                    class="lucide lucide-package-plus-icon lucide-package-plus">
                    <path d="M16 16h6" />
                    <path d="M19 13v6" />
                    <path
                        d="M21 10V8a2 2 0 0 0-1-1.73l-7-4a2 2 0 0 0-2 0l-7 4A2 2 0 0 0 3 8v8a2 2 0 0 0 1 1.73l7 4a2 2 0 0 0 2 0l2-1.14" />
                    <path d="m7.5 4.27 9 5.15" />
                    <polyline points="3.29 7 12 12 20.71 7" />
                    <line x1="12" x2="12" y1="22" y2="12" />
                </svg>

                Cadastrar
            </button>
        </div>

        <div class="overflow-x-auto sm:-mx-6 lg:-mx-8 mt-4">
            <div class="inline-block min-w-full py-2 overflow-hidden sm:px-6 lg:px-8 ">
                <table class="min-w-full text-left text-sm text-surface">
                    <thead class="">
                        <tr x-cloak x-data="{ tooltip: 'nenhum' }" class="text-xs uppercase text-neutral-500">
                            <th scope="col" class="py-2 rounded-l-xl">
                                <div class="flex justify-center">
                                    <div class="flex justify-center gap-1 items-center hover:cursor-pointer"
                                        wire:click="sortBy('orders.id')" x-on:mouseover="tooltip = 'id'"
                                        x-on:mouseleave="tooltip = 'nenhum'">
                                        @include('includes.icon-search', [
                                            'field' => 'orders.id',
                                        ])
                                        <h1 class="">Código</h1>
                                        @include('includes.icon-filter', [
                                            'field' => 'orders.id',
                                        ])
                                    </div>

                                    <div x-cloak x-show="tooltip === 'id'" x-transition x-transition.duration.300ms
                                        class="absolute z-10 p-2 mt-6 text-xs text-blue-500 font-bold bg-white border border-gray-300 rounded-xl">
                                        <p>Ordenar pelo o Código</p>
                                    </div>
                                </div>
                            </th>

                            {{-- <th scope="col" class="px-6 py-2">
                                <div class="flex justify-center">
                                    <div class="flex justify-center gap-1 items-center hover:cursor-pointer"
                                        wire:click="sortBy('created_date')" x-on:mouseover="tooltip = 'date'"
                                        x-on:mouseleave="tooltip = 'nenhum'">
                                        @include('includes.icon-search', [
                                            'field' => 'created_date',
                                        ])
                                        <h1 class="">Dt. Criação</h1>
                                        @include('includes.icon-filter', [
                                            'field' => 'created_date',
                                        ])
                                    </div>

                                    <div x-cloak x-show="tooltip === 'date'" x-transition x-transition.duration.300ms
                                        class="absolute z-10 p-2 mt-6 text-xs text-blue-500 font-bold bg-white border border-gray-300 rounded-xl">
                                        <p>Ordenar pelo a Data</p>
                                    </div>
                                </div>
                            </th> --}}

                            <th scope="col" class="px-6 py-2">
                                <div class="flex justify-center">
                                    <div class="flex justify-center gap-1 items-center hover:cursor-pointer"
                                        wire:click="sortBy('name')" x-on:mouseover="tooltip = 'name'"
                                        x-on:mouseleave="tooltip = 'nenhum'">
                                        @include('includes.icon-search', [
                                            'field' => 'name',
                                        ])
                                        <h1 class="">Nome</h1>
                                        @include('includes.icon-filter', [
                                            'field' => 'name',
                                        ])
                                    </div>

                                    <div x-cloak x-show="tooltip === 'name'" x-transition x-transition.duration.300ms
                                        class="absolute z-10 p-2 mt-6 text-xs text-blue-500 font-bold bg-white border border-gray-300 rounded-xl">
                                        <p>Ordenar pelo o Nome</p>
                                    </div>
                                </div>
                            </th>

                            <th scope="col" class="px-6 py-2">
                                <div class="flex justify-center">
                                    <div class="flex justify-center gap-1 items-center hover:cursor-pointer"
                                        wire:click="sortBy('description')" x-on:mouseover="tooltip = 'description'"
                                        x-on:mouseleave="tooltip = 'nenhum'">
                                        @include('includes.icon-search', [
                                            'field' => 'description',
                                        ])
                                        <h1 class="">Descrição</h1>
                                        @include('includes.icon-filter', [
                                            'field' => 'description',
                                        ])
                                    </div>

                                    <div x-cloak x-show="tooltip === 'description'" x-transition
                                        x-transition.duration.300ms
                                        class="absolute z-10 p-2 mt-6 text-xs text-blue-500 font-bold bg-white border border-gray-300 rounded-xl">
                                        <p>Ordenar pelo a Descrição</p>
                                    </div>
                                </div>
                            </th>

                            <th scope="col" class="px-6 py-2">
                                <div class="flex justify-center">
                                    <div class="flex justify-center gap-1 items-center hover:cursor-pointer"
                                        wire:click="sortBy('price')" x-on:mouseover="tooltip = 'price'"
                                        x-on:mouseleave="tooltip = 'nenhum'">
                                        @include('includes.icon-search', [
                                            'field' => 'price',
                                        ])
                                        <h1 class="">Preço</h1>
                                        @include('includes.icon-filter', [
                                            'field' => 'price',
                                        ])
                                    </div>

                                    <div x-cloak x-show="tooltip === 'price'" x-transition x-transition.duration.300ms
                                        class="absolute z-10 p-2 mt-6 text-xs text-blue-500 font-bold bg-white border border-gray-300 rounded-xl">
                                        <p>Ordenar pelo o Preço</p>
                                    </div>
                                </div>
                            </th>

                            <th scope="col" class="px-6 py-2 text-center">Estoque</th>
                            {{-- <th scope="col" class="px-6 py-2 rounded-r-xl"></th> --}}
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($products as $product)
                            <tr wire:key="{{ $product->id }}"
                                onclick="javascript:location.href='{{ route('admin.produtos.detalhe', ['codigo' => $product->id]) }}'"
                                class="font-bold transition-all hover:cursor-pointer hover:scale-95">
                                <td class="">
                                    <div
                                        class="px-6 py-4 my-1 text-center text-red-500 border-l border-y rounded-l-xl">
                                        #{{ $product->id }}
                                    </div>
                                </td>

                                {{-- <td class="">
                                    <div class="px-6 py-3 text-center border-y text-sm">
                                        {{ \Carbon\Carbon::parse($order->created_date)->translatedFormat('d M, Y') }}
                                    </div>
                                </td> --}}

                                <td class="">
                                    <div class="flex items-center gap-2 px-6 py-2 border-y">
                                        <div class="">
                                            @if ($product->image != null)
                                                <img src="{{ $product->image }}"
                                                    class="object-cover object-center rounded-lg h-9 w-9"
                                                    alt="Avatar Tailwind CSS Component" />
                                            @else
                                                <img src="{{ asset('img/Produto-Sem-Imagem.jpg') }}"
                                                    class="object-cover object-center rounded-lg h-9 w-9"
                                                    alt="Avatar Tailwind CSS Component" />
                                            @endif
                                        </div>
                                        <h1 class="font-bold">{{ $product->name }}</h1>
                                    </div>
                                </td>

                                <td class="">
                                    <div class="px-6 py-4 text-center border-y">
                                        {{ $product->description }}
                                    </div>
                                </td>

                                <td class="">
                                    <div class="px-6 py-4 text-center text-orange-500 border-y">
                                        R${{ number_format($product->price, 2, ',', ' ') }}
                                    </div>
                                </td>

                                <td class="">
                                    <div class="px-6 py-4 text-center text-blue-500 border-y border-r rounded-r-xl">
                                        {{ $product->stock }}
                                    </div>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>

        <div class="flex justify-between gap-2 items-center mx-4 my-2 py-1">
            @include('includes.porPagina')

            {{ $products->onEachSide(1)->links('components.pagination', ['is_livewire' => true]) }}
        </div>
    </div>

    <x-modal.modal-medium name="new-package" title="Cadastrar Produto">
        @slot('body')

            @slot('icone')
                <svg xmlns="http://www.w3.org/2000/svg" class="size-7" viewBox="0 0 24 24" fill="none"
                    stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
                    class="lucide lucide-package-plus-icon lucide-package-plus">
                    <path d="M16 16h6" />
                    <path d="M19 13v6" />
                    <path
                        d="M21 10V8a2 2 0 0 0-1-1.73l-7-4a2 2 0 0 0-2 0l-7 4A2 2 0 0 0 3 8v8a2 2 0 0 0 1 1.73l7 4a2 2 0 0 0 2 0l2-1.14" />
                    <path d="m7.5 4.27 9 5.15" />
                    <polyline points="3.29 7 12 12 20.71 7" />
                    <line x1="12" x2="12" y1="22" y2="12" />
                </svg>
            @endslot

            <form action="">
                <div class="flex items-center gap-2" x-data="imageViewer()">
                    <form enctype="multipart/form-data">
                        <div class="shrink-0">
                            <div x-show="imageUrl">
                                <label class="transition-all cursor-pointer">
                                    <img id='preview_img' accept="image/png, image/jpeg" x-on:change="fileChosen"
                                        class="h-30 w-30 object-cover rounded-full" :src="imageUrl"
                                        alt="Current profile photo" />

                                    <input type='file' class="hidden" wire:model="img" x-on:change="fileChosen" />
                                </label>
                            </div>

                            <div x-show="!imageUrl">
                                <label class="transition-all cursor-pointer">
                                    <img id='preview_img' accept="image/png, image/jpeg" x-on:change="fileChosen"
                                        class="h-30 w-30 object-cover rounded-full transition-all hover:scale-95"
                                        src="{{ asset('img/Produto-Sem-Imagem.jpg') }}" alt="Current profile photo" />

                                    <input type='file' class="hidden" wire:model="img" x-on:change="fileChosen" />
                                </label>
                            </div>
                        </div>
                    </form>

                    <div class="w-full">
                        <div class="">
                            <x-form.label value="Nome" />
                            <x-form.input wire:model="name" />
                        </div>

                        <div class="">
                            <x-form.label value="Descrição" />
                            <x-form.input wire:model="description" />
                        </div>
                    </div>
                </div>

                <div class="flex items-center gap-3">
                    <div class="">
                        <x-form.label value="Preço" />
                        <div class="w-22">
                            <x-form.input wire:model="price" x-mask:dynamic="$money($input, ',', ' ')" />
                        </div>
                    </div>

                    <div class="">
                        <x-form.label value="Categoria" />
                        <x-form.select wire:model="category">
                            <option value="">Escolha</option>
                        </x-form.select>
                    </div>

                    <div class="">
                        <x-form.label value="Estoque" />
                        <div class="w-16">
                            <x-form.input wire:model="stock" x-mask:dynamic="$money($input, ',', ' ')" />
                        </div>
                    </div>
                </div>

                <div class="flex justify-end mt-4">
                    <button wire:click="save()"
                        class="flex items-center gap-1 text-xs uppercase text-white bg-blue-500 px-3 py-2 rounded-md hover:bg-blue-700 transition-all hover:scale-95 hover:cursor-pointer">
                        <svg xmlns="http://www.w3.org/2000/svg" class="size-4" viewBox="0 0 24 24" fill="none"
                            stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
                            class="lucide lucide-check-icon lucide-check">
                            <path d="M20 6 9 17l-5-5" />
                        </svg>

                        Salvar
                    </button>
                </div>
            </form>


        @endslot
    </x-modal.modal-medium>

    <script>
        function imageViewer() {
            return {
                imageUrl: @entangle('photo'),

                fileChosen(event) {
                    this.fileToDataUrl(event, src => this.imageUrl = src)
                },

                fileToDataUrl(event, callback) {
                    if (!event.target.files.length) return

                    let file = event.target.files[0],
                        reader = new FileReader()

                    reader.readAsDataURL(file)
                    reader.onload = e => callback(e.target.result)
                },

            }
        }
    </script>
</div>
