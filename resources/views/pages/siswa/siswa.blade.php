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
				<a class="btn btn-primary" href="{{ route('siswa_add') }}">Tambah Siswa</a>
			</div>
		</div>
		<div class="panel-body">
			
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
