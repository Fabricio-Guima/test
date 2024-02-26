<?php

namespace Database\Seeders;

use App\Models\Subcategory;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;

class SubcategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $subcategories = [
            // 'Celulares e tablets'
            [

                'category_id' => 1,
                'name' => 'Celulares e Smartphones',
                'slug' => Str::slug('Celulares e Smartphones'),
                'color' => true
            ],

            [

                'category_id' => 1,
                'name' => 'Acessórios para Celulares',
                'slug' => Str::slug('Acessórios para Celulares'),
            ],

            [

                'category_id' => 1,
                'name' => 'Smartwatches',
                'slug' => Str::slug('Smartwatches'),
            ],

            // 'TV, áudio e vídeo'
            [

                'category_id' => 2,
                'name' => 'TV e Áudio',
                'slug' => Str::slug('TV e Áudio'),
            ],

            [

                'category_id' => 2,
                'name' => 'Áudios',
                'slug' => Str::slug('Áudios'),
            ],

            [

                'category_id' => 2,
                'name' => 'Alto Falantes',
                'slug' => Str::slug('Alto Falantes'),
            ],

            // 'Console ou Vídeo Games'
            [
                'category_id' => 3,
                'name' => 'Xbox',
                'slug' => Str::slug('Xbox'),
            ],

            [
                'category_id' => 3,
                'name' => 'Playstation',
                'slug' => Str::slug('Playstation'),
            ],

            [
                'category_id' => 3,
                'name' => 'Jogos para PC',
                'slug' => Str::slug('Jogos para PC'),
            ],

            [
                'category_id' => 3,
                'name' => 'Nintendo',
                'slug' => Str::slug('Nintendo'),
            ],

            // 'Computação'
            [
                'category_id' => 4,
                'name' => 'Notebooks',
                'slug' => Str::slug('Notebooks'),
            ],

            [
                'category_id' => 4,
                'name' => 'PC Desktop',
                'slug' => Str::slug('PC Desktop'),
            ],

            [
                'category_id' => 4,
                'name' => 'Acessórios de Computador',
                'slug' => Str::slug('Acessórios de Computador'),
            ],

            [
                'category_id' => 4,
                'name' => 'Armazenamento',
                'slug' => Str::slug('Armazenamento'),
            ],

            // 'Moda'
            [
                'category_id' => 5,
                'name' => 'Mulheres',
                'slug' => Str::slug('Mulheres'),
                'color' => true,
                'size' => true
            ],

            [
                'category_id' => 5,
                'name' => 'Homens',
                'slug' => Str::slug('Homens'),
                'color' => true,
                'size' => true
            ],

            [
                'category_id' => 5,
                'name' => 'Lentes',
                'slug' => Str::slug('Lentes'),
            ],

            [
                'category_id' => 5,
                'name' => 'Relógios',
                'slug' => Str::slug('Relógios'),
            ],

        ];

        foreach($subcategories as $subcategory) {
            Subcategory::factory(1)->create($subcategory);
        }
    }
}
