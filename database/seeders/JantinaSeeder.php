<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class JantinaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // ini adalah kod untuk berhubung dengan table ____ yang dikenali
        // sebagai query builder
        DB::table('jantina')->insert([
            'label' => 'Lelaki'
        ]);

        // Data kedua
        DB::table('jantina')->insert([
            'label' => 'Perempuan'
        ]);

        // Data ketiga
        DB::table('jantina')->insert([
            'label' => 'Tidak Jelas'
        ]);
    }
}
