<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class LevelTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        
        $levels = [
            ['id' => '1', 'year_type' => 'Primary', 'year_level' => '1'],
            ['id' => '2', 'year_type' => 'Primary', 'year_level' => '2'],
            ['id' => '3', 'year_type' => 'Primary', 'year_level' => '3'],
            ['id' => '4', 'year_type' => 'Primary', 'year_level' => '4'],
            ['id' => '5', 'year_type' => 'Primary', 'year_level' => '5'],
            ['id' => '6', 'year_type' => 'Primary', 'year_level' => '6'],
            ['id' => '7', 'year_type' => 'Prep', 'year_level' => '1'],
            ['id' => '8', 'year_type' => 'Prep', 'year_level' => '2'],
            ['id' => '9', 'year_type' => 'Prep', 'year_level' => '3'],
            ['id' => '10', 'year_type' => 'Secondary', 'year_level' => '1'],
            ['id' => '11', 'year_type' => 'Secondary', 'year_level' => '2'],
            ['id' => '12', 'year_type' => 'Secondary', 'year_level' => '3'],
        ];

        \App\Models\Level::insert($levels);


    }
}
