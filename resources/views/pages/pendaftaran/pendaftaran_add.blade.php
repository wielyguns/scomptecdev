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
				<form class="form" method="post" action="{{ route('pendaftaran_store') }}">
					{{ csrf_field() }}
					<div class="row">
						<div class="col-md-8">

							<h3 class="form-heading">Tambah Pendaftaran</h3>

							<div class="form-group row">
								<div class="col-4"><label for="jenis">Jenis Kursus</label></div>
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
									<select id="program_kursus_id" class="select-control {{ $errors->has('program_kursus_id') != "" ? "invalid" : "" }}" title="Pilih program kursus" data-live-search="true" data-width="100%" name="program_kursus_id">
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
								<div class="col-4"><label for="nama">Nama<span class="required">*</span></label></div>
								<div class="col-8">
									<input class="form-control" type="text" name="nama" value="{{ old('nama') }}">
								</div>
							</div>

							<div class="form-group row">
								<div class="col-4"><label for="jenis">Jenis Kelamin</label></div>
								<div class="col-8">
									<div class="custom-control custom-radio custom-control-inline">
										<input class="custom-control-input" id="kelamin1" type="radio" name="jenis_kelamin" value="Laki-laki" checked="true">
										<label class="custom-control-label" for="kelamin1">Laki-laki</label>
									</div>
									<div class="custom-control custom-radio custom-control-inline">
										<input class="custom-control-input" id="kelamin2" type="radio" name="jenis_kelamin" value="Perempuan">
										<label class="custom-control-label" for="kelamin2">Perempuan</label>
									</div>
								</div>
							</div>

							<div class="form-group row">
								<div class="col-4"><label for="gelar_akademis">Gelar Akademis</label></div>
								<div class="col-8">
									<input class="form-control" type="text" name="gelar_akademis" value="{{ old('gelar_akademis') }}">
								</div>
							</div>

							<div class="form-group row">
								<div class="col-4"><label for="alamat">Alamat<span class="required">*</span></label></div>
								<div class="col-8">
									<textarea class="form-control" rows="4" name="alamat">{{ old('alamat') }}</textarea>
								</div>
							</div>

							<div class="form-group row">
								<div class="col-4"><label for="kota">Kota<span class="required">*</span></label></div>
								<div class="col-8">
									<input class="form-control" type="text" name="kota" value="{{ old('kota') }}">
								</div>
							</div>

							<div class="form-group row">
								<div class="col-4"><label for="kode_pos">Kode Pos<span class="required">*</span></label></div>
								<div class="col-8">
									<input class="form-control number" type="text" name="kode_pos" value="{{ old('kode_pos') }}">
								</div>
							</div>

							<div class="form-group row">
								<div class="col-4"><label for="telepon">Telepon<span class="required">*</span></label></div>
								<div class="col-8">
									<input class="form-control number" type="text" name="telepon" value="{{ old('telepon') }}">
								</div>
							</div>

							<div class="form-group row">
								<div class="col-4"><label for="email">Email<span class="required">*</span></label></div>
								<div class="col-8">
									<input class="form-control" type="email" name="email" value="{{ old('email') }}">
								</div>
							</div>

							<div class="form-group row">
								<div class="col-4"><label for="tgl_lahir">Tanggal Lahir<span class="required">*</span></label></div>
								<div class="col-8">
									<div class="input-group datepicker">
											<input class="form-control" name="tgl_lahir" type="text" autocomplete="off" value=""/>
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
@endsection
