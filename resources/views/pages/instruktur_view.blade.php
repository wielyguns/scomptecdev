@extends('layouts.template')

@section('title', 'Data Program Kursus')

@section('content')

<div class="box-content">
    <section class="content-head">
        <div class="content-title">
            <h1 class="title">Detail Instruktur</h1>
        </div>
        <div class="content-action"><a class="back" href="{{ route('instruktur') }}">Kembali</a></div>
    </section>
    <section class="content-wrap">
        <div class="row">
            <div class="col-8">
                <div class="detail-wrap">
                    <div class="row">
                        <div class="col-4">
                            <label>Nama Lengkap</label>
                        </div>
                        <div class="col-8"><span>{{ $instruktur->nama }}</span></div>
                    </div>
                    <div class="row">
                        <div class="col-4">
                            <label>Alamat</label>
                        </div>
                        <div class="col-8"><span>{{ $instruktur->alamat }}</span></div>
                    </div>
                    <div class="row">
                        <div class="col-4">
                            <label>Telepon</label>
                        </div>
                        <div class="col-8"><span>{{ $instruktur->telepon }}</span></div>
                    </div>
                    <div class="row">
                        <div class="col-4">
                            <label>Email</label>
                        </div>
                        <div class="col-8"><span>{{ $instruktur->email }}</span></div>
                    </div>
                    <div class="row">
                        <div class="col-4">
                            <label>Status</label>
                        </div>
                        <div class="col-8"><span>{{ $instruktur->status }}</span></div>
                    </div>
                    <div class="row">
                        <div class="col-4">
                            <label>Tanggal Lahir</label>
                        </div>
                        <div class="col-8"><span>{{ tgl_id($instruktur->tgl_lahir) }}</span></div>
                    </div>
                    <div class="row">
                        <div class="col-4">
                            <label>Tanggal Bergabung</label>
                        </div>
                        <div class="col-8"><span>{{ tgl_id($instruktur->tgl_bergabung) }}</span></div>
                    </div>
                    <br>
                    <div class="row">
                        <div class="col-4">
                            <label>Tanggal Dibuat</label>
                        </div>
                        <div class="col-8">
                            <span class="date-time">
                                <span class="item">
                                    {{ tgl_id($instruktur->created_at) }} 
                                </span>
                                <span class="item">
                                    <i class="fal fa-clock icon" ></i>{{ getTime($instruktur->created_at) }}
                                </span>
                            </span>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-4">
                            <label>Tanggal Terakhir Diubah</label>
                        </div>
                        <div class="col-8">
                            <span class="date-time">
                                <span class="item">
                                    {{ tgl_id($instruktur->updated_at) }} 
                                </span>
                                <span class="item">
                                    <i class="fal fa-clock icon" ></i>{{ getTime($instruktur->updated_at) }}
                                </span>
                            </span>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-3 ml-auto">
                <nav class="side-menu">
                    <ul>
                        <li><a href="{{ route('instruktur_edit', $instruktur->id) }}"> <span>Ubah Data</span></a></li>
                        <li><a data-id="{{ $instruktur->id }}" data-name="{{ $instruktur->nama }}" class="btn-delete" href="#modalDelete" data-toggle="modal" data-target="#modalDelete"><span>Hapus Data</span></a></li>
                        <li class="separator"></li>
                        <li><a href="{{ route('instruktur') }}"> <span>Kembali </span></a></li>
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
                <p>Apakah Anda yakin untuk menghapus<br>Instruktur <strong id="md_nama"></strong>?</p>
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
            $('body').find('#md_link').attr('href', '/instruktur/delete/'+$id);
            console.log($id + ', ' + $nama)
        })

    })

</script>

@endsection