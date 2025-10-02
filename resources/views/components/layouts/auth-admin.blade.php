<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Foco</title>

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Nunito:ital,wght@0,200..1000;1,200..1000&display=swap"
        rel="stylesheet">

    <link rel="icon" href="{{ asset('img/logo.jpeg') }}">

    <style>
        * {
            font-family: "Nunito", serif;
            letter-spacing: 3px;
        }
    </style>

    @livewireStyles

    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>

{{-- <body class="min-h-screen bg-white antialiased dark:bg-linear-to-b">
    <div
        class="relative grid h-dvh flex-col items-center justify-center px-8 sm:px-0 lg:max-w-none lg:grid-cols-2 lg:px-0">
        <div
            class="bg-muted relative hidden h-full flex-col p-10 text-white lg:flex dark:border-r dark:border-neutral-800">
            <div class="absolute inset-0 bg-neutral-900"></div>

            <div class="h-full flex justify-center items-center">
                <a href="/" class="relative z-20 flex items-center text-lg font-medium" wire:navigate>
                    <span class="flex items-center justify-center rounded-md">
                        <img class="mr-2 w-96 fill-current rounded-2xl" src="{{ asset('img/foco-white.jpg') }}"
                            alt="logo">
                    </span>
                </a>
            </div>
        </div>
        <div class="w-full lg:p-8">
            <div class="mx-auto flex w-full flex-col justify-center space-y-6 sm:w-[350px]">
                <a href="" class="z-20 flex flex-col items-center gap-2 font-medium lg:hidden" wire:navigate>
                    <span class="flex h-9 w-9 items-center justify-center rounded-md">
                    </span>

                </a>
                {{ $slot }}
            </div>
        </div>
    </div>

    @livewireScripts
</body> --}}

<body class="font-bold text-[#2c3e50] min-h-screen bg-white antialiased">
    <div class="bg-muted flex min-h-svh flex-col items-center justify-center gap-6 p-6 md:p-10">
        <div class="flex sm:flex-row flex-col justify-center gap-6 rounded-xl border shadow-xs">
            <a href="/" class="flex flex-col items-center gap-2 font-medium" wire:navigate>
                <img class="mr-2 w-96 fill-current rounded-2xl" src="{{ asset('img/foco-white.jpg') }}" alt="logo">
            </a>

            <div class="">
                <div class="px-10 py-8">{{ $slot }}</div>
            </div>
        </div>
    </div>
</body>

{{-- <body class="min-h-screen antialiased" 
    style="background-image: url({{ asset('img/comercio.png') }})">
    <div class="bg-muted flex min-h-svh flex-col items-center justify-center gap-6 p-6 md:p-10">
        <div class="flex w-full max-w-md flex-col gap-6">
            <a href="{{ route('home') }}" class="flex flex-col items-center gap-2 font-medium" wire:navigate>
                <span class="flex h-9 w-9 items-center justify-center rounded-md">
                    <x-app-logo-icon class="size-9 fill-current text-black dark:text-white" />
                </span>

                <span class="sr-only">{{ config('app.name', 'Laravel') }}</span>
            </a>

            <div class="flex flex-col gap-6">
                <div
                    class="rounded-xl border bg-white dark:bg-stone-950 dark:border-stone-800 text-stone-800 shadow-xs">
                    <div class="px-10 py-8">{{ $slot }}</div>
                </div>
            </div>
        </div>
    </div>
</body> --}}

</html>
