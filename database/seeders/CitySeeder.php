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
        $texasCities = [
            [
                'name' => 'Austin',
                'thumbnail' => 'https://texashillcountryoliveco.com/cdn/shop/articles/the-perfect-itinerary-for-3-days-in-austin-tx-a-locals-guide-776189.jpg?v=1681827891'
            ],
            [
                'name' => 'Dallas',
                'thumbnail' => 'https://upload.wikimedia.org/wikipedia/commons/thumb/1/11/View_of_Dallas_from_Reunion_Tower_August_2015_13.jpg/1200px-View_of_Dallas_from_Reunion_Tower_August_2015_13.jpg'
            ],
            [
                'name' => 'Houston',
                'thumbnail' => 'https://www.travelandleisure.com/thmb/xsZOdFFzSrZ2tEs0u6Rr-bN10Oo=/1500x0/filters:no_upscale():max_bytes(150000):strip_icc()/houston-texas-HTXTG0221-7e22cd4db19f46d7820fa124e25d4d75.jpg'
            ],
            [
                'name' => 'San Antonio',
                'thumbnail' => 'https://uthscsa.edu/sites/default/files/2022-02/san-antonio-city.jpeg'
            ],
        ];

        $texas = State::whereName('Texas')->first();

        foreach ($texasCities as $texasCity) {
            City::create([
                'name' => $texasCity['name'],
                'thumbnail' => $texasCity['thumbnail'],
                'slug' => Str::slug($texasCity['name']),
                'is_featured' => true,
                'state_id' => $texas->id,
            ]);
        }
    }
}
