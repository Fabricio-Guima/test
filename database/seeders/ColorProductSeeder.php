<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Product;
use Illuminate\Database\Eloquent\Builder;

class ColorProductSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // pegar produtos em que subcategoria seja subcategoria.color true e subcategoria.size false

        // whereHas permite fazer consultas nas tabelas que tem relação com Product
        // subcategory = nome da relação entre product e subcategory
        $products = Product::whereHas('subcategory', function (Builder $query) {
            $query->where('color', true)->where('size', false);

        })->get();

        // quantidade vai como campo pivot na tabela color_product
        foreach ($products as $product) {
            $product->colors()->attach([
                1 => [
                    'quantity' => 10
                ],
                2 => [
                    'quantity' => 10
                ],
                3 => [
                    'quantity' => 10
                ],
                4 => [
                    'quantity' => 10
                ]
            ]);
        }
    }
}
