@extends('layouts.template')

@section('title', 'Kelas')

@section('content')

<div class="box-content">
	<section class="content-head">
		<div class="content-title">
			<h1 class="title">Tambah Siswa</h1>
		</div>
		<div class="content-action">
			<a class="back" href="{{ route('siswa') }}">Kembali</a>        
		</div>
	</section>
	<section class="content-wrap">
		<div class="form-wrap row">
			<div class="col-8">
				<form method="post" action="{{ route('siswa_store') }}">
					{{ csrf_field() }}

					<div class="form-group row">
						<div class="col-4"><label for="program_kursus_id">Pendaftar<span class="required">*</span></label></div>
						<div class="col-8">
							<select id="program_kursus_id" class="select-control {{ $errors->has('program_kursus_id') != "" ? "invalid" : "" }}" title="Pilih data pendaftaran" data-live-search="true" name="program_kursus_id">
								@foreach($program as $p)
								<option value="{{ $p->id }}" data-kode="{{ $p->kode }}" {{ (old("program_kursus_id") == $p->id ? "selected":"") }}>{{ $p->nama }}</option>
								@endforeach()
							</select>
							@if($errors->has('program_kursus_id'))
								<span class="form-invalid"><i class="fas fa-times-circle icon"></i> {{ $errors->first('program_kursus_id') }}</span>
							@endif
						</div>
					</div>

					


					<div class="form-action">
						<div class="ml-auto"><a class="btn btn-link" href="{{ route('siswa') }}">Kembali</a>
							<button class="btn btn-primary" type="submit">Simpan</button>
						</div>
					</div>
				</form>
			</div>
		</div>
	</section>

@endsection

@section('addscript')

<script type="text/javascript">
	
	var $kVal = $('input[name=kapasitas]').val();

	$('input[name=jenis]').change(function(){
		var $t = $(this),
			$val = $t.val();
		console.log($val);
		if($val == "Private") {
			$('input[name=kapasitas]').val("1");
			$('#kapasitas').closest('.form-group').slideUp();
		}else{
			$('input[name=kapasitas]').val($kVal);
			$('#kapasitas').closest('.form-group').slideDown();
		}
	})
	
	$('#program_kursus_id').change(function(){
		var $t = $(this),
			$id = $t.val(),
			$kodePrefix = $t.find(':selected').data('kode'),
			$kodeName = $('#kode_name').val(),
			$kode = $kodePrefix +"."+ $kodeName;

		$('#kode_prefix').text($kodePrefix);
		$('#kode').val($kode);
	})

	$('#kode_prefix').each(function(){
		var $t = $(this),
			$select = $('#program_kursus_id'),
			$kode = $select.find(':selected').data('kode'),
			$pVal = $select.val();
		
		if($pVal !== "") {
			$t.text($kode);
		}
	})

	$('#kode_name').keyup(function(){
		var $t = $(this),
			$kodePrefix = $('#program_kursus_id').find(':selected').data('kode'),
			$kodeName = $t.val(),
			$kode = $kodePrefix +"."+ $kodeName;
		$('#kode').val($kode);
	})
</script>

@endsection
