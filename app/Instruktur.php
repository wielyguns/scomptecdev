<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Instruktur extends Model
{
    //
    protected $table = "instruktur";
    protected $fillable = ['nama','alamat','telepon','email','status','tgl_lahir','tgl_bergabung'];

    public function jadwal()
    {
        return $this->hasOne('App\Jadwal');
    }

}
