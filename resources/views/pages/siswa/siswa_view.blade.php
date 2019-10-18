@extends('layouts.template')

@section('title', 'Data Program Kursus')

@section('content')

<div class="box-content">
    <section class="content-head">
        <div class="content-title">
            <h1 class="title">Detail Pendaftar</h1>
        </div>
        <div class="content-action"><a class="back" href="{{ route('pendaftaran') }}">Kembali</a></div>
    </section>
    <section class="content-wrap">
        <div class="row">
            <div class="col-8">
                <div class="detail-wrap">
                    <div class="row">
                        <div class="col-4">
                            <label>Didaftarkan Oleh</label>
                        </div>
                        <div class="col-8"><span>{{ $pendaftar->user->name }}
                            <small style="opacity: 0.5">({{ $pendaftar->user->role->name }})</small></span>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-4">
                            <label>Jenis Kursus</label>
                        </div>
                        <div class="col-8"><span>{{ $pendaftar->jenis_kursus }}</span>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-4">
                            <label>Program Kursus</label>
                        </div>
                        <div class="col-8"><span>{{ $pendaftar->program_kursus->nama }}</span>
                        </div>
                    </div>

                    <br>    
                    <div class="row">
                        <div class="col-4">
                            <label>Nama</label>
                        </div>
                        <div class="col-8"><span>{{ $pendaftar->nama }}</span>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-4">
                            <label>Gelar Akademis</label>
                        </div>
                        <div class="col-8"><span>{{ $pendaftar->gelar_akademis }}</span>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-4">
                            <label>Alamat</label>
                        </div>
                        <div class="col-8"><span>{{ $pendaftar->alamat }}</span>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-4">
                            <label>Kota</label>
                        </div>
                        <div class="col-8"><span>{{ $pendaftar->kota }}</span>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-4">
                            <label>Kode Pos</label>
                        </div>
                        <div class="col-8"><span>{{ $pendaftar->kode_pos }}</span>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-4">
                            <label>Telepon</label>
                        </div>
                        <div class="col-8"><span><a href="tel:{{ $pendaftar->telepon }}">{{ $pendaftar->telepon }}</a></span>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-4">
                            <label>Email</label>
                        </div>
                        <div class="col-8"><span><a href="mailto:{{ $pendaftar->email }}">{{ $pendaftar->email }}</a></span>
                        </div>
                    </div>
                   
                    <div class="row">
                        <div class="col-4">
                            <label>Tanggal Lahir</label>
                        </div>
                        <div class="col-8"><span>{{ tgl_id($pendaftar->tgl_lahir) }}</span></div>
                    </div>
                    <br>
                    <div class="row">
                        <div class="col-4">
                            <label><small>Tanggal Data Dibuat</small></label>
                        </div>
                        <div class="col-8">
                            <span class="date-time">
                                <span class="item">
                                    <small>{{ tgl_id($pendaftar->created_at) }} </small>
                                </span>
                                <span class="item">
                                    <small><i class="fal fa-clock icon" ></i>{{ getTime($pendaftar->created_at) }}</small>
                                </span>
                            </span>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-4">
                            <label><small>Tanggal Data Terakhir Diperbarui</small></label>
                        </div>
                        <div class="col-8">
                            <span class="date-time">
                                <span class="item">
                                    <small>{{ tgl_id($pendaftar->updated_at) }}</small>
                                </span>
                                <span class="item">
                                    <small><i class="fal fa-clock icon" ></i>{{ getTime($pendaftar->updated_at) }}</small>
                                </span>
                            </span>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-3 ml-auto">
                <nav class="side-menu">
                    <ul>
                        <li><a href="#"> <span>Ubah Data</span></a></li>
                        <li><a data-id="{{ $pendaftar->id }}" data-name="{{ $pendaftar->nama }}" class="btn-delete" href="#modalDelete" data-toggle="modal" data-target="#modalDelete"><span>Hapus Data</span></a></li>
                        <li class="separator"></li>
                        <li><a href="{{ route('pendaftaran') }}"> <span>Kembali </span></a></li>
                    </ul>
                </nav>
            </div>
        </div>
    </section>
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
                <p>Apakah Anda yakin untuk menghapus<br>pendaftar <strong id="md_nama"></strong>?</p>
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
            $('body').find('#md_link').attr('href', '/pendaftar/delete/'+$id);
            console.log($id + ', ' + $nama)
        })

    })

</script>

@endsection