<?php

namespace App\Livewire\App;

use Livewire\Attributes\Layout;
use Livewire\Component;

class Pedidos extends Component
{
    #[Layout('components.layouts.app')]
    public function render()
    {
        return view('livewire.app.pedidos');
    }
}
