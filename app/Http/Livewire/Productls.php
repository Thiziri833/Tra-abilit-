<?php

namespace App\Http\Livewire;

use App\Models\Product;
use Livewire\Component;

class Productls extends Component
{
    public $lineProducts = [];
    public $allProducts = [];

    public function mount()
    {
        $this->allProducts = Product::all();
        $this->lineProducts = [
            ['product_id' => '', 'cadence' => 1, 'uniteprod'=>'']
        ];
    }

    public function addProduct()
    {
        $this->lineProducts[] = ['product_id' => '', 'cadence' => 1, 'uniteprod'=>''];
    }

    public function removeProduct($index)
    {
        unset($this->lineProducts[$index]);
        $this->lineProducts = array_values($this->lineProducts);
    }

    public function render()
    {
        info($this->lineProducts);
        return view('livewire.productls');
    }
}
