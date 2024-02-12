<?php

namespace Database\Seeders;

use App\Models\State;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class StateSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $states = collect(json_decode(file_get_contents(database_path('seeders/states-cities-seed.json')), true))->keys();

        foreach ($states as $state) {
            State::create([
                'name' => $state,
                'abbr' => '',
            ]);
        }
    }
}
