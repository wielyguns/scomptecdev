<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Instruktur;
use App\Jadwal;

class InstrukturController extends Controller
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
        $instruktur = Instruktur::orderBy('nama', 'asc')->paginate(10);;

        // mengirim data ke view
        return view('pages.instruktur', ['instruktur' => $instruktur]);
    }

    public function tambah()
    {
        return view('pages.instruktur_add');
    }

    public function store(Request $request)
    {
        // validasi data
        $rules = [
            'nama' => 'required',
            'alamat' => 'required',
            'email' => 'required|email',            
            'tgl_lahir' => 'required',            
        ];

        $customMessages = [
            'required' => 'Kolom ini harus di isi!',
            'email' => 'Format email salah!'
        ];

        $this->validate($request, $rules, $customMessages);

        // menyimpan datas
        Instruktur::create([
            'nama' => $request->nama,
            'alamat' => $request->alamat,
            'telepon' => $request->telepon,
            'email' => $request->email,
            'status' => $request->status,
            'tgl_lahir' => dateStore($request->tgl_lahir),
            'tgl_bergabung' => dateStore($request->tgl_bergabung)
        ]);

        return redirect()->route('instruktur');
    }

    public function view($id)
    {
        $instruktur = Instruktur::find($id);
        return view('pages.instruktur_view', ['instruktur' => $instruktur]);
    }

    public function edit($id)
    {
        $instruktur = Instruktur::find($id);
        return view('pages.instruktur_edit', ['instruktur' => $instruktur]);
    }

    public function update($id, Request $request)
    {
        // validasi data
        $rules = [
            'nama' => 'required',
            'alamat' => 'required',
            'email' => 'required|email',            
        ];

        $customMessages = [
            'required' => 'Kolom ini harus di isi!',
            'email' => 'Format email salah!'
        ];

        $this->validate($request, $rules, $customMessages);

        // update data
        $instruktur = Instruktur::find($id);
        $instruktur->nama = $request->nama;
        $instruktur->alamat = $request->alamat;
        $instruktur->telepon = $request->telepon;
        $instruktur->email = $request->email;
        $instruktur->status = $request->status;
        $instruktur->tgl_lahir = dateStore($request->tgl_lahir);
        $instruktur->tgl_bergabung = dateStore($request->tgl_bergabung);
        $instruktur->save();

        return redirect()->route('instruktur');
    }

    public function delete($id)
    {
        $instruktur = Instruktur::find($id);
        $instruktur->delete();
        $jadwal = Jadwal::where('instruktur_id', $id);
        $jadwal->delete();


        return redirect()->route('instruktur');
    }
}
