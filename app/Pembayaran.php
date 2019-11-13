<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Pembayaran extends Model
{
    //
    protected $table = 'pembayaran';

    protected $fillable = ['jenis_pembayaran', 'pendaftar_id', 'terima_dari', 'jumlah_uang', 'tgl_pembayaran', 'pesan'];

    public function pendaftar()
    {
        return $this->belongsTo('App\Pendaftar');
    }
    public function siswa()
    {
        return $this->belongsTo('App\Siswa');
    }

    public function program_kursus()
    {
        return $this->belongsTo('App\Program_kursus');
    }
}
