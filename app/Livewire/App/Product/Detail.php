<?php

namespace App\Livewire\App\Product;

use App\Livewire\Forms\Product\ProductForm;
use Livewire\Component;

class Detail extends Component
{
    public $codPackage;

    public ProductForm $form;

    public function mount($codigo)
    {
        $this->codPackage = $codigo;

        $this->form->setPackage($codigo);
    }

    public function edit()
    {
        $this->form->edit();
    }

    public function render()
    {
        return view('livewire.app.product.detail');
    }
}
