<?php

namespace App\Livewire;

use Livewire\Component;

class AddCartItemColor extends Component
{
    public $product;

    public $totalColorsFromProduct;

    public function mount()
    {
        $this->totalColorsFromProduct = $this->product->colors;
    }
    public function render()
    {
        return view('livewire.add-cart-item-color');
    }
}
