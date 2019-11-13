@extends('layouts.template')

@section('title', 'Pembayaran')

@section('content')

<div class="page-header">
    <h1 class="page-title">Pembayaran</h1>
</div>
<div class="page-content">
    <div class="panel">
        <div class="panel-header row gutter-sm mb-4">
            <div class="col-md-8 panel-filter">
                <form id="form_filter" class="row" action="{{ route('pembayaran_filter') }}">
                    {{ csrf_field() }}
                    <div class="col-md-3">
                        <label>Jenis Pembayaran</label>
                        <select class="select-control run-filter" data-width="100%" name="filter_jenis">
                            <option value="" selected>Semua</option>
                            <option 
                                @if (isset($request))
                                    @if ($request->filter_jenis == 'pendaftaran')
                                        selected="" 
                                    @endif
                                @endif
                            value="pendaftaran">Pendaftaran</option>
                            <option 
                                @if (isset($request))
                                    @if ($request->filter_jenis == 'cicilan')
                                        selected="" 
                                    @endif
                                @endif
                            value="cicilan">Cicilan</option>
                        </select>
                    </div>
                    <div class="col-md-3">
                       <label>Tampilkan Bulan</label>
                        <select class="select-control run-filter" title="Pilih jenis" data-width="100%" name="filter_bulan">
                            <option value="" selected>Semua Bulan</option>
                            @foreach (getMonth() as $i => $d)
                                <option @if (isset($request))
                                    @if ($request->filter_bulan == $d['value'])
                                        selected
                                    @endif
                                @endif value="{{ $d['value'] }}" >{{ $d['name'] }}</option>
                            @endforeach
                        </select>
                    </div>
                </form>
            </div>
            <div class="col-md-4 panel-action">
                <a class="btn btn-primary" href="#modalPembayaran" data-toggle="modal" data-target="#modalPembayaran">Tambah Pembayaran</a>
            </div>
        </div>

        <div class="panel-body">
            <div class="table-wrap table-responsive" style="min-height: 280px">
                <table id="tablePembayaran" class="table">
                    <thead>
                        <tr>
                            <th>Jenis Pembayaran</th>
                            <th>Tgl. Pembayaran</th>
                            <th>Nama Pendaftar/Siswa</th>
                            <th class="no-sort">Terima Dari</th>
                            <th class="no-sort">Jumlah Uang</th>
                            <th class="no-sort">Catatan</th>
                            <th class="no-sort" style="width: 100px"></th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse($pembayaran as $p)
                        <tr class="has-more">
                            <td>{{ $p->jenis_pembayaran }}</td>
                            <td>{{ tgl_id($p->tgl_pembayaran) }}</td>
                            <td>{{ $p->pendaftar->nama }}</td>
                            <td>{{ $p->terima_dari }}</td>
                            <td>{{ $p->jumlah_uang }}</td>
                            <td>{{ $p->pesan }}</td>
                            <td align="right">
                                <a class="btn btn-link" href="{{ route('pembayaran_edit', $p->id) }}" style="text-decoration: none"><i class="fal fa-edit"></i> Ubah</a>
                            </td>
                        </tr>
                        @empty
                        <tr>
                            <td colspan="9" align="center">
                                <div class="table-no-data">Belum ada data. <a class="btn-link" href="{{ route('pendaftaran_add') }}">tambah data</a></div>
                            </td>
                        </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>

@endsection


@section('modal')

<div class="modal fade modal-zoom" id="modalDelete" tabindex="-1" role="dialog">
    <div class="modal-dialog modal-dialog-centered modal-sm" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h3 class="modal-title">Hapus</h3>
            </div>
            <div class="modal-body">
                <p>Apakah Anda yakin untuk menghapus<br>data pendaftaran oleh <strong id="md_nama"></strong>?</p>
            </div>
            <div class="modal-footer">
                <button class="btn btn-link" type="button" data-dismiss="modal">Batal</button>
                <a id="md_link" class="btn btn-danger" href="">Hapus</a>
            </div>
        </div>
    </div>
</div>

<div class="modal fade modal-zoom" id="modalPembayaran" tabindex="-1" role="dialog">
    <div class="modal-dialog modal-dialog-centered modal-sm" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h3 class="modal-title" style="text-align: center; display: block; width: 100%">Pilih tipe pembayaran</h3>
            </div>
            <div class="modal-body">
                <a href="{{ route('pembayaran_add1') }}" class="btn btn-primary btn-block mb-3">Pembayaran Biaya Pendaftaran</a>
                <a href="{{ route('pembayaran_add2') }}" class="btn btn-primary btn-block">Pembayaran Biaya Kursus</a>
            </div>
        </div>
    </div>
</div>

@endsection

@section('addscript')

<script type="text/javascript">

    $('.run-filter').change(function(){
        $('#form_filter').submit();
    })   

    $('.btn-delete').each(function(){
        var $t = $(this),
            $id = $t.data('id'),
            $nama = $t.data('name');

        $t.click(function(){
            $('body').find('#md_nama').html($nama);
            $('body').find('#md_link').attr('href', 'pendaftaran/hapus/'+$id);
            console.log($id + ', ' + $nama)
        })

    })

</script>

@endsection
