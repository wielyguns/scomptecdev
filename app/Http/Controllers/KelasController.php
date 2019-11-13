<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Kelas;
use App\Program_kursus;
use Response;
class KelasController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */    
    protected $customMessages;

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        // mengambil data
        $kelas = Kelas::all();

        // mengirim data ke view
        return view('pages.kelas.kelas', ['data' => $kelas]);
    }

    public function tambah()
    {
        $program = Program_kursus::orderBy('nama', 'asc')->get();
        return view('pages.kelas.kelas_add', ['program' => $program]);
    }

    public function simpan(Request $request)
    {
        $rules = [
            'program_kursus_id' => 'required',
            'kode' => 'required|unique:kelas,kode,',
            'durasi' => 'required',
            'kapasitas' => 'required',
            'jenis_kelas' => 'required',
        ];        

        $customMessages = [
            'required' => 'Kolom ini harus di isi!',
            'unique' => 'Kode kelas telah digunakan!'
        ];

        $this->validate($request, $rules, $customMessages);

        Kelas::create([
            'program_kursus_id' => $request->program_kursus_id,
            'kode' => $request->kode,
            'durasi' => $request->durasi,
            'kapasitas' => $request->kapasitas,
        ]);

        return redirect()->route('kelas');
    }

    public function edit($id)
    {
        return redirect()->route('kelas');
    }

    public function update($id, Request $request)
    {
        return redirect()->route('kelas');
    }

    public function delete($id)
    {
        return redirect()->route('kelas');
    }

    public function get_kode_kelas(Request $req)
    {
        if ($req->jenis_kelas != null and $req->id != null and $req->jenis_kelas == 'REG') {
             $index = Kelas::selectRaw("max(substring(kode,5)) as kode")
                          ->where('program_kursus_id',$req->id)
                          ->where('jenis_kelas',$req->jenis_kelas)
                          ->first()
                          ->kode;

            $index = (integer)$index+1;

            return Response::json(['status'=>1,'kode'=>$index]);
        }else{
            return Response::json(['status'=>2,'pesan'=>'Data Belum Lengkap']);
        }
    }
}
