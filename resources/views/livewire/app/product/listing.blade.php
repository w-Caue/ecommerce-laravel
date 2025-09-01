<div>
    <!-- Loading -->
    @include('includes.loading')
    <!-- ./Loading -->

    <nav class="flex items-center justify-between" aria-label="Breadcrumb">
        <h1 class="text-3xl text-neutral-600">
            Produtos
        </h1>

        <ol class="inline-flex items-center space-x-1 md:space-x-2 rtl:space-x-reverse">
            <li class="sm:inline-flex items-center hidden">
                <a href="{{ route('admin.dashboard') }}"
                    class="inline-flex items-center text-sm font-bold text-neutral-500">
                    Dashboard
                </a>
            </li>
            <li>
                <div class="flex items-center">
                    <svg class="rtl:rotate-180 w-3 h-3 text-gray-400 mx-1 hidden sm:block" aria-hidden="true"
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
            <div class="relative text-gray-600 sm:w-72">
                <input
                    class="w-full py-2 px-5 rounded-full border border-neutral-300 text-sm font-bold focus:outline-none"
                    wire:model.live="search" type="search" name="search"
                    placeholder="Pesquise por {{ $sortField == 'id' ? 'código' : '' }}{{ $sortField == 'name' ? 'nome' : '' }}{{ $sortField == 'description' ? 'descrição' : '' }}">
                <button type="submit" class="absolute right-0 top-0 mt-2 mr-4">
                    <svg xmlns="http://www.w3.org/2000/svg" class="size-5 text-gray-700" viewBox="0 0 24 24"
                        fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                        stroke-linejoin="round" class="lucide lucide-search-icon lucide-search">
                        <path d="m21 21-4.34-4.34" />
                        <circle cx="11" cy="11" r="8" />
                    </svg>
                </button>
            </div>



            <button x-on:click="$dispatch('open-modal', { name : 'category' })"
                class="flex items-center gap-1 text-xs uppercase text-neutral-600 border border-neutral-300 px-3 py-2 rounded-md transition-all hover:scale-95 hover:cursor-pointer">
                <svg xmlns="http://www.w3.org/2000/svg" class="size-6" viewBox="0 0 24 24" fill="none"
                    stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
                    class="lucide lucide-ungroup-icon lucide-ungroup">
                    <rect width="8" height="6" x="5" y="4" rx="1" />
                    <rect width="8" height="6" x="11" y="14" rx="1" />
                </svg>
                <h1 class="hidden sm:block">Categorias</h1>
            </button>

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

                <h1 class="hidden sm:block">Novo Produto</h1>
            </button>
        </div>

        <div class="overflow-x-auto sm:-mx-6 lg:-mx-8 mt-4 hidden sm:block">
            <div class="inline-block min-w-full py-2 overflow-hidden sm:px-6 lg:px-8 ">
                <table class="min-w-full text-left text-sm text-surface">
                    <thead class="">
                        <tr x-cloak x-data="{ tooltip: 'nenhum' }" class="text-xs uppercase text-neutral-500">
                            <th scope="col" class="py-2 rounded-l-xl">
                                <div class="flex justify-center">
                                    <div class="flex justify-center gap-1 items-center hover:cursor-pointer"
                                        wire:click="sortBy('id')" x-on:mouseover="tooltip = 'id'"
                                        x-on:mouseleave="tooltip = 'nenhum'">
                                        @include('includes.icon-search', [
                                            'field' => 'id',
                                        ])
                                        <h1 class="">Código</h1>
                                        @include('includes.icon-filter', [
                                            'field' => 'id',
                                        ])
                                    </div>

                                    <div x-cloak x-show="tooltip === 'id'" x-transition x-transition.duration.300ms
                                        class="absolute z-10 p-2 mt-6 text-xs text-blue-500 font-bold bg-white border border-gray-300 rounded-xl">
                                        <p>Ordenar pelo o Código</p>
                                    </div>
                                </div>
                            </th>

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
                                    <div class="flex justify-center gap-1 items-center hover:cursor-pointer">
                                        <h1 class="">Preço</h1>
                                    </div>
                                </div>
                            </th>

                            <th scope="col" class="px-6 py-2 text-center">Estoque</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($products as $product)
                            <tr wire:key="{{ $product->id }}"
                                onclick="javascript:location.href='{{ route('admin.produtos.detalhe', ['product' => $product->id]) }}'"
                                class="font-bold transition-all hover:cursor-pointer hover:scale-95">
                                <td class="">
                                    <div
                                        class="px-6 py-4 my-1 text-center text-red-500 border-l border-y rounded-l-xl">
                                        #{{ $product->id }}
                                    </div>
                                </td>

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

        <div class="flex flex-col justify-center items-center gap-4 mt-4 sm:hidden">
            @foreach ($products as $product)
                <div wire:key="{{ $product->id }}"
                    onclick="javascript:location.href='{{ route('admin.produtos.detalhe', ['product' => $product->id]) }}'"
                    class="flex border border-neutral-200 w-full rounded-xl transition-all hover:cursor-pointer hover:scale-95">
                    <div class="">
                        <img src="{{ $product->image }}" class="object-cover object-center rounded-xl size-26"
                            alt="">
                    </div>

                    <div class="p-3">
                        <div class="">
                            <p class="text-xs font-black text-red-500">#{{ $product->id }}</p>
                            <h1 class="text-sm font-black text-neutral-600">{{ $product->name }}</h1>
                            <p class="text-xs font-extrabold text-neutral-500">{{ $product->description }}</p>
                        </div>

                        <div class="text-sm">
                            {{-- <h1 class="text-blue-500 font-bold">{{ $product->stock }}</h1> --}}

                            <h1 class="text-orange-500 font-bold">R${{ number_format($product->price, 2, ',', ' ') }}
                            </h1>
                        </div>
                    </div>

                </div>
            @endforeach
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
                            @foreach ($categories as $category)
                                <option value="{{ $category->id }}">{{ $category->name }}</option>
                            @endforeach
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

    <x-modal.modal-medium name="category" title="Categorias">
        @slot('body')

            <div class="" x-data="{ newCategory: false }">
                <div class="mt-2">
                    <button x-show="newCategory === false"
                        class="flex justify-center w-full bg-gray-100 rounded-md transition-all hover:scale-95 cursor-pointer"
                        x-on:click="newCategory = !newCategory">
                        <svg xmlns="http://www.w3.org/2000/svg" class="size-7" viewBox="0 0 24 24" fill="none"
                            stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
                            class="lucide lucide-plus-icon lucide-plus">
                            <path d="M5 12h14" />
                            <path d="M12 5v14" />
                        </svg>
                    </button>
                </div>

                <div class="border border-neutral-200 rounded-xl p-4" x-cloak x-show="newCategory">
                    <div class="flex justify-between">
                        <h1 class="font-bold text-lg text-neutral-600 text-center">Nova Categoria</h1>

                        <button class="transition-all hover:scale-95 cursor-pointer" x-on:click="newCategory = false">
                            <svg xmlns="http://www.w3.org/2000/svg" class="size-5" viewBox="0 0 24 24" fill="none"
                                stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
                                class="lucide lucide-x-icon lucide-x">
                                <path d="M18 6 6 18" />
                                <path d="m6 6 12 12" />
                            </svg>
                        </button>
                    </div>

                    <div class="flex justify-between items-end gap-3">
                        <div class="w-full">
                            {{-- <x-form.label value="Nome" /> --}}
                            <x-form.input wire:model="nameCategory" placeholder="Nome da Categoria" />
                        </div>

                        <button wire:click="saveCategory()"
                            class="flex items-center gap-1 text-xs uppercase text-white bg-blue-500 px-3 py-2 rounded-md hover:bg-blue-700 transition-all hover:scale-95 hover:cursor-pointer">
                            <svg xmlns="http://www.w3.org/2000/svg" class="size-4" viewBox="0 0 24 24" fill="none"
                                stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
                                class="lucide lucide-check-icon lucide-check">
                                <path d="M20 6 9 17l-5-5" />
                            </svg>

                            Salvar
                        </button>
                    </div>
                </div>
            </div>

            <div class="overflow-y-auto max-h-56 sm:-mx-6 lg:-mx-8 mt-2 hidden sm:block">
                <div class="inline-block min-w-full py-2 overflow-hidden sm:px-6 lg:px-8 ">
                    <table class="min-w-full text-left text-sm text-surface">
                        <thead class="">
                            <tr class="text-xs uppercase text-neutral-500">
                                <th scope="col" class="py-2 rounded-l-xl">
                                    <div class="flex justify-center">
                                        <div class="flex justify-center gap-1 items-center hover:cursor-pointer">
                                            <h1 class="">Código</h1>
                                        </div>
                                    </div>
                                </th>

                                <th scope="col" class="px-6 py-2">
                                    <div class="flex justify-center">
                                        <div class="flex justify-center gap-1 items-center hover:cursor-pointer">
                                            <h1 class="">Nome</h1>
                                        </div>
                                    </div>
                                </th>

                                <th scope="col" class="px-6 py-2 text-center">Data</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($categories as $category)
                                <tr wire:key="{{ $category->id }}"
                                    class="font-bold transition-all hover:cursor-pointer hover:scale-95">
                                    <td class="">
                                        <div
                                            class="px-6 py-4 my-1 text-center text-red-500 border-l border-y rounded-l-xl">
                                            #{{ $category->id }}
                                        </div>
                                    </td>

                                    <td class="">
                                        <div class="px-6 py-4 text-center border-y">
                                            {{ $category->name }}
                                        </div>
                                    </td>

                                    <td class="">
                                        <div class="px-6 py-4 text-center border-y border-r rounded-r-xl">
                                            {{ $category->name }}
                                        </div>
                                    </td>

                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>

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
