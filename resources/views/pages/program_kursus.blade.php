@extends('layouts.template')

@section('title', 'Data Program Kursus')



@section('content')

<div class="page-header">
	<h1 class="page-title">Program Kursus</h1>
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
				<a class="btn btn-primary" href="{{ route('program_kursus_add') }}">Tambah Pendaftaran</a>
			</div>
		</div>
		<div class="panel-body">
			<div class="table-wrap table-responsive" style="min-height: 280px">
				<table class="table">
					<thead>
						<tr>
							<th width="50">No.</th>
							<th>Nama</th>
							<th width="200">Kode</th>
							<th width="220">Tgl. Dibuat</th>
							<th style="width: 75px"></th>
						</tr>
					</thead>
					<tbody>
						<?php 
							$page = $program_kursus->currentPage();
							if($page > 1) {
								$no = ($page - 1) * 10;	
							} else {
								$no = 0;
							}
						?>
						@forelse($program_kursus as $p)
						<?php $no++ ;?>
						<tr class="has-more">
							<td>{{ $no }}</td>
							<td>{{ $p->nama }}</td>
							<td>{{ $p->kode }}</td>
							<td>
								<span class="date">{{ tgl_id($p->created_at) }}</span>
								<span class="time"> | {{ getTime($p->created_at) }}</span>
							</td>
							<td align="right">
								<div class="dropdown more-action">
									<div class="dropdown-action" data-toggle="dropdown">Aksi</div>
									<div class="dropdown-menu dropdown-menu-right">
										<a class="dropdown-item" href="{{ route('program_kursus_edit', $p->id) }}">Ubah</a>
										<a data-id="{{ $p->id }}" data-name="{{ $p->nama }}" class="dropdown-item item-danger btn-delete" href="#modalDelete" data-toggle="modal" data-target="#modalDelete">
											<span class="text-danger">Hapus</span>
										</a>
									</div>
							</div>
							</td>
						</tr>
						@empty
						<tr>
							<td colspan="5" align="center">
								<div class="table-no-data">Belum ada data Program Kursus. <a class="btn-link" href="{{ route('program_kursus_add') }}">tambah data</a></div>
							</td>
						</tr>
						@endforelse
					</tbody>
				</table>
				<div class="table-pagination">
					{{ $program_kursus->links('layouts.pagination') }}
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
				<p>Apakah Anda yakin untuk menghapus<br>Program Kursus <strong id="md_nama"></strong>?</p>
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
			$('body').find('#md_link').attr('href', '/program-kursus/delete/'+$id);
			console.log($id + ', ' + $nama)
		})

	})

</script>

@endsection