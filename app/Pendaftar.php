<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Pendaftar extends Model
{
    //
    protected $table = 'pendaftar';

    protected $fillable = ['jenis_kursus','program_kursus_id','biaya_pendaftaran','biaya_kursus','status_pembayaran','nama','jenis_kelamin','gelar_akademis','alamat','kota','kode_pos','telepon','email','tgl_lahir'];

    public function program_kursus()
    {
        return $this->belongsTo('App\Program_kursus');
    }

    public function user()
    {
        return $this->belongsTo('App\User');
    }

}
