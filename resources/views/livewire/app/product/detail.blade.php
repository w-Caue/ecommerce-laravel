<div>
    <!-- Loading -->
    @include('includes.loading')
    <!-- ./Loading -->

    <nav class="flex justify-between items-center" aria-label="Breadcrumb">
        <h1 class="text-3xl text-neutral-600">
            Produto <span class="text-2xl text-red-500">#{{ $codPackage }}</span>
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
                    <a href="{{ route('admin.produtos.listagem') }}"
                        class="ms-1 text-sm font-bold text-neutral-500">Listagem</a>
                </div>
            </li>
            <li>
                <div class="flex items-center">
                    <svg class="rtl:rotate-180 w-3 h-3 text-gray-400 mx-1" aria-hidden="true"
                        xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 6 10">
                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="m1 9 4-4-4-4" />
                    </svg>
                    <a href="#" class="ms-1 text-md font-bold text-neutral-600">Detalhe</a>
                </div>
            </li>
        </ol>
    </nav>

    <div class="p-4 bg-white rounded-2xl mt-7">
        <div class="flex items-start gap-5" x-data="imageViewer()">

            <div class="flex flex-col w-full">
                <div class="w-full">
                    <div class="">
                        <x-form.label value="Status" />
                        <div class="flex items-center gap-2 m-2">
                            <div class="flex items-center gap-1">
                                <x-form.radio wire:model="form.status" name="status" value="S"></x-form.radio>
                                <span class="text-sm font-bold text-neutral-500">Ativo</span>
                            </div>
                            <div class="flex items-center gap-1">
                                <x-form.radio wire:model="form.status" name="status" value="N"></x-form.radio>
                                <span class="text-sm font-bold">Inativo</span>
                            </div>
                        </div>
                    </div>

                    <div class="">
                        <x-form.label value="Nome" />
                        <x-form.input wire:model="form.name" />
                    </div>

                    <div class="">
                        <x-form.label value="Descrição" />
                        <x-form.input wire:model="form.description" />
                    </div>
                </div>

                <div class="flex items-center gap-3">
                    <div class="">
                        <x-form.label value="Preço" />
                        <div class="w-22">
                            <x-form.input wire:model="form.price" x-mask:dynamic="$money($input, ' ')" />
                        </div>
                    </div>

                    <div class="">
                        <x-form.label value="Categoria" />
                        <x-form.select wire:model="form.category">
                            <option value="">Escolha</option>
                        </x-form.select>
                    </div>

                    <div class="">
                        <x-form.label value="Estoque" />
                        <div class="w-16">
                            <x-form.input type="number" wire:model="form.stock" x-mask:dynamic="$money($input, ' ')" />
                        </div>
                    </div>
                </div>
            </div>

            <form enctype="multipart/form-data">
                <div class="shrink-0">
                    <div x-show="imageUrl">
                        <label class="mx-3 bg-white rounded-2xl transition-all cursor-pointer">
                            <img id='preview_img' accept="image/png, image/jpeg" x-on:change="fileChosen"
                                class="h-56 w-56 object-cover rounded-2xl" :src="imageUrl"
                                alt="Current profile photo" />

                            <input type='file' class="hidden" wire:model="img" x-on:change="fileChosen" />
                        </label>
                    </div>

                    <div x-show="!imageUrl">
                        <label class="mx-3 bg-white rounded-2xl transition-all cursor-pointer">
                            <img id='preview_img' accept="image/png, image/jpeg" x-on:change="fileChosen"
                                class="h-56 w-56 object-cover rounded-lg transition-all hover:scale-95"
                                src="{{ $form->img }}" alt="Current profile photo" />

                            <input type='file' class="hidden" wire:model="img" x-on:change="fileChosen" />
                        </label>
                    </div>
                </div>
            </form>
        </div>

        <div class="">
            <button wire:click="edit()"
                class="flex items-center gap-1 text-xs uppercase text-white bg-blue-500 px-3 py-2 rounded-md hover:bg-blue-700 transition-all hover:scale-95 hover:cursor-pointer">
                Salvar
            </button>
        </div>
    </div>

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
