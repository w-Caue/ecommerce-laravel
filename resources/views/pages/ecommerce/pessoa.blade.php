@extends('components.layouts.ecommerce')

@section('content')
    <div class="py-1 text-center mt-6">
        <h1 class="text-4xl tracking-wider font-semibold">Login</h1>

        <div class="flex justify-center m-1">
            <div class="flex flex-row content-center justify-center p-4">

                <!--Carrinho -->
                <div class="border-4 border-orange-500 bg-orange-500 rounded-full p-1">
                    <button
                        class="flex items-center justify-between px-2 py-2 text-sm font-medium leading-5 text-white transition-colors duration-150 bg-orange-500 rounded-full focus:shadow-outline-blue"
                        aria-label="Edit">
                        <svg xmlns="http://www.w3.org/2000/svg" class="size-8" viewBox="0 0 24 24" fill="none"
                            stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
                            class="lucide lucide-shopping-cart-icon lucide-shopping-cart">
                            <circle cx="8" cy="21" r="1" />
                            <circle cx="19" cy="21" r="1" />
                            <path d="M2.05 2.05h2l2.66 12.42a2 2 0 0 0 2 1.58h9.78a2 2 0 0 0 1.95-1.57l1.65-7.43H5.12" />
                        </svg>
                    </button>
                </div>
                <!--/Carrinho -->

                <!--Arrow -->
                <button
                    class="flex items-center justify-between px-2 py-2 text-sm font-medium leading-5 text-orange-500 transition-colors duration-150"
                    aria-label="Edit">
                    <svg class="w-6 h-6" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                        fill="none" viewBox="0 0 24 24">
                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M19 12H5m14 0-4 4m4-4-4-4" />
                    </svg>
                </button>
                <!--/Arrow -->

                <!-- User -->
                <div class="border-4 border-orange-500 rounded-full p-1">
                    <button
                        class="flex items-center justify-between px-2 py-2 text-sm font-medium leading-5 text-white bg-orange-500 transition-colors duration-150 rounded-full"
                        aria-label="Edit">
                        <svg xmlns="http://www.w3.org/2000/svg" class="size-8" viewBox="0 0 24 24" fill="none"
                            stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
                            class="lucide lucide-user-round-icon lucide-user-round">
                            <circle cx="12" cy="8" r="5" />
                            <path d="M20 21a8 8 0 0 0-16 0" />
                        </svg>
                    </button>
                </div>
                <!--/User -->

                <!--Arrow -->
                <button
                    class="flex items-center justify-between px-2 py-2 text-sm font-medium leading-5 text-gray-300 transition-colors duration-150"
                    aria-label="Edit">
                    <svg class="w-6 h-6" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                        fill="none" viewBox="0 0 24 24">
                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M19 12H5m14 0-4 4m4-4-4-4" />
                    </svg>
                </button>
                <!--/Arrow -->

                <!-- Pagamento -->
                <div class="border-4 border-gray-400 rounded-full p-1 opacity-35">
                    <button
                        class="flex items-center justify-between px-2 py-2 text-sm font-medium leading-5  transition-colors duration-150 rounded-full"
                        aria-label="Edit">
                        <svg class="w-8 h-8" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor">
                            <path
                                d="M22.0049 9.99979V19.9998C22.0049 20.5521 21.5572 20.9998 21.0049 20.9998H3.00488C2.4526 20.9998 2.00488 20.5521 2.00488 19.9998V9.99979H22.0049ZM22.0049 7.99979H2.00488V3.99979C2.00488 3.4475 2.4526 2.99979 3.00488 2.99979H21.0049C21.5572 2.99979 22.0049 3.4475 22.0049 3.99979V7.99979ZM15.0049 15.9998V17.9998H19.0049V15.9998H15.0049Z">
                            </path>
                        </svg>
                    </button>
                </div>
                <!--/Pagamento -->

                <!--Arrow -->
                <button
                    class="flex items-center justify-between px-2 py-2 text-sm font-medium leading-5 text-gray-300 transition-colors duration-150"
                    aria-label="Edit">
                    <svg class="w-6 h-6" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                        fill="none" viewBox="0 0 24 24">
                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M19 12H5m14 0-4 4m4-4-4-4" />
                    </svg>
                </button>
                <!--/Arrow -->

                <!-- Pedido -->
                <div class="border-4 border-gray-400 rounded-full p-1 opacity-35">
                    <button
                        class="flex items-center justify-between px-2 py-2 text-sm font-medium leading-5  transition-colors duration-150 rounded-full"
                        aria-label="Edit">
                        <svg xmlns="http://www.w3.org/2000/svg" class="size-8" viewBox="0 0 24 24" fill="none"
                            stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
                            class="lucide lucide-scroll-text-icon lucide-scroll-text">
                            <path d="M15 12h-5" />
                            <path d="M15 8h-5" />
                            <path d="M19 17V5a2 2 0 0 0-2-2H4" />
                            <path
                                d="M8 21h12a2 2 0 0 0 2-2v-1a1 1 0 0 0-1-1H11a1 1 0 0 0-1 1v1a2 2 0 1 1-4 0V5a2 2 0 1 0-4 0v2a1 1 0 0 0 1 1h3" />
                        </svg>
                    </button>
                </div>
                <!--/Pedido -->

                <!--Arrow -->
                <button
                    class="flex items-center justify-between px-2 py-2 text-sm font-medium leading-5 text-gray-300 transition-colors duration-150"
                    aria-label="Edit">
                    <svg class="w-6 h-6" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                        fill="none" viewBox="0 0 24 24">
                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M19 12H5m14 0-4 4m4-4-4-4" />
                    </svg>
                </button>
                <!--/Arrow -->

                <!-- Checkout -->
                <div class="border-4 border-gray-400 rounded-full p-1 opacity-35">
                    <button
                        class="flex items-center justify-between px-2 py-2 text-sm font-medium leading-5  transition-colors duration-150 rounded-full"
                        aria-label="Edit">
                        <svg xmlns="http://www.w3.org/2000/svg" class="w-8 h-8" fill="none" viewBox="0 0 24 24"
                            stroke="currentColor" stroke-width="2">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M5 13l4 4L19 7"></path>
                        </svg>
                    </button>
                </div>
                <!--/Checkout -->

            </div>
        </div>
    </div>
    @livewire('ecommerce.pessoa')
@endsection
