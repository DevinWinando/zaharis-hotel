<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Reservasi;

class ReservasiController extends Controller
{
    public function index(){
        $reservasi = Reservasi::all();
        return view('admin.reservasi.index', compact('reservasi'));
    }

    public function detail(Reservasi $reservasi){
        return view('admin.reservasi.detail', compact('reservasi'));
    }

    public function selesai(Reservasi $reservasi){
        return view('admin.reservasi.detail', compact('reservasi'));
    }
}