<?php

namespace App\Livewire\App\Order;

use App\Models\Order;
use App\Models\OrderItem;
use Jantinnerezo\LivewireAlert\Facades\LivewireAlert;
use Livewire\Attributes\Layout;
use Livewire\Component;

class Detail extends Component
{
    public $sortField = 'id';
    public $sortAsc = true;

    public $porPagina = 5;

    public $orderId;

    public $status;
    public $observation;

    public function sortBy($field)
    {
        if ($this->sortField === $field) {
            $this->sortAsc = !$this->sortAsc;
        } else {
            $this->sortAsc = true;
        }
        $this->sortField = $field;
    }

    public function mount($codigo)
    {
        $this->orderId = $codigo;
    }

    public function dados()
    {
        $items = OrderItem::select([
            'order_items.*',
            'products.id as id_product',
            'products.name',
            'products.image',
            'products.price as product_price',
        ])
            ->leftjoin('products', 'products.id', '=', 'order_items.product_id')
            ->where('order_id', $this->orderId);

        // $total = 0;
        // foreach ($items as $item) {
        //     $total += $item->price;
        // }
        // $this->totalLista = $total;

        return $items->get();
    }

    public function setOrder()
    {
        $order = Order::select([
            'orders.customer_id',
            'orders.*',
            'customers.name as customer_name',
            'customers.email as customer_email',
            'customers.phone as customer_phone',
            'customers.image as customer_image',
        ])
            ->leftjoin('customers', 'customers.id', '=', 'orders.customer_id')
            ->where('orders.id', $this->orderId)
            ->first();

        $this->status = $order->status;
        $this->observation = $order->observation;

        return $order;
    }

    public function save()
    {
        Order::where('id', $this->orderId)->update([
            'status' => $this->status,
            'observation' => $this->observation,
        ]);

        return LivewireAlert::title('Alteração feita!')
            // ->toast()
            ->success()
            ->show();
    }

    #[Layout('layouts.app')]
    public function render()
    {
        return view('livewire.app.order.detail', [
            'items' => $this->dados(),
            'order' => $this->setOrder()
        ]);
    }
}
