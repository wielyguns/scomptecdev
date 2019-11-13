@extends('layouts.template')

@section('title', 'Kelas')

@section('content')

<div class="page-header">
	<h1 class="page-title">Siswa</h1>
</div>

<div class="page-content">
	<div class="panel">
		<div class="panel-body">
			<div class="form-wrap">
				<form class="form" method="post" action="{{ route('siswa_store') }}">
					{{ csrf_field() }}
					<div class="row">
						<div class="col-md-8">

							<h3 class="form-heading">Tambah Siswa</h3>

							<div class="form-group row">
								<div class="col-4"><label for="jenis">Data Pendaftar</label></div>
								<div class="col-8">
									<select id="pendaftar_id" class="select-control" title="Pilih nama pendaftar" data-live-search="true" data-width="100%" name="pendaftar_id">
										@foreach($pendaftar as $pend)
											<option data-kursus="{{ $pend->program_kursus->nama }}" value="{{ $pend->id }}"> {{ $pend->nama }} </option>
										@endforeach()
									</select>
									<small class="form-text text-muted">Pilih data pendaftar yang akan diaktifkan sebagai siswa!</small>
									@if($errors->has('pendaftar_id'))
										<span class="form-invalid"><i class="fas fa-times-circle icon"></i> {{ $errors->first('pendaftar_id') }}</span>
									@endif
								</div>
							</div>

							<div id="dataKelas" class="collapse">
								<div class="form-group row">
									<div class="col-4"><label for="">Program Kursus</label></div>
									<div class="col-8">
										<input type="text" name="program_kursus_id" class="form-control disabled" value="">
									</div>
								</div>

								<div class="form-group row">
									<div class="col-4"><label for="">Kelas</label></div>
									<div class="col-8">
										<select id="kelas_id" class="select-control" title="Pilih kelas" data-live-search="true" data-width="100%" name="kelas_id">
										</select>
									</div>
								</div>
							</div>

							<hr>

							<h3 class="form-heading">Data Pendaftar</h3>
							<div class="append_data">
								
							</div>
							
							
							<div class="form-group row">
								<div class="col-4"><label for=""></label></div>
								<div class="col-8">
									
								</div>
							</div>
							
							<div class="form-group row">
								<div class="col-4"><label for=""></label></div>
								<div class="col-8">
									
								</div>
							</div>
							
							<div class="form-group row">
								<div class="col-4"><label for=""></label></div>
								<div class="col-8">
									
								</div>
							</div>
							
							<div class="form-group row">
								<div class="col-4"><label for=""></label></div>
								<div class="col-8">
									
								</div>
							</div>
						</div>

						<div class="col-md-3 ml-auto">
							<div class="form-action form-action-sidebar sticky-me">
								<button class="btn btn-primary btn-block" type="submit">Simpan</button>
								<a class="btn btn-transparent btn-block" href="{{ route('siswa') }}">Kembali</a>
							</div>
						</div>
					</div>
				</form>
			</div>
		</div>
	</div>
</div>

@endsection

@section('addscript')

<script type="text/javascript">

$('#pendaftar_id').change(function(){
	$('#dataKelas').collapse('show');
})

$('#pendaftar_id').change(function(){
	var p = $('#pendaftar_id');
	$.ajax({
		url:'{{ route('get_data_siswa') }}',
		data:{
			id(){
				return $('#pendaftar_id').val();
			}
		},
		type:'GET',
		dataType:'json',
		success:function(res){
			$('input[name=program_kursus_id]').val(p.find('option:selected').data('kursus'));
			var html = '';
			res.kelas.forEach((data,index) => {
				html += '<option value="'+data.id+'">'+data.kode+'</option>';
			})
			console.log(html);
			$('#kelas_id').html(html);
			$('#kelas_id').selectpicker('refresh');

			// $('.append_data').html(res);
		},
		error:function(res){
			$('#pendaftar_id').change();
		}
	})
})

</script>

@endsection