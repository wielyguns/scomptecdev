@extends('layouts.template')

@section('title', 'Data Pendaftar')

@section('content')

<div class="page-header">
    <h1 class="page-title">Detail Pendaftaran</h1>
</div>

<div class="page-content">
    <div class="panel">
        <div class="panel-body">
            <div class="row">
                <div class="col-md-8">
                    <div class="detail-wrap">
                        <div class="detail-item row">
                            <div class="col-md-4">
                                <Label>ID Pendaftaran</Label>
                            </div>
                            <div class="col-md-8"><span>{{ $pendaftar->id }}</span></div>
                        </div>
                        <div class="detail-item row">
                            <div class="col-md-4">
                                <Label>Jenis Kursus</Label>
                            </div>
                            <div class="col-md-8"><span>{{ $pendaftar->jenis_kursus }}</span></div>
                        </div>
                        <div class="detail-item row">
                            <div class="col-md-4">
                                <Label>Program Kursus</Label>
                            </div>
                            <div class="col-md-8"><span>{{ $pendaftar->program_kursus->nama }}</span></div>
                        </div>
                         <div class="detail-item row">
                            <div class="col-md-4">
                                <Label>Pembayaran Uang Muka</Label>
                            </div>
                            <div class="col-md-8"><span class="badge {{ $pendaftar->status_uang_muka == 'Lunas' ? 'badge-success' : 'badge-danger' }}">{{ $pendaftar->status_uang_muka }}</span></div>
                        </div>
                        <div class="detail-item row">
                            <div class="col-md-4">
                                <Label>Waktu Pendaftaran</Label>
                            </div>
                            <div class="col-md-8"><span>{{ tgl_id($pendaftar->created_at) }}</span></div>
                        </div>
                        <hr class="my-4">
                        <div class="detail-item row">
                            <div class="col-md-4">
                                <Label>Nama</Label>
                            </div>
                            <div class="col-md-8"><span>{{ $pendaftar->nama }}</span></div>
                        </div>
                        <div class="detail-item row">
                            <div class="col-md-4">
                                <Label>Jenis Kelamin</Label>
                            </div>
                            <div class="col-md-8"><span>{{ $pendaftar->jenis_kelamin }}</span></div>
                        </div>
                        <div class="detail-item row">
                            <div class="col-md-4">
                                <Label>Gelar Akademis</Label>
                            </div>
                            <div class="col-md-8"><span>{{ $pendaftar->gelar_akademis }}</span></div>
                        </div>
                        <div class="detail-item row">
                            <div class="col-md-4">
                                <Label>Alamat</Label>
                            </div>
                            <div class="col-md-8"><span>{{ $pendaftar->alamat }}</span></div>
                        </div>
                        <div class="detail-item row">
                            <div class="col-md-4">
                                <Label>Kota</Label>
                            </div>
                            <div class="col-md-8"><span>{{ $pendaftar->kota }}</span></div>
                        </div>
                        <div class="detail-item row">
                            <div class="col-md-4">
                                <Label>Kode Pos</Label>
                            </div>
                            <div class="col-md-8"><span>{{ $pendaftar->kode_pos }}</span></div>
                        </div>
                        <div class="detail-item row">
                            <div class="col-md-4">
                                <Label>Telepon</Label>
                            </div>
                            <div class="col-md-8"><span>{{ $pendaftar->telepon }}</span></div>
                        </div>
                        <div class="detail-item row">
                            <div class="col-md-4">
                                <Label>Email</Label>
                            </div>
                            <div class="col-md-8"><span><a href="mailto:{{ $pendaftar->email }}">{{ $pendaftar->email }}</a></span></div>
                        </div>
                        <div class="detail-item row">
                            <div class="col-md-4">
                                <Label>Tgl. Lahir</Label>
                            </div>
                            <div class="col-md-8"><span>{{ tgl_id($pendaftar->tgl_lahir) }}</span></div>
                        </div>
                        
                    </div>
                </div>
                <div class="col-md-3 ml-auto">
                    <div class="form-action form-action-sidebar sticky-me">
                        <ul class="side-menu">
                            <li class="side-menu-item">
                                <a class="side-menu-link" href="{{ route('pendaftaran_edit', $pendaftar->id) }}">Ubah Data</a>
                            </li>
                            <li class="side-menu-item">
                                <a class="side-menu-link btn-delete" data-id="{{ $pendaftar->id }}" data-name="{{ $pendaftar->nama }}" href="#modalDelete" data-toggle="modal" data-target="#modalDelete">Hapus Data</a>
                            </li>
                            <li class="side-menu-separator"></li>
                            <li class="side-menu-item">
                                <a class="side-menu-link" href="{{ route('pendaftaran') }}">Kembali</a>
                            </li>
                        </ul>
                    </div>
                </div>
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

    $('.btn-delete').each(function(){
        var $t = $(this),
            $id = $t.data('id'),
            $nama = $t.data('name');

        $t.click(function(){
            $('body').find('#md_nama').html($nama);
            $('body').find('#md_link').attr('href', '../hapus/'+$id);
            console.log($id + ', ' + $nama)
        })

    })

</script>

@endsection
