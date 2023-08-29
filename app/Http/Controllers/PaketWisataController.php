<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\PaketWisata;
use App\Models\Wisata;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\File;

class PaketWisataController extends Controller
{   



    //BUAT TRIP VIEW
    public function indexOfTrip() {
        try{
            $kotaOptions = DB::table('paketwisata')->distinct('kota')->pluck('kota');
            $results = DB::table('wisata')->get();
            return view('trip', ['results' => $results, 'kotaOptions' => $kotaOptions]);
        }catch(Exception $e) {
            dd($e->getMessage());
        };
    }





    //GET ALL WITH QUERIES
    public function getPaketWisataFilterPertama(Request $request) {

        try{
            $durasi = $request->durasi;
            $jumlahorang = $request->jumlah_orang;
            $kategoriWisataBudaya = $request->input('kategoribudaya');
            $kategoriWisataPantai = $request->input('kategoripantai');
            $kategoriWisataReligi = $request->input('kategorireligi');
            $kategoriWisataAlam = $request->input('kategorialam');
            $kategoriWisataMinat = $request->input('kategoriminat');
            $estimasiBudget = $request->input('budget');
            $kotaWisata = $request->input('kota');
            $kotaOptions = DB::table('paketwisata')->distinct('kota')->pluck('kota');


            session(['jumlahorang' => $jumlahorang]);
            session(['durasi' => $durasi]);

           $query = DB::table('paketwisata');

        if ($kategoriWisataMinat) {
            $query->orWhere('kategori', '=', $kategoriWisataMinat);
        }
        if ($kategoriWisataPantai) {
            $query->orWhere('kategori', '=', $kategoriWisataPantai);
        }
        if ($kategoriWisataReligi) {
            $query->orWhere('kategori', '=', $kategoriWisataReligi);
        }

        if ($kategoriWisataBudaya) {
            $query->orWhere('kategori', '=', $kategoriWisataBudaya);
        }

        if ($kategoriWisataAlam) {
            $query->orWhere('kategori', '=', $kategoriWisataAlam);
        }

        if ($estimasiBudget) {
            $query->where(function ($query) use ($estimasiBudget) {
                $query->where('budget', $estimasiBudget)
                      ->orWhere('budget', '<=', $estimasiBudget);
            });
        }

        if ($kotaWisata) {
            $query->orWhere('kota', '=', $kotaWisata);
        }

        $results = $query->get();
            
            return view('pencarian-paketwisata', ['results' => $results, 'kotaOptions' => $kotaOptions]);
        }catch(Exception $e) {
            dd($e->getMessage());
        }
    }






    //SECOND FILTERS
    public function getPaketWisataFilterKedua(Request $request) {

        try{
            $durasi = $request->durasi;
            $jumlahorang = $request->jumlah_orang;
            $kota = $request->input('kota');
            $estimasibudget = $request->input('estimasibudget');
            $kategoriWisataBudaya = $request->input('kategoribudaya');
            $kategoriWisataPantai = $request->input('kategoripantai');
            $kategoriWisataReligi = $request->input('kategorireligi');
            $kategoriWisataAlam = $request->input('kategorialam');
            $kategoriWisataMinat = $request->input('kategoriminat');
            $kotaOptions = DB::table('paketwisata')->distinct('kota')->pluck('kota');


            session(['jumlahorang' => $jumlahorang]);
            session(['durasi' => $durasi]);

            $query = DB::table('paketwisata');

            if ($kategoriWisataMinat) {
                $query->orWhere('kategori', '=', $kategoriWisataMinat);
            }
            if ($kategoriWisataPantai) {
                $query->orWhere('kategori', '=', $kategoriWisataPantai);
            }
            if ($kategoriWisataReligi) {
                $query->orWhere('kategori', '=', $kategoriWisataReligi);
            }
    
            if ($kategoriWisataBudaya) {
                $query->orWhere('kategori', '=', $kategoriWisataBudaya);
            }
    
            if ($kategoriWisataAlam) {
                $query->orWhere('kategori', '=', $kategoriWisataAlam);
            }

            if ($estimasibudget) {
                $query->where(function ($query) use ($estimasibudget) {
                    $query->where('budget', $estimasibudget)
                          ->orWhere('budget', '<=', $estimasibudget);
                });
            }

                if ($kota) {
                    $query->orWhere('kota', '=', $kota);
                }

                $hasil = $query->get();

            return view('pencarian-paketwisata', ['results' => $hasil, 'kotaOptions' => $kotaOptions]);
        }catch(Exception $e) {
            dd($e->getMessage());
        }
    }





    //GET BY ID PAKET WISATA
    public function getById($id) {
        $detailData = PaketWisata::with('wisata')->findOrFail($id);
        $jumlahorang = session('jumlahorang');
        $durasi = session('durasi');
        $userEmail = Auth::user()->email;

        // Retrieve related wisata data where slot columns match the name
        $relatedWisata = Wisata::whereIn('name', [
        $detailData->slot1,
        $detailData->slot2,
        $detailData->slot3,
        $detailData->slot4,
        $detailData->slot5,
        $detailData->slot6,
        $detailData->slot7,
        $detailData->slot8,
        $detailData->slot9,
        $detailData->slot10,
        $detailData->slot11,
        $detailData->slot12,
        $detailData->slot13,
        $detailData->slot14,
        $detailData->slot15,
        $detailData->slot16,
        $detailData->slot17,
        $detailData->slot18,
        $detailData->slot19,
        $detailData->slot20,
        // Add more slot columns here
    ])->get();


        return view('detailwisata', ['detailData' => $detailData, 'jumlahorang' => $jumlahorang, 'durasi' => $durasi, 'relatedWisata' => $relatedWisata]);
    }





    //GET ALL ITENARYS
    public function getAllItenarys($id) {
        $detailData = PaketWisata::with('wisata')->findOrFail($id);
        $itenary = Wisata::whereIn('name', [
            $detailData->slot1,
            $detailData->slot2,
            $detailData->slot3,
            $detailData->slot4,
            $detailData->slot5,
            $detailData->slot6,
            $detailData->slot7,
            $detailData->slot8,
            $detailData->slot9,
            $detailData->slot10,
            $detailData->slot11,
            $detailData->slot12,
            $detailData->slot13,
            $detailData->slot14,
            $detailData->slot15,
            $detailData->slot16,
            $detailData->slot17,
            $detailData->slot18,
            $detailData->slot19,
            $detailData->slot20,
            // Add more slot columns here
        ])->get();
        return view('itenary', ['itenary' => $itenary]);
    }






    //GET ITENARYS BY ID
    public function getItenarysById($id) {
        $itenaryDetails = Wisata::findOrFail($id);
        return view('wisatadetails', ['itenaryDetails' => $itenaryDetails]);
    }



    //CRUD SIDE | EDIT VIEW
    public function indexOfEditPaketWisata($id) {
        $detailData = PaketWisata::with('wisata')->findOrFail($id);
        $wisata = DB::table('wisata')->get();
        return view('editpaketwisata', ['detailData' => $detailData, 'wisata' => $wisata]);
    }


    //UPDATE PAKET WISATA
    public function update(Request $request, $id) {
        $paketwisata = PaketWisata::find($id);


        if ($request->has('paket_wisata')) {
            $paketwisata->paket_wisata = $request->input('paket_wisata');
        }
    
        if ($request->has('budget')) {
            $paketwisata->budget = $request->input('budget');
        }
    
        if ($request->has('kota')) {
            $paketwisata->kota = $request->input('kota');
        }
    
        if ($request->has('kategori')) {
            $paketwisata->kategori = $request->input('kategori');
        }
    
    
        if ($request->has('keterangan')) {
            $paketwisata->keterangan = $request->input('keterangan');
        }
    
        if ($request->has('ratings')) {
            $paketwisata->ratings = $request->input('ratings');
        }
    
        if ($request->has('itinerary')) {
            $paketwisata->itinerary = $request->input('itinerary');
        }

        $paketwisata->update();
        return redirect()->back()->with('status', 'Paket Wisata Diperbarui!');
    }


    //UPDATE PAKET WISATA | WISATA
    public function updatePaketWisataIsiWisata() {
        $paketwisata = PaketWisata::find($id);
        $paketwisata->slot1 = $request->input('slot1');
        $paketwisata->slot2 = $request->input('slot2');
        $paketwisata->slot3 = $request->input('slot3');
        $paketwisata->slot4 = $request->input('slot4');
        $paketwisata->slot5 = $request->input('slot5');
        $paketwisata->slot6 = $request->input('slot6');

        try{
            $paketwisata->update();
            return redirect('/trip')->with('success', 'Your action was successful!');
        }catch (Exception $e) {
            return response()->json(['message' => 'failed to create paket wisata!', 500]);
        }
    }

    
    //UPDATE IMAGE PAKET WISATA
    public function updateImage(Request $request, $id) {
        $paketwisata = PaketWisata::find($id);

    if (!$paketwisata) {
        return response()->json(['message' => 'Paket Wisata not found'], 404);
    }else if ($request->hasFile('img_paketwisata')){
        $request->file('img_paketwisata')->move('uploads/img/' , $request->file('img_paketwisata')->getClientOriginalName());
        $paketwisata->img_paketwisata = $request->file('img_paketwisata')->getClientOriginalName();
        $paketwisata->save();
        return redirect('/trip')->with('success', 'Your action was successful!');
    }else {

        return response()->json(['message' => 'No image uploaded'], 400);
    }
}


//CREATE PAKET WISATA VIEW
public function createIndex() {
    $wisata = DB::table('wisata')->get();
    return view('createpaketwisata', ['wisata' => $wisata]);
}



//CREATE HANDLER
public function create(Request $request) {
   $paketwisata = new PaketWisata;
   $paketwisata->paket_wisata = $request->input('paket_wisata');
   $paketwisata->budget = $request->input('budget');
   $paketwisata->kota = $request->input('kota');
   $paketwisata->kategori = $request->input('kategori');
    if ($request->hasFile('img_paketwisata')) {
        $request->file('img_paketwisata')->move('uploads/img/' , $request->file('img_paketwisata')->getClientOriginalName());
        $paketwisata->img_paketwisata = $request->file('img_paketwisata')->getClientOriginalName();
    }
   $paketwisata->keterangan = $request->input('keterangan');
   $paketwisata->ratings = $request->input('ratings');
   $paketwisata->itinerary = $request->input('itinerary');
   $paketwisata->slot1 = $request->input('slot1');
   $paketwisata->slot2 = $request->input('slot2');
   $paketwisata->slot3 = $request->input('slot3');
   $paketwisata->slot4 = $request->input('slot4');
   $paketwisata->slot5 = $request->input('slot5');
   $paketwisata->slot6 = $request->input('slot6');
   $paketwisata->slot7 = $request->input('slot7');
   $paketwisata->slot8 = $request->input('slot8');
   $paketwisata->slot9 = $request->input('slot9');
   $paketwisata->slot10 = $request->input('slot10');
   $paketwisata->slot11 = $request->input('slot11');
   $paketwisata->slot12 = $request->input('slot12');
   $paketwisata->slot13 = $request->input('slot13');
   $paketwisata->slot14 = $request->input('slot14');
   $paketwisata->slot15 = $request->input('slot15');
   $paketwisata->slot16 = $request->input('slot16');
   $paketwisata->slot17 = $request->input('slot17');
   $paketwisata->slot18 = $request->input('slot18');
   $paketwisata->slot19 = $request->input('slot19');
   $paketwisata->slot20 = $request->input('slot20');
   
try{
    $paketwisata->save();
    return redirect('/trip')->with('success', 'Your action was successful!');
}catch (Exception $e) {
    return response()->json(['message' => 'failed to create paket wisata!', 500]);
}
}



public function deletePaketWisata($id) {
    $paketWisata = PaketWisata::find($id);
    $paketWisata->delete();
    return redirect('/trip')->with('success', 'Your action was successful!');
}
    

}
