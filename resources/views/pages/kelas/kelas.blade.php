@extends('layouts.template')

@section('title', 'Kelas')

@section('content')

<div class="page-header">
	<h1 class="page-title">Kelas</h1>
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
				<a class="btn btn-primary" href="{{ route('kelas_add') }}">Tambah Kelas</a>
			</div>
		</div>
		<div class="panel-body">
			<div class="table-wrap table-responsive" style="min-height: 280px">
				<table class="table">
					<thead>
						<tr>
							<th>Kode</th>
							<th width="25%">Program Kursus</th>
							<th class="no-sort">Durasi</th>
							<th class="no-sort">Kapasitas</th>
							<th class="no-sort" style="width: 80px"></th>
						</tr>
					</thead>
					<tbody>
						@forelse($data as $p)
						<tr class="has-more">
							<td>{{ $p->kode }}</td>
							<td>{{ $p->program_kursus->nama }}</td>
							<td>{{ $p->durasi }} menit</td>
							<td>{{ $p->kapasitas }} peserta</td>
							<td align="right">
								<div class="dropdown more-action">
	                          		<div class="dropdown-action" data-toggle="dropdown">Aksi</div>
	                          		<div class="dropdown-menu dropdown-menu-right">
	                          			<a class="dropdown-item" href="{{ route('kelas_edit', $p->id) }}">Ubah</a>
	                          			<a data-id="{{ $p->id }}" data-name="{{ $p->kode }}" class="dropdown-item item-danger btn-delete" href="#modalDelete" data-toggle="modal" data-target="#modalDelete">
	                          				<span class="text-danger">Hapus</span>
	                          			</a>
	                          		</div>
	                        	</div>
							</td>
						</tr>
						@empty
						<tr>
							<td colspan="8" align="center">
								<div class="table-no-data">Belum ada data kelas. <a class="btn-link" href="{{ route('kelas_add') }}">tambah data</a></div>
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
                <p>Apakah Anda yakin untuk menghapus<br>kelas <strong id="md_nama"></strong>?</p>
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
			$('body').find('#md_link').attr('href', '/kelas/delete/'+$id);
			console.log($id + ', ' + $nama)
		})

	})

</script>

@endsection