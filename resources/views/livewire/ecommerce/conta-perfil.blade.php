<div class="px-2 sm:mx-auto xl:mx-3">
    <!-- Loading -->
    @include('includes.loading')
    <!-- ./Loading -->

    <h1 class="text-3xl text-neutral-600 my-6">
        Seus dados
    </h1>

    <div class="grid grid-cols-4 items-start">
        <div>

        </div>
        <div class=" bg-white rounded-xl p-5 border border-neutral-200">
            <div class="flex flex-col justify-center items-center gap-4 ">
                <div class="w-44">
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
                        class="@error('phone') is-invalid @enderror" name="phone" value="{{ $customer->phone }}"
                        placeholder="Insira seu número"
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
