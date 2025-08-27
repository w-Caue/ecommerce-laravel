<?php

namespace App\Livewire\Ecommerce;

use App\Models\Product;
use Livewire\Attributes\Layout;
use Livewire\Component;
use Livewire\WithPagination;

class TodosProdutos extends Component
{
    use WithPagination;

    public $porPagina = "20";

    public function dados()
    {
        $products = Product::select(
            'products.*'
        )
            ->paginate($this->porPagina);

        return $products;
    }

    #[Layout('layouts.ecommerce')]
    public function render()
    {
        return view('livewire.ecommerce.todos-produtos', [
            'products' => $this->dados()
        ]);
    }
}
