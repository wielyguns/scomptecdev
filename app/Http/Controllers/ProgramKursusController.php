<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Program_kursus;

class ProgramKursusController extends Controller
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
        $pk = Program_kursus::orderBy('nama', 'asc')->get();

        // mengirim data ke view
        return view('pages.program-kursus.program_kursus', ['program_kursus' => $pk]);
    }

    public function tambah()
    {
        return view('pages.program-kursus.program_kursus_add');
    }

    public function store(Request $request)
    {
        $rules = [
            'nama' => 'required',
            'kode' => 'required|unique:program_kursus,kode,',
            'biaya_pendaftaran' => 'required',
            'biaya_reguler' => 'required',
            'biaya_private' => 'required',
        ];        
        $customMessages = [
            'required' => 'Kolom ini harus di isi!',
            'unique' => 'Kode program telah digunakan!'
        ];
        $this->validate($request, $rules, $customMessages);

        // menyimpan data
        Program_kursus::create([
            'nama' => $request->nama,
            'kode' => $request->kode,
            'biaya_pendaftaran' => $request->biaya_pendaftaran,
            'biaya_reguler' => $request->biaya_reguler,
            'biaya_private' => $request->biaya_private,
        ]);

        return redirect()->route('program_kursus');
    }

    public function edit($id)
    {
        $pk = Program_kursus::find($id);
        return view('pages.program-kursus.program_kursus_edit', ['program_kursus' => $pk]);
    }



    public function update($id, Request $request)
    {
        $rules = [
            'nama' => 'required',
            'kode' => 'required|unique:program_kursus,kode,' . $id,
            'biaya_pendaftaran' => 'required',
            'biaya_reguler' => 'required',
            'biaya_private' => 'required',
        ];        
        $customMessages = [
            'required' => 'Kolom ini harus di isi!',
            'unique' => 'Kode program telah digunakan!'
        ];
        $this->validate($request, $rules, $customMessages);

        // update data
        $pk = Program_kursus::find($id);
        $pk->nama = $request->nama;
        $pk->kode = $request->kode;
        $pk->biaya_pendaftaran = $request->biaya_pendaftaran;
        $pk->biaya_reguler = $request->biaya_reguler;
        $pk->biaya_private = $request->biaya_private;
        $pk->save();

        return redirect()->route('program_kursus');
    }

    public function delete($id)
    {
        $pk = Program_kursus::find($id);
        $pk->delete();
        return redirect()->route('program_kursus');
    }
}
