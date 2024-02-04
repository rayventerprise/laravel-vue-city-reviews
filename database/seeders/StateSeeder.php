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
        $states = ['TX' => 'Texas', 'CA' => 'California', 'NY' => 'New York', 'FL' => 'Florida'];

        foreach ($states as $abbreviation=>$state) {
            State::create([
                'name' => $state,
                'abbr' => $abbreviation,
            ]);
        }
    }
}
