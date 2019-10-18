<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Jadwal;
use App\Kelas;
use App\Instruktur;

class JadwalController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        // mengambil data
        $jadwal = Jadwal::orderBy('id', 'asc')->paginate(10);

        // mengirim data ke view
        return view('pages.jadwal.jadwal', ['data' => $jadwal]);
    }

    public function add()
    {
        $kelas = Kelas::orderBy('kode', 'asc')->get();
        $instruktur = Instruktur::orderBy('nama', 'asc')->get();
        return view('pages.jadwal.jadwal_add', ['kelas' => $kelas , 'instruktur' => $instruktur]);
    }

    public function store(Request $request)
    {
        Jadwal::create([
            'kelas_id' => $request->kelas_id,
            'instruktur_id' => $request->intruktur_id,
            'tgl_mulai' => dateStore($request->tgl_mulai),
            'jam_mulai' => $request->jam_mulai,
            'hari' => $request->hari,
            'ruangan' => $request->ruangan,
            'asisten1' => $request->asisten1,
            'asisten2' => $request->asisten2,
        ]);

        return redirect()->route('jadwal');
    }

    public function delete($id)
    {
        $jadwal = Jadwal::find($id);
        $jadwal->delete();
        return redirect()->route('jadwal');
    }

}
