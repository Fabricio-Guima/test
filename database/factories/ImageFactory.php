<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Facades\Storage;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Image>
 */
class ImageFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        // Gera uma URL de imagem falsa
        $imageUrl = fake()->imageUrl($width = 640, $height = 480);

        // Obtém o conteúdo da imagem a partir da URL
        $imageContents = file_get_contents($imageUrl);

        // Define o caminho onde a imagem será salva
        // '/public'
        $publicPath = '/public';
        $productPath = 'products/' . uniqid() . '.png';
        $imagePath =  $publicPath . '/' . $productPath;

        // Salva a imagem no armazenamento do Laravel
        Storage::put($imagePath, $imageContents);

        return [
            'url' => $productPath,
        ];
    }
}
