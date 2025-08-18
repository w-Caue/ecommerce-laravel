<div class="">
    <!-- Cards -->
    <div class="sm:grid gap-3 mt-5 mb-8 md:grid-cols-2 xl:grid-cols-4 hidden" wfd-id="87">

        <!-- Card -->
        <div title="Pedidos pendentes de pagamento" class="text-blue-500">
            <x-card.icon-card title="Pend. pagamento" subtitle="{{ $ordersPending }}">
                <div class="p-3 mr-4 bg-blue-100 rounded-full">
                    <svg xmlns="http://www.w3.org/2000/svg" class="size-7" viewBox="0 0 24 24" fill="none"
                        stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
                        class="lucide lucide-timer-icon lucide-timer">
                        <line x1="10" x2="14" y1="2" y2="2" />
                        <line x1="12" x2="15" y1="14" y2="11" />
                        <circle cx="12" cy="14" r="8" />
                    </svg>
                </div>
            </x-card.icon-card>
        </div>

        <div title="Pedidos pagos" class="text-yellow-500">
            <x-card.icon-card title="Pagos" subtitle="{{ $ordersPaid }}">
                <div class="p-3 mr-4 bg-yellow-100 rounded-full">
                    <svg xmlns="http://www.w3.org/2000/svg" class="size-7" viewBox="0 0 24 24" fill="none"
                        stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
                        class="lucide lucide-check-icon lucide-check">
                        <path d="M20 6 9 17l-5-5" />
                    </svg>
                </div>
            </x-card.icon-card>
        </div>

        <div title="Pedidos concluidos" class="text-green-500">
            <x-card.icon-card title="Concluídos" subtitle="{{ $ordersCompleted }}">
                <div class="p-3 mr-4 bg-green-100 rounded-full">
                    <svg xmlns="http://www.w3.org/2000/svg" class="size-7" viewBox="0 0 24 24" fill="none"
                        stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
                        class="lucide lucide-check-check-icon lucide-check-check">
                        <path d="M18 6 7 17l-5-5" />
                        <path d="m22 10-7.5 7.5L13 16" />
                    </svg>
                </div>
            </x-card.icon-card>
        </div>

        <div title="Pedidos cancelados" class="text-red-500">
            <x-card.icon-card title="Cancelados" subtitle="{{ $ordersCancelled }}">
                <div class="p-3 mr-4 bg-red-100 rounded-full">
                    <svg xmlns="http://www.w3.org/2000/svg" class="size-7" viewBox="0 0 24 24" fill="none"
                        stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
                        class="lucide lucide-x-icon lucide-x">
                        <path d="M18 6 6 18" />
                        <path d="m6 6 12 12" />
                    </svg>
                </div>
            </x-card.icon-card>
        </div>

    </div>
    <!--./Cards-->
</div>
