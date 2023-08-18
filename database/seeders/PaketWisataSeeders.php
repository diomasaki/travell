<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class PaketWisataSeeders extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('paketwisata')->insert([
            'paket_wisata' => 'Paket Wisata Murah 2',
            'budget' => '700.000',
            'kota' => 'Denpasar',
            'kategori' => 'Alam',
        ]);
    }
}
