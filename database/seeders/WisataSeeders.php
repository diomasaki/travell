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
            'name' => 'Gunung Rinjani',
            'description' => 'Yogyakarta, atau lebih dikenal dengan sebutan "Jogja," adalah sebuah kota istimewa dan provinsi di Indonesia yang memiliki daya tarik budaya, sejarah, dan alam yang kaya. Terletak di bagian selatan Pulau Jawa, Jogja dikenal sebagai pusat kebudayaan dan pendidikan, serta salah satu destinasi wisata populer di Indonesia.',
            'img_wisata' => 'https://www.rinjaninationalpark.com/wp-content/uploads/2016/09/gunungrinjanilombok21.jpg',
            'price' => '360000',
            'ratings' => '4.8',
            'kota' => 'Pangandaran.',
        ]);
    }
}
