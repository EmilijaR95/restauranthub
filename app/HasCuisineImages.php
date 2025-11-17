<?php

namespace App;

trait HasCuisineImages
{
    /**
     * Return all cuisines with their images.
     *
     * @return array<string, array<string, string>>
     */
    public function cuisines(): array
    {
        return [
            'chinese' => [
                'image' => 'images/ramen.png',
            ],
            'italian' => [
                'image' => 'images/pasta.png',
            ],
            'indian' => [
                'image' => 'images/masala-dosa.png',
            ],
            'french' => [
                'image' => 'images/croissant.png',
            ],
            'greek' => [
                'image' => 'images/jar.png',
            ],
            'japanese' => [
                'image' => 'images/sushi.png',
            ],
            'mexican' => [
                'image' => 'images/chili.png',
            ],
            'macedonian' => [
                'image' => 'images/flag.png',
            ],
            'spanish' => [
                'image' => 'images/sangria.png',
            ],
            'thai' => [
                'image' => 'images/thai-food.png',
            ],
            'american' => [
                'image' => 'images/burger.png',
            ],
        ];
    }

    /**
     * Return cuisine array by name.
     *
     * @return array<string, string>|null
     */
    public function getCuisine(string $name): ?array
    {
        $key = strtolower($name);

        return $this->cuisines()[$key] ?? null;
    }

    /**
     * Return only the cuisine image.
     */
    public function getCuisineImage(string $name): ?string
    {
        $cuisine = $this->getCuisine($name);

        return $cuisine['image'] ?? null;
    }
}
