@extends('layouts.template')

@section('title', 'Jadwal')

@section('content')

<div class="box-content">
	<section class="content-head">
		<div class="content-title">
			<h1 class="title">Data Jadwal</h1>
		</div>
		<div class="content-action">
			<a class="btn btn-orange" href="{{ route('jadwal_add') }}">Tambah Jadwal</a>			
		</div>
	</section>
	<section class="content-wrap">
		<div class="table-wrap">
			<table class="table">
				<thead>
					<tr>
						<th width="50">No.</th>
						<th>Kode Kelas</th>
						<th>Hari</th>
						<th>Tgl. Mulai</th>
						<th>Jam Mulai</th>
						<th>Ruangan</th>
						<th>Instruktur</th>
						<th>Asisten</th>
						<th></th>
					</tr>
				</thead>
				<tbody>
					<?php 
						$page = $data->currentPage();
						if($page > 1) {
							$no = ($page - 1) * 10;	
						} else {
							$no = 0;
						}
					?>
					@forelse($data as $p)
					<?php $no++ ;?>
					<tr>
						<td>{{ $no }}</td>
						<td>{{ $p->kelas->kode }}</td>
						<td>{{ $p->hari }}</td>
						<td>{{ $p->tgl_mulai }}</td>
						<td>{{ $p->jam_mulai }}</td>
						<td>{{ $p->ruangan }}</td>
						<td>{{ $p->instruktur->nama }}</td>
						<td>{{ $p->asisten }}</td>
						<td align="right">
							<div class="dropdown more-action">
                          		<div class="dropdown-action" data-toggle="dropdown" aria-expanded="false"><i class="far fa-ellipsis-h"></i></div>
                          		<div class="dropdown-menu dropdown-menu-right">
                          			<a class="dropdown-item" href="{{ route('jadwal_edit', $p->id) }}">Ubah</a>
                          			<a data-id="{{ $p->id }}" data-name="{{ $p->kelas->kode }}" class="dropdown-item btn-delete" href="#modalDelete" data-toggle="modal" data-target="#modalDelete">
                          				<span class="text-danger">Hapus</span>
                          			</a>
                          		</div>
                        	</div>
						</td>
					</tr>
					@empty
					<tr>
						<td colspan="9" align="center">
							<div class="table-no-data">Belum ada data jadwal. <a class="btn-link" href="{{ route('jadwal_add') }}">tambah data</a></div>
						</td>
					</tr>
					@endforelse
				</tbody>
			</table>
			<div class="table-pagination">
				{{ $data->links('layouts.pagination') }}
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
                <p>Apakah Anda yakin untuk menghapus<br>jadwal <strong id="md_nama"></strong>?</p>
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
			$('body').find('#md_link').attr('href', 'jadwal/delete/'+$id);
			console.log($id + ', ' + $nama)
		})

	})

</script>

@endsection