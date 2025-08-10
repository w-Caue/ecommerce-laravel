<div>
    <!-- Loading -->
    @include('includes.loading')
    <!-- ./Loading -->

    <nav class="flex items-center justify-between" aria-label="Breadcrumb">
        <h1 class="text-3xl text-neutral-600">
            Cliente <span class="text-2xl text-red-500">#{{ $customer->id }}</span>
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
                    <a href="#" class="ms-1 text-md font-bold text-neutral-600">Detalhe</a>
                </div>
            </li>
        </ol>
    </nav>

    <div class="grid grid-cols-3 gap-4 mt-4">
        <div>
            <div class="bg-white rounded-xl p-3 border border-neutral-200">
                <div class="flex items-start gap-2">
                    <div class="">
                        <img src="{{ $customer->image }}" class="object-cover object-center rounded-xl h-22 w-22"
                            alt="Avatar Tailwind CSS Component" />
                    </div>
                    <div>
                        <h1 class="text-lg font-bold">{{ $customer->name }}</h1>
                        <div class="text-sm font-bold text-neutral-500">
                            <input type="text" value="{{ $customer->phone }}"
                                x-mask:dynamic="$input.startsWith('34') || $input.startsWith('37') ? '(99) 9 9999-9999' : '(99) 9 9999-9999'"
                                disabled></input>
                            <p>{{ $customer->email }}</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-span-2">
            <h1 class="text-2xl text-neutral-700">
                Pedidos desse cliente
            </h1>
            <div class="grid grid-cols-2 gap-6 mt-3">
                @foreach ($orders as $order)
                    <div class="bg-white rounded-xl p-4 border border-neutral-200">
                        <div class="flex items-start justify-between">

                            <h1 class="text-xl">Pedido <span class="text-red-500">#{{ $order->id }}</span></h1>

                            <div class="flex flex-col items-end gap-2">
                                <button
                                    class="flex items-center gap-1 text-xs font-bold text-neutral-700 bg-gray-200 rounded-md p-1">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="size-4" viewBox="0 0 24 24"
                                        fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                                        stroke-linejoin="round" class="lucide lucide-timer-icon lucide-timer">
                                        <line x1="10" x2="14" y1="2" y2="2" />
                                        <line x1="12" x2="15" y1="14" y2="11" />
                                        <circle cx="12" cy="14" r="8" />
                                    </svg>

                                    {{ $order->status }}
                                </button>
                            </div>
                        </div>

                        <div class="flex justify-between items-center text-xs text-neutral-500 mt-3">
                            <h1>{{ \Carbon\Carbon::parse($order->created_date)->translatedFormat('l, d, M, Y') }}</h1>
                            <span>{{ \Carbon\Carbon::parse($order->created_date)->translatedFormat('h:i') }}</span>
                        </div>
                        <div class="border border-gray-100 my-3"></div>

                        <div class="relative h-40 overflow-y-auto">
                            <table class="w-full text-sm text-left rtl:text-right">
                                <thead class="text-xs font-bold text-neutral-400">
                                    <tr>
                                        <th scope="col" class="p-1">
                                            Itens
                                        </th>
                                        <th scope="col" class="p-1 text-center">
                                            Qtd
                                        </th>
                                        <th scope="col" class="p-1 text-end">
                                            Preço
                                        </th>
                                    </tr>
                                </thead>
                                <tbody class="">
                                    @foreach ($order->items as $item)
                                        <tr class="text-xs font-bold text-neutral-600">
                                            <th scope="row" class="px-1 py-2 ">
                                                {{ $item->name }}
                                            </th>
                                            <td class="px-1 py-2 text-center">
                                                {{ $item->pivot->quantity }}
                                            </td>

                                            <td class="px-1 py-2 text-end">
                                                R${{ number_format($item->pivot->total, 2, ',', ' ') }}
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>

                        <div class="border border-gray-100 my-2"></div>

                        <div class="flex justify-between items-center text-sm font-bold text-neutral-700">
                            <span>Total</span>

                            <h1 class="text-orange-500">R${{ number_format($order->total, 2, ',', ' ') }}</h1>
                        </div>

                        <div class="flex items-center gap-2 mt-3">
                            <a href="{{ route('admin.pedidos.detalhe', ['codigo' => $order->id]) }}"
                                class="text-xs font-bold text-center uppercase text-green-500 bg-gray-200 rounded-xl w-full py-2 transition-all hover:scale-95 hover:cursor-pointer">
                                Detalhes
                            </a>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </div>
</div>
