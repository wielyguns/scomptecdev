<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Jadwal extends Model
{
    //
    protected $table = 'jadwal';

    protected $fillable = ['kelas_id','instruktur_id','tgl_mulai','jam_mulai','hari','ruangan','asisten'];

    public function kelas()
    {
        return $this->belongsTo('App\Kelas');
    }

    public function instruktur()
    {
        return $this->belongsTo('App\Instruktur');
    }

}
