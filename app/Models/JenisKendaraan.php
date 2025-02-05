<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class JenisKendaraan extends Model
{
    use SoftDeletes; //bagian dari softdelet
    use HasFactory;
    protected $guarded = []; //dibuat
    protected $dates = ['deleted_at']; //bagian dari softdelete
    public function kendaraan() // buat fungsi
    {
        // $this->belongsTo(Kendaraan::class, 'id_jenis_kendaraan', 'id'); //mendeklarasikan forigen key jenisk kendaraan
        return  $this->hasMany(Kendaraan::class, 'id_jenis_kendaraan', 'id');
    }
}
