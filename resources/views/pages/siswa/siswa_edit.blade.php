@extends('layouts.template')

@section('title', 'Kelas')

@section('content')

<div class="box-content">
	<section class="content-head">
		<div class="content-title">
			<h1 class="title">Tambah Pendaftaran</h1>
		</div>
		<div class="content-action">
			<a class="back" href="{{ route('pendaftaran') }}">Kembali</a>        
		</div>
	</section>
	<section class="content-wrap">
		<div class="form-wrap row">
			<div class="col-8">
				<form method="post" action="{{ route('pendaftaran_store') }}">
					{{ csrf_field() }}

					<div class="form-group row">
						<div class="col-4"><label for="jenis">Jenis Kursus</label></div>
						<div class="col-8">
							<div class="custom-control custom-radio custom-control-inline">
								<input class="custom-control-input" id="jenis1" type="radio" name="jenis" value="Reguler" {{ $pendaftar->jenis_kursus == "Reguler" ? "checked='true'":"" }}>
								<label class="custom-control-label" for="jenis1">Reguler</label>
							</div>
							<div class="custom-control custom-radio custom-control-inline">
								<input class="custom-control-input" id="jenis2" type="radio" name="jenis" value="Private" {{ $pendaftar->jenis_kursus == "Private" ? "checked='true'":"" }}>
								<label class="custom-control-label" for="jenis2">Private</label>
							</div>
						</div>
					</div>

					<div class="form-group row">
						<div class="col-4"><label for="program_kursus_id">Program Kursus<span class="required">*</span></label></div>
						<div class="col-8">
							<select id="program_kursus_id" class="select-control {{ $errors->has('program_kursus_id') != "" ? "invalid" : "" }}" title="Pilih program kursus" data-live-search="true" name="program_kursus_id">
								@foreach($program as $p)
								<option value="{{ $p->id }}" data-kode="{{ $p->kode }}" {{ ($pendaftar->program_kursus_id == $p->id ? "selected":"") }}>{{ $p->nama }}</option>
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
							<input class="form-control" type="text" name="nama" value="{{ $pendaftar->nama }}">
						</div>
					</div>

					<div class="form-group row">
						<div class="col-4"><label for="jenis">Jenis Kelamin</label></div>
						<div class="col-8">
							<div class="custom-control custom-radio custom-control-inline">
								<input class="custom-control-input" id="kelamin1" type="radio" name="jenis_kelamin" value="Laki-laki" {{ $pendaftar->jenis_kelamin == "Laki-laki" ? "checked='true'":"" }}>
								<label class="custom-control-label" for="kelamin1">Laki-laki</label>
							</div>
							<div class="custom-control custom-radio custom-control-inline">
								<input class="custom-control-input" id="kelamin2" type="radio" name="jenis_kelamin" value="Perempuan" {{ $pendaftar->jenis_kelamin == "Perempuan" ? "checked='true'":"" }}>
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


					<div class="form-action">
						<div class="ml-auto"><a class="btn btn-link" href="{{ route('pendaftaran') }}">Kembali</a>
							<button class="btn btn-primary" type="submit">Simpan</button>
						</div>
					</div>
				</form>
			</div>
		</div>
	</section>

@endsection

@section('addscript')


@endsection
