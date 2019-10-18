<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Siswa;
use App\Pendaftar;
use App\Program_kursus;

class SiswaController extends Controller
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
        $pendaftar = Siswa::orderBy('nama', 'asc')->paginate(10);;

        // mengirim data ke view
        return view('pages.siswa.siswa', ['pendaftar' => $pendaftar]);
    }

    public function tambah()
    {
        $program = Pendaftar::orderBy('nama', 'asc')->get();
        return view('pages.siswa.siswa_add', ['program' => $program]);
    }

    public function simpan()
    {
        return redirect()->route('siswa');
    }

    public function lihat($id)
    {
        $pendaftar = Siswa::find($id);
        return view('pages.siswa.siswa_view', ['pendaftar' => $pendaftar]);
    }

    public function ubah($id)
    {
        $pendaftar = Siswa::find($id);
        $program = Program_kursus::orderBy('nama', 'asc')->get();
        return view('pages.siswa.siswa_edit', ['pendaftar' => $pendaftar], ['program' => $program]);
    }

    public function perbarui($id)
    {
        return redirect()->route('siswa');
    }

    public function hapus($id)
    {
        $pendaftar = Siswa::find($id);
        $pendaftar->delete();

        return redirect()->route('siswa');
    }
}
