<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // User 1
        DB::table('users')->insert([
            'name' => 'Upin',
            'email' => 'upin@gmail.com',
            'password' => bcrypt('pass123')
        ]);

        // User 2
        DB::table('users')->insert([
            'name' => 'Ipin',
            'email' => 'ipin@gmail.com',
            'password' => bcrypt('pass123')
        ]);
    }
}
