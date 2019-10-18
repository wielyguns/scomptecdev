<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Program_kursus extends Model
{
    //
    protected $table = "program_kursus";

    protected $fillable = ['nama','kode'];

    public function kelas()
    {
        return $this->hasMany('App\Kelas');
    }

}
