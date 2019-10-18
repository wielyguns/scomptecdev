@extends('layouts.template')

@section('title', 'Pembayaran')

@section('content')

<div class="box-content">
	<section class="content-head">
		<div class="content-title">
			<h1 class="title">Pembayaran</h1>
		</div>
	</section>
	<section class="content-wrap">
	    <nav class="nav nav-tabs"><a class="nav-item nav-link active" data-toggle="tab" href="#nav1">Semua Pembayaran</a><a class="nav-item nav-link" data-toggle="tab" href="#nav2">Pembayaran Hari Ini</a></nav>
	    <div class="tab-content">
	        <div class="tab-pane fade show active" id="nav1">
	            <div class="filter-wrap">
	                <div class="filter">
	                    <div class="item">
	                        <select class="select-control">
	                            <option selected="selected">Semua jenis kursus</option>
	                            <option>Private</option>
	                            <option>Reguler</option>
	                        </select>
	                    </div>
	                    <div class="item">
	                        <select class="select-control">
	                            <option selected="selected">Semua program</option>
	                            <option>Aplikasi Perkantoran</option>
	                            <option>Desain Grafis</option>
	                            <option>Program 3</option>
	                            <option>Program 4</option>
	                            <option>Program 5</option>
	                            <option>Program 6</option>
	                            <option>Program 7</option>
	                            <option>Program 8</option>
	                        </select>
	                    </div>
	                    <div class="search">
	                        <form>
	                            <input class="form-control" type="text" placeholder="Cari ..." />
	                        </form>
	                    </div>
	                </div>
	            </div>
	            <div class="table-wrap">
	                <table class="table">
	                    <thead>
	                        <tr>
	                            <th><span>No Pembayaran</span></th>
	                            <th><span>Jenis Kursus</span></th>
	                            <th><span>Tgl. Pembayaran</span></th>
	                            <th><span>Terima Dari</span></th>
	                            <th><span>Jumlah Uang</span></th>
	                            <th><span>Program</span></th>
	                            <th><span>Kelas</span></th>
	                            <th><span class="sr-only">Action</span></th>
	                        </tr>
	                    </thead>
	                    <tbody>
	                        <tr>
	                            <td>201901-00001</td>
	                            <td>Private</td>
	                            <td>Senin, 10 Jan 2019</td>
	                            <td>Sheany Inggraeni</td>
	                            <td class="text-right">Rp 2.150.000<a class="fal fa-info-circle" tabindex="0" data-toggle="popover" data-trigger="focus" data-placement="top" title="Terbilang" data-content="Dua Juta Seratus Lima Puluh Ribu Rupiah"></a></td>
	                            <td>Desktop Publishing</td>
	                            <td>DPB.SHEANY</td>
	                            <td class="text-right">
	                                <div class="dropdown more-action">
	                                    <div class="dropdown-action" data-toggle="dropdown"><i class="far fa-ellipsis-h"></i></div>
	                                    <div class="dropdown-menu dropdown-menu-right"><a class="dropdown-item text-primary" href="#modalKwitansiP" data-toggle="modal" data-target="#modalKwitansiP"><i class="fal fa-print"> </i><span class="ml-2">Cetak</span></a><a class="dropdown-item" href="tariat-pembayaran-edit.html">Ubah</a><a class="dropdown-item" href="#modalDelete" data-toggle="modal" data-target="#modalDelete"> <span class="text-danger">Hapus</span></a></div>
	                                </div>
	                            </td>
	                        </tr>
	                        <tr>
	                            <td>201901-00002</td>
	                            <td>Regular</td>
	                            <td>Senin, 10 Jan 2019</td>
	                            <td>Irfan Adi Pesetya</td>
	                            <td class="text-right">Rp 300.000<a class="fal fa-info-circle" tabindex="0" data-toggle="popover" data-trigger="focus" data-placement="top" title="Terbilang" data-content="Tiga Ratus Ribu Rupiah"></a></td>
	                            <td>Administrasi Perkantoran</td>
	                            <td>ADM.007</td>
	                            <td class="text-right">
	                                <div class="dropdown more-action">
	                                    <div class="dropdown-action" data-toggle="dropdown"><i class="far fa-ellipsis-h"></i></div>
	                                    <div class="dropdown-menu dropdown-menu-right"><a class="dropdown-item text-primary" href="#modalKwitansiR" data-toggle="modal" data-target="#modalKwitansiR"><i class="fal fa-print"> </i><span class="ml-2">Cetak</span></a><a class="dropdown-item" href="tariat-pembayaran-edit.html">Ubah</a><a class="dropdown-item" href="#modalDelete" data-toggle="modal" data-target="#modalDelete"> <span class="text-danger">Hapus</span></a></div>
	                                </div>
	                            </td>
	                        </tr>
	                        <tr>
	                            <td>201901-00002</td>
	                            <td>Regular</td>
	                            <td>Senin, 10 Jan 2019</td>
	                            <td>Irfan Adi Pesetya</td>
	                            <td class="text-right">Rp 300.000<a class="fal fa-info-circle" tabindex="0" data-toggle="popover" data-trigger="focus" data-placement="top" title="Terbilang" data-content="Tiga Ratus Ribu Rupiah"></a></td>
	                            <td>Administrasi Perkantoran</td>
	                            <td>ADM.007</td>
	                            <td class="text-right">
	                                <div class="dropdown more-action">
	                                    <div class="dropdown-action" data-toggle="dropdown"><i class="far fa-ellipsis-h"></i></div>
	                                    <div class="dropdown-menu dropdown-menu-right"><a class="dropdown-item text-primary" href="#modalKwitansiR" data-toggle="modal" data-target="#modalKwitansiR"><i class="fal fa-print"> </i><span class="ml-2">Cetak</span></a><a class="dropdown-item" href="tariat-pembayaran-edit.html">Ubah</a><a class="dropdown-item" href="#modalDelete" data-toggle="modal" data-target="#modalDelete"> <span class="text-danger">Hapus </span></a></div>
	                                </div>
	                            </td>
	                        </tr>
	                        <tr>
	                            <td>201901-00002</td>
	                            <td>Regular</td>
	                            <td>Senin, 10 Jan 2019</td>
	                            <td>Irfan Adi Pesetya</td>
	                            <td class="text-right">Rp 300.000<a class="fal fa-info-circle" tabindex="0" data-toggle="popover" data-trigger="focus" data-placement="top" title="Terbilang" data-content="Tiga Ratus Ribu Rupiah"></a></td>
	                            <td>Administrasi Perkantoran</td>
	                            <td>ADM.007</td>
	                            <td class="text-right">
	                                <div class="dropdown more-action">
	                                    <div class="dropdown-action" data-toggle="dropdown"><i class="far fa-ellipsis-h"></i></div>
	                                    <div class="dropdown-menu dropdown-menu-right"><a class="dropdown-item text-primary" href="#modalKwitansiR" data-toggle="modal" data-target="#modalKwitansiR"><i class="fal fa-print"> </i><span class="ml-2">Cetak</span></a><a class="dropown-item" href="tariat-pembayaran-edit.html">Ubah</a><a class="dropdown-item" href="#modalDelete" data-toggle="modal" data-target="#modalDelete"> <span class="text-danger">Hapus</span></a></div>
	                                </div>
	                            </td>
	                        </tr>
	                        <tr>
	                            <td>201901-00002</td>
	                            <td>Regular</td>
	                            <td>Senin, 10 Jan 2019</td>
	                            <td>Irfan Adi Pesetya</td>
	                            <td class="text-right">Rp 300.000<a class="fal fa-info-circle" tabindex="0" data-toggle="popover" data-trigger="focus" data-placement="top" title="Terbilang" data-content="Tiga Ratus Ribu Rupiah"></a></td>
	                            <td>Administrasi Perkantoran</td>
	                            <td>ADM.007</td>
	                            <td class="text-right">
	                                <div class="dropdown more-action">
	                                    <div class="dropdown-action" data-toggle="dropdown"><i class="far fa-ellipsis-h"></i></div>
	                                    <div class="dropdown-menu dropdown-menu-right"><a class="dropdown-item text-primary" href="#modalKwitansiR" data-toggle="modal" data-target="#modalKwitansiR"><i class="fal fa-print"> </i><span class="ml-2">Cetak</span></a><a class="dropdown-item" href="tariat-pembayaran-edit.html">Ubah</a><a class="dropdown-item" href="#modalDelete" data-toggle="modal" data-target="#modalDelete"> <span class="text-danger">Hapus</span></a></div>
	                                </div>
	                            </td>
	                        </tr>
	                        <tr>
	                            <td>201901-00002</td>
	                            <td>Regular</td>
	                            <td>Senin, 10 Jan 2019</td>
	                            <td>Irfan Adi Pesetya</td>
	                            <td class="text-right">Rp 300.000<a class="fal fa-info-circle" tabindex="0" data-toggle="popover" data-trigger="focus" data-placement="top" title="Terbilang" data-content="Tiga Ratus Ribu Rupiah"></a></td>
	                            <td>Administrasi Perkantoran</td>
	                            <td>ADM.007</td>
	                            <td class="text-right">
	                                <div class="dropdown more-action">
	                                    <div class="dropdown-action" data-toggle="dropdown"><i class="far fa-ellipsis-h"></i></div>
	                                    <div class="dropdown-menu dropdown-menu-right"><a class="dropdown-item text-primary" href="#modalKwitansiR" data-toggle="modal" data-target="#modalKwitansiR"><i class="fal fa-print"> </i><span class="ml-2">Cetak</span></a><a class="dropdown-item" href="tariat-pembayaran-edit.html">Ubah</a><a class="dropdown-item" href="#modalDelete" data-toggle="modal" data-target="#modalDelete"> <span class="text-danger">Hapus</span></a></div>
	                                </div>
	                            </td>
	                        </tr>
	                    </tbody>
	                </table>
	            </div>
	        </div>
	        <div class="tab-pane fade" id="nav2">
	            <div class="filter-wrap">
	                <div class="filter">
	                    <a class="btn btn-orange" href="#modalKas" data-toggle="modal" data-target="#modalKas"> <i class="fal fa-print mr-2"></i>Cetak Kas</a>
	                    <div class="search">
	                        <form>
	                            <input class="form-control" type="text" placeholder="Cari ..." />
	                        </form>
	                    </div>
	                </div>
	            </div>
	            <div class="table-wrap">
	                <table class="table">
	                    <thead>
	                        <tr>
	                            <th><span>No Pembayaran</span></th>
	                            <th><span>Jenis Kursus</span></th>
	                            <th><span>Tgl. Pembayaran</span></th>
	                            <th><span>Terima Dari</span></th>
	                            <th><span>Jumlah Uang</span></th>
	                            <th><span>Program</span></th>
	                            <th><span>Kelas</span></th>
	                            <th><span class="sr-only">Action</span></th>
	                        </tr>
	                    </thead>
	                    <tbody>
	                        <tr>
	                            <td>201901-00001</td>
	                            <td>Private</td>
	                            <td>Senin, 10 Jan 2019</td>
	                            <td>Sheany Inggraeni</td>
	                            <td class="text-right">Rp 2.150.000<a class="fal fa-info-circle" tabindex="0" data-toggle="popover" data-trigger="focus" data-placement="top" title="Terbilang" data-content="Dua Juta Seratus Lima Puluh Ribu Rupiah"></a></td>
	                            <td>Desktop Publishing</td>
	                            <td>DPB.SHEANY</td>
	                            <td class="text-right">
	                                <div class="dropdown more-action">
	                                    <div class="dropdown-action" data-toggle="dropdown"><i class="far fa-ellipsis-h"></i></div>
	                                    <div class="dropdown-menu dropdown-menu-right"><a class="dropdown-item text-primary" href="#modalKwitansiP" data-toggle="modal" data-target="#modalKwitansiP"><i class="fal fa-print"> </i><span class="ml-2">Cetak</span></a><a class="dropdown-item" href="tariat-pembayaran-edit.html">Ubah</a><a class="dropdown-item" href="#modalDelete" data-toggle="modal" data-target="#modalDelete"> <span class="text-danger">Hapus</span></a></div>
	                                </div>
	                            </td>
	                        </tr>
	                        <tr>
	                            <td>201901-00002</td>
	                            <td>Regular</td>
	                            <td>Senin, 10 Jan 2019</td>
	                            <td>Irfan Adi Pesetya</td>
	                            <td class="text-right">Rp 300.000<a class="fal fa-info-circle" tabindex="0" data-toggle="popover" data-trigger="focus" data-placement="top" title="Terbilang" data-content="Tiga Ratus Ribu Rupiah"></a></td>
	                            <td>Administrasi Perkantoran</td>
	                            <td>ADM.007</td>
	                            <td class="text-right">
	                                <div class="dropdown more-action">
	                                    <div class="dropdown-action" data-toggle="dropdown"><i class="far fa-ellipsis-h"></i></div>
	                                    <div class="dropdown-menu dropdown-menu-right"><a class="dropdown-item text-primary" href="#modalKwitansiR" data-toggle="modal" data-target="#modalKwitansiR"><i class="fal fa-print"> </i><span class="ml-2">Cetak</span></a><a class="dropdown-item" href="tariat-pembayaran-edit.html">Ubah</a><a class="dropdown-item" href="#modalDelete" data-toggle="modal" data-target="#modalDelete"> <span class="text-danger">Hapus </span></a></div>
	                                </div>
	                            </td>
	                        </tr>
	                    </tbody>
	                </table>
	            </div>
	        </div>
	    </div>
	</section>

