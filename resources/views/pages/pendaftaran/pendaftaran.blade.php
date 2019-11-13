@extends('layouts.template')

@section('title', 'Pendaftaran')

@section('content')

<div class="page-header">
    <h1 class="page-title">Pendaftaran</h1>
</div>
<div class="page-content">
    <div class="panel">
        <div class="panel-header row gutter-sm">
            <div class="col-md-8 panel-filter">
                @if (Session::has('message'))
                    {{ Session::get('message')[0] }}
                @endif
                <form id="form_filter" class="row" action="{{ route('pendaftaran_filter') }}">
                    {{ csrf_field() }}
                    <div class="col-md-3">
                        <label>Jenis Pendaftaran</label>
                        <select class="select-control run-filter" data-width="100%" name="filter_jenis">
                            <option value="" selected>Semua</option>
                            <option 
                                @if (isset($request))
                                    @if ($request->filter_jenis == 'Reguler')
                                        selected="" 
                                    @endif
                                @endif
                            value="Reguler">Reguler</option>
                            <option 
                                @if (isset($request))
                                    @if ($request->filter_jenis == 'Private')
                                        selected="" 
                                    @endif
                                @endif
                            value="Private">Private</option>
                        </select>
                    </div>
                </form>
            </div>
            <div class="col-md-4 panel-action">
                <a class="btn btn-primary" href="{{ route('pendaftaran_add') }}">Tambah Pendaftaran</a>
            </div>
        </div>
        <div class="panel-body">
            <div class="table-wrap table-responsive" style="min-height: 280px">
                <table id="myTable1" class="table">
                    <thead>
                        <tr>
                            <th style="width: 100px">ID Pendaftar</th>
                            <th style="width: 120px">Jenis Kursus</th>
                            <th style="width: 150px">Waktu Pendaftaran</th>
                            <th style="width: 160px">Program Kursus</th>
                            <th style="width: 200px">Nama</th>
                            <th style="width: 120px">Pembayaran</th>
                            <th class="no-sort" style="width: 80px"></th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse($pendaftar as $p)
                        <tr class="has-more">
                            <td>{{ $p->id }}</td>
                            <td>{{ $p->jenis_kursus }}</td>
                            <td>{{ tgl_id($p->created_at) }}</td>
                            <td>{{ $p->program_kursus->nama }}</td>
                            <td>{{ $p->nama }}</td>
                            <td><span class="badge {{ $p->status_pembayaran == 'Lunas' ? 'badge-success' : 'badge-danger' }}">{{ $p->status_pembayaran }}</span></td>
                            <td align="right">
                                <div class="dropdown more-action">
                                    <div class="dropdown-action" data-toggle="dropdown">Aksi</div>
                                    <div class="dropdown-menu dropdown-menu-right">
                                        <a class="dropdown-item" href="{{ route('pendaftaran_view', $p->id) }}">Lihat Detail</a>
                                        <a class="dropdown-item" href="{{ route('pendaftaran_edit', $p->id) }}">Ubah</a>
                                        <a data-id="{{ $p->id }}" data-name="{{ $p->nama }}" class="dropdown-item item-danger btn-delete" href="#modalDelete" data-toggle="modal" data-target="#modalDelete">
                                            <span class="text-danger">Hapus</span>
                                        </a>
                                    </div>
                                </div>
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
