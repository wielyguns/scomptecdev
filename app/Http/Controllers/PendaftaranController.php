<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Pendaftar;
use App\Program_kursus;

class PendaftaranController extends Controller
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
        $pendaftar = Pendaftar::orderBy('nama', 'asc')->paginate(10);;

        // mengirim data ke view
        return view('pages.pendaftaran.pendaftaran', ['pendaftar' => $pendaftar]);
    }

    public function tambah()
    {
        $program = Program_kursus::orderBy('nama', 'asc')->get();
        return view('pages.pendaftaran.pendaftaran_add', ['program' => $program]);
    }

    public function simpan()
    {
        return redirect()->route('pendaftaran');
    }

    public function lihat($id)
    {
        $pendaftar = Pendaftar::find($id);
        return view('pages.pendaftaran.pendaftaran_view', ['pendaftar' => $pendaftar]);
    }

    public function ubah($id)
    {
        $pendaftar = Pendaftar::find($id);
        $program = Program_kursus::orderBy('nama', 'asc')->get();
        return view('pages.pendaftaran.pendaftaran_edit', ['pendaftar' => $pendaftar], ['program' => $program]);
    }

    public function perbarui($id)
    {
        return redirect()->route('pendaftaran');
    }

    public function hapus($id)
    {
        $pendaftar = Pendaftar::find($id);
        $pendaftar->delete();

        return redirect()->route('pendaftaran');
    }
}
