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
            /* color: ; */
        }
    </style>

</head>

<body class="font-bold text-[#2c3e50]">
    <x-ecommerce.navbar />

    <header class="mx-4">
        <section class="font-bold grid sm:grid-cols-2 items-center py-3 px-5">
            <div class="text-start space-y-3">
                <h1 class="text-3xl sm:text-5xl">
                    Organize, controle e <span class="text-[#164482]">cresça</span>. Com <span
                        class="text-[#164482]">Foco</span>, sua empresa vai mais
                    <span class="text-[#164482]">longe</span>.
                </h1>
                <p>
                    Mais <span class="text-[#164482] mx-2">produtividade</span>, menos<span class="text-[#164482] mx-2">complicação</span>.
                </p>

                <div>
                    <button
                        class="text-white text-sm bg-[#164482] p-2 rounded-full cursor-pointer hover:scale-95 transition-all">
                        Consultar
                    </button>
                </div>
            </div>

            <div class="mt-4 sm:mt-0">
                <img src="{{ asset('img/foco-page.jpg') }}" alt="page" />
            </div>
        </section>

    </header>

    {{-- <main class="mx-25 my-16">
            <section class="">
                @livewire('ecommerce.produtos')
            </section>

        </main> --}}


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
