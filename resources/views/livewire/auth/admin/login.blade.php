<div class="flex flex-col gap-6">
    <x-auth-header :title="__('Área Admin')" :description="__('Entre com seu email e senha')" />

    <!-- Session Status -->
    <x-auth-session-status class="text-center" :status="session('status')" />

    <form wire:submit="login" class="flex flex-col gap-6">
        <!-- Email Address -->
        <flux:input wire:model="email" :label="__('Email ')" type="email" required autofocus autocomplete="email"
            placeholder="email@exemplo.com" />

        <!-- Password -->
        <div class="relative">
            <flux:input wire:model="password" :label="__('Senha')" type="password" required
                autocomplete="current-password" :placeholder="__('Senha')" viewable />

            @if (Route::has('password.request'))
                <flux:link class="absolute end-0 top-0 text-sm" :href="route('password.request')" wire:navigate>
                    {{ __('Forgot your password?') }}
                </flux:link>
            @endif
        </div>

        <!-- Remember Me -->
        <flux:checkbox wire:model="remember" :label="__('Lembre me')" />

        <div class="flex items-center justify-end">

            <button
                class="flex justify-center gap-1 text-xs text-center uppercase text-white bg-blue-500 w-full py-3 rounded-md hover:bg-blue-700 transition-all hover:scale-95 hover:cursor-pointer">
                Entrar
            </button>
        </div>
    </form>

    @if (Route::has('admin.register'))
        <div class="space-x-1 rtl:space-x-reverse text-center text-sm text-zinc-600 dark:text-zinc-400">
            <span>{{ __('Don\'t have an account?') }}</span>
            <flux:link :href="route('register')" wire:navigate>{{ __('Sign up') }}</flux:link>
        </div>
    @endif
</div>
