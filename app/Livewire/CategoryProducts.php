<?php

namespace App\Livewire;

use Livewire\Component;

class CategoryProducts extends Component
{
    public $category;

    public $products = [];

    public function loadProducts()
    {
        $this->products = $this->category->products;
         // só execute o carousel após eu carregar todos os produtos
        $this->dispatch('glider', id: $this->category->id);

    }

    public function render()
    {
        return view('livewire.category-products');
    }
}
