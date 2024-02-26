<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Product;
use Illuminate\Database\Eloquent\Builder;

class SizeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //acho que quando size for true em subcategoria,
        // nao vou usar o size da tabela produto e sim a tabela size
        // whereHas permite fazer consultas nas tabelas que tem relação com Product
        // subcategory = nome da relação entre product e subcategory
        $products = Product::whereHas('subcategory', function (Builder $query) {
            $query->where('color', true)->where('size', true);

        })->get();

        $sizes = ['Tamanho P', 'Tamanho M', 'Tamanho G'];

        foreach ($products as $product) {

            foreach ($sizes as $size) {

                $product->sizes()->create([
                    'name' => $size,
                ]);
            }


        }
    }
}
