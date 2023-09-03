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
        return $this->hasMany(Wisata::class, 'name');
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
        'itinerary',
        'durasi',
        'slot1',
        'slot2',
        'slot3',
        'slot4',
        'slot5',
        'slot6',
        'slot7',
        'slot8',
        'slot9',
        'slot10',
        'slot11',
        'slot12',
        'slot13',
        'slot14',
        'slot15',
        'slot16',
        'slot17',
        'slot18',
        'slot19',
        'slot20',
    ];
}
