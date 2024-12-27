<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DriverKendaraan extends Model
{
    use HasFactory;
    protected $guarded = []; //dibuat
    public function driver() // buat fungsi
    {
        // $this->belongsTo(Driver::class, 'id_user', 'id'); //mendeklarasikan forigen key jenisk kendaraan
        return $this->belongsTo(Driver::class, 'id_driver', 'id');
    }

    public function kendaraan() // buat fungsi
    {
        // $this->belongsTo(Driver::class, 'id_user', 'id'); //mendeklarasikan forigen key jenisk kendaraan
        return $this->hasOne(Kendaraan::class, 'id_kendraan', 'id');
    }

    public function user()
    {
        return $this->belongsTo(Admin::class, 'id_user', 'id');
    }
}
