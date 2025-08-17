<?php

namespace App\Livewire\App\Order;

use App\Models\Order;
use Livewire\Component;

class CardsOrders extends Component
{
    public $ordersPending;

    public $ordersPaid;

    public $ordersCompleted;

    public $ordersCancelled;

    public function dados()
    {
        $this->ordersPending = Order::select('id')->where('status', 'pending')->count();

        $this->ordersPaid = Order::select('id')->where('status', 'paid')->count();

        $this->ordersCompleted = Order::select('id')->where('status', 'completed')->count();

        $this->ordersCancelled = Order::select('id')->where('status', 'cancelled')->count();
    }

    public function render()
    {
        return view('livewire.app.order.cards-orders', [
            'dados' => $this->dados()
        ]);
    }
}
