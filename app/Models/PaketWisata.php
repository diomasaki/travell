<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Wisata;

class PaketWisata extends Model
{
    use HasFactory;


    public function wisata()
    {
        return $this->hasMany(Wisata::class, 'paketwisata_id');
    }



     /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $table = 'paketwisata';

    protected $fillable = [
        'paket_wisata',
        'budget',
        'kota',
        'kategori',
        'keterangan',
        'ratings',
        'itinerary'
    ];
}
