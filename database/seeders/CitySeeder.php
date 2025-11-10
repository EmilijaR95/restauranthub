<?php

namespace Database\Seeders;

use App\Models\City;
use Illuminate\Database\Seeder;

class CitySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $cities = [
            'Belgrade',
            'Ljubljana',
            'Sarajevo',
            'Skopje',
            'Sofia',
            'Zagreb',
            'Tirana',
            'Athens',
            'Podgorica',
        ];

        foreach ($cities as $city) {
            City::create([
                'name' => $city,
            ]);
        }
    }
}
