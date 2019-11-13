@extends('layouts.template')

@section('title', 'Kelas')

@section('content')

<div class="page-header">
	<h1 class="page-title">Kelas</h1>
</div>

<div class="page-content">
	<div class="panel">
		<div class="panel-body">
			<div class="form-wrap">
				<form class="form" method="post" action="{{ route('kelas_store') }}">
					{{ csrf_field() }}
					<div class="row">
						<div class="col-md-8">

							<h3 class="form-heading">Tambah Kelas</h3>

							<div class="form-group row">
								<div class="col-4"><label for="program_kursus_id">Program Kursus<span class="required">*</span></label></div>
								<div class="col-8">
									<select id="program_kursus_id" class="select-control" title="Pilih program kursus" data-live-search="true" data-width="100%" name="program_kursus_id">
										@foreach($program as $p)
										<option value="{{ $p->id }}" data-kode="{{ $p->kode }}" data-p1="{{ setRp($p->biaya_pendaftaran) }}" data-p2="{{ setRp($p->biaya_reguler) }}" data-p3="{{ setRp($p->biaya_private) }}" {{ (old("program_kursus_id") == $p->id ? "selected":"") }}>{{ $p->nama }}</option>
										@endforeach()
									</select>
									@if($errors->has('program_kursus_id'))
										<span class="form-invalid"><i class="fas fa-times-circle icon"></i> {{ $errors->first('program_kursus_id') }}</span>
									@endif
								</div>
							</div>

							<div class="form-group row">
								<div class="col-4"><label>Jenis Kelas</label></div>
								<div class="col-8">
									<select id="jenis_kelas" class="select-control" title="Pilih Jenis Kelas"data-live-search="true" data-width="100%" name="jenis_kelas">
										<option value="REG">Reguler</option>
										<option value="PRI">Private</option>
									</select>
									@if($errors->has('jenis_kelas'))
										<span class="form-invalid"><i class="fas fa-times-circle icon"></i> {{ $errors->first('jenis_kelas') }}</span>
									@endif
								</div>
							</div>

							<div class="form-group row">
								<div class="col-4"><label>Kode</label></div>
								<div class="col-8">
									<div class="input-group">
										<div class="input-group-prepend"><span class="input-group-text">
											<span id="kode_prefix"></span>
										</div>
										<input type="text" name="kode_sufix" readonly="" class="form-control">
									</div>
									<input type="text" name="kode">
									@if($errors->has('kode'))
										<span class="form-invalid"><i class="fas fa-times-circle icon"></i> {{ $errors->first('kode') }}</span>
									@endif
								</div>
							</div>

							<div class="form-group row">
								<div class="col-4"><label for="durasi">Durasi</label></div>
								<div class="col-8">
									<div class="row">
										<div class="col-6">
											<select id="durasi" class="select-control" title="Pilih durasi" data-width="100%" name="durasi">
												<option value="45">45</option>
												<option value="60">60</option>
												<option value="90">90</option>
											</select>
										</div>
										<div class="col-6"><span class="form-text-control">menit</span></div>
									</div>
									@if($errors->has('durasi'))
										<span class="form-invalid"><i class="fas fa-times-circle icon"></i> {{ $errors->first('durasi') }}</span>
									@endif
								</div>
							</div>

							<div class="form-group row">
								<div class="col-4"><label for="kapasitas">Kapasitas</label></div>
								<div class="col-8">
									<div class="row">
										<div class="col-6">
											<input type="text" name="kapasitas" class="form-control">
										</div>
										<div class="col-6"><span class="form-text-control">peserta</span></div>

									</div>
									@if($errors->has('kapasitas'))
										<span class="form-invalid"><i class="fas fa-times-circle icon"></i> {{ $errors->first('kapasitas') }}</span>
									@endif
								</div>
							</div>

						</div>

						<div class="col-md-3 ml-auto">
							<div class="form-action form-action-sidebar sticky-me">
								<button class="btn btn-primary btn-block" type="submit">Simpan</button>
								<a class="btn btn-transparent btn-block" href="{{ route('kelas') }}">Kembali</a>
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

$('#program_kursus_id').change(function(){
	$.ajax({
		url:'{{ route('get_kode_kelas') }}',
		data:{
			id(){
				return $('#program_kursus_id').val();
			},
			jenis_kelas(){
				return $('#jenis_kelas').val();
			}
		},
		type:'GET',
		dataType:'json',
		success:function(res){
			var t = $('#program_kursus_id'),
			p = t.find('option:selected').data('kode'),
			s = $('input[name=kode_sufix]').val();

			$('#kode_prefix').text(p);

			if (res.status == 1) {
				$('input[name=kode]').val(p+'.'+res.kode);
				$('input[name=kode_sufix]').val(res.kode);
			}else{
				$('input[name=kode]').val(p+'.'+s);
			}
		},
		error:function(res){
			$('#program_kursus_id').change();
		}
	})
})


$('input[name=kode_sufix]').keyup(function (){
	var t = $(this),
		p = $('#program_kursus_id').find('option:selected').data('kode'),
		s = t.val();
	$('input[name=kode]').val(p+'.'+s);	
})

$('#jenis_kelas').change(function(){
	$('#program_kursus_id').change();
	if ($(this).val() == 'PRI') {
		$('input[name=kapasitas]').prop('readonly',true);
		$('input[name=kapasitas]').val(1);
		$('input[name=kode_sufix]').prop('readonly',false);
		$('input[name=kode_sufix]').val('');
		$('input[name=kode]').val('');
	}else{
		$('input[name=kapasitas]').prop('readonly',false);
		$('input[name=kode_sufix]').prop('readonly',true);
		$('input[name=kapasitas]').val('');
	}
})

</script>

@endsection
