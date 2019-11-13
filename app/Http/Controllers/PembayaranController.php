<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Pembayaran;
use App\Program_kursus;
use App\Pendaftar;
use DB;
class PembayaranController extends Controller
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
        $pembayaran = Pembayaran::all();
        return view('pages.pembayaran.pembayaran', ['pembayaran' => $pembayaran]);
    }

    public function filter(Request $request)
    {   
        $a = $request->filter_jenis;
        $b = $request->filter_bulan;
        // dd($b);
        $pembayaran = Pembayaran::where(function($q) use ($a,$b){
                                    if ($a != null) {
                                        $q->where('jenis_pembayaran',$a);
                                    }
                                    if ($b != null) {
                                        $q->whereRaw("MONTH(tgl_pembayaran) = '$b'");
                                    }
                                })
                                ->get();
        return view('pages.pembayaran.pembayaran',compact('pembayaran','request'));
    }


    public function tambah1()
    {
        $program = Program_kursus::orderBy('nama', 'asc')->get();
        $pendaftar = Pendaftar::where('status_pembayaran','Belum Lunas')->orderBy('nama', 'asc')->get();
        return view('pages.pembayaran.pembayaran_add', ['program' => $program, 'pendaftar' => $pendaftar, 'paymentType' => 'Pendaftaran']);
    }

    public function tambah2()
    {
        $program = Program_kursus::orderBy('nama', 'asc')->get();
        $pendaftar = Pendaftar::where('status_pembayaran','Belum Lunas')->orderBy('nama', 'asc')->get();
        return view('pages.pembayaran.pembayaran_add', ['program' => $program, 'pendaftar' => $pendaftar, 'paymentType' => 'Cicilan']);
    }

    public function simpan(Request $request)
    {
        return DB::transaction(function() use ($request){
            $rules = [
                'pendaftar_id' => 'required',
                'terima_dari' => 'required',
                'jumlah_uang' => 'required',
                'tgl_pembayaran' => 'required',
            ];        
            $customMessages = [
                'required' => 'Kolom ini harus di isi!',
            ];
            $this->validate($request, $rules, $customMessages);

            // return redirect()->route('pendaftaran');

            Pembayaran::create([
                'jenis_pembayaran' => $request->jenis_pembayaran,
                'pendaftar_id' => $request->pendaftar_id,
                'terima_dari' => $request->terima_dari,
                'jumlah_uang' => $request->jumlah_uang,
                'tgl_pembayaran' => dateStore($request->tgl_pembayaran),
                'pesan' => $request->pesan,
            ]);

            $pendaftar = Pendaftar::find($request->pendaftar_id);
            $pendaftar->status_pembayaran = "Lunas";
            $pendaftar->save();
            
            return redirect()->route('pembayaran');
        });
    }

    public function ubah($id)
    {
        $program = Program_kursus::orderBy('nama', 'asc')->get();
        $pembayaran = Pembayaran::find($id);
        $pendaftar = Pendaftar::orderBy('nama', 'asc')->get();
        return view('pages.pembayaran.pembayaran_edit', ['pembayaran' => $pembayaran], ['pendaftar' => $pendaftar], ['program' => $program]);
    }

    public function perbarui($id, Request $request)
    {
        $rules = [
            'pendaftar_id' => 'required',
            'terima_dari' => 'required',
            'jumlah_uang' => 'required',
            'tgl_pembayaran' => 'required',
        ];        
        $customMessages = [
            'required' => 'Kolom ini harus di isi!',
        ];
        $this->validate($request, $rules, $customMessages);
        // dd($request->all());

        Pembayaran::where('id',$id)
                  ->update([
                    'jenis_pembayaran'=>$request->jenis_pembayaran,
                    'terima_dari'=>$request->terima_dari,
                    'tgl_pembayaran'=>dateStore($request->tgl_pembayaran),
                    'pesan'=>$request->pesan,
                  ]);


        return redirect()->route('pembayaran');
    }

}
