<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Kamar;
use App\Models\TipeKamar;

class KamarController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $kamar = Kamar::all();
        return view('admin.dashboard', compact('kamar'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $tipeKamar = TipeKamar::all();
        return view('admin.kamar.create', compact('tipeKamar'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'nomor' => 'required',
            'harga' => 'required',
            'tipe' => 'required',
            'deskripsi' => 'required',
            'gambar' => 'required|image|mimes:jpeg,png,jpg,gif,svg,webp',
        ]);

        $imageName = time().'_'.$request->file('gambar')->getClientOriginalName();

        $request->gambar->move(public_path('images/kamar'), $imageName);

        Kamar::create([
            'nomor' => $request->nomor,
            'harga' => $request->harga,
            'id_tipe' => $request->tipe,
            'deskripsi' => $request->deskripsi,
            'gambar' => $imageName,
            'dipesan' => 0,
        ]);

        return redirect('/admin/kamar')->with('success', 'Data berhasil ditambahkan');
    }
    
    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $kamar = Kamar::find($id);
        return view('admin.kamar.edit', compact('kamar'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'nomor' => 'required',
            'harga' => 'required',
            'tipe' => 'required',
            'deskripsi' => 'required',
            'gambar' => 'image|mimes:jpeg,png,jpg,gif,svg,webp',
        ]);

        $imageName = $request->gambarLama;

        if($request->hasFile('gambar')){
            $image = $request->file('gambar');
            $imageName = time().'_'.$request->file('gambar')->getClientOriginalName();
            $image->move(public_path('image/kamar'),$imageName);        
        }

        Kamar::where('id', $id)->update([
            'nomor' => $request->nomor,
            'harga' => $request->harga,
            'tipe' => $request->tipe,
            'deskripsi' => $request->deskripsi,
            'gambar' => $imageName,
        ]);

        return redirect('/admin/kamar')->with('success', 'Data berhasil diubah');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Kamar::find($id)->delete();

        return redirect()->back()->with('success', 'Data berhasil dihapus');
    }
}