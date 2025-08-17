<div class="px-2 sm:mx-auto xl:mx-3">
    <!-- Loading -->
    @include('includes.loading')
    <!-- ./Loading -->

    <h1 class="text-3xl text-neutral-600 my-6">
        Seus Pedidos
    </h1>


    <div class="col-span-2">
        <div class="grid grid-cols-4 gap-6">
            @foreach ($orders as $order)
                <div class="bg-white rounded-xl p-4 border border-neutral-200">
                    <div class="flex items-start justify-between">

                        <h1 class="text-xl">Pedido <span class="text-red-500">#{{ $order->id }}</span></h1>

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

                    {{-- <div class="flex items-center gap-2 mt-3">
                            <a href="{{ route('admin.pedidos.detalhe', ['codigo' => $order->id]) }}"
                                class="text-xs font-bold text-center uppercase text-green-500 bg-gray-200 rounded-xl w-full py-2 transition-all hover:scale-95 hover:cursor-pointer">
                                Detalhes
                            </a>
                        </div> --}}
                </div>
            @endforeach
        </div>
    </div>

</div>
