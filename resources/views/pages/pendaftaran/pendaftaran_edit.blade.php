@extends('layouts.template')

@section('title', 'Kelas')

@section('content')

<div class="page-header">
	<h1 class="page-title">Pendaftaran</h1>
</div>

<div class="page-content">
	<div class="panel">
		<div class="panel-body">
			<div class="form-wrap">
				<form class="form" method="post" action="{{ route('pendaftaran_update', $pendaftar->id) }}">
					{{ csrf_field() }}
					{{ method_field('PUT') }}
					<div class="row">
						<div class="col-md-8">

							<h3 class="form-heading">Ubah Data Pendaftaran</h3>

							<div class="form-group row">
								<div class="col-4"><label for="jenis">Jenis Kursus</label></div>
								<div class="col-8">
									<div class="custom-control custom-radio custom-control-inline">
										<input class="custom-control-input" id="jenis1" type="radio" name="jenis_kursus" value="Reguler" {{ $pendaftar->jenis_kursus == 'Reguler' ? 'checked' : '' }}>
										<label class="custom-control-label" for="jenis1">Reguler</label>
									</div>
									<div class="custom-control custom-radio custom-control-inline">
										<input class="custom-control-input" id="jenis2" type="radio" name="jenis_kursus" value="Private" {{ $pendaftar->jenis_kursus == 'Private' ? 'checked' : '' }}>
										<label class="custom-control-label" for="jenis2">Private</label>
									</div>
								</div>
							</div>

							<div class="form-group row">
								<div class="col-4"><label for="program_kursus_id">Program Kursus<span class="required">*</span></label></div>
								<div class="col-8">
									<select id="program_kursus_id" class="select-control" title="Pilih program kursus" data-live-search="true" data-width="100%" name="program_kursus_id">
										@foreach($program as $p)
										<option value="{{ $p->id }}" data-kode="{{ $p->kode }}"  data-p1="{{ setRp($p->biaya_pendaftaran) }}" data-p2="{{ setRp($p->biaya_reguler) }}" data-p3="{{ setRp($p->biaya_private) }}" {{ $pendaftar->program_kursus_id == $p->id ? 'selected' : '' }}>{{ $p->nama }}</option>
										@endforeach()
									</select>
									@if($errors->has('program_kursus_id'))
										<span class="form-invalid"><i class="fas fa-times-circle icon"></i> {{ $errors->first('program_kursus_id') }}</span>
									@endif
								</div>
							</div>

							<div class="form-group row">
								<div class="col-4"></div>
								<div class="col-8">
									<div class="info-panel">
										<label><span>Biaya Pendaftaran</span><b class="price pPendaftaran">Rp. {{ setRp($pendaftar->biaya_pendaftaran) }}</b></label>
										<label><span>Biaya Kursus</span><b class="price pKursus">Rp. {{ setRp($pendaftar->biaya_kursus) }}</b></label>
									</div>
									<input type="hidden" id="biaya_pendaftaran" name="biaya_pendaftaran" value="{{ setRp($pendaftar->biaya_pendaftaran) }}">
									<input type="hidden" id="biaya_kursus" name="biaya_kursus" value="{{ setRp($pendaftar->biaya_kursus) }}">
								</div>
							</div>

							<div class="form-group row">
								<div class="col-4"><label for="nama">Nama<span class="required">*</span></label></div>
								<div class="col-8">
									<input class="form-control" type="text" name="nama" value="{{ $pendaftar->nama }}">
								</div>
							</div>

							<div class="form-group row">
								<div class="col-4"><label for="jenis">Jenis Kelamin<span class="required">*</span></label></div>
								<div class="col-8">
									<div class="custom-control custom-radio custom-control-inline">
										<input class="custom-control-input" id="kelamin1" type="radio" name="jenis_kelamin" value="Laki-laki" {{ $pendaftar->jenis_kelamin == 'Laki-laki' ? 'checked' : '' }}>
										<label class="custom-control-label" for="kelamin1">Laki-laki</label>
									</div>
									<div class="custom-control custom-radio custom-control-inline">
										<input class="custom-control-input" id="kelamin2" type="radio" name="jenis_kelamin" value="Perempuan" {{ $pendaftar->jenis_kelamin == 'Perempuan' ? 'checked' : '' }}>
										<label class="custom-control-label" for="kelamin2">Perempuan</label>
									</div>
								</div>
							</div>

							<div class="form-group row">
								<div class="col-4"><label for="gelar_akademis">Gelar Akademis</label></div>
								<div class="col-8">
									<input class="form-control" type="text" name="gelar_akademis" value="{{ $pendaftar->gelar_akademis }}">
								</div>
							</div>

							<div class="form-group row">
								<div class="col-4"><label for="alamat">Alamat<span class="required">*</span></label></div>
								<div class="col-8">
									<textarea class="form-control" rows="4" name="alamat">{{ $pendaftar->alamat }}</textarea>
								</div>
							</div>

							<div class="form-group row">
								<div class="col-4"><label for="kota">Kota<span class="required">*</span></label></div>
								<div class="col-8">
									<input class="form-control" type="text" name="kota" value="{{ $pendaftar->kota }}">
								</div>
							</div>

							<div class="form-group row">
								<div class="col-4"><label for="kode_pos">Kode Pos<span class="required">*</span></label></div>
								<div class="col-8">
									<input class="form-control number" type="text" name="kode_pos" value="{{ $pendaftar->kode_pos }}">
								</div>
							</div>

							<div class="form-group row">
								<div class="col-4"><label for="telepon">Telepon<span class="required">*</span></label></div>
								<div class="col-8">
									<input class="form-control number" type="text" name="telepon" value="{{ $pendaftar->telepon }}">
								</div>
							</div>

							<div class="form-group row">
								<div class="col-4"><label for="email">Email<span class="required">*</span></label></div>
								<div class="col-8">
									<input class="form-control" type="email" name="email" value="{{ $pendaftar->email }}">
								</div>
							</div>

							<div class="form-group row">
								<div class="col-4"><label for="tgl_lahir">Tanggal Lahir<span class="required">*</span></label></div>
								<div class="col-8">
									<div class="input-group datepicker">
											<input class="form-control" name="tgl_lahir" type="text" autocomplete="off" value="{{ tgl_id($pendaftar->tgl_lahir) }}"/>
											<div class="input-group-append"><span class="input-group-text">
													<label for="tgl_lahir"><i class="fal fa-calendar-alt"></i></label></span></div>
										</div>
								</div>
							</div>							

						</div>

						<div class="col-md-3 ml-auto">
							<div class="form-action form-action-sidebar sticky-me">
								<button class="btn btn-primary btn-block" type="submit">Simpan</button>
								<a class="btn btn-transparent btn-block" href="{{ route('pendaftaran') }}">Kembali</a>
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
			var p1 = $(this).find('option:selected').data('p1');
			var p2 = $(this).find('option:selected').data('p2');
			var p3 = $(this).find('option:selected').data('p3');

			$('.pPendaftaran').text(p1);
			$('#biaya_pendaftaran').val(p1)

			var jk = $('input[name=jenis_kursus]:checked').val();
			if(jk == "Reguler") {
				$('.pKursus').text(p2);
				$('#biaya_kursus').val(p2)
			} else {
				$('.pKursus').text(p3);
				$('#biaya_kursus').val(p3)
			}
		})

		$("input[name=jenis_kursus]").change(function(){
			var p2 = $('#program_kursus_id').find('option:selected').data('p2');
			var p3 = $('#program_kursus_id').find('option:selected').data('p3');

			var jk = $('input[name=jenis_kursus]:checked').val();
			if(jk == "Reguler") {
				$('.pKursus').text(p2);
				$('#biaya_kursus').val(p2)
			} else {
				$('.pKursus').text(p3);
				$('#biaya_kursus').val(p3)
			}
		})
	</script>

@endsection