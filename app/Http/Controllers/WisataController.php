<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\PaketWisata;

use Illuminate\Support\Facades\DB;

use Illuminate\Support\Facades\Auth;

use Illuminate\Support\Facades\File;

use App\Models\Wisata;


class WisataController extends Controller
{

    //GET ALL WISATA INDEX
    public function index() {
        try{
            $kotaOptions = DB::table('wisata')->distinct('kota')->pluck('kota');
            $results = DB::table('wisata')->get();
            return view('destinasi', ['results' => $results, 'kotaOptions' => $kotaOptions]);
        }catch(Exception $e) {
            dd($e->getMessage());
        };
    }


    //GET ALL WISATA BY FILTERS
    public function getwisatabyfilter(Request $request) {

        try{
            $durasi = $request->durasi;
            $jumlahorang = $request->jumlah_orang;
            $price = $request->input('price');
            $kota = $request->input('kota');
            $kotaOptions = DB::table('wisata')->distinct('kota')->pluck('kota');

            $query = DB::table('wisata');
            
            
            if ($price) {
                $query->where(function ($query) use ($price) {
                    $query->where('price', $price)
                          ->orWhere('price', '<=', $price);
                });
            }
    
            if ($kota) {
                $query->orWhere('kota', '=', $kota);
            }
    
            $results = $query->get();


            session(['jumlahorang' => $jumlahorang]);
            session(['durasi' => $durasi]);
            
            return view('destinasi', ['results' => $results, 'jumlahorang' => $jumlahorang, 'durasi' => $durasi, 'kotaOptions' => $kotaOptions]);

        }catch(Exception $e) {
            dd($e->getMessage());
        }
    }


    //GET WISATA BY ID
    public function getwisatabyid($id) {
        try {

            $jumlahorang = session('jumlahorang');
            $durasi = session('durasi');

            $results = DB::table('wisata')->where('id', $id)->first();
            // Use first() to get a single row matching the ID
    
            return view('destinationdetails', ['results' => $results, 'jumlahorang' => $jumlahorang, 'durasi' => $durasi]);
        } catch (Exception $e) {
            dd($e->getMessage());
        }
    }


    //CREATE VIEW WISATA
    public function indexOfCreateWisata() {
        try{
            $paketWisata = DB::table('paketwisata')->get();
            return view('createwisatabaru', ['paketWisata' => $paketWisata]);
            dd($paketWisata);
        }catch (Exception $e) {
            dd($e->getMessage($e));
        }
    }

    public function createWisataHandler(Request $request) {
        $wisata = new Wisata;
        $wisata->name = $request->input('name');
        $wisata->description = $request->input('description');
        if ($request->hasFile('img_wisata')) {
            $request->file('img_wisata')->move('uploads/img/' , $request->file('img_wisata')->getClientOriginalName());
            $wisata->img_wisata = $request->file('img_wisata')->getClientOriginalName();
        }
        $wisata->price = $request->input('price');
        $wisata->kota = $request->input('kota');
        $wisata->ratings = $request->input('ratings');
        
     try{
         $wisata->save();
         return redirect('/destinasi')->with('success', 'Your action was successful!');
     }catch (Exception $e) {
         return response()->json(['message' => 'failed to create paket wisata!', 500]);
     }
    }


    public function updatePaketWisataId(Request $request, $id) {
        $wisata = Wisata::find($id);
        $wisata->paketwisata_id = $request->input('paketwisata_id');

        try{
            $wisata->update();
            return redirect()->back()->with('success', 'Your action was successful!');
        }catch (Exception $e) {
            return response()->json(['message' => 'failed to create paket wisata!', 500]);
        }
    }


    //UPDATE VIEW WISATA
    public function indexOfEditWisata($id) {
        try{
            $detailData = DB::table('wisata')->where('id', $id)->first();
            $paketWisata = DB::table('paketwisata')->get();
            
            return view('editwisata', ['detailData' => $detailData, 'paketWisata' => $paketWisata]);
        }catch (Exception $e) {
            dd($e->getMessage($e));
        }
    }


    //UPDATE WISATA
    public function editWisataHandler(Request $request, $id) {
        $wisata = Wisata::find($id);

        if ($request->has('name')) {
            $wisata->name = $request->input('name');
        }
    
        if ($request->has('description')) {
            $wisata->description = $request->input('description');
        }
    
        if ($request->has('price')) {
            $wisata->price = $request->input('price');
        }
    
    
        if ($request->has('kota')) {
            $wisata->kota = $request->input('kota');
        }
    
        if ($request->has('paketwisata_id')) {
            $wisata->paketwisata_id = $request->input('paketwisata_id');
        }
    
        if ($request->has('ratings')) {
            $wisata->ratings = $request->input('ratings');
        }

        $wisata->update();
        return redirect()->back()->with('status', 'Wisata Diperbarui!');
    }


    //UPDATE IMAGE WISATA
    public function updateImageWisataHandler(Request $request, $id) {
        $wisata = Wisata::find($id);
    
        if (!$wisata) {
            return response()->json(['message' => 'Paket Wisata not found'], 404);
        }
    
        $base64Image = $request->input('img_wisata');
    
        if ($base64Image) {
            $data = explode(',', $base64Image);
            $imageData = base64_decode($data[1]);
    
            // Delete the old image
            $oldImagePath = public_path('uploads/img/' . $wisata->img_wisata);
            if (File::exists($oldImagePath)) {
                File::delete($oldImagePath);
            }
    
            // Upload the new image
            $filename = time() . '.jpg'; // Change the extension if needed
            $newImagePath = public_path('uploads/img/' . $filename);
            file_put_contents($newImagePath, $imageData);
    
            $wisata->img_wisata = $filename;
            $wisata->save();
    
            return response()->json(['message' => 'Image updated successfully'], 200);
        }
    
        return response()->json(['message' => 'No image uploaded'], 400);
    }


    public function deleteWisata($id) {
        $Wisata = Wisata::find($id);
        $Wisata->delete();
        return redirect('/destinasi')->with('success', 'Your action was successful!');
    }


    public function paymentW($id) {
        try {
            $userEmail = Auth::user()->email;
            $results = DB::table('wisata')->where('id', $id)->first();
            // Use first() to get a single row matching the ID
    
            return view('paymentw', ['results' => $results, 'userEmail' => $userEmail]);
        } catch (Exception $e) {
            dd($e->getMessage());
        }
    }
}
