<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Program_kursus extends Model
{
    //
    protected $table = "program_kursus";

    protected $fillable = ['nama','kode','biaya_pendaftaran','biaya_reguler','biaya_private'];

    public function kelas()
    {
        return $this->hasMany('App\Kelas');
    }

}
