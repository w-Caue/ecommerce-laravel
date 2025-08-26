<?php

namespace App\Livewire\Ecommerce;

use App\Models\Product;
use Livewire\Attributes\Layout;
use Livewire\Component;

class DetalheProduto extends Component
{
    public Product $product;

    public function mount(){
        // dd($this->product->name);
    }

    #[Layout('layouts.ecommerce')]
    public function render()
    {
        return view('livewire.ecommerce.detalhe-produto');
    }
}
