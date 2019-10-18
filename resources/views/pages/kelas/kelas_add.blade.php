@extends('layouts.template')

@section('title', 'Kelas')

@section('content')

<div class="box-content">
	<section class="content-head">
		<div class="content-title">
			<h1 class="title">Tambah Kelas</h1>
		</div>
		<div class="content-action">
			<a class="back" href="{{ route('kelas') }}">Kembali</a>        
		</div>
	</section>
	<section class="content-wrap">
		<div class="form-wrap row">
			<div class="col-8">
				<form method="post" action="{{ route('kelas_store') }}">
					{{ csrf_field() }}


					<div class="form-group row">
						<div class="col-4"><label for="jenis">Tipe</label></div>
						<div class="col-8">
							<div class="custom-control custom-radio custom-control-inline">
								<input class="custom-control-input" id="jenis1" type="radio" name="jenis" value="Reguler" checked="true">
								<label class="custom-control-label" for="jenis1">Reguler</label>
							</div>
							<div class="custom-control custom-radio custom-control-inline">
								<input class="custom-control-input" id="jenis2" type="radio" name="jenis" value="Private">
								<label class="custom-control-label" for="jenis2">Private</label>
							</div>
						</div>
					</div>

					<div class="form-group row">
						<div class="col-4"><label for="program_kursus_id">Program Kursus<span class="required">*</span></label></div>
						<div class="col-8">
							<select id="program_kursus_id" class="select-control {{ $errors->has('program_kursus_id') != "" ? "invalid" : "" }}" title="Pilih program kursus" data-live-search="true" name="program_kursus_id">
								@foreach($program as $p)
								<option value="{{ $p->id }}" data-kode="{{ $p->kode }}" {{ (old("program_kursus_id") == $p->id ? "selected":"") }}>{{ $p->nama }}</option>
								@endforeach()
							</select>
							@if($errors->has('program_kursus_id'))
								<span class="form-invalid"><i class="fas fa-times-circle icon"></i> {{ $errors->first('program_kursus_id') }}</span>
							@endif
						</div>
					</div>

					<div class="form-group row">
						<div class="col-4"><label for="kode">Kode<span class="required">*</span></label></div>
						<div class="col-8">
							<div class="input-group {{ $errors->has('kode') != "" ? "invalid" : "" }}">
								<div class="input-group-prepend"><span class="input-group-text" id="kode_prefix" style="min-width: 55px"></span></div>
								<input class="form-control" id="kode_name" type="text" name="kode_name" value="{{ old('kode_name') }}">
							</div>
							<input id="kode" type="hidden" name="kode" value="{{ old('kode') }}">
							@if($errors->has('kode'))
								<span class="form-invalid"><i class="fas fa-times-circle icon"></i> {{ $errors->first('kode') }}</span>
							@endif
						</div>
					</div>

					<div class="form-group row">
						<div class="col-4"><label for="durasi">Durasi<span class="required">*</span></label></label></div>
						<div class="col-8">
							<div class="input-group {{ $errors->has('durasi') != "" ? "invalid" : "" }}">
								<input class="form-control number" type="text" name="durasi" value="{{ old('durasi') }}">
								<div class="input-group-append"><span class="input-group-text">menit</span></div>
							</div>
							@if($errors->has('durasi'))
								<span class="form-invalid"><i class="fas fa-times-circle icon"></i> {{ $errors->first('durasi') }}</span>
							@endif
						</div>
					</div>

					<div class="form-group row">
						<div class="col-4"><label for="kapasitas">Kapasitas<span class="required">*</span></label></label></div>
						<div class="col-8">
							<div class="input-group {{ $errors->has('kapasitas') != "" ? "invalid" : "" }}" id="kapasitas">
								<input class="form-control number" type="text" name="kapasitas" value="{{ old('kapasitas') }}">
								<div class="input-group-append"><span class="input-group-text">peserta</span></div>
							</div>
							@if($errors->has('kapasitas'))
								<span class="form-invalid"><i class="fas fa-times-circle icon"></i> {{ $errors->first('kapasitas') }}</span>
							@endif
						</div>
					</div>

					<div class="form-group row">
						<div class="col-4"><label for="biaya">Biaya<span class="required">*</span></label></label></div>
						<div class="col-8">
							<div class="input-group {{ $errors->has('biaya') != "" ? "invalid" : "" }}">
								<div class="input-group-prepend"><span class="input-group-text">Rp</span></div>
								<input class="form-control number rupiah" type="text" name="biaya" value="{{ old('biaya') }}">
							</div>
							@if($errors->has('biaya'))
								<span class="form-invalid"><i class="fas fa-times-circle icon"></i> {{ $errors->first('biaya') }}</span>
							@endif
						</div>
					</div>
					<div class="form-action">
						<div class="ml-auto"><a class="btn btn-link" href="{{ route('kelas') }}">Kembali</a>
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
