@extends('layouts.template')

@section('title', 'Siswa')

@section('content')

<div class="page-header">
	<h1 class="page-title">Siswa</h1>
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
				<a class="btn btn-primary" href="{{ route('pendaftaran_add') }}">Tambah Pendaftaran</a>
			</div>
		</div>
		<div class="panel-body">
			<div class="table-wrap table-responsive" style="min-height: 280px">
				<table class="table">
					<thead>
						<tr>
							<th width="50">No.</th>
							<th>ID Siswa</th>
							<th>Jenis Kursus</th>
							<th>Program Kursus</th>
							<th>Nama</th>
							<th>Email</th>
							<th>Telepon</th>
							<th></th>
						</tr>
					</thead>
					<tbody>
						<tr class="has-more">
							<td>1</td>
							<td>000001</td>
							<td>Private</td>
							<td>Aplikasi Perkantor</td>
							<td>Jhon Doe</td>
							<td><a href="mailto:john@gmail.com">john@gmail.com</a></td>
							<td><a href="tel:08131235624">08131235624</a></td>
							<td align="right">
								<div class="dropdown more-action">
									<div class="dropdown-action" data-toggle="dropdown">Aksi</div>
									<div class="dropdown-menu dropdown-menu-right">
										<a class="dropdown-item" href="{{ route('pendaftaran_view', 1) }}">Lihat Detail</a>
	                          			<a class="dropdown-item" href="{{ route('pendaftaran_edit', 1) }}">Ubah</a>
	                          			<a data-id="" data-name="" class="dropdown-item item-dange btn-delete" href="#modalDelete" data-toggle="modal" data-target="#modalDelete">
	                          				<span class="text-danger">Hapus</span>
	                          			</a>
									</div>
								</div>
							</td>
						</tr>
						{{-- <tr>
							<td colspan="9" align="center">
								<div class="table-no-data">Belum ada data jadwal. <a class="btn-link" href="{{ route('jadwal_add') }}">tambah data</a></div>
							</td>
						</tr> --}}
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
