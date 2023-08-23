<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Wisata extends Model
{
    use HasFactory;

      /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $table = 'wisata';

    protected $fillable = [
        'name',
        'description',
        'img_wisata',
        'price',
        'kota',
        'ratings',
        'paketwisata_id'
    ];
}
