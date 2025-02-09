<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;

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
        return $this->hasMany(DriverKendaraan::class, 'id_kendaraan', 'id');
    }
}
