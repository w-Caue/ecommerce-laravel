<?php

namespace App\Livewire\Ecommerce;

use App\Models\Order;
use Livewire\Component;

class ContaPedidos extends Component
{
     public function orders()
    {
        $customer = auth()->guard('customer')->user()->id;
        
        $orders = Order::select([
            'orders.*'
        ])
            ->where('customer_id', $customer)
            ->get();

        return $orders;
    }

    public function render()
    {
        return view('livewire.ecommerce.conta-pedidos', [
            'orders' => $this->orders(),
        ]);
    }
}
