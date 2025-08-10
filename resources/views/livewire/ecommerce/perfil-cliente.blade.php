<div class="px-2 sm:mx-auto xl:mx-3">
    <!-- Loading -->
    @include('includes.loading')
    <!-- ./Loading -->

    <div class="flex justify-between mt-6">
        <h1 class="text-3xl text-neutral-600">
            Seus dados
        </h1>
        <h1 class="text-3xl text-neutral-600">
            Seus Pedidos
        </h1>
    </div>


    <div class="grid grid-cols-3 gap-5 mt-6">
        <div class=" bg-white rounded-xl p-5 border border-neutral-200">
            <div class="flex flex-col justify-center items-center gap-4 ">
                <div class="w-44">
                    <div class="shrink-0">
                        <label class="">
                            <img id='preview_img' accept="image/png, image/jpeg" x-on:change="fileChosen"
                                class="w-full object-cover rounded-full transition-all hover:scale-95"
                                src="{{ auth()->guard('customer')->user()->image }}" alt="Current profile photo" />

                            <input type='file' class="hidden" wire:model="img" x-on:change="fileChosen" />
                        </label>
                    </div>
                </div>

                <label class="w-full" for="">
                    <x-form.label value="Nome*" />

                    <x-form.input wire:model="name" id="name" type="text"
                        class="@error('name') is-invalid @enderror" name="name" value="{{ $customer->name }}"
                        placeholder="Insira seu nome"></x-form.input>

                    @error('name')
                        <span class="text-sm font-normal tracking-widest text-red-500" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </label>

                <label class="w-full" for="">
                    <x-form.label value="Email*" />

                    <x-form.input wire:model="email" id="email" type="email"
                        class="@error('email') is-invalid @enderror" name="email" value="{{ $customer->email }}"
                        placeholder="Insira seu email"></x-form.input>

                    @error('email')
                        <span class="text-sm font-normal tracking-widest text-red-500" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </label>

                <label class="w-full" for="">
                    <x-form.label value="Telefone*" />

                    <x-form.input wire:model="phone" id="phone" type="tel"
                        class="@error('phone') is-invalid @enderror" name="phone" value="{{ $customer->phone }}"
                        placeholder="Insira seu número"
                        x-mask:dynamic="$input.startsWith('34') || $input.startsWith('37') ? '(99) 9 9999-9999' : '(99) 9 9999-9999'"></x-form.input>

                    @error('phone')
                        <span class="text-sm font-normal tracking-widest text-red-500" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </label>
            </div>

            <h1 class="text-xl text-neutral-600 mt-5">Alterar a senha</h1>

            <div class="flex items-center gap-4 ">

                <div class="w-56">
                    <x-form.label value="Senha atual" />
                    <x-form.input type="password" wire:model="password" placeholder="********" />
                </div>

                <div class="w-56">
                    <x-form.label value="Nova senha" />
                    <x-form.input type="password" wire:model="newpassword" placeholder="********" />
                </div>
            </div>

            <div class="flex justify-end">
                <button wire:click="edit()"
                    class="flex items-center gap-1 text-xs uppercase text-white bg-blue-500 px-3 py-2 mt-5 rounded-md hover:bg-blue-700 transition-all hover:scale-95 hover:cursor-pointer">
                    Salvar
                </button>
            </div>
        </div>

        <div class="col-span-2">
            <div class="grid grid-cols-2 gap-6">
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

</div>
