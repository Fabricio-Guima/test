<?php

namespace App\Livewire;

use Livewire\Component;

class AddCartItem extends Component
{
    public $qty = 1;

    public $totalQuantityProduct;

    public $product;

    public function mount()
    {
        $this->totalQuantityProduct = $this->product->quantity;
    }

    public function decrement()
    {
        if($this->qty == 1) {
            return;
        }

        $this->qty = $this->qty - 1;
    }

    public function increment()
    {
        if( $this->qty >= $this->totalQuantityProduct) {
            return;
        }

        $this->qty = $this->qty + 1;
    }

    public function render()
    {
        return view('livewire.add-cart-item');
    }
}
