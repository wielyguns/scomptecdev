<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('auth.login');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::get('/pendaftaran','PendaftaranController@index')->name('pendaftaran');
Route::get('/pendaftaran/filter','PendaftaranController@filter')->name('pendaftaran_filter');
Route::get('/pendaftaran/tambah', 'PendaftaranController@tambah')->name('pendaftaran_add');
Route::post('/pendaftaran/simpan', 'PendaftaranController@simpan')->name('pendaftaran_store');
Route::get('/pendaftaran/detail/{id}', 'PendaftaranController@lihat')->name('pendaftaran_view');
Route::get('/pendaftaran/ubah/{id}', 'PendaftaranController@ubah')->name('pendaftaran_edit');
Route::put('/pendaftaran/perbarui/{id}', 'PendaftaranController@perbarui')->name('pendaftaran_update');
Route::get('/pendaftaran/hapus/{id}', 'PendaftaranController@hapus')->name('pendaftaran_delete');

Route::get('/pembayaran','PembayaranController@index')->name('pembayaran');
Route::get('/pembayaran/filter','PembayaranController@filter')->name('pembayaran_filter');
Route::get('/pembayaran/pembayaran-pendaftaran', 'PembayaranController@tambah1')->name('pembayaran_add1');
Route::get('/pembayaran/Pembayraan-cicilan', 'PembayaranController@tambah2')->name('pembayaran_add2');
Route::post('/pembayaran/simpan', 'PembayaranController@simpan')->name('pembayaran_store');
Route::get('/pembayaran/ubah/{id}', 'PembayaranController@ubah')->name('pembayaran_edit');
Route::put('/pembayaran/perbarui/{id}', 'PembayaranController@perbarui')->name('pembayaran_update');
Route::get('/pembayaran/hapus/{id}', 'PembayaranController@hapus')->name('pembayaran_delete');

Route::get('/siswa','SiswaController@index')->name('siswa');
Route::get('/siswa/tambah', 'SiswaController@tambah')->name('siswa_add');
Route::get('/siswa/get-data', 'SiswaController@get_data_siswa')->name('get_data_siswa');
Route::post('/siswa/simpan', 'SiswaController@simpan')->name('siswa_store');
Route::get('/siswa/detail/{id}', 'SiswaController@lihat')->name('siswa_view');
Route::get('/siswa/ubah/{id}', 'SiswaController@ubah')->name('siswa_edit');
Route::get('/siswa/perbarui/{id}', 'SiswaController@perbarui')->name('siswa_update');
Route::get('/siswa/delete/{id}', 'SiswaController@hapus')->name('siswa_delete');

Route::get('/jadwal','JadwalController@index')->name('jadwal');
Route::get('/jadwal/tambah','JadwalController@add')->name('jadwal_add');
Route::get('/jadwal/ubah','JadwalController@edit')->name('jadwal_edit');
Route::post('/jadwal/store','JadwalController@store')->name('jadwal_store');
Route::get('/jadwal/delete/{id}', 'JadwalController@delete')->name('kelas_delete');

Route::get('/kelas','KelasController@index')->name('kelas');
Route::get('/kelas/tambah', 'KelasController@tambah')->name('kelas_add');
Route::get('/kelas/get-kode', 'KelasController@get_kode_kelas')->name('get_kode_kelas');
Route::post('/kelas/simpan', 'KelasController@simpan')->name('kelas_store');
Route::get('/kelas/ubah/{id}', 'KelasController@edit')->name('kelas_edit');
Route::put('/kelas/update/{id}', 'KelasController@update')->name('kelas_update');
Route::get('/kelas/delete/{id}', 'KelasController@delete')->name('kelas_delete');

Route::get('/instruktur','InstrukturController@index')->name('instruktur');
Route::get('/instruktur/tambah', 'InstrukturController@tambah')->name('instruktur_add');
Route::post('/instruktur/store', 'InstrukturController@store')->name('instruktur_store');
Route::get('/instruktur/detail/{id}', 'InstrukturController@view')->name('instruktur_view');
Route::get('/instruktur/ubah/{id}', 'InstrukturController@edit')->name('instruktur_edit');
Route::put('/instruktur/update/{id}', 'InstrukturController@update')->name('instruktur_update');
Route::get('/instruktur/delete/{id}', 'InstrukturController@delete')->name('instruktur_delete');


Route::get('/program-kursus', 'ProgramKursusController@index')->name('program_kursus');
Route::get('/program-kursus/tambah', 'ProgramKursusController@tambah')->name('program_kursus_add');
Route::post('/program-kursus/store', 'ProgramKursusController@store')->name('program_kursus_store');
Route::get('/program-kursus/ubah/{id}', 'ProgramKursusController@edit')->name('program_kursus_edit');
Route::put('/program-kursus/update/{id}', 'ProgramKursusController@update')->name('program_kursus_update');
Route::get('/program-kursus/delete/{id}', 'ProgramKursusController@delete')->name('program_kursus_delete');