<?php

namespace App\Livewire\App\Product;

use App\Models\Category;
use App\Models\CustomerImage;
use App\Models\Product;
use Livewire\Attributes\Layout;
use Livewire\Component;
use Livewire\WithFileUploads;
use Livewire\WithPagination;

class Listing extends Component
{
    use WithFileUploads, WithPagination;

    public $sortField = 'id';
    public $sortAsc = true;

    public $porPagina = 5;

    public $search;

    public $name;

    public $description;

    public $price;

    public $stock;

    public $img;

    public function sortBy($field)
    {
        if ($this->sortField === $field) {
            $this->sortAsc = !$this->sortAsc;
        } else {
            $this->sortAsc = true;
        }
        $this->sortField = $field;
    }

    public function dados()
    {
        $produtos = Product::select([
            'products.*'
        ])
            ->when(!empty($this->search), function ($query) {
                return $query->where($this->sortField, 'LIKE', '%' . $this->search . '%');
            })

            ->orderBy($this->sortField, $this->sortAsc ? 'DESC' : 'ASC')

            ->paginate($this->porPagina);

        return $produtos;
    }

    public function save()
    {
        $blob = '';

        if ($this->img) {
            $path = $this->img->getRealPath();
            $mimetype = pathinfo($path, PATHINFO_EXTENSION);

            $source = file_get_contents($path);
            $base64 = base64_encode($source);
            $blob = 'data:' . $mimetype . ';base64,' . $base64;
        }

        $usuario = Product::create([
            'name' => $this->name,
            'description' => $this->description,
            'price' => $this->price,
            'stock' => $this->stock,
            'image' => $blob,
        ]);

        // $usuario = CustomerImage::create([
        //     'image' => $blob,
        // ]);

        $this->dispatch('close-modal-medium');

        $this->reset();

        return $usuario;
    }

    public function getCategories(){
        $categories = Category::all();

        return $categories;
    }

    #[Layout('components.layouts.app')]
    public function render()
    {
        return view('livewire.app.product.listing', [
            'products' => $this->dados(),
            'categories' => $this->getCategories()
        ]);
    }
}
