<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Kendaraan extends Model
{
    use HasFactory;
    protected $guarded = [];
    public function jeniskendaraan()
    {
        // $this->hasMany(JenisKendaraan::class, 'id_jenis_kendaraan', 'id'); // menghubungkan foreigen key dari kendaraan (id_jenis_kendaraan) ke table jenis kendaraan
        return $this->belongsTo(JenisKendaraan::class, 'id_jenis_kendaraan', 'id');
    }
    public function driverkendaraan()
    {
        return $this->hasMany(Driver::class, 'id_kendaraa', 'id');
    }
}
