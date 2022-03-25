<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Kamar;
use App\Models\Reservasi;
use App\Models\Client;
use Illuminate\Support\Str;

use App\Models\TipeKamar;

use Illuminate\Support\Carbon;

class ClientController extends Controller
{
    public function index()
    {
        $kamar = Kamar::all();
        $tipeKamar = TipeKamar::all();
        return view('index', compact('kamar','=', 'tipeKamar'));
    }

    public function showReservationForm(Request $request)
    {
        $req = $request->all();
        return view('pesan', compact('req'));
    }

    public function reservation(Request $request)
    {
        $uuid = Str::uuid();
        
        
        $request->validate([
            'nama' => 'required',
            'email' => 'required',
            'telepon' => 'required',  
            'mulai' => 'required',
            'selesai' => 'required',
        ]);
        
        $hargaTipe = TipeKamar::find($request->tipe)->harga;
        $mulai = Carbon::parse($request->mulai);
        $selesai = Carbon::parse($request->selesai);
        $jumlahKamar = sizeof($request->kamar);
  
        $interval = $mulai->diffInDays($selesai);
        
        $harga_total = $interval * $hargaTipe * $jumlahKamar;
        
        // $idClient = Client::insertGetId([
        //     'nama' => $request->nama,
        //     'email' => $request->email,
        //     'telepon' => $request->telepon,
        // ]);

        // foreach($request->kamar as $kamar) {
        //     Reservasi::insert([
        //         'id_client' => $idClient,
        //         'id_kamar' => $kamar,
        //         'mulai' => $request->mulai,
        //         'selesai' => $request->selesai,
        //         'harga_total' => $harga_total,
        //     ]);
        // }

        // $idReservasi = Reservasi::insertGetId([
        //     'id_kamar' => $id,
        //     'id_client' => $idClient,
        //     'mulai' => $request->mulai,
        //     'selesai' => $request->selesai,
        //     'harga_total' => $harga_total,
        // ]);

        // Kamar::where('id', $id)->update([
        //     'dipesan' => '1',
        // ]);
        
        return redirect("/reservasi/4c20ed17-e592-4a00-a238-ab5d517462a9/receipt");
    }

    public function receipt(Reservasi $reservasi)
    {
        return view('receipt', compact('reservasi'));
    }

    public function printReceipt($reservasi){
        // $pdf = PDF::loadView('receipt', compact('reservasi'));
        // return $pdf->download('receipt.pdf');
        $reservasi = Reservasi::where('token', $reservasi)->get();

        return view('receipt', compact('reservasi'));
    }
}