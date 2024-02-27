<?php

namespace Database\Seeders;

use App\Models\Brand;
use App\Models\Category;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $categories = [
            [
                'name' => 'Celulares e tablets',
                'slug' => Str::slug('Celulares e tablets'),
                'icon' => '<i class="fa fa-mobile" aria-hidden="true"></i>'
            ],

            [
                'name' => 'TV, áudio e vídeo',
                'slug' => Str::slug('TV, áudio e vídeo'),
                'icon' => '<i class="fa fa-television" aria-hidden="true"></i>'
            ],

            [
                'name' => 'Console ou Vídeo Games',
                'slug' => Str::slug('Console ou Vídeo Games'),
                'icon' => '<i class="fa-solid fa-gamepad"></i>'
            ],

            [
                'name' => 'Computação',
                'slug' => Str::slug('Computação'),
                'icon' => '<i class="fa-solid fa-computer"></i>'
            ],

            [
                'name' => 'Moda',
                'slug' => Str::slug('Moda'),
                'icon' => '<i class="fa-solid fa-shirt"></i>'
            ],
        ];

        foreach($categories as $category) {
           $category = Category::factory(1)->create($category)->first();
            $brands = Brand::factory(4)->create();

            foreach ($brands as $brand) {
                $brand->categories()->attach($category->id);
            }
        }
    }
}
