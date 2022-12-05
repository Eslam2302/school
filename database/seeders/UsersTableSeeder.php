<?php

namespace Database\Seeders;

use Illuminate\Database\DBAL\TimestampType;
use Illuminate\Database\Seeder;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        

        $user = \App\Models\User::create([

            'first_name' => 'admin',
            'second_name' => ' ',
            'last_name' => ' ',
            'email' => 'super_admin@app.com',
            'password' => bcrypt('123456'),
            'date_of_birth' => '2000/2/23' ,
            'gender' => 'male',
            'address' => ' ',
            'phone' => ' ',

        ]);

        $user->attachRole('super_admin');

    } // end of run
} //end of seeder
