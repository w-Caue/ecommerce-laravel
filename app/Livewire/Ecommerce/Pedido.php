<?php

namespace App\Livewire\Ecommerce;

use App\Models\Order;
use App\Models\OrderItem;
use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class Pedido extends Component
{
    public $carrinho;
    public $enderecos;
    public $pagamento;

    public $valorProdutos;
    public $valorTotal;

    public $entrega;

    public function mount()
    {
        $this->carrinho();

        $this->formaPagamento();
    }

    public function carrinho()
    {
        $this->carrinho = session()->get('carrinho');

        $this->valorProdutos = 0;
        foreach ($this->carrinho as $index => $item) {
            $this->valorProdutos += $this->carrinho[$index]['total'];
        }
    }

    public function formaPagamento()
    {
        $pagamento = session()->get('pagamento');

        $this->pagamento = $pagamento;
    }

    public function finalizar()
    {
        $client = Auth::guard('customer')->user()->id;

        $order = Order::create([
            'customer_id' => $client,
            'status' => 'pending',
            'payment' => $this->pagamento,
            'created_date' => Carbon::now(),
            'total' => $this->valorProdutos,
        ]);

        $order->save();

        foreach ($this->carrinho as $index => $item) {
            OrderItem::create([
                'order_id' => $order->id,
                'product_id' => $this->carrinho[$index]['codigo'],
                'quantity' => $this->carrinho[$index]['quantidade'],
                'price' => $this->carrinho[$index]['total'],
                'total' => $this->carrinho[$index]['total'],
                'created_date' => Carbon::now(),
            ]);
        }

        return redirect()->route('ecommerce.pedidos');
    }

    public function render()
    {
        return view('livewire.ecommerce.pedido');
    }
}
