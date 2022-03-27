<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Reservasi;
use App\Models\TipeKamar;
use App\Models\Kamar;

class ReservasiController extends Controller
{
    public function index(){
        $reservasi = Reservasi::all();
        $tipeKamar = TipeKamar::all();
        return view('resepsionis.dashboard', compact('reservasi', 'tipeKamar'));
    }

    public function detail(Reservasi $reservasi){
        return view('resepsionis.reservasi.detail', compact('reservasi'));
    }

    public function proses(Request $request){
        Reservasi::where('id', $request->id)->update([
            'status' => $request->status
        ]);

        if($request->status == 'ditempati' || $request->status == 'diproses'){
            Kamar::where('id', $request->idKamar)->update([
                'dipesan' => 1
            ]);
        }else{
            Kamar::where('id', $request->idKamar)->update([
                'dipesan' => 0
            ]);
        }
        
        return redirect('resepsionis/reservasi')->with('success', 'Reservasi berhasil di proses');
    }
}