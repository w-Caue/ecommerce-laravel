<div>
    <!-- Loading -->
    @include('includes.loading')
    <!-- ./Loading -->

    <nav class="flex items-center justify-between" aria-label="Breadcrumb">
        <h1 class="text-3xl text-neutral-600">
            Configurações de Conta
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
                    <a href="#" class="ms-1 text-md font-bold text-neutral-600">Contas</a>
                </div>
            </li>
        </ol>
    </nav>

    <div class="grid grid-cols-3 gap-4 mt-7">
        <div class="p-3">
            <div class="flex flex-col gap-4">

                @foreach ($users as $user)
                    <div wire:key="{{ $user->id }}"
                        class="flex justify-between items-center bg-white border p-2 border-neutral-300 rounded-full">
                        <div class="flex gap-3">
                            <img src="{{ $user->image }}" class="object-cover object-center rounded-full size-10"
                                alt="Avatar Tailwind CSS Component" />
                            <div class="text-sm font-bold">
                                <h1 class="text-neutral-700">{{ $user->name }}</h1>
                                <span class="text-xs text-neutral-500">{{ $user->type }}</span>
                            </div>
                        </div>

                        <button wire:click="setLogin({{ $user->id }})"
                            x-on:click="$dispatch('open-modal-small', { name : 'login' })">
                            <svg xmlns="http://www.w3.org/2000/svg" class="size-6" viewBox="0 0 24 24" fill="none"
                                stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
                                class="lucide lucide-settings-icon lucide-settings">
                                <path
                                    d="M12.22 2h-.44a2 2 0 0 0-2 2v.18a2 2 0 0 1-1 1.73l-.43.25a2 2 0 0 1-2 0l-.15-.08a2 2 0 0 0-2.73.73l-.22.38a2 2 0 0 0 .73 2.73l.15.1a2 2 0 0 1 1 1.72v.51a2 2 0 0 1-1 1.74l-.15.09a2 2 0 0 0-.73 2.73l.22.38a2 2 0 0 0 2.73.73l.15-.08a2 2 0 0 1 2 0l.43.25a2 2 0 0 1 1 1.73V20a2 2 0 0 0 2 2h.44a2 2 0 0 0 2-2v-.18a2 2 0 0 1 1-1.73l.43-.25a2 2 0 0 1 2 0l.15.08a2 2 0 0 0 2.73-.73l.22-.39a2 2 0 0 0-.73-2.73l-.15-.08a2 2 0 0 1-1-1.74v-.5a2 2 0 0 1 1-1.74l.15-.09a2 2 0 0 0 .73-2.73l-.22-.38a2 2 0 0 0-2.73-.73l-.15.08a2 2 0 0 1-2 0l-.43-.25a2 2 0 0 1-1-1.73V4a2 2 0 0 0-2-2z" />
                                <circle cx="12" cy="12" r="3" />
                            </svg>
                        </button>
                    </div>
                @endforeach

            </div>

            <div class="">
                <button x-on:click="$dispatch('open-modal', { name : 'new-user' })"
                    class="flex items-center gap-1 text-xs uppercase text-white bg-blue-500 px-3 py-2 mt-5 rounded-md hover:bg-blue-700 transition-all hover:scale-95 hover:cursor-pointer">
                    <svg xmlns="http://www.w3.org/2000/svg" class="size-5" viewBox="0 0 24 24" fill="none"
                        stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
                        class="lucide lucide-plus-icon lucide-plus">
                        <path d="M5 12h14" />
                        <path d="M12 5v14" />
                    </svg>

                    Add Usuário
                </button>
            </div>
        </div>

        <div class="col-span-2 bg-white rounded-xl p-5 border border-neutral-200">
            <div class="flex items-center gap-4 " x-data="imageViewer()">
                <div class="w-44 relative">
                    <form enctype="multipart/form-data">
                        <div class="shrink-0">
                            <div x-show="imageUrl">
                                <label class="">
                                    <img id='preview_img' accept="image/png, image/jpeg" x-on:change="fileChosen"
                                        class="w-full object-cover rounded-full" :src="imageUrl"
                                        alt="Current profile photo" />

                                    <input type='file' class="hidden" wire:model="img" x-on:change="fileChosen" />
                                </label>
                            </div>

                            <div x-show="!imageUrl">
                                <label class="">
                                    <img id='preview_img' accept="image/png, image/jpeg" x-on:change="fileChosen"
                                        class="w-full object-cover rounded-full transition-all hover:scale-95"
                                        src="{{ $img }}" alt="Current profile photo" />

                                    <input type='file' class="hidden" wire:model="img" x-on:change="fileChosen" />
                                </label>
                            </div>
                        </div>

                        <div class="absolute bottom-1 right-0" x-on:change="fileChosen">
                            <svg class="size-5 p-[2px] text-white bg-green-200 rounded-full transition-all hover:cursor-pointer"
                                viewBox="0 0 24 24" stroke-width="1.5" fill="none" xmlns="http://www.w3.org/2000/svg"
                                color="#fff">
                                <path
                                    d="M14.3632 5.65156L15.8431 4.17157C16.6242 3.39052 17.8905 3.39052 18.6716 4.17157L20.0858 5.58579C20.8668 6.36683 20.8668 7.63316 20.0858 8.41421L18.6058 9.8942M14.3632 5.65156L4.74749 15.2672C4.41542 15.5993 4.21079 16.0376 4.16947 16.5054L3.92738 19.2459C3.87261 19.8659 4.39148 20.3848 5.0115 20.33L7.75191 20.0879C8.21972 20.0466 8.65806 19.8419 8.99013 19.5099L18.6058 9.8942M14.3632 5.65156L18.6058 9.8942"
                                    stroke="#000000" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round">
                                </path>
                            </svg>
                        </div>
                    </form>
                </div>

                <div class="w-full">
                    <x-form.label value="Nome*" />
                    <x-form.input wire:model="name" />
                </div>

                <div class="w-full">
                    <x-form.label value="Email*" />
                    <x-form.input wire:model="email" />
                </div>
            </div>

            <h1 class="text-xl text-neutral-600 mt-5">Alterar a senha</h1>

            <div class="flex items-center gap-4 ">

                <div class="w-56">
                    <x-form.label value="Senha atual" />
                    <x-form.input type="password" wire:model="password" placeholder="********" />
                </div>

                <div class="w-56">
                    <x-form.label value="Nova senha" />
                    <x-form.input type="password" wire:model="newpassword" placeholder="********" />
                </div>
            </div>

            <div class="flex justify-end">
                <button wire:click="edit()"
                    class="flex items-center gap-1 text-xs uppercase text-white bg-blue-500 px-3 py-2 mt-5 rounded-md hover:bg-blue-700 transition-all hover:scale-95 hover:cursor-pointer">
                    Salvar
                </button>
            </div>
        </div>
    </div>

    <x-modal.modal-medium name="new-user" title="Cadastrar Usuário">
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

                                    <input type='file' class="hidden" wire:model="newimage"
                                        x-on:change="fileChosen" />
                                </label>
                            </div>

                            <div x-show="!imageUrl">
                                <label class="transition-all cursor-pointer">
                                    <img id='preview_img' accept="image/png, image/jpeg" x-on:change="fileChosen"
                                        class="h-30 w-30 object-cover rounded-full transition-all hover:scale-95"
                                        src="{{ asset('img/sem-imagem.jpeg') }}" alt="Current profile photo" />

                                    <input type='file' class="hidden" wire:model="newimage"
                                        x-on:change="fileChosen" />
                                </label>
                            </div>
                        </div>
                    </form>

                    <div class="w-full">
                        <div class="">
                            <x-form.label value="Nome*" />
                            <x-form.input wire:model="newName" />
                        </div>

                        <div class="">
                            <x-form.label value="Email*" />
                            <x-form.input wire:model="newEmail" />
                        </div>
                    </div>
                </div>

                <div class="flex items-center gap-3 mt-2">
                    <div class="w-56">
                        <x-form.label value="Senha" />
                        <x-form.input type="password" wire:model="newPass" placeholder="********" />
                    </div>

                    <div class="w-56">
                        <x-form.label value="Confirmar senha" />
                        <x-form.input type="password" wire:model="confirmPass" placeholder="********" />
                    </div>
                </div>

                <div class="flex justify-end mt-5">
                    <button wire:click="save()"
                        class="flex items-center gap-1 text-xs uppercase text-white bg-blue-500 px-3 py-2 rounded-md hover:bg-blue-700 transition-all hover:scale-95 hover:cursor-pointer">
                        Salvar
                    </button>
                </div>
            </form>


        @endslot
    </x-modal.modal-medium>

    <x-modal.modal-small name="login" title="Fazer login">
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
                <div class="flex flex-col justify-center items-center gap-2">
                    <div class="shrink-0">
                        @if ($loginUser)
                            <div>
                                <img id='preview_img' accept="image/png, image/jpeg" x-on:change="fileChosen"
                                    class="h-30 w-30 object-cover rounded-full transition-all hover:scale-95"
                                    src="{{ $loginUser->image }}" alt="Current profile photo" />
                            </div>
                        @endif
                    </div>

                    <div class=" space-y-3 mt-2">
                        <div class="w-72">
                            <x-form.label value="Email*" />
                            <x-form.input type="email" wire:model="loginEmail" placeholder="email@exemplo.com" />
                        </div>

                        <div class="w-72">
                            <x-form.label value="Senha*" />
                            <x-form.input type="password" wire:model="loginPass" placeholder="********" />
                        </div>
                    </div>
                </div>

                <div class="flex justify-center gap-3 mt-5">
                    <button type="button" x-on:click="$dispatch('close-modal-small', { name : 'login' })"
                        class="flex items-center gap-1 text-xs uppercase text-neutral-600 bg-white border border-neutral-300 px-3 py-2 rounded-md transition-all hover:scale-95 hover:cursor-pointer">
                        Cancelar
                    </button>

                    <button wire:click="login()"
                        class="flex items-center gap-1 text-xs uppercase text-white bg-blue-500 px-3 py-2 rounded-md hover:bg-blue-700 transition-all hover:scale-95 hover:cursor-pointer">
                        Entrar
                    </button>
                </div>
            </form>


        @endslot
    </x-modal.modal-small>

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
