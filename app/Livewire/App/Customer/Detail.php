<?php

namespace App\Livewire\App\Customer;

use App\Models\Customer;
use App\Models\Order;
use Livewire\Component;

class Detail extends Component
{
    public $customerId;

    public function mount($codigo)
    {
        $this->customerId = $codigo;
    }

    public function dados()
    {
        $customer = Customer::select([
            'customers.*',
        ])
            ->where('id', $this->customerId)
            ->first();

        return $customer;
    }

    public function orders()
    {
        $orders = Order::select([
            'orders.*'
        ])
            ->where('customer_id', $this->customerId)
            ->get();

        return $orders;
    }

    public function render()
    {
        return view('livewire.app.customer.detail', [
            'customer' => $this->dados(),
            'orders' => $this->orders(),
        ]);
    }
}
