<?php

namespace App\Livewire;

use App\Models\Product;
use App\Models\Subcategory;
use Illuminate\Database\Eloquent\Builder;
use Livewire\Component;

use Livewire\WithPagination;

class CategoryFilter extends Component
{
    // com isso, a página não é recarregada, somente os produtos
    use WithPagination;
    public $category;
    public $subcategoria;
    public $marca;

    public $view = 'list';

    public function resetFilter()
    {
        $this->reset(['subcategoria', 'marca']);
    }
    public function render()
    {
        // $products = $this->category->products()
        //     ->where('status', 2)
        //     ->paginate(20);

       $products = Product::query()
        ->whereHas('subcategory.category', function (Builder $query) {
            $query->where('id', $this->category->id);
        })
        ->when($this->subcategoria, function ($query) {
            return $query->whereHas('subcategory', function (Builder $query) {
                $query->where('name', $this->subcategoria);
            });
        })
        ->when($this->marca, function ($query) {
            return $query->whereHas('brand', function (Builder $query) {
                $query->where('name', $this->marca);
            });
        })
        ->paginate(20);


        return view('livewire.category-filter', compact('products'));
    }
}
