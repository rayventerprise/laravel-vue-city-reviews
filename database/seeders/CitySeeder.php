<?php

namespace Database\Seeders;

use App\Models\City;
use App\Models\State;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;

class CitySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $texasCityNames = ['Austin', 'Dallas', 'Houston', 'San Antonio'];

        $texas = State::whereName('Texas')->first();

        foreach ($texasCityNames as $cityName) {
            City::create([
                'name' => $cityName,
                'slug' => Str::slug($cityName),
                'is_featured' => true,
                'state_id' => $texas->id,
            ]);
        }
    }
}
