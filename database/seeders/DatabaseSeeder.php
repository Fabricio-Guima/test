<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Storage;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public $storages = ['categories', 'subcategories', 'products'];

    public function createOrDestroyStorages($storages)
        {
            foreach ($storages as $storage) {
                if(Storage::disk('public')->exists($storage)) {
                    Storage::disk('public')->deleteDirectory($storage);
                }

                 Storage::disk('public')->makeDirectory($storage);
            }
        }
    public function run(): void
    {

        $this->createOrDestroyStorages($this->storages);

        \App\Models\User::factory(10)->create();

        \App\Models\User::firstOrCreate([
            'name' => 'Fabrício Guimarães',
            'email' => 'fabricioguimaraes55@gmail.com',
            'password' => bcrypt('password')
        ]);

        $this->call(CategorySeeder::class);
        $this->call(SubcategorySeeder::class);
        $this->call(ProductSeeder::class);
        $this->call(ColorSeeder::class);
        $this->call(ColorProductSeeder::class);
        $this->call(SizeSeeder::class);

    }
}
