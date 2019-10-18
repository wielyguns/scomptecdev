<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Kelas;
use App\Program_kursus;

class KelasController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */    
    protected $customMessages;

    public function __construct()
    {
        $this->middleware('auth');        

        $this->customMessages = [
            'required' => 'Kolom ini harus di isi!',
            'unique' => 'Kode kelas telah digunakan!'
        ];
    }   

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        // mengambil data
        $kelas = Kelas::orderBy('kode', 'asc')->paginate(10);

        // mengirim data ke view
        return view('pages.kelas.kelas', ['data' => $kelas]);
    }

    public function tambah()
    {
        $program = Program_kursus::orderBy('nama', 'asc')->get();

        return view('pages.kelas.kelas_add', ['program' => $program]);
    }

    public function store(Request $request)
    {
        // validasi data
        $rules = [
            'program_kursus_id' => 'required',
            'kode' => 'required|unique:kelas',
            'durasi' => 'required',            
            'kapasitas' => 'required',            
            'biaya' => 'required',            
        ];

        $this->validate($request, $rules, $this->customMessages);

        // menyimpan datas
        Kelas::create([
            'program_kursus_id' => $request->program_kursus_id,
            'kode' => $request->kode,
            'durasi' => $request->durasi,
            'kapasitas' => $request->kapasitas,
            'biaya' => getRp($request->biaya),
            'jenis' => $request->jenis,
        ]);

        return redirect()->route('kelas');
    }

    public function edit($id)
    {
        $kelas = Kelas::find($id);
        $program = Program_kursus::orderBy('nama', 'asc')->get();

        return view('pages.kelas.kelas_edit', ['data' => $kelas, 'program' => $program]);
    }

    public function update($id, Request $request)
    {
        // validasi data
        $rules = [
            'program_kursus_id' => 'required',
            'kode' => 'required|unique:kelas,kode,' . $id,
            'durasi' => 'required',            
            'kapasitas' => 'required',            
            'biaya' => 'required',            
        ];

        $this->validate($request, $rules, $this->customMessages);

        // update data
        $kelas = Kelas::find($id);
        $kelas->program_kursus_id = $request->program_kursus_id;
        $kelas->kode = $request->kode;
        $kelas->durasi = $request->durasi;
        $kelas->kapasitas = $request->kapasitas;
        $kelas->biaya = getRp($request->biaya);
        $kelas->jenis = $request->jenis;
        $kelas->save();

        return redirect()->route('kelas');
    }

    public function delete($id)
    {
        $data = Kelas::find($id);
        $data->delete();
        return redirect()->route('kelas');
    }
}
