<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Kelas extends Model
{
    //
    protected $table = 'kelas';

    protected $fillable = ['program_kursus_id', 'kode', 'durasi', 'kapasitas', 'biaya', 'jenis'];

    public function program_kursus()
    {
        return $this->belongsTo('App\Program_kursus');
    }

    public function jadwal()
    {
        return $this->hasOne('App\Jadwal');
    }
}
