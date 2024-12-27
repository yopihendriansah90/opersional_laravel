<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Driver extends Model
{
    use HasFactory;
    protected $guarded = [];
    public function useradmin()
    {
        // $this->hasMany(Admin::class, 'id_user', 'id'); // menghubungkan foreigen key dari kendaraan (id_jenis_kendaraan) ke table jenis kendaraan
        return $this->belongsTo(Admin::class, 'id_user', 'id');
        return $this->belongsTo(DriverKendaraan::class, 'id_user', 'id');
    }
}