</div>

@endsection

@section('modal')

<div class="modal fade modal-zoom" id="modalKwitansiP" tabindex="-1" role="dialog">
    <div class="modal-dialog modal-dialog-centered modal-kwitansi" role="document">
        <div class="modal-content">
            <div class="modal-kwitansi-body">
                <div class="modal-header">
                    <div class="jenis-kursus"><span>Jenis Kursus: Private</span></div>
                    <div class="no-kwitansi"><span>No:</span><span>201901-0001</span></div>
                    <h2 class="modal-title">Bukti Pembayaran</h2>
                </div>
                <div class="row">
                    <div class="col-4">
                        <label>Terima dari</label>
                    </div>
                    <div class="col-8"> <span class="data">Sheany Inggraeni</span></div>
                    <div class="col-4">
                        <label>Uang Sejumlah</label>
                    </div>
                    <div class="col-8"> <span class="data">Rp 2.150.000</span><span class="data">(Dua Juta Seratus Lima Puluh Ribu Rupiah)</span></div>
                    <div class="col-4">
                        <label>Untuk Pembayaran Kursus</label>
                    </div>
                    <div class="col-8"><span class="data">Desktop Publishing</span></div>
                    <div class="col-4">
                        <label>Gelombang</label>
                    </div>
                    <div class="col-8"><span class="data">DPB.SHEANY</span></div>
                </div>
                <div class="row">
                    <div class="col-4 ttd"><span class="date">Surabaya, 10 Januari 2019</span><span class="admin-name">[Admin Name]</span></div>
                </div>
                <div class="modal-footer justify-content-center"><a class="btn btn-orange" href="#"> <i class="fal fa-print"></i><span class="ml-2">Cetak Bukti Pembayaran</span></a></div>
            </div>
        </div>
    </div>
