<?php

namespace App\Livewire\App\Product;

use App\Livewire\Forms\Product\ProductForm;
use App\Models\Category;
use App\Models\Product;
use Jantinnerezo\LivewireAlert\Facades\LivewireAlert;
use Livewire\Component;

class Detail extends Component
{
    public $codPackage;

    public ProductForm $form;

    public function mount(Product $product)
    {
        $this->codPackage = $product->id;

        $this->form->setPackage($product);
    }

    public function edit()
    {
        $this->form->edit();

        return LivewireAlert::title('Salvo com Sucesso!')
            // ->toast()
            ->success()
            ->show();
    }

    public function getCategories()
    {
        $categories = Category::all();

        return $categories;
    }

    public function render()
    {
        return view('livewire.app.product.detail', [
            'categories' => $this->getCategories(),
        ]);
    }
}
