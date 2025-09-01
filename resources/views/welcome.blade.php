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

    <!-- Splide CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/@splidejs/splide@4.1.4/dist/css/splide.min.css">

    <style>
        * {
            font-family: "Nunito", sans-serif;
            letter-spacing: 2px;
        }
    </style>

</head>

<body class="font-semibold">
    <x-ecommerce.navbar />

    <section class="mx-4 mt-22 p-4 rounded-xl" style="background-image: url({{ asset('img/comercio.png') }})">
        <header class="mt-10">

            <div class="">
                <div class="flex flex-col justify-center items-center px-10 space-y-4">
                    <h1 class="px-3 py-1 font-bold text-orange-500 bg-white rounded-full">
                        bem vindo a eLolja
                    </h1>

                    <h1 class="text-5xl text-center text-gray-800 w-2/3">
                        Venha conferir todos os nossos produtos e nossas promoções
                    </h1>

                    <h1 class="text-neutral-400 text-center px-10 w-1/2">
                        Lorem ipsum dolor sit amet consectetur adipisicing elit. Omnis, voluptatem sint laudantium
                        quasi!
                    </h1>

                    <div>
                        <a href="{{ route('todos-produtos') }}"
                            class="flex items-center gap-1 text-sm text-white bg-blue-500 p-2 rounded-full hover:bg-blue-700 transition-all hover:scale-95 hover:cursor-pointer">
                            Todos os Produtos
                        </a>
                    </div>
                </div>
            </div>

        </header>

        <main class="mx-25 my-16">
            <section class="">
                @livewire('ecommerce.produtos')
            </section>

        </main>
    </section>


    @livewireScripts
</body>

<!-- Splide JS -->
<script src="https://cdn.jsdelivr.net/npm/@splidejs/splide@4.1.4/dist/js/splide.min.js"></script>

<script>
    function data() {

        return {
            openCarrinho: false,
            openUser: false,

        }
    }
</script>

</html>
