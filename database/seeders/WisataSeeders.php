<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class WisataSeeders extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('wisata')->insert([
            'name' => 'Bromo',
            'description' => 'Gunung Bromo atau dalam bahasa Tengger dieja "Brama", juga disebut Kaldera Tengger, adalah sebuah gunung berapi aktif di Jawa Timur, Indonesia.',
            'img_wisata' => 'https://nahwatravel.co.id/wp-content/uploads/2022/05/Pemandangan-Bukit-Cinta-Bromo.jpg',
            'price' => '800.000',
            'kota' => 'Probolinggo',
        ]);
    }
}
