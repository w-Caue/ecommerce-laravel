<div class="px-2 sm:mx-auto xl:mx-3">
    <!-- Loading -->
    @include('includes.loading')
    <!-- ./Loading -->

    <div class="grid grid-cols-4 items-start mt-5">
        <div>
            <div class="flex justify-between">

                <div class="space-y-2 mx-4 p-4 rounded-xl transition-all duration-300 bg-white w-full">

                    <div class="flex items-center gap-2">
                        <a href="{{ route('admin.contas') }}"
                            class="flex justify-center items-center gap-2 rounded-xl hover:bg-gray-100 hover:cursor-pointer">

                            <img src="{{ auth()->guard('customer')->user()->image ?? '' }}"
                                class="object-cover object-center rounded-full size-14 border border-gray-100"
                                alt="ft-perfil">

                            <h1 class="font-black text-neutral-600">
                                {{ auth()->guard('customer')->user()->name ?? '' }}
                            </h1>
                        </a>
                    </div>

                    <div class="relative space-y-4 text-xs uppercase font-bold mt-3">

                        {{-- <div class="border border-gray-200"></div> --}}

                        {{-- HOME --}}
                        <a href="{{ route('ecommerce.perfil') }}"
                            class="relative flex justify-between items-center space-x-2 p-2 cursor-pointer bg-gray-100 text-blue-500 rounded-r-xl border-l-2 border-blue-500">
                            <div class="flex items-center space-x-2">
                                <svg xmlns="http://www.w3.org/2000/svg" class="size-6" viewBox="0 0 24 24"
                                    fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                                    stroke-linejoin="round" class="lucide lucide-user-round-icon lucide-user-round">
                                    <circle cx="12" cy="8" r="5" />
                                    <path d="M20 21a8 8 0 0 0-16 0" />
                                </svg>

                                <h1>
                                    Minha conta
                                </h1>
                            </div>
                        </a>

                        <a href="{{ route('ecommerce.pedidos') }}"
                            class="relative flex justify-between items-center space-x-2 p-2 cursor-pointer hover:bg-gray-100 text-neutral-500 rounded-xl hover:text-blue-500">
                            <div class="flex items-center space-x-2">
                                <svg xmlns="http://www.w3.org/2000/svg" class="size-6" viewBox="0 0 24 24"
                                    fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                                    stroke-linejoin="round"
                                    class="lucide lucide-shopping-cart-icon lucide-shopping-cart">
                                    <circle cx="8" cy="21" r="1" />
                                    <circle cx="19" cy="21" r="1" />
                                    <path
                                        d="M2.05 2.05h2l2.66 12.42a2 2 0 0 0 2 1.58h9.78a2 2 0 0 0 1.95-1.57l1.65-7.43H5.12" />
                                </svg>

                                <h1>
                                    Meus Pedidos
                                </h1>
                            </div>
                        </a>

                        <a href="{{ route('ecommerce.logout') }}"
                            class="relative flex justify-between items-center space-x-2 p-2 cursor-pointer hover:bg-gray-100 text-neutral-500 rounded-xl hover:text-blue-500">
                            <div class="flex items-center space-x-2">
                                <svg xmlns="http://www.w3.org/2000/svg" class="size-6" viewBox="0 0 24 24"
                                    fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                                    stroke-linejoin="round" class="lucide lucide-log-out-icon lucide-log-out">
                                    <path d="m16 17 5-5-5-5" />
                                    <path d="M21 12H9" />
                                    <path d="M9 21H5a2 2 0 0 1-2-2V5a2 2 0 0 1 2-2h4" />
                                </svg>

                                <h1>
                                    Sair da Conta
                                </h1>
                            </div>
                        </a>

                    </div>
                </div>
            </div>
        </div>
        <div class="col-span-3">
            <h1 class="text-3xl text-neutral-600 my-6">
                Seus dados
            </h1>

            <div class=" bg-white rounded-xl p-5 border border-neutral-200">
                <div class="flex justify-center items-center gap-4 ">
                    <div class="w-56">
                        <div class="shrink-0">
                            <label class="">
                                <img id='preview_img' accept="image/png, image/jpeg" x-on:change="fileChosen"
                                    class="w-full object-cover rounded-full transition-all hover:scale-95"
                                    src="{{ auth()->guard('customer')->user()->image }}" alt="Current profile photo" />

                                <input type='file' class="hidden" wire:model="img" x-on:change="fileChosen" />
                            </label>
                        </div>
                    </div>

                    <label class="w-full" for="">
                        <x-form.label value="Nome*" />

                        <x-form.input wire:model="name" id="name" type="text"
                            class="@error('name') is-invalid @enderror" name="name" value="{{ $customer->name }}"
                            placeholder="Insira seu nome"></x-form.input>

                        @error('name')
                            <span class="text-sm font-normal tracking-widest text-red-500" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </label>

                    <label class="w-full" for="">
                        <x-form.label value="Email*" />

                        <x-form.input wire:model="email" id="email" type="email"
                            class="@error('email') is-invalid @enderror" name="email" value="{{ $customer->email }}"
                            placeholder="Insira seu email"></x-form.input>

                        @error('email')
                            <span class="text-sm font-normal tracking-widest text-red-500" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </label>

                    <label class="w-full" for="">
                        <x-form.label value="Telefone*" />

                        <x-form.input wire:model="phone" id="phone" type="tel"
                            class="@error('phone') is-invalid @enderror" name="phone"
                            value="{{ $customer->phone }}" placeholder="Insira seu número"
                            x-mask:dynamic="$input.startsWith('34') || $input.startsWith('37') ? '(99) 9 9999-9999' : '(99) 9 9999-9999'"></x-form.input>

                        @error('phone')
                            <span class="text-sm font-normal tracking-widest text-red-500" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </label>
                </div>

                <div class="flex justify-end">
                    <button wire:click="edit()"
                        class="flex items-center gap-1 text-xs uppercase text-white bg-blue-500 px-3 py-2 mt-5 rounded-md hover:bg-blue-700 transition-all hover:scale-95 hover:cursor-pointer">
                        Salvar
                    </button>
                </div>
            </div>

            <div class="flex justify-center items-center gap-2">
                <div class=" bg-white rounded-xl p-5 border border-neutral-200">

                </div>

                <div class=" bg-white rounded-xl p-5 border border-neutral-200">
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

        </div>

    </div>
</div>
