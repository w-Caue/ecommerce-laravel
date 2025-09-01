<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}" x-data="{ isDarkMode: localStorage.getItem('dark') === 'true', navBar: false }" x-init="$watch('isDarkMode', val => localStorage.setItem('dark', val))"
    x-bind:class="{ 'dark': isDarkMode }">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Admin Elolja</title>

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Nunito:ital,wght@0,200..1000;1,200..1000&display=swap"
        rel="stylesheet">

    <style>
        body {
            font-family: "Nunito", sans-serif;
            letter-spacing: 2px;
            /* Nunito */
        }

        [x-cloak] {
            display: none;
        }
    </style>

    @vite('resources/css/app.css')

    @livewireStyles
</head>

<body class="font-semibold">
    <x-ecommerce.navbar />

    <section class="mx-4 mt-16 p-4 rounded-xl" style="background-image: url({{ asset('img/comercio.png') }})">
        <div class="flex flex-col flex-1 w-full">
            <div class="">
                {{ $slot ?? '' }}
            </div>
        </div>
    </section>

    @livewireScripts

    <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
</body>

<script>
    function data() {

        return {
            openCarrinho: false,
            openUser: false,

        }
    }
</script>

</html>
