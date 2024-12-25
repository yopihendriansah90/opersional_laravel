<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class JenisKendaraan extends Model
{
    use HasFactory;
    protected $guarded = []; //dibuat
    public function kendaraan() // buat fungsi
    {
        // $this->belongsTo(Kendaraan::class, 'id_jenis_kendaraan', 'id'); //mendeklarasikan forigen key jenisk kendaraan
        return  $this->hasMany(Kendaraan::class, 'id_jenis_kendaraan', 'id');
    }
}
