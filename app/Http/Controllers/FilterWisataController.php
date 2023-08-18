<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\PaketWisata;

class FilterWisataController extends Controller
{
    public function index() {
        try{
            $results = DB::table('wisata')->get();
        }catch(Exception $e) {
            dd($e->getMessage());
        };
        return view('filterwisata', ['results' => $results]);
    }

    public function hasilwisata() {
        return view('wisataresult');
    }


    public function getpaketwisatabyfilter(Request $request) {

        try{

            $kategoriWisata = $request->input('kategori');
            $estimasiBudget = $request->input('budget');
            $kotaWisata = $request->input('kota');
            
            
            $results = DB::table('paketwisata')
            ->where('kategori', '=', $kategoriWisata)
            ->orWhere('budget', '=', $estimasiBudget)
            ->get();
            
            return view('wisataresult', ['results' => $results]);
        }catch(Exception $e) {
            dd($e->getMessage());
        }
    }
}
