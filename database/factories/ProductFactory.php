<?php

namespace Database\Factories;

use App\Models\Subcategory;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;
/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Product>
 */
class ProductFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $name = fake()->sentence(2);
        $subcategory = Subcategory::all()->random();
        $category = $subcategory->category;

        // quero uma marca que tem ligacao com categoria e que essa categoria
        // tem ligação com uma subcategoria e que essa subcategoria está ligada
        // a produto
        $brand = $category->brands->random();


        if($subcategory->color) {
            $quantity = null;
        }else {
            $quantity = 15;
        }

        return [
            "subcategory_id" => $subcategory->id,
            "brand_id" => $brand->id,
            "name" => $name,
            "slug" => Str::slug($name),
            "description" => fake()->text(),
            "price" => fake()->randomElement([19.99, 49.99, 99.99]),
            'quantity' => $quantity,
            'status' => 2
        ];
    }
}
