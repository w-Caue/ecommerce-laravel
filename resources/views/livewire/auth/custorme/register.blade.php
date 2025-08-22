<div class="flex flex-col gap-6">
    <x-auth-header :title="__('Crie sua conta')" :description="__('Insira seus dados abaixo para criar sua conta')" />

    <!-- Session Status -->
    <x-auth-session-status class="text-center" :status="session('status')" />

    <form wire:submit="save" class="flex flex-col gap-4">
        <!-- Name -->
        <div>
            <x-form.label value="Nome" />
            <flux:input wire:model="name" type="text" required autofocus autocomplete="name"
                :placeholder="__('Insira seu nome aqui')" />
        </div>

        <!-- Email Address -->
        <div>
            <x-form.label value="Email" />
            <flux:input wire:model="email" type="email" required autocomplete="email"
                placeholder="email@exemplo.com" />
        </div>

        <!-- Phone -->
        <div>
            <x-form.label value="Telefone" />
            <flux:input wire:model="phone" type="tel" required autocomplete="tel" placeholder="(00) 1 2345 6789"
                x-mask:dynamic="$input.startsWith('34') || $input.startsWith('37') ? '(99) 9 9999-9999' : '(99) 9 9999-9999'" />
        </div>

          <!-- Password -->
        <div>
            <x-form.label value="Senha" />
            <flux:input wire:model="password" type="password" required autocomplete="new-password"
            :placeholder="__('Senha')" viewable />
        </div>
      
        <!-- Confirm Password -->
        <div>
            <x-form.label value="Confirmar senha" />
            <flux:input wire:model="password_confirmation" type="password" required
            autocomplete="new-password" :placeholder="__('Confirmar senha')" viewable />
        </div>

        <div class="flex items-center justify-end">
            <button
                class="flex justify-center gap-1 text-xs text-center uppercase text-white bg-blue-500 w-full py-3 rounded-md hover:bg-blue-700 transition-all hover:scale-95 hover:cursor-pointer">
                Entrar
            </button>
        </div>
    </form>

    <div class="space-x-1 rtl:space-x-reverse text-center text-sm text-zinc-600 dark:text-zinc-400">
        <span>{{ __('Já tem uma conta?') }}</span>
        <flux:link :href="route('login')" wire:navigate>{{ __('Entrar') }}</flux:link>
    </div>
</div>
