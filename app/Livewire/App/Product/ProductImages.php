<?php

namespace App\Livewire\App\Product;

use App\Models\Product;
use App\Models\ProductImage;
use Jantinnerezo\LivewireAlert\Facades\LivewireAlert;
use Livewire\Component;
use Livewire\WithFileUploads;

class ProductImages extends Component
{
    use WithFileUploads;

    public $product;
    public $images = []; // novos uploads
    public $existingImages = []; // imagens do banco

    public function mount(Product $product)
    {
        $this->product = $product;
        $this->loadImages();
    }

    public function updatedImages()
    {
        $this->validate([
            'images.*' => 'image|max:2048',
        ]);

        $this->save();
    }

    public function save()
    {
        foreach ($this->images as $image) {

            $path = $image->getRealPath();
            $mimetype = pathinfo($path, PATHINFO_EXTENSION);

            $source = file_get_contents($path);
            $base64 = base64_encode($source);
            $blob = 'data:' . $mimetype . ';base64,' . $base64;

            ProductImage::create([
                'product_id' => $this->product->id,
                'image' => $blob, // conteúdo binário
                'mime_type' => $mimetype,
            ]);
        }

        $this->images = [];
        $this->loadImages();

        return LivewireAlert::title('Imagem Salva!')
            ->toast()
            ->success()
            ->show();
    }

    public function removeExistingImage($id)
    {
        $image = ProductImage::find($id);

        if ($image) {
            $image->delete();
        }

        $this->loadImages();

        return LivewireAlert::title('Imagem Deletada!')
            ->toast()
            ->success()
            ->show();
    }

    public function removeNewImage($index)
    {
        unset($this->images[$index]);
        $this->images = array_values($this->images);
    }

    private function loadImages()
    {
        $this->existingImages = $this->product->images()->get();
    }

    public function render()
    {
        return view('livewire.app.product.product-images');
    }
}
