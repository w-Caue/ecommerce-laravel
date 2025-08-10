<?php

namespace App\Livewire\Ecommerce;

use App\Models\Product;
use Livewire\Component;
use Livewire\WithPagination;

class Produtos extends Component
{
    use WithPagination;

    public function dados()
    {
        $products = Product::select([
            'products.*'
        ])->paginate();

        return $products;
    }

    public function render()
    {
        return view('livewire.ecommerce.produtos', [
            'products' => $this->dados()
        ]);
    }
}
