<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>eLolja</title>

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Nunito:ital,wght@0,200..1000;1,200..1000&display=swap"
        rel="stylesheet">

    @livewireStyles
    @vite(['resources/css/app.css', 'resources/js/app.js'])

    <style>
        * {
            font-family: "Nunito", sans-serif;
            letter-spacing: 2px;
        }
    </style>

</head>

<body class="font-semibold" style="background-image: url({{ asset('img/comercio.png') }})">
    <header class="">

        <x-ecommerce.navbar />

        <div class="grid grid-cols-2 items-center px-5 mt-10">
            <div class="px-10 space-y-4">
                <span class="text-sm font-bold text-orange-500">
                    bem vindo a eLolja
                </span>

                <h1 class="text-4xl text-gray-800">
                    Venha conferir todos os nossos protudos, todos de alta qualidade e melhor preço.
                </h1>

                <div>
                    <button
                        class="text-white py-2 px-3 rounded-3xl bg-blue-400 transition-all hover:bg-blue-500 hover:scale-90 hover:cursor-pointer">
                        Saber mais
                    </button>
                </div>
            </div>

            <div class="flex justify-center">
                <img src="{{ asset('img/container.jpeg') }}" class="w-80 h-80 rounded-2xl" alt="container">
            </div>
        </div>

    </header>

    <main class="mx-25 mt-3">
        <section class="bg-white rounded-xl">
            <p class="text-center text-gray-600">Produtos em Promoção</p>

            @livewire('ecommerce.produtos')
        </section>

    </main>

    @livewireScripts
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
