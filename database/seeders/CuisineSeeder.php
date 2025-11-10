<?php

namespace Database\Seeders;

use App\Models\Cuisine;
use Illuminate\Database\Seeder;

class CuisineSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $cuisines = [
            'Chinese',
            'Italian',
            'Indian',
            'French',
            'Greek',
            'Japanese',
            'Mexican',
            'Macedonian',
            'Spanish',
            'Thai',
            'American',
        ];

        foreach ($cuisines as $cuisine) {
            Cuisine::create([
                'name' => $cuisine,
            ]);
        }
    }
}
