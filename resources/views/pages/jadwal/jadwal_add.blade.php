@extends('layouts.template')

@section('title', 'Jadwal')

@section('content')

<div class="box-content">
	<section class="content-head">
		<div class="content-title">
			<h1 class="title">Tambah Jadwal</h1>
		</div>
		<div class="content-action">
			<a class="back" href="{{ route('jadwal') }}">Kembali</a>        
		</div>
	</section>
	<section class="content-wrap">
		<div class="form-wrap row">
			<div class="col-8">
				<form method="post" action="{{ route('jadwal_store') }}">
					{{ csrf_field() }}

					<div class="form-group row">
						<div class="col-4"><label for="kelas_id">Pilih Kalas<span class="required">*</span></label></div>
						<div class="col-8">
							<select class="select-control" title="Pilih kode kelas" data-live-search="true" name="kelas_id">
								@foreach($kelas as $p)
								<option value="{{ $p->id }}">{{ $p->kode }}</option>
								@endforeach
							</select>
						</div>
					</div>

					<div class="form-group row">
						<div class="col-4"><label for="intruktur_id">Instruktur<span class="required">*</span></label></div>
						<div class="col-8">
							@if($instruktur->count() == 0)
								<span>Belum ada data Instruktur.</span><a class="btn btn-link-primary btn-strong" href="{{ route('instruktur_add') }}">Tambah Instruktur</a>
							@else
							<select class="select-control" title="Pilih Instruktur" data-live-search="true" name="intruktur_id" >
								@foreach($instruktur as $q)
								<option value="{{ $q->id }}">{{ $q->nama }}</option>
								@endforeach
							</select>
							@endif
						</div>
					</div>
					
					<div class="form-group row">
						<div class="col-4"><label>Asisten</label></div>
						<div class="col-8">
							<select id="asisten_select" class="select-control" title="Pilih Asisten 1" data-live-search="true" multiple data-max-options="2">
								@foreach($instruktur as $q)
								<option value="{{ $q->id }}">{{ $q->nama }}</option>
								@endforeach
							</select>
							<input type="hidden" name="asisten1">
							<input type="hidden" name="asisten2">
						</div>
					</div>

					<div class="form-group row">
						<div class="col-4"><label for="jumlah_pertemuan">Jumlah Pertemuan<span class="required">*</span></label></div>
						<div class="col-4">
							<select class="select-control" title="Pilih jumlah pertemuan" data-live-search="true" name="jumlah_pertemuan" >
								<option value="4">4</option>
								<option value="8">8</option>
								<option value="12">12</option>
								<option value="16">16</option>
							</select>
						</div>
					</div>
					
					<h2 class="form-title">Detail Pertemuan</h2>
					<div class="form-group row">
						<div class="col-4">
							<label>Tanggal</label>
							<div class="input-group datepicker">
									<input class="form-control" name="tgl_lahir" type="text" autocomplete="off" value=""/>
									<div class="input-group-append"><span class="input-group-text">
											<label for="tgl_lahir"><i class="fal fa-calendar-alt"></i></label></span></div>
								</div>
						</div>
						<div class="col-4">
							<label>Jam</label>
							<select class="select-control" title="Pilih jam" data-live-search="true" name="jam" >
								<option value="09:00">09:00</option>
								<option value="10:00">10:00</option>
								<option value="11:00">11:00</option>
								<option value="12:00">12:00</option>
								<option value="13:00">13:00</option>
								<option value="14:00">14:00</option>
								<option value="15:00">15:00</option>
							</select>
						</div>
						<div class="col-4">
							<label>Ruangan</label>
							<input class="form-control number" type="text" name="ruangan" value="">
						</div>
					</div>

					<div class="form-action">
						<div class="ml-auto"><a class="btn btn-link" href="{{ route('jadwal') }}">Kembali</a>
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
		$('#asisten_select').change(function(){
			var $t = $(this),
				$val = $t.val();
			$('input[name=asisten1]').val($val[0]);
			$('input[name=asisten2]').val($val[1]);
		})
	</script>
@endsection