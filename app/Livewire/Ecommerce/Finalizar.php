<?php

namespace App\Livewire\Ecommerce;

use Livewire\Attributes\Layout;
use Livewire\Component;

class Finalizar extends Component
{
    public $pedido;

    public function mount($codigo)
    {
        $this->pedido = $codigo;
    }

    public function informacoes()
    {
        session()->remove('carrinho');
        session()->remove('entrega');
        session()->remove('pagamento');
    }

    // #[Layout('components.layouts.ecommerce')]
    public function render()
    {
        $this->informacoes();

        return view('livewire.ecommerce.finalizar');
    }
}
