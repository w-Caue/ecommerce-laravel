<div>
    <!-- Loading -->
    @include('includes.loading')
    <!-- ./Loading -->

    <nav class="flex items-center justify-between" aria-label="Breadcrumb">
        <h1 class="text-3xl text-neutral-600">
            Pedido <span class="text-2xl text-red-500">#{{ $order->id }}</span>
        </h1>

        <ol class="inline-flex items-center space-x-1 md:space-x-2 rtl:space-x-reverse">
            <li class="inline-flex items-center">
                <a href="{{ route('admin.dashboard') }}"
                    class="inline-flex items-center text-sm font-bold text-neutral-500">
                    Dashboard
                </a>
            </li>
            <li class="flex items-center">
                <svg class="rtl:rotate-180 w-3 h-3 text-gray-400 mx-1" aria-hidden="true"
                    xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 6 10">
                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                        d="m1 9 4-4-4-4" />
                </svg>
                <a href="{{ route('admin.pedidos.listagem') }}"
                    class="inline-flex items-center text-sm font-bold text-neutral-500">
                    Listagem
                </a>
            </li>
            <li>
                <div class="flex items-center">
                    <svg class="rtl:rotate-180 w-3 h-3 text-gray-400 mx-1" aria-hidden="true"
                        xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 6 10">
                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="m1 9 4-4-4-4" />
                    </svg>
                    <a href="#" class="ms-1 text-md font-bold text-neutral-600">Detalhe</a>
                </div>
            </li>
        </ol>
    </nav>

    <div class="grid grid-cols-3 gap-4 mt-4">
        <div class="col-span-2">
            <div class="bg-white rounded-xl p-3 border border-neutral-200">
                <div class="overflow-x-auto sm:-mx-6 lg:-mx-8 mt-4">
                    <div class="inline-block min-w-full py-2 overflow-hidden sm:px-6 lg:px-8 ">
                        <table class="min-w-full text-left text-sm text-surface">
                            <thead class="border-b border-neutral-300 ">
                                <tr x-cloak x-data="{ tooltip: 'nenhum' }" class="text-xs uppercase text-neutral-500">
                                    <th scope="col" class="px-6 py-4">
                                        <div class="flex justify-center">
                                            <div class="flex justify-center gap-1 items-center hover:cursor-pointer"
                                                wire:click="sortBy('name')" x-on:mouseover="tooltip = 'name'"
                                                x-on:mouseleave="tooltip = 'nenhum'">
                                                <h1 class="">Nome</h1>
                                                @include('includes.icon-filter', [
                                                    'field' => 'name',
                                                ])
                                            </div>

                                            <div x-cloak x-show="tooltip === 'name'" x-transition
                                                x-transition.duration.300ms
                                                class="absolute z-10 p-2 mt-6 text-xs text-blue-500 font-bold bg-gray-50 border border-gray-200 rounded-xl">
                                                <p>Ordenar pelo o Nome</p>
                                            </div>
                                        </div>
                                    </th>
                                    <th scope="col" class="px-6 py-4">
                                        <div class="flex justify-center">
                                            <div class="flex justify-center gap-1 items-center hover:cursor-pointer"
                                                wire:click="sortBy('qty')" x-on:mouseover="tooltip = 'qty'"
                                                x-on:mouseleave="tooltip = 'nenhum'">
                                                <h1 class="">Qtd</h1>
                                                @include('includes.icon-filter', [
                                                    'field' => 'qty',
                                                ])
                                            </div>

                                            <div x-cloak x-show="tooltip === 'qty'" x-transition
                                                x-transition.duration.300ms
                                                class="absolute z-10 p-2 mt-6 text-xs text-blue-500 font-bold bg-gray-50 border border-gray-200 rounded-xl">
                                                <p>Ordenar pela a Qtd</p>
                                            </div>
                                        </div>
                                    </th>
                                    <th scope="col" class="px-6 py-4">
                                        <div class="flex justify-center">
                                            <div class="flex justify-center gap-1 items-center hover:cursor-pointer"
                                                wire:click="sortBy('price')" x-on:mouseover="tooltip = 'price'"
                                                x-on:mouseleave="tooltip = 'nenhum'">
                                                <h1 class="">Preço</h1>
                                                @include('includes.icon-filter', [
                                                    'field' => 'price',
                                                ])
                                            </div>

                                            <div x-cloak x-show="tooltip === 'price'" x-transition
                                                x-transition.duration.300ms
                                                class="absolute z-10 p-2 mt-6 text-xs text-blue-500 font-bold bg-gray-50 border border-gray-200 rounded-xl">
                                                <p>Ordenar pelo o Preço</p>
                                            </div>
                                        </div>
                                    </th>

                                    <th scope="col" class="px-6 py-4 text-center">Total</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($items as $item)
                                    <tr wire:key="{{ $item->id }}" class="font-bold border-b border-neutral-300">
                                        <td class="px-6 py-2">
                                            <div class="flex items-center gap-2">
                                                <div class="">
                                                    @if ($item->image != null)
                                                        <img src="{{ $item->image }}"
                                                            class="object-cover object-center rounded-md h-10 w-10"
                                                            alt="Avatar Tailwind CSS Component" />
                                                    @else
                                                        <img src="{{ asset('img/ft-cliente.jpeg') }}"
                                                            class="object-cover object-center rounded-full h-10 w-10"
                                                            alt="Avatar Tailwind CSS Component" />
                                                    @endif
                                                </div>
                                                <h1 class="font-bold">{{ $item->name }}</h1>
                                            </div>
                                        </td>
                                        <td class="px-6 py-2 text-center">{{ $item->quantity }}</td>
                                        <td class="px-6 py-2 text-center">
                                            R${{ number_format($item->product_price, 2, ',', ' ') }}
                                        </td>
                                        <td class="px-6 py-2 text-center">
                                            R${{ number_format($item->total, 2, ',', ' ') }}
                                        </td>

                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>

        <div class="space-y-4">
            <div class="bg-white rounded-xl p-3 border border-neutral-200 transition-all hover:scale-95">
                <a href="{{ route('admin.cliente.detalhe', ['codigo' => $order->customer_id]) }}"
                    class="flex items-start gap-2">
                    <div class="">
                        <img src="{{ $order->customer_image }}" class="object-cover object-center rounded-xl h-17 w-17"
                            alt="Avatar Tailwind CSS Component" />
                    </div>
                    <div>
                        <h1 class="text-lg font-bold">{{ $order->customer_name }}</h1>
                        <div class="text-sm font-bold text-neutral-500">
                            <input type="text" value="{{ $order->customer_phone }}"
                                x-mask:dynamic="$input.startsWith('34') || $input.startsWith('37') ? '(99) 9 9999-9999' : '(99) 9 9999-9999'"
                                disabled></input>
                            <p>{{ $order->customer_email }}</p>
                        </div>
                    </div>
                </a>
            </div>

            <div class="bg-white rounded-xl p-3 border border-neutral-200">
                <div class="flex items-center justify-between">
                    <h1 class="text-lg font-bold text-neutral-600">Resumo do pedido</h1>

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
                </div>
                <div class="text-sm font-extrabold space-y-2 mt-4">
                    <div class="flex items-center justify-between">
                        <h1 class="text-neutral-600">Data do Pedido:</h1>
                        <h1 class="text-neutral-500">
                            {{ \Carbon\Carbon::parse($order->created_date)->translatedFormat('d/m/Y') }}</h1>
                    </div>
                    <div class="flex items-center justify-between">
                        <h1 class="text-neutral-600">Hora do Pedido:</h1>
                        <h1 class="text-neutral-500">
                            {{ \Carbon\Carbon::parse($order->created_date)->translatedFormat('h:i') }}</h1>
                    </div>
                </div>

            </div>

            <div class="bg-white rounded-xl p-3 border border-neutral-200">
                <div class="flex items-center justify-between  font-bold">
                    <h1 class="text-neutral-700">Total:</h1>

                    <p class="text-orange-500">R${{ number_format($order->total, 2, ',', ' ') }}</p>
                </div>
            </div>

            <div class="bg-white rounded-xl p-3 border border-neutral-200">
                <form wire:submit="save">
                    <div class="flex items-center justify-between  font-bold">
                        <h1 class="text-neutral-700">Status:</h1>

                        <div class="w-44">
                            <x-form.select wire:model="status">
                                <option value="pending">Esp. Pagamento</option>
                                <option value="paid">Pago</option>
                                <option value="processing">Processando</option>
                                <option value="completed">Concluído</option>
                                <option value="cancelled">Cancelado</option>
                                <option value="refunded">Reembolso</option>
                            </x-form.select>
                        </div>
                    </div>

                    <div>
                        <h1 class="font-bold text-neutral-700">Observação:</h1>
                        <x-form.textarea wire:model="observation">
                        </x-form.textarea>
                    </div>

                    <div class="flex items-center gap-3 mt-7">
                        <button
                            class="flex items-center gap-1 text-xs uppercase text-white bg-blue-500 px-5 py-2 rounded-md hover:bg-blue-700 transition-all hover:scale-95 hover:cursor-pointer">
                            <svg xmlns="http://www.w3.org/2000/svg" class="size-4" viewBox="0 0 24 24"
                                fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                                stroke-linejoin="round" class="lucide lucide-check-icon lucide-check">
                                <path d="M20 6 9 17l-5-5" />
                            </svg>

                            Salvar
                        </button>

                        <a target="	_blank" href="{{ route('admin.impressao', ['codigo' => $order->customer_id]) }}"
                            class="flex items-center gap-1 text-xs uppercase text-white bg-red-500 px-5 py-2 rounded-md hover:bg-red-700 transition-all hover:scale-95 hover:cursor-pointer">
                            <svg xmlns="http://www.w3.org/2000/svg" class="size-4"
                                viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"
                                stroke-linecap="round" stroke-linejoin="round"
                                class="lucide lucide-receipt-text-icon lucide-receipt-text">
                                <path d="M4 2v20l2-1 2 1 2-1 2 1 2-1 2 1 2-1 2 1V2l-2 1-2-1-2 1-2-1-2 1-2-1-2 1Z" />
                                <path d="M14 8H8" />
                                <path d="M16 12H8" />
                                <path d="M13 16H8" />
                            </svg>

                            Imprimir
                        </a>
                    </div>
                </form>
            </div>
        </div>

    </div>
</div>
