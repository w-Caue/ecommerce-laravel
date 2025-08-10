<?php

namespace App\Livewire\Forms\Product;

use App\Models\Product;
use Livewire\Attributes\Validate;
use Livewire\Form;

class ProductForm extends Form
{
    public $cod;

    #[Validate('required')]
    public $name;

    #[Validate('required')]
    public $description;

    // #[Validate('number')]
    public $price;

    // #[Validate('number')]
    public $stock;

    public $status;

    public $img;

    public function setPackage($cod)
    {
        $package = Product::where('id', $cod)->first();

        $this->cod = $cod;

        $this->name = $package->name;
        $this->description = $package->description;

        $this->price = $package->price;
        $this->stock = $package->stock;

        $this->status = $package->active;
        $this->img = $package->image;
    }

    public function edit()
    {
        // $blob = '';

        // if ($this->img) {
        //     $path = $this->img->getRealPath();
        //     $mimetype = pathinfo($path, PATHINFO_EXTENSION);

        //     $source = file_get_contents($path);
        //     $base64 = base64_encode($source);
        //     $blob = 'data:' . $mimetype . ';base64,' . $base64;
        // }

        $package = Product::where('id', $this->cod)->update([
            'name' => $this->name,
            'description' => $this->description,
            'price' => $this->price,
            'stock' => $this->stock,
            'active' => $this->status,
            // 'image' => $blob,
        ]);

        return $package;
    }
}
