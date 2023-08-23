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
            'paket_wisata' => 'Paket Wisata Murah 1',
            'budget' => '1000000',
            'ratings' => '4.8',
            'kota' => 'Denpasar',
            'kategori' => 'Alam',
            'img_paketwisata' => 'https://dynamic-media-cdn.tripadvisor.com/media/photo-o/1d/81/30/3f/caption.jpg?w=700&h=-1&s=1&cx=1846&cy=1833&chk=v1_6ae0a81ae3361e988707',
            'keterangan' => 'Keterangan Paket Wisata Murah 1',
            'itinerary' => '06:00 = Berangkat. 10:00 = Istirahat. 12:30 = Makan siang. 15:00 = Explore tempat wisata. 18:00 = Kembali ke penginapan. 20:00 = Makan malam. 22:00 = Istirahat.',
        ]);
    }
}