</div>

<div class="modal fade modal-zoom" id="modalKas" tabindex="-1" role="dialog">
    <div class="modal-dialog modal-dialog-centered modal-kwitansi" role="document">
        <div class="modal-content">
            <div class="modal-kwitansi-body">
                <div class="modal-header" style="justify-content: center;">
                    <h2 class="modal-title">Laporan Kas Harian</h2>
                    <p>Tgl: 28-09-19</p>
                </div>
                <table class="table">
                	<thead>
                		<tr>
                			<th>Jenis Kursus</th>
                			<th style="text-align: right;">Pendaftar</th>
                			<th style="text-align: right;">Biaya Kursus</th>
                			<th style="text-align: right;">Jumlah</th>
                		</tr>
                	</thead>
                	<tbody>
                		<tr>
                			<td>Administrasi Perkantoran</td>
                			<td style="text-align: right;">2</td>
                			<td style="text-align: right;">Rp. 300.000</td>
                			<td style="text-align: right;">Rp. 600.000</td>
                		</tr>
                		<tr>
                			<td>Administrasi Perkantoran</td>
                			<td style="text-align: right;">1</td>
                			<td style="text-align: right;">Rp. 2.350.000</td>
                			<td style="text-align: right;">Rp. 2.350.000</td>
                		</tr>
                		<tr>
                			<td style="border-top: 3px solid #C4CDD4;">Total</td>
                			<td style="border-top: 3px solid #C4CDD4; text-align: right;">3</td>
                			<td style="border-top: 3px solid #C4CDD4; text-align: right;" colspan="2">Rp. 2.950.000</td>
                		</tr>
                	</tbody>
                </table>
                
                <div class="row">
                    <div class="col-4 ttd"><span class="date">Yang Melaporkan</span><span class="admin-name">[Admin Name]</span></div>
                </div>
                <div class="modal-footer justify-content-center"><a class="btn btn-orange" href="#"> <i class="fal fa-print"></i><span class="ml-2">Cetak Kas</span></a></div>
            </div>
        </div>
    </div>
</div>

<div class="modal fade modal-zoom" id="modalDelete" tabindex="-1" role="dialog">
    <div class="modal-dialog modal-dialog-centered modal-sm" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h3 class="modal-title">Hapus</h3>
            </div>
            <div class="modal-body">
                <p>Apakah Anda yakin untuk menghapus data ini?</p>
            </div>
            <div class="modal-footer">
                <button class="btn btn-link" type="button" data-dismiss="modal">Batal</button>
                <button class="btn btn-danger" type="submit">Hapus</button>
            </div>
        </div>
    </div>
</div>


@endsection