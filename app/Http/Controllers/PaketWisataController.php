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
            $kategoriWisata = $request->input('kategori');
            $estimasiBudget = $request->input('budget');
            $kotaWisata = $request->input('kota');
            $kotaOptions = DB::table('paketwisata')->distinct('kota')->pluck('kota');


            session(['jumlahorang' => $jumlahorang]);
            session(['durasi' => $durasi]);

           $query = DB::table('paketwisata');

        if ($kategoriWisata) {
            $query->orWhere('kategori', '=', $kategoriWisata);
        }

        if ($estimasiBudget) {
            $query->orWhere('budget', '=', $estimasiBudget);
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
            $kategori = $request->input('kategori');
            $kotaOptions = DB::table('paketwisata')->distinct('kota')->pluck('kota');


            session(['jumlahorang' => $jumlahorang]);
            session(['durasi' => $durasi]);

            $query = DB::table('paketwisata');

                if ($kategori) {
                    $query->orWhere('kategori', '=', $kategori);
                }

                if ($estimasibudget) {
                    $query->orWhere('budget', '=', $estimasibudget);
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
        return view('detailwisata', ['detailData' => $detailData, 'jumlahorang' => $jumlahorang, 'durasi' => $durasi]);
    }





    //GET ALL ITENARYS
    public function getAllItenarys($id) {
        $itenary = PaketWisata::with('wisata')->findOrFail($id);
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
        return view('editpaketwisata', ['detailData' => $detailData]);
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

    
    //UPDATE IMAGE PAKET WISATA
    public function updateImage(Request $request, $id) {
        $paketwisata = PaketWisata::find($id);

    if (!$paketwisata) {
        return response()->json(['message' => 'Paket Wisata not found'], 404);
    }else if ($request->hasFile('img_paketwisata')){
        $request->file('img_paketwisata')->move('uploads/img/' , $request->file('img_paketwisata')->getClientOriginalName());
        $paketwisata->img_paketwisata = $request->file('img_paketwisata')->getClientOriginalName();
        $paketwisata->save();
        return response()->json(['message' => 'Image updated successfully'], 200);
    }else {

        return response()->json(['message' => 'No image uploaded'], 400);
    }
}


//CREATE PAKET WISATA VIEW
public function createIndex() {
    return view('createpaketwisata');
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
   
try{
    $paketwisata->save();
    return redirect('/trip')->with('success', 'Your action was successful!');
}catch (Exception $e) {
    return response()->json(['message' => 'failed to create paket wisata!', 500]);
}
}
    

}
