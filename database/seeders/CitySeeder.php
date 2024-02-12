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
        $locations = json_decode(file_get_contents(database_path('seeders/states-cities-seed.json')), true);

        $thumbnails = [
            'Austin' => 'https://texashillcountryoliveco.com/cdn/shop/articles/the-perfect-itinerary-for-3-days-in-austin-tx-a-locals-guide-776189.jpg?v=1681827891',
            'Dallas' => 'https://upload.wikimedia.org/wikipedia/commons/thumb/1/11/View_of_Dallas_from_Reunion_Tower_August_2015_13.jpg/1200px-View_of_Dallas_from_Reunion_Tower_August_2015_13.jpg',
            'Houston' => 'https://www.travelandleisure.com/thmb/xsZOdFFzSrZ2tEs0u6Rr-bN10Oo=/1500x0/filters:no_upscale():max_bytes(150000):strip_icc()/houston-texas-HTXTG0221-7e22cd4db19f46d7820fa124e25d4d75.jpg',
            'San Antonio' => 'https://uthscsa.edu/sites/default/files/2022-02/san-antonio-city.jpeg',
        ];

        foreach ($locations as $stateName => $citieNames) {
            $state = State::whereName($stateName)->first();

            foreach ($citieNames as $cityName) {
                $isFeatured = in_array($cityName, ['Austin', 'Dallas', 'Houston', 'San Antonio', 'Miami', 'Manhattan', 'Los Angeles', 'San Diego', 'Boston', 'Chicago']);

                City::create([
                    'name' => $cityName,
                    'thumbnail' => $thumbnails[$cityName] ?? '',
                    'slug' => Str::slug($cityName),
                    'is_featured' => $isFeatured,
                    'state_id' => $state->id,
                ]);
            }
        }
    }
}
