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
        $pk = Program_kursus::orderBy('nama', 'asc')->paginate(10);;

        // mengirim data ke view
        return view('pages.program_kursus', ['program_kursus' => $pk]);
    }

    public function tambah()
    {
        return view('pages.program_kursus_add');
    }

    public function store(Request $request)
    {
        // validasi data
        $rules = [
            'nama' => 'required',
            'kode' => ['required','unique:program_kursus']
        ];

        $customMessages = [
            'required' => 'Kolom ini harus di isi!',
            'unique' => 'Kode program telah digunakan!'
        ];

        $this->validate($request, $rules, $customMessages);

        // menyimpan data
        Program_kursus::create([
            'nama' => $request->nama,
            'kode' => $request->kode
        ]);

        return redirect()->route('program_kursus');
    }

    public function edit($id)
    {
        $pk = Program_kursus::find($id);
        return view('pages.program_kursus_edit', ['program_kursus' => $pk]);
    }



    public function update($id, Request $request)
    {
        // validasi data
        $rules = [
            'nama' => 'required',
            'kode' => 'required|unique:program_kursus,kode,' . $id
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
