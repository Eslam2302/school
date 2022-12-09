<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class ClassroomsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $levels = [
            ['id' => '1', 'level_id' => '1', 'class_number' => '1'],
            ['id' => '2', 'level_id' => '1', 'class_number' => '2'],
            ['id' => '3', 'level_id' => '2', 'class_number' => '1'],
            ['id' => '4', 'level_id' => '2', 'class_number' => '2'],
            ['id' => '5', 'level_id' => '3', 'class_number' => '1'],
            ['id' => '6', 'level_id' => '3', 'class_number' => '2'],
            ['id' => '7', 'level_id' => '4', 'class_number' => '1'],
            ['id' => '8', 'level_id' => '4', 'class_number' => '2'],
            ['id' => '9', 'level_id' => '5', 'class_number' => '1'],
            ['id' => '10', 'level_id' => '5', 'class_number' => '2'],
            ['id' => '11', 'level_id' => '6', 'class_number' => '1'],
            ['id' => '12', 'level_id' => '6', 'class_number' => '2'],
            ['id' => '13', 'level_id' => '7', 'class_number' => '1'],
            ['id' => '14', 'level_id' => '7', 'class_number' => '2'],
            ['id' => '15', 'level_id' => '8', 'class_number' => '1'],
            ['id' => '16', 'level_id' => '8', 'class_number' => '2'],
            ['id' => '17', 'level_id' => '9', 'class_number' => '1'],
            ['id' => '18', 'level_id' => '9', 'class_number' => '2'],
            ['id' => '19', 'level_id' => '10', 'class_number' => '1'],
            ['id' => '20', 'level_id' => '10', 'class_number' => '2'],
            ['id' => '21', 'level_id' => '11', 'class_number' => '1'],
            ['id' => '22', 'level_id' => '11', 'class_number' => '2'],
            ['id' => '23', 'level_id' => '12', 'class_number' => '1'],
            ['id' => '24', 'level_id' => '12', 'class_number' => '2'],
        ];

        \App\Models\Classroom::insert($levels);
    }
}
