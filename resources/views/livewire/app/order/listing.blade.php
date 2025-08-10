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
            <div class="relative text-gray-600">
                <input class="w-full bg-gray-100 py-2 px-5 pr-16 rounded-full text-sm font-bold focus:outline-none"
                    type="search" name="search" placeholder="Pesquisar Aqui">
                <button type="submit" class="absolute right-0 top-0 mt-2 mr-4">
                    <svg xmlns="http://www.w3.org/2000/svg" class="size-5 text-gray-700" viewBox="0 0 24 24"
                        fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                        stroke-linejoin="round" class="lucide lucide-search-icon lucide-search">
                        <path d="m21 21-4.34-4.34" />
                        <circle cx="11" cy="11" r="8" />
                    </svg>
                </button>
            </div>
        </div>

        <div class="overflow-x-auto sm:-mx-6 lg:-mx-8 mt-4">
            <div class="inline-block min-w-full py-2 overflow-hidden sm:px-6 lg:px-8 ">
                <table class="min-w-full text-left text-sm text-surface">
                    <thead class="border-b border-neutral-300 ">
                        <tr x-cloak x-data="{ tooltip: 'nenhum' }" class="text-xs uppercase text-neutral-500">
                            <th scope="col" class="py-4">
                                <div class="flex justify-center">
                                    <div class="flex justify-center gap-1 items-center hover:cursor-pointer"
                                        wire:click="sortBy('id')" x-on:mouseover="tooltip = 'id'"
                                        x-on:mouseleave="tooltip = 'nenhum'">
                                        @include('includes.icon-search', [
                                            'field' => 'id',
                                        ])
                                        <h1 class="">Código</h1>
                                        @include('includes.icon-filter', [
                                            'field' => 'id',
                                        ])
                                    </div>

                                    <div x-cloak x-show="tooltip === 'id'" x-transition x-transition.duration.300ms
                                        class="absolute z-10 p-2 mt-6 text-xs text-blue-500 font-bold bg-gray-50 border border-gray-200 rounded-xl">
                                        <p>Ordenar pelo o Código</p>
                                    </div>
                                </div>
                            </th>
                            <th scope="col" class="px-6 py-4">
                                <div class="flex justify-center">
                                    <div class="flex justify-center gap-1 items-center hover:cursor-pointer"
                                        wire:click="sortBy('name')" x-on:mouseover="tooltip = 'name'"
                                        x-on:mouseleave="tooltip = 'nenhum'">
                                        @include('includes.icon-search', [
                                            'field' => 'name',
                                        ])
                                        <h1 class="">Nome</h1>
                                        @include('includes.icon-filter', [
                                            'field' => 'name',
                                        ])
                                    </div>

                                    <div x-cloak x-show="tooltip === 'name'" x-transition x-transition.duration.300ms
                                        class="absolute z-10 p-2 mt-6 text-xs text-blue-500 font-bold bg-gray-50 border border-gray-200 rounded-xl">
                                        <p>Ordenar pelo o Nome</p>
                                    </div>
                                </div>
                            </th>
                            <th scope="col" class="px-6 py-4">
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
                                        class="absolute z-10 p-2 mt-6 text-xs text-blue-500 font-bold bg-gray-50 border border-gray-200 rounded-xl">
                                        <p>Ordenar pelo o Pagamento</p>
                                    </div>
                                </div>
                            </th>
                            <th scope="col" class="px-6 py-4">
                                <div class="flex justify-center">
                                    <div class="flex justify-center gap-1 items-center hover:cursor-pointer"
                                        wire:click="sortBy('date')" x-on:mouseover="tooltip = 'date'"
                                        x-on:mouseleave="tooltip = 'nenhum'">
                                        @include('includes.icon-search', [
                                            'field' => 'date',
                                        ])
                                        <h1 class="">Data</h1>
                                        @include('includes.icon-filter', [
                                            'field' => 'date',
                                        ])
                                    </div>

                                    <div x-cloak x-show="tooltip === 'date'" x-transition x-transition.duration.300ms
                                        class="absolute z-10 p-2 mt-6 text-xs text-blue-500 font-bold bg-gray-50 border border-gray-200 rounded-xl">
                                        <p>Ordenar pelo a Data</p>
                                    </div>
                                </div>
                            </th>
                            <th scope="col" class="px-6 py-4">
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
                                        class="absolute z-10 p-2 mt-6 text-xs text-blue-500 font-bold bg-gray-50 border border-gray-200 rounded-xl">
                                        <p>Ordenar pelo o Status</p>
                                    </div>
                                </div>
                            </th>
                            <th scope="col" class="px-6 py-4 text-center">Total</th>
                            <th scope="col" class="px-6 py-4"></th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($orders as $order)
                            <tr wire:key="{{ $order->id }}" class="font-bold border-b border-neutral-300">
                                <td class="px-6 py-2 text-center text-neutral-600">#{{ $order->id }}</td>
                                <td class="px-6 py-2">
                                    <div class="flex items-center gap-2">
                                        <div class="">
                                            @if ($order->customer_image != null)
                                                <img src="{{ $order->customer_image }}"
                                                    class="object-cover object-center rounded-full h-10 w-10"
                                                    alt="Avatar Tailwind CSS Component" />
                                            @else
                                                <img src="{{ asset('img/ft-cliente.jpeg') }}"
                                                    class="object-cover object-center rounded-full h-10 w-10"
                                                    alt="Avatar Tailwind CSS Component" />
                                            @endif
                                        </div>
                                        <h1 class="font-bold">{{ $order->customer_name }}</h1>
                                    </div>
                                </td>
                                <td class="px-6 py-2 text-center">{{ $order->payment }}</td>
                                <td class="px-6 py-2 text-center">
                                    {{ \Carbon\Carbon::parse($order->created_date)->translatedFormat('d, M, Y') }}
                                </td>
                                <td class="px-6 py-2 text-center">
                                    <span
                                        class="text-xs uppercase font-bold p-1 rounded {{ $order->status == 'pending' ? 'text-blue-500 bg-blue-200' : '' }}
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
                                </td>
                                <td class="px-6 py-2 text-center">R${{ number_format($order->total, 2, ',', ' ') }}
                                </td>
                                <td class="px-6 py-2">
                                    <a class="" href="{{ route('admin.pedidos.detalhe', ['codigo' => $order->id]) }}">
                                        <svg class="size-10 rounded-full p-2 hover:bg-gray-200 transition-all hover:scale-95" xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                            viewBox="0 0 24 24" fill="none" stroke="currentColor"
                                            stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
                                            class="lucide lucide-search-icon lucide-search">
                                            <path d="m21 21-4.34-4.34" />
                                            <circle cx="11" cy="11" r="8" />
                                        </svg>
                                    </a>
                                </td>
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
