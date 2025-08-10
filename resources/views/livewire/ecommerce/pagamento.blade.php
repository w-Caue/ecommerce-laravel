<div>
    <div class="flex flex-col items-start gap-5 my-10 mx-7 md:flex-row">
        <div class="w-full md:w-2/3">

            <div class="rounded-xl shadow-md bg-white px-10 py-5">
                <h1 class="text-sm tracking-widest font-semibold uppercase text-gray-400 mb-4">
                    Selecione a Forma de Pagamento
                </h1>

                <div class="grid grid-cols-2 gap-4">
                    <div>
                        <input wire:model="pagamento" wire:click="formaPagamento()" type="radio" id="dinheiro"
                            name="hosting" value="Dinheiro" class="hidden peer" required />
                        <label for="dinheiro"
                            class="inline-flex items-center justify-between w-full p-2 text-neutral-600 bg-white border border-neutral-200 rounded-xl cursor-pointer peer-checked:border-purple-600 peer-checked:text-purple-600 peer-checked:bg-purple-100 hover:text-gray-600 hover:bg-gray-100">

                            <div class="flex gap-2 items-center">
                                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                    stroke-width="1.5" stroke="currentColor" class="w-9 h-9">
                                    <path stroke-linecap="round" stroke-linejoin="round"
                                        d="M2.25 18.75a60.07 60.07 0 0 1 15.797 2.101c.727.198 1.453-.342 1.453-1.096V18.75M3.75 4.5v.75A.75.75 0 0 1 3 6h-.75m0 0v-.375c0-.621.504-1.125 1.125-1.125H20.25M2.25 6v9m18-10.5v.75c0 .414.336.75.75.75h.75m-1.5-1.5h.375c.621 0 1.125.504 1.125 1.125v9.75c0 .621-.504 1.125-1.125 1.125h-.375m1.5-1.5H21a.75.75 0 0 0-.75.75v.75m0 0H3.75m0 0h-.375a1.125 1.125 0 0 1-1.125-1.125V15m1.5 1.5v-.75A.75.75 0 0 0 3 15h-.75M15 10.5a3 3 0 1 1-6 0 3 3 0 0 1 6 0Zm3 0h.008v.008H18V10.5Zm-12 0h.008v.008H6V10.5Z" />
                                </svg>


                                <h1 class="text-lg">Dinheiro</h1>
                            </div>
                        </label>
                    </div>

                    <div>
                        <input wire:model="pagamento" wire:click="formaPagamento()" type="radio" id="visa-credito"
                            name="hosting" value="Pix" class="hidden peer" required />
                        <label for="visa-credito"
                            class="inline-flex items-center justify-between w-full p-2 text-neutral-600 bg-white border border-neutral-200 rounded-xl cursor-pointer peer-checked:border-purple-600 peer-checked:text-purple-600 peer-checked:bg-purple-100 hover:text-gray-600 hover:bg-gray-100">

                            <div class="flex gap-2 items-center">
                                <svg xmlns="http://www.w3.org/2000/svg" class="size-9" fill="#000000"
                                    viewBox="0 0 256 256">
                                    <path
                                        d="M235.34,116.72,139.28,20.66a16,16,0,0,0-22.56,0L20.66,116.72a16,16,0,0,0,0,22.56l96.06,96.06a16,16,0,0,0,22.56,0l96.06-96.06A16,16,0,0,0,235.34,116.72ZM128,32,184,88H160a8,8,0,0,0-5.66,2.34L128,116.68,101.66,90.34A8,8,0,0,0,96,88H72ZM56,104H92.68l24,24-24,24H56L32,128Zm72,120L72,168H96a8,8,0,0,0,5.66-2.34L128,139.31l26.34,26.35A8,8,0,0,0,160,168h24Zm72-72H163.32l-24-24,24-24H200l24,24Z">
                                    </path>
                                </svg>

                                <h1 class="text-lg">Pix</h1>
                            </div>
                        </label>
                    </div>

                    <div>
                        <input wire:model="pagamento" wire:click="formaPagamento()" type="radio" id="master-credito"
                            name="hosting" value="Cartão Crédito" class="hidden peer" required />
                        <label for="master-credito"
                            class="inline-flex items-center justify-between w-full p-2 text-neutral-600 bg-white border border-neutral-200 rounded-xl cursor-pointer peer-checked:border-purple-600 peer-checked:text-purple-600 peer-checked:bg-purple-100 hover:text-gray-600 hover:bg-gray-100">

                            <div class="flex gap-2 items-center">
                                <svg xmlns="http://www.w3.org/2000/svg" class="size-9" fill="#525252"
                                    viewBox="0 0 256 256">
                                    <path
                                        d="M224,48H32A16,16,0,0,0,16,64V192a16,16,0,0,0,16,16H224a16,16,0,0,0,16-16V64A16,16,0,0,0,224,48Zm0,16V88H32V64Zm0,128H32V104H224v88Zm-16-24a8,8,0,0,1-8,8H168a8,8,0,0,1,0-16h32A8,8,0,0,1,208,168Zm-64,0a8,8,0,0,1-8,8H120a8,8,0,0,1,0-16h16A8,8,0,0,1,144,168Z">
                                    </path>
                                </svg>

                                <h1 class="text-lg">Cartão Crédito</h1>
                            </div>
                        </label>
                    </div>

                    <div>
                        <input wire:model="pagamento" wire:click="formaPagamento()" type="radio" id="visa-debito"
                            name="hosting" value="Cartão Debito" class="hidden peer" required />
                        <label for="visa-debito"
                            class="inline-flex items-center justify-between w-full p-2 text-neutral-600 bg-white border border-neutral-200 rounded-xl cursor-pointer peer-checked:border-purple-600 peer-checked:text-purple-600 peer-checked:bg-purple-100 hover:text-gray-600 hover:bg-gray-100">

                            <div class="flex gap-2 items-center">
                                <svg xmlns="http://www.w3.org/2000/svg" class="size-9" fill="#525252"
                                    viewBox="0 0 256 256">
                                    <path
                                        d="M224,48H32A16,16,0,0,0,16,64V192a16,16,0,0,0,16,16H224a16,16,0,0,0,16-16V64A16,16,0,0,0,224,48Zm0,16V88H32V64Zm0,128H32V104H224v88Zm-16-24a8,8,0,0,1-8,8H168a8,8,0,0,1,0-16h32A8,8,0,0,1,208,168Zm-64,0a8,8,0,0,1-8,8H120a8,8,0,0,1,0-16h16A8,8,0,0,1,144,168Z">
                                    </path>
                                </svg>

                                <h1 class="text-lg">Cartão Debito</h1>
                            </div>
                        </label>
                    </div>
                </div>

            </div>
        </div>


        <div class="w-full h-auto px-8 py-10 rounded-xl shadow-md bg-white md:w-1/3">
            <div class="flex justify-between py-4 text-gray-600 border-b">
                <span>Itens: </span>
                <span>R${{ number_format($valorProdutos, 2, ',', '') }} </span>
            </div>

            @if ($pagamento)
                <div class="flex items-center justify-between py-4 text-neutral-600 border-b">
                    <span class="">Pagamento: </span>

                    <span class="">{{ $pagamento }}</span>
                </div>
            @endif

            <div class="flex justify-between py-4 text-lg  text-neutral-600">
                <span>Total: </span>
                <span class="text-xl text-orange-500">R${{ number_format($valorProdutos, 2, ',', '') }} </span>
            </div>

            @if ($pagamento)
                <a href="{{ route('pedido') }}"
                    class="flex justify-center items-center gap-2 text-white text-xs font-bold uppercase bg-purple-500 py-2 mt-3 w-full rounded-lg transition-all hover:scale-95">
                    Continuar
                </a>
            @else
                <a href=""
                    class="flex justify-center items-center gap-2 text-neutral-400 text-xs font-bold uppercase bg-white border border-neutral-300 py-2 mt-3 w-full rounded-lg transition-all hover:scale-95">
                    Continuar
                </a>
            @endif

        </div>

    </div>
</div>
