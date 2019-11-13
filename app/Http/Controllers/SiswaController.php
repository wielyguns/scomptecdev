<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Siswa;
use App\Pendaftar;
use App\Program_kursus;
use App\Kelas;
use Response;
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
        $siswa = Siswa::orderBy('nama', 'asc')->paginate(10);;

        // mengirim data ke view
        return view('pages.siswa.siswa', ['pendaftar' => $siswa]);
    }

    public function tambah()
    {
        $pendaftar = Pendaftar::where('status_pembayaran','Lunas')
                              ->orderBy('nama', 'asc')
                              ->with(['program_kursus'])
                              ->get();

        return view('pages.siswa.siswa_add', ['pendaftar' => $pendaftar]);
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

    public function get_data_siswa(Request $req)
    {
        $data = Pendaftar::find($req->id);
        $kelas = Kelas::where('program_kursus_id',$data->program_kursus_id)
                    ->where('status','Aktif')
                    ->get();

        return Response::json(['data'=>$data,'kelas'=>$kelas]);
    }
}
