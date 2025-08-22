<?php

namespace App\Livewire\Ecommerce;

use App\Models\Product;
use Livewire\Component;
use Livewire\WithPagination;

class Produtos extends Component
{
    use WithPagination;

    public function promocoes()
    {
        $products = Product::select([
            'products.*'
        ])->paginate();

        return $products;
    }

    public function destaques()
    {
        $products = Product::select([
            'products.*'
        ])->paginate();

        return $products;
    }

    public function render()
    {
        return view('livewire.ecommerce.produtos', [
            'products' => $this->promocoes(),
            'destaques' => $this->destaques(),
        ]);
    }
}
