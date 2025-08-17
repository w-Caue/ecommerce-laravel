<div>
    <!-- Loading -->
    @include('includes.loading')
    <!-- ./Loading -->

    <nav class="flex items-center justify-between" aria-label="Breadcrumb">
        <h1 class="text-3xl text-neutral-600">
            Pedidos
        </h1>

        <ol class="inline-flex items-center space-x-1 md:space-x-2 rtl:space-x-reverse">
            <li class="inline-flex items-center">
                <a href="{{ route('admin.dashboard') }}"
                    class="inline-flex items-center text-sm font-bold text-neutral-500">
                    Dashboard
                </a>
            </li>
            <li>
                <div class="flex items-center">
                    <svg class="rtl:rotate-180 w-3 h-3 text-gray-400 mx-1" aria-hidden="true"
                        xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 6 10">
                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="m1 9 4-4-4-4" />
                    </svg>
                    <a href="#" class="ms-1 text-md font-bold text-neutral-600">Listagem</a>
                </div>
            </li>
        </ol>
    </nav>

    <div class="p-4 bg-white rounded-2xl mt-7 border border-neutral-200">

        <div class="flex justify-between items-center">
            <div class="relative text-gray-600 w-72">
                <input
                    class="w-full bg-gray-100 py-2 px-5 rounded-full border border-neutral-300 text-sm font-bold focus:outline-none"
                    wire:model.live="search" type="search" name="search"
                    placeholder="Pesquise por {{ $sortField == 'orders.id' ? 'código' : '' }}{{ $sortField == 'created_date' ? 'data' : '' }}{{ $sortField == 'customers.name' ? 'cliente' : '' }}{{ $sortField == 'payment' ? 'pagamento' : '' }}{{ $sortField == 'status' ? 'status' : '' }}">
                <button type="submit" class="absolute right-0 top-0 mt-2 mr-4">
                    <svg xmlns="http://www.w3.org/2000/svg" class="size-5 text-gray-700" viewBox="0 0 24 24"
                        fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                        stroke-linejoin="round" class="lucide lucide-search-icon lucide-search">
                        <path d="m21 21-4.34-4.34" />
                        <circle cx="11" cy="11" r="8" />
                    </svg>
                </button>
            </div>

            <button class="flex items-center gap-1 text-xs uppercase border border-gray-300 px-3 py-2 rounded-md hover:text-white hover:bg-purple-500 hover:border-purple-500 transition-all hover:scale-95 hover:cursor-pointer">
                <svg xmlns="http://www.w3.org/2000/svg" class="size-5" viewBox="0 0 24 24" fill="none"
                    stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
                    class="lucide lucide-list-filter-icon lucide-list-filter">
                    <path d="M3 6h18" />
                    <path d="M7 12h10" />
                    <path d="M10 18h4" />
                </svg>
            </button>
        </div>

        <div class="overflow-x-auto sm:-mx-6 lg:-mx-8 mt-4">
            <div class="inline-block min-w-full py-2 overflow-hidden sm:px-6 lg:px-8 ">
                <table class="min-w-full text-left text-sm text-surface">
                    <thead class="">
                        <tr x-cloak x-data="{ tooltip: 'nenhum' }" class="text-xs uppercase text-neutral-500">
                            <th scope="col" class="py-2 rounded-l-xl">
                                <div class="flex justify-center">
                                    <div class="flex justify-center gap-1 items-center hover:cursor-pointer"
                                        wire:click="sortBy('orders.id')" x-on:mouseover="tooltip = 'id'"
                                        x-on:mouseleave="tooltip = 'nenhum'">
                                        @include('includes.icon-search', [
                                            'field' => 'orders.id',
                                        ])
                                        <h1 class="">Código</h1>
                                        @include('includes.icon-filter', [
                                            'field' => 'orders.id',
                                        ])
                                    </div>

                                    <div x-cloak x-show="tooltip === 'id'" x-transition x-transition.duration.300ms
                                        class="absolute z-10 p-2 mt-6 text-xs text-blue-500 font-bold bg-white border border-gray-300 rounded-xl">
                                        <p>Ordenar pelo o Código</p>
                                    </div>
                                </div>
                            </th>

                            <th scope="col" class="px-6 py-2">
                                <div class="flex justify-center">
                                    <div class="flex justify-center gap-1 items-center hover:cursor-pointer"
                                        wire:click="sortBy('created_date')" x-on:mouseover="tooltip = 'date'"
                                        x-on:mouseleave="tooltip = 'nenhum'">
                                        @include('includes.icon-search', [
                                            'field' => 'created_date',
                                        ])
                                        <h1 class="">Dt. Criação</h1>
                                        @include('includes.icon-filter', [
                                            'field' => 'created_date',
                                        ])
                                    </div>

                                    <div x-cloak x-show="tooltip === 'date'" x-transition x-transition.duration.300ms
                                        class="absolute z-10 p-2 mt-6 text-xs text-blue-500 font-bold bg-white border border-gray-300 rounded-xl">
                                        <p>Ordenar pelo a Data</p>
                                    </div>
                                </div>
                            </th>

                            <th scope="col" class="px-6 py-2">
                                <div class="flex justify-center">
                                    <div class="flex justify-center gap-1 items-center hover:cursor-pointer"
                                        wire:click="sortBy('customers.name')" x-on:mouseover="tooltip = 'name'"
                                        x-on:mouseleave="tooltip = 'nenhum'">
                                        @include('includes.icon-search', [
                                            'field' => 'customers.name',
                                        ])
                                        <h1 class="">Cliente</h1>
                                        @include('includes.icon-filter', [
                                            'field' => 'customers.name',
                                        ])
                                    </div>

                                    <div x-cloak x-show="tooltip === 'name'" x-transition x-transition.duration.300ms
                                        class="absolute z-10 p-2 mt-6 text-xs text-blue-500 font-bold bg-white border border-gray-300 rounded-xl">
                                        <p>Ordenar pelo o Cliente</p>
                                    </div>
                                </div>
                            </th>

                            <th scope="col" class="px-6 py-2">
                                <div class="flex justify-center">
                                    <div class="flex justify-center gap-1 items-center hover:cursor-pointer"
                                        wire:click="sortBy('payment')" x-on:mouseover="tooltip = 'payment'"
                                        x-on:mouseleave="tooltip = 'nenhum'">
                                        @include('includes.icon-search', [
                                            'field' => 'payment',
                                        ])
                                        <h1 class="">Pagamento</h1>
                                        @include('includes.icon-filter', [
                                            'field' => 'payment',
                                        ])
                                    </div>

                                    <div x-cloak x-show="tooltip === 'description'" x-transition
                                        x-transition.duration.300ms
                                        class="absolute z-10 p-2 mt-6 text-xs text-blue-500 font-bold bg-white border border-gray-300 rounded-xl">
                                        <p>Ordenar pelo o Pagamento</p>
                                    </div>
                                </div>
                            </th>

                            <th scope="col" class="px-6 py-2">
                                <div class="flex justify-center">
                                    <div class="flex justify-center gap-1 items-center hover:cursor-pointer"
                                        wire:click="sortBy('status')" x-on:mouseover="tooltip = 'status'"
                                        x-on:mouseleave="tooltip = 'nenhum'">
                                        @include('includes.icon-search', [
                                            'field' => 'status',
                                        ])
                                        <h1 class="">Status</h1>
                                        @include('includes.icon-filter', [
                                            'field' => 'status',
                                        ])
                                    </div>

                                    <div x-cloak x-show="tooltip === 'status'" x-transition x-transition.duration.300ms
                                        class="absolute z-10 p-2 mt-6 text-xs text-blue-500 font-bold bg-white border border-gray-300 rounded-xl">
                                        <p>Ordenar pelo o Status</p>
                                    </div>
                                </div>
                            </th>

                            <th scope="col" class="px-6 py-2 text-center">Total</th>
                            {{-- <th scope="col" class="px-6 py-2 rounded-r-xl"></th> --}}
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($orders as $order)
                            <tr wire:key="{{ $order->id }}"
                                onclick="javascript:location.href='{{ route('admin.pedidos.detalhe', ['codigo' => $order->id]) }}'"
                                class="font-bold transition-all hover:cursor-pointer hover:scale-95">
                                <td class="">
                                    <div
                                        class="px-6 py-3 my-1 text-center text-red-500 border-l border-y rounded-l-xl">
                                        #{{ $order->id }}
                                    </div>
                                </td>

                                <td class="">
                                    <div class="px-6 py-3 text-center border-y text-sm">
                                        {{ \Carbon\Carbon::parse($order->created_date)->translatedFormat('d M, Y') }}
                                    </div>
                                </td>

                                <td class="">
                                    <div class="flex items-center gap-2 px-6 py-2 border-y">
                                        <div class="">
                                            @if ($order->customer_image != null)
                                                <img src="{{ $order->customer_image }}"
                                                    class="object-cover object-center rounded-full h-7 w-7"
                                                    alt="Avatar Tailwind CSS Component" />
                                            @else
                                                <img src="{{ asset('img/ft-cliente.jpeg') }}"
                                                    class="object-cover object-center rounded-full h-7 w-7"
                                                    alt="Avatar Tailwind CSS Component" />
                                            @endif
                                        </div>
                                        <h1 class="font-bold">{{ $order->customer_name }}</h1>
                                    </div>
                                </td>

                                <td class="">
                                    <div class="px-6 py-3 text-center border-y">
                                        {{ $order->payment }}
                                    </div>
                                </td>

                                <td class="">
                                    <div class="px-6 py-3 text-center border-y">
                                        <span
                                            class="text-xs font-extrabold px-4 py-1 rounded-md {{ $order->status == 'pending' ? 'text-blue-500 bg-blue-200' : '' }}
                                            {{ $order->status == 'paid' ? 'text-yellow-500 bg-yellow-200' : '' }}
                                            {{ $order->status == 'processing' ? 'text-orange-500 bg-orange-200' : '' }}
                                            {{ $order->status == 'completed' ? 'text-green-500 bg-green-200' : '' }}
                                            {{ $order->status == 'cancelled ' ? 'text-red-500 bg-red-200' : '' }}
                                            {{ $order->status == 'refunded' ? 'text-purple-500 bg-purple-200' : '' }}">
                                            {{ $order->status == 'pending' ? 'Esp. Pagamento' : '' }}
                                            {{ $order->status == 'paid' ? 'Pago' : '' }}
                                            {{ $order->status == 'processing' ? 'Processando' : '' }}
                                            {{ $order->status == 'completed' ? 'Concluído' : '' }}
                                            {{ $order->status == 'cancelled ' ? 'Cancelado' : '' }}
                                            {{ $order->status == 'refunded	 ' ? 'Reembolso' : '' }}
                                        </span>
                                    </div>
                                </td>

                                <td class="">
                                    <div class="px-6 py-3 text-center  border-y border-r rounded-r-xl">
                                        R${{ number_format($order->total, 2, ',', ' ') }}
                                    </div>
                                </td>
                                {{-- <td class="">
                                    <div class="px-6 py-3 text-center border-y border-r rounded-r-xl">
                                        <a class=""
                                            href="{{ route('admin.pedidos.detalhe', ['codigo' => $order->id]) }}">
                                            <svg class="size-5"
                                                xmlns="http://www.w3.org/2000/svg"
                                                viewBox="0 0 24 24" fill="none" stroke="currentColor"
                                                stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
                                                class="lucide lucide-search-icon lucide-search">
                                                <path d="m21 21-4.34-4.34" />
                                                <circle cx="11" cy="11" r="8" />
                                            </svg>
                                        </a>
                                    </div>

                                </td> --}}
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>

        <div class="flex justify-between gap-2 items-center mx-4 my-2 py-1">
            @include('includes.porPagina')

            {{-- {{ $products->onEachSide(1)->links('components.pagination', ['is_livewire' => true]) }} --}}
        </div>
    </div>
</div>
