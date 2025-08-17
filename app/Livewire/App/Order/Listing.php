<?php

namespace App\Livewire\App\Order;

use App\Models\Order;
use Livewire\Attributes\Layout;
use Livewire\Component;

class Listing extends Component
{
    public $sortField = 'orders.id';
    public $sortAsc = true;

    public $search;

    public $porPagina = 5;

    public function sortBy($field)
    {
        if ($this->sortField === $field) {
            $this->sortAsc = !$this->sortAsc;
        } else {
            $this->sortAsc = true;
        }
        $this->sortField = $field;
    }

    public function dados()
    {
        $orders = Order::select([
            'orders.customer_id',
            'orders.*',
            'customers.name as customer_name',
            'customers.image as customer_image',
        ])
            ->leftjoin('customers', 'customers.id', '=', 'orders.customer_id')

            ->when(!empty($this->search), function ($query) {
                return $query->where($this->sortField, 'LIKE', '%' . $this->search . '%');
            })

            ->orderBy($this->sortField, $this->sortAsc ? 'DESC' : 'ASC');

        return $orders->paginate(5);
    }

    #[Layout('components.layouts.app')]
    public function render()
    {
        return view('livewire.app.order.listing', [
            'orders' => $this->dados()
        ]);
    }
}
