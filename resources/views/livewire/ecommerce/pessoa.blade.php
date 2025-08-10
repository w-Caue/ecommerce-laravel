<div>
    <div>
        <div class="flex justify-center gap-7 mx-7">

            <div class="p-3 flex flex-col items-center">
                <h4 class="mb-4 text-xl text-neutral-600 text-center">
                    Entre na sua conta
                </h4>
                <div class="flex flex-col w-96 gap-4">
                    <form method="POST" wire:submit="login()" class="rounded px-8">
                        @csrf
                        <div class="mb-4">
                            <x-form.label value="Email" />

                            <x-form.input wire:model="emailLogin" class="'email') is-invalid @enderror" name="email"
                                value="{{ old('email') }}" id="username" type="email"
                                placeholder="Insira seu email aqui"></x-form.input>

                            {{-- @error('email')
                            <span class="text-sm font-normal tracking-widest text-red-500" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror --}}
                        </div>

                        <div class="mb-4">
                            <x-form.label value="Senha" />

                            <x-form.input wire:model="passwordLogin" class="@error('password') is-invalid @enderror"
                                name="password" id="password" type="password" value="{{ old('password') }}"
                                placeholder="Insira sua senha aqui"></x-form.input>

                            {{-- @error('password')
                            <span class="text-sm font-normal tracking-widest text-red-500" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror --}}
                        </div>

                        <div class="flex justify-center gap-2">
                            <button
                                class="flex justify-center items-center gap-2 mb-2 text-white text-xs font-bold uppercase bg-blue-500 py-2 mt-3 w-full rounded-lg transition-all hover:scale-95 hover:cursor-pointer"
                                type="submit">
                                Entrar
                            </button>

                        </div>
                    </form>

                    <button
                        class="mb-4 text-base font-normal text-gray-600 tracking-widest text-center hover:text-blue-500 hover:underline">
                        Esqueci minha senha
                    </button>
                </div>

            </div>

            <div class="p-3 flex flex-col items-center">
                <h4 class="mb-4 text-xl text-neutral-600 text-center">
                    Crie sua conta
                </h4>
                <form wire:submit="register()" class="flex flex-col gap-4 rounded px-8">
                    <label class="w-full" for="">
                        <x-form.label value="Nome*" />

                        <x-form.input wire:model="name" id="name" type="text"
                            class="@error('name') is-invalid @enderror" name="name" value="{{ old('name') }}"
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
                            class="@error('email') is-invalid @enderror" name="email" value="{{ old('email') }}"
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
                            class="@error('phone') is-invalid @enderror" name="phone" value="{{ old('phone') }}"
                            placeholder="Insira seu número"  x-mask:dynamic="$input.startsWith('34') || $input.startsWith('37') ? '(99) 9 9999-9999' : '(99) 9 9999-9999'"></x-form.input>

                        @error('phone')
                            <span class="text-sm font-normal tracking-widest text-red-500" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </label>

                    <div class="flex gap-2">
                        <label class="w-full" for="">
                            <x-form.label value="Senha" />

                            <x-form.input wire:model="password" id="password" type="password"
                                class="@error('password') is-invalid @enderror" name="password"
                                value="{{ old('password') }}" placeholder="Insira sua senha"></x-form.input>

                            @error('password')
                                <span class="text-sm font-normal tracking-widest text-red-500" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </label>

                        <label class="w-full" for="">
                            <x-form.label value="Confirmar Senha" />

                            <x-form.input id="password_confirmation" type="password" name="password_confirmation"
                                value="{{ old('password') }}" autocomplete="new-password"
                                placeholder="confirme sua senha"></x-form.input>
                        </label>
                    </div>

                    <div class="flex justify-center gap-2">
                        <button
                            class="flex justify-center items-center gap-2 mb-2 text-white text-xs font-bold uppercase bg-blue-500 py-2 mt-3 w-full rounded-lg transition-all hover:scale-95 hover:cursor-pointer"
                            type="submit">
                            Cadastrar
                        </button>
                    </div>
                </form>
            </div>

        </div>
    </div>
</div>
