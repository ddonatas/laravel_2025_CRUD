<?php

namespace Database\Seeders;
use App\Models\City;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class CitySeeder extends Seeder
{
    public function run()
    {
        $cities = ['Vilnius', 'Kaunas', 'Klaipėda', 'Šiauliai', 'Panevėžys'];

        foreach ($cities as $city) {
            City::create(['name' => $city]);
        }
    }
}
