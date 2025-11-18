<?php

namespace Database\Seeders;

use App\Models\City;
use App\Models\Cuisine;
use App\Models\Restaurant;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

class RestaurantSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $restaurants = [
            [
                'name' => 'Maharaja Palace',
                'picture' => 'images/restaurants/Maharaja Palace.png',
                'address' => 'Ferhadija Street 14, 71000 Sarajevo, Bosnia and Herzegovina',
                'city' => 'Sarajevo',
                'opened_date' => '2021-02-05',
                'cuisines' => [
                    'Indian',
                    'Thai',
                ],
            ],
            [
                'name' => 'Taverna Plaka',
                'picture' => 'images/restaurants/Taverna Plaka.png',
                'address' => 'Skadarska Street 22, 11000 Belgrade, Serbia',
                'city' => 'Belgrade',
                'opened_date' => '2007-07-01',
                'cuisines' => [
                    'Greek',
                    'Spanish',
                    'Macedonian',
                ],
            ],
            [
                'name' => 'Le Petit Chat Noir',
                'picture' => 'images/restaurants/Le Petit Chat Noir.png',
                'address' => 'Tkalciceva Street 12, 10000 Zagreb, Croatia',
                'city' => 'Zagreb',
                'opened_date' => '2018-06-28',
                'cuisines' => [
                    'French',
                ],
            ],
            [
                'name' => 'Sushi Akropoli',
                'picture' => 'images/restaurants/Sushi Akropoli.png',
                'address' => '23 Akropolis St, 10557 Athens, Greece',
                'city' => 'Athens',
                'opened_date' => '2023-03-13',
                'cuisines' => [
                    'Japanese',
                    'Thai',
                ],
            ],
            [
                'name' => 'La Llorona',
                'picture' => 'images/restaurants/La Llorona.png',
                'address' => 'Bul. Vitosha 45, 1000 Sofia, Bulgaria',
                'city' => 'Sofia',
                'opened_date' => '2024-08-20',
                'cuisines' => [
                    'Mexican',
                ],
            ],
            [
                'name' => 'Osteria Da Paolo',
                'picture' => 'images/restaurants/Osteria Da Paolo.png',
                'address' => 'Trg slobode 12, 1000 Ljubljana, Slovenia',
                'city' => 'Ljubljana',
                'opened_date' => '2012-12-12',
                'cuisines' => [
                    'Italian',
                    'French',
                    'Spanish',
                ],
            ],
        ];

        $cities = City::all()->keyBy('name');

        $cuisines = Cuisine::all()->keyBy('name');

        foreach ($restaurants as $data) {
            $cityUuid = $cities->get($data['city'])->uuid;

            $randomName = Str::random(40).'.png';
            $destination = 'restaurants/'.$randomName;

            Storage::disk('public')->put(
                $destination,
                file_get_contents(public_path($data['picture']))
            );

            $restaurant = Restaurant::create([
                'name' => $data['name'],
                'picture' => $data['picture'],
                'address' => $data['address'],
                'city_uuid' => $cityUuid,
                'opened_date' => $data['opened_date'],
            ]);

            $cuisineUuids = collect($data['cuisines'])
                ->map(fn ($name) => $cuisines[$name]->uuid ?? null)
                ->filter()
                ->values()
                ->all();

            $restaurant->cuisines()->sync($cuisineUuids);
        }
    }
}
