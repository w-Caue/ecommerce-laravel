<div class="px-2 sm:mx-auto xl:mx-3">
    <!-- Loading -->
    @include('includes.loading')
    <!-- ./Loading -->

    <div class="grid grid-cols-4 items-start mt-5">
        <div>
            <div class="flex justify-between">

                <div class="space-y-2 mx-4 p-4 rounded-xl transition-all duration-300 bg-white w-full">

                    <div class="flex items-center gap-2">
                        <a href="{{ route('admin.contas') }}"
                            class="flex justify-center items-center gap-2 rounded-xl hover:bg-gray-100 hover:cursor-pointer">

                            <img src="{{ auth()->guard('customer')->user()->image ?? '' }}"
                                class="object-cover object-center rounded-full size-14 border border-gray-100"
                                alt="ft-perfil">

                            <h1 class="font-black text-neutral-600">
                                {{ auth()->guard('customer')->user()->name ?? '' }}
                            </h1>
                        </a>
                    </div>

                    <div class="relative space-y-4 text-xs uppercase font-bold mt-3">

                        {{-- <div class="border border-gray-200"></div> --}}

                        {{-- HOME --}}
                        <a href="{{ route('ecommerce.perfil') }}"
                            class="relative flex justify-between items-center space-x-2 p-2 cursor-pointer hover:bg-gray-100 text-neutral-500 rounded-xl hover:text-blue-500">
                            <div class="flex items-center space-x-2">
                                <svg xmlns="http://www.w3.org/2000/svg" class="size-6" viewBox="0 0 24 24"
                                    fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                                    stroke-linejoin="round" class="lucide lucide-user-round-icon lucide-user-round">
                                    <circle cx="12" cy="8" r="5" />
                                    <path d="M20 21a8 8 0 0 0-16 0" />
                                </svg>

                                <h1>
                                    Minha conta
                                </h1>
                            </div>
                        </a>

                        <a href="{{ route('ecommerce.pedidos') }}"
                            class="relative flex justify-between items-center space-x-2 p-2 cursor-pointer bg-gray-100 text-blue-500 rounded-r-xl border-l-2 border-blue-500">
                            <div class="flex items-center space-x-2">
                                <svg xmlns="http://www.w3.org/2000/svg" class="size-6" viewBox="0 0 24 24"
                                    fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                                    stroke-linejoin="round"
                                    class="lucide lucide-shopping-cart-icon lucide-shopping-cart">
                                    <circle cx="8" cy="21" r="1" />
                                    <circle cx="19" cy="21" r="1" />
                                    <path
                                        d="M2.05 2.05h2l2.66 12.42a2 2 0 0 0 2 1.58h9.78a2 2 0 0 0 1.95-1.57l1.65-7.43H5.12" />
                                </svg>

                                <h1>
                                    Meus Pedidos
                                </h1>
                            </div>
                        </a>

                        <a href="{{ route('ecommerce.logout') }}"
                            class="relative flex justify-between items-center space-x-2 p-2 cursor-pointer hover:bg-gray-100 text-neutral-500 rounded-xl hover:text-blue-500">
                            <div class="flex items-center space-x-2">
                                <svg xmlns="http://www.w3.org/2000/svg" class="size-6" viewBox="0 0 24 24"
                                    fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                                    stroke-linejoin="round" class="lucide lucide-log-out-icon lucide-log-out">
                                    <path d="m16 17 5-5-5-5" />
                                    <path d="M21 12H9" />
                                    <path d="M9 21H5a2 2 0 0 1-2-2V5a2 2 0 0 1 2-2h4" />
                                </svg>

                                <h1>
                                    Sair da Conta
                                </h1>
                            </div>
                        </a>

                    </div>
                </div>
            </div>
        </div>
        <div class="col-span-3">
            <h1 class="text-3xl text-neutral-600 my-6">
                Seus Pedidos
            </h1>

            <div class="grid grid-cols-3 gap-6">
                @forelse ($orders as $order)
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
                @empty
                    <div class="text-lg font-black uppercase text-red-500">
                        <h1>Nenhum pedido criado ainda!</h1>
                    </div>
                @endforelse
            </div>
        </div>

    </div>

</div>
