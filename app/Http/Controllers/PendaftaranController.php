<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Pendaftar;
use App\Program_kursus;
use Session;
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
        $pendaftar = Pendaftar::orderBy('id', 'asc')->get();
        $program = Program_kursus::orderBy('nama', 'asc')->get();

        // mengirim data ke view
        return view('pages.pendaftaran.pendaftaran', ['pendaftar' => $pendaftar, 'program' => $program]);
    }

    public function filter(Request $request)
    {   
        $a = $request->filter_jenis;
        // dd($b);
        $pendaftar = Pendaftar::where(function($q) use ($a){
                                    if ($a != null) {
                                        $q->where('jenis_kursus',$a);
                                    }
                                })
                                ->get();
        return view('pages.pendaftaran.pendaftaran',compact('pendaftar','request'));
    }

    public function tambah()
    {
        $program = Program_kursus::orderBy('nama', 'asc')->get();
        return view('pages.pendaftaran.pendaftaran_add', ['program' => $program]);
    }

    public function simpan(Request $request)
    {

        $rules = [
            'program_kursus_id' => 'required',
            'biaya_pendaftaran' => 'required',
            'biaya_kursus' => 'required',
            'nama' => 'required',
            'jenis_kelamin' => 'required',
            'alamat' => 'required',
            'kota' => 'required',
            'kode_pos' => 'required',
            'telepon' => 'required',
            'email' => 'email',
            'tgl_lahir' => 'required',
        ];        
        $customMessages = [
            'required' => 'Kolom ini harus di isi!',
            'email' => 'Format email tidak sesuai!'
        ];
        $this->validate($request, $rules, $customMessages);


        // return redirect()->route('pendaftaran');
        Pendaftar::create([
            'jenis_kursus' => $request->jenis_kursus,
            'program_kursus_id' => $request->program_kursus_id,
            'biaya_pendaftaran' => getRp($request->biaya_pendaftaran),
            'biaya_kursus' => getRp($request->biaya_kursus),
            'nama' => $request->nama,
            'jenis_kelamin' => $request->jenis_kelamin,
            'gelar_akademis' => $request->gelar_akademis,
            'alamat' => $request->alamat,
            'kota' => $request->kota,
            'kode_pos' => $request->kode_pos,
            'telepon' => $request->telepon,
            'email' => $request->email,
            'tgl_lahir' => dateStore($request->tgl_lahir),
        ]);
        return redirect()->route('pendaftaran')->with('message',['Data Berhasil Disimpan']);
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

    public function perbarui($id, Request $request)
    {
        $rules = [
            'program_kursus_id' => 'required',
            'biaya_pendaftaran' => 'required',
            'biaya_kursus' => 'required',
            'nama' => 'required',
            'jenis_kelamin' => 'required',
            'alamat' => 'required',
            'kota' => 'required',
            'kode_pos' => 'required',
            'telepon' => 'required',
            'email' => 'email',
            'tgl_lahir' => 'required',
        ];        
        $customMessages = [
            'required' => 'Kolom ini harus di isi!',
            'email' => 'Format email tidak sesuai!'
        ];
        $this->validate($request, $rules, $customMessages);

        $pendaftar = Pendaftar::find($id);
        $pendaftar->jenis_kursus = $request->jenis_kursus;
        $pendaftar->program_kursus_id = $request->program_kursus_id;
        $pendaftar->biaya_pendaftaran =  getRp($request->biaya_pendaftaran);
        $pendaftar->biaya_kursus = getRp($request->biaya_kursus);
        $pendaftar->nama = $request->nama;
        $pendaftar->jenis_kelamin = $request->jenis_kelamin;
        $pendaftar->gelar_akademis = $request->gelar_akademis;
        $pendaftar->alamat = $request->alamat;
        $pendaftar->kota = $request->kota;
        $pendaftar->kode_pos = $request->kode_pos;
        $pendaftar->telepon = $request->telepon;
        $pendaftar->email = $request->email;
        $pendaftar->tgl_lahir = dateStore($request->tgl_lahir);
        $pendaftar->save();

        return redirect()->route('pendaftaran');
    }

    public function hapus($id)
    {
        $pendaftar = Pendaftar::find($id);
        $pendaftar->delete();

        return redirect()->route('pendaftaran');
    }
}
