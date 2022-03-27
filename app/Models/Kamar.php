<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Kamar extends Model
{
    use HasFactory;

    protected $table = 'kamar';
    protected $fillable = ['nomor', 'harga', 'deskripsi', 'id_tipe', 'gambar', 'dipesan'];

    public function tipe(){
        return $this->belongsTo(TipeKamar::class, 'id_tipe');
    }
}