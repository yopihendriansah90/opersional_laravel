<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
// use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class Admin extends Authenticatable
{
    use HasFactory, Notifiable;

    protected $guarded = [];

    protected $hidden = [
        'password',
        'remember_token',
    ];
    public function admindriver() // buat fungsi
    {
        // $this->belongsTo(Driver::class, 'id_user', 'id'); //mendeklarasikan forigen key jenisk kendaraan
        return $this->hasOne(Driver::class . 'id_user', 'id');
    }

    public function isRole($roles)
    {
        return $this->roles === $roles;
    }
}
