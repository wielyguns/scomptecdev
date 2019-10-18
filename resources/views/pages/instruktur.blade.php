@extends('layouts.template')

@section('title', 'Instruktur')

@section('content')

<div class="page-header">
	<h1 class="page-title">Instruktur</h1>
</div>
<div class="page-content">
	<div class="panel">
		<div class="panel-header row gutter-sm">
			<div class="col-md-8 panel-filter">
				<div class="row">
					<div class="col-md-4">
					</div>
				</div>
			</div>
			<div class="col-md-4 panel-action">
				<a class="btn btn-primary" href="{{ route('instruktur_add') }}">Tambah Instruktur</a>
			</div>
		</div>
		<div class="panel-body">
			<div class="table-wrap table-responsive" style="min-height: 280px">
				<table class="table">
					<thead>
						<tr>
							<th width="50">No.</th>
							<th width="15%">Nama</th>
							<th>Alamat</th>
							<th>Telepon</th>
							<th>Email</th>
							<th width="100">Status</th>
							<th></th>
						</tr>
					</thead>
					<tbody>
						<?php 
							$page = $instruktur->currentPage();
							if($page > 1) {
								$no = ($page - 1) * 10;	
							} else {
								$no = 0;
							}
						?>
						@forelse($instruktur as $p)
						<?php $no++ ;?>
						<tr class="has-more">
							<td>{{ $no }}</td>
							<td>{{ $p->nama }}</td>
							<td>{{ $p->alamat }}</td>
							<td><a href="tel:{{ $p->telepon }}">{{ $p->telepon }}</a></td>
							<td><a href="mailto:{{ $p->email }}">{{ $p->email }}</a></td>
							<td>{{ $p->status }}</td>
							<td align="right">
								<div class="dropdown more-action">
	                          		<div class="dropdown-action" data-toggle="dropdown">Aksi</div>
	                          		<div class="dropdown-menu dropdown-menu-right">
	                          			<a class="dropdown-item" href="{{ route('instruktur_view', $p->id) }}">Lihat detail</a>
	                          			<a class="dropdown-item" href="{{ route('instruktur_edit', $p->id) }}">Ubah</a>
	                          			<a data-id="{{ $p->id }}" data-name="{{ $p->nama }}" class="dropdown-item btn-delete" href="#modalDelete" data-toggle="modal" data-target="#modalDelete">
	                          				<span class="text-danger">Hapus</span>
	                          			</a>
	                          		</div>
	                        	</div>
							</td>
						</tr>
						@empty
						<tr>
							<td colspan="7" align="center">
								<div class="table-no-data">Belum ada data Instruktur. <a class="btn-link" href="{{ route('instruktur_add') }}">tambah data</a></div>
							</td>
						</tr>
						@endforelse
					</tbody>
				</table>
			</div>
			<div class="table-pagination">
				{{ $instruktur->links('layouts.pagination') }}
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
                <p>Apakah Anda yakin untuk menghapus Instruktur <strong id="md_nama"></strong>?
                Semua Jadwal yang dimiliki instruktur ini juga akan dihapus.</p>
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