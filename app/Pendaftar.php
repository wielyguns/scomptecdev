<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Pendaftar extends Model
{
    //
    protected $table = 'pendaftar';

    protected $fillable = ['user_id', 'siswa_id', 'jenis_kursus', 'program_kursus_id', 'nama', 'gelar_akademis', 'alamat', 'kota', 'kode_pos', 'telepon', 'email', 'tgl_lahir', 'jenis_kelamin'];

    public function program_kursus()
    {
        return $this->belongsTo('App\Program_kursus');
    }

    public function user()
    {
        return $this->belongsTo('App\User');
    }

}
