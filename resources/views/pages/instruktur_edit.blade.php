@extends('layouts.template')

@section('title', 'Instruktur')

@section('content')

<div class="page-header">
	<h1 class="page-title">Instruktur</h1>
</div>

<div class="page-content">
	<div class="panel">
		<div class="panel-body">
			<div class="form-wrap">
				<form class="form" method="post" action="{{ route('instruktur_store') }}">
					{{ csrf_field() }}
					{{ method_field('PUT') }}
					<div class="row">
						<div class="col-md-8">
							<h3 class="form-heading">Tambah Instruktur</h3>

							<div class="form-group row">
								<div class="col-4"><label for="nama">Nama<span class="required">*</span></label></div>
								<div class="col-8">
									@if($errors->has('nama'))
										<input class="form-control invalid" type="text" name="nama" value="{{ old('nama') }}">
										<span class="form-invalid"><i class="fas fa-times-circle icon"></i> {{ $errors->first('nama') }}</span>
									@else
										<input class="form-control" type="text" name="nama" value="{{ $instruktur->nama }}">
									@endif
								</div>
							</div>

							<div class="form-group row">
								<div class="col-4"><label for="alamat">Alamat<span class="required">*</span></label></div>
								<div class="col-8">
									@if($errors->has('alamat'))
										<textarea class="form-control invalid" rows="4" name="alamat">{{ old('alamat') }}</textarea>
										<span class="form-invalid"><i class="fas fa-times-circle icon"></i> {{ $errors->first('alamat') }}</span>
									@else
										<textarea class="form-control" rows="4" name="alamat">{{ $instruktur->alamat }}</textarea>
									@endif
								</div>
							</div>

							<div class="form-group row">
								<div class="col-4"><label for="telepon">Telepon</label></div>
								<div class="col-8">
									<input class="form-control" type="number" name="telepon" value="{{ $instruktur->telepon }}">
								</div>
							</div>
							
							<div class="form-group row">
								<div class="col-4"><label for="email">Email<span class="required">*</span></label></div>
								<div class="col-8">
									@if($errors->has('email'))
										<input class="form-control invalid" type="email" name="email" value="{{ old('email') }}">
										<span class="form-invalid"><i class="fas fa-times-circle icon"></i> {{ $errors->first('email') }}</span>
									@else
										<input class="form-control" type="email" name="email" value="{{ $instruktur->email }}">
									@endif
								</div>
							</div>

							<div class="form-group row">
								<div class="col-4"><label for="status">Status</label></div>
								<div class="col-8">
									<div class="custom-control custom-radio custom-control-inline">
										<input class="custom-control-input" id="status1" type="radio" name="status" value="Full Time" {{ $instruktur->status == 'Full Time' ? 'checked' : '' }}>
										<label class="custom-control-label" for="status1">Full Time</label>
									</div>
									<div class="custom-control custom-radio custom-control-inline">
										<input class="custom-control-input" id="status2" type="radio" name="status" value="Part Time" {{ $instruktur->status == 'Part Time' ? 'checked' : '' }}>
										<label class="custom-control-label" for="status2">Part Time</label>
									</div>
								</div>
							</div>

							<div class="form-group row">
								<div class="col-4">
									<label for="tgl_lahir">Tanggal Lahir<span class="required">*</span></label>
								</div>
								<div class="col-8">
									
									@if($errors->has('tgl_lahir'))
										<div class="input-group invalid datepicker">
											<input class="form-control" id="tgl_lahir" name="tgl_lahir" type="text" autocomplete="off" value="{{ tgl_id($instruktur->tgl_lahir) }}" />
											<div class="input-group-append">
												<label for="tgl_lahir" class="input-group-text">
													<img src="{{ asset('assets/images/icon-date.svg') }}">
												</label>
											</div>
										<span class="form-invalid"><i class="fas fa-times-circle icon"></i> {{ $errors->first('tgl_lahir') }}</span>
									@else
										<div class="input-group datepicker">
											<input class="form-control" id="tgl_lahir" name="tgl_lahir" type="text" autocomplete="off" value="{{ tgl_id($instruktur->tgl_lahir) }}"/>
											<div class="input-group-append">
												<label for="tgl_lahir" class="input-group-text">
													<img src="{{ asset('assets/images/icon-date.svg') }}">
												</label>
											</div>
										</div>
									@endif
								</div>
							</div>

							<div class="form-group row">
								<div class="col-4">
									<label for="tgl_bergabung">Tanggal Masuk</label>
								</div>
								<div class="col-8">
									<div class="input-group datepicker">
										<input class="form-control" id="tgl_bergabung" name="tgl_bergabung" type="text" autocomplete="off" value="{{ tgl_id($instruktur->tgl_bergabung) }}" />
										<div class="input-group-append">
											<label for="tgl_bergabung" class="input-group-text">
												<img src="{{ asset('assets/images/icon-date.svg') }}">
											</label>
										</div>
									</div>
									<span class="help-text">Jika dikosongkan akan otomatis terisi tanggal hari ini.</span>
								</div>
							</div>
						</div>
						<div class="col-md-3 ml-auto">
							<div class="form-action form-action-sidebar sticky-me">
								<button class="btn btn-primary btn-block" type="submit">Simpan</button>
								<a class="btn btn-link btn-block" href="{{ route('instruktur') }}">Kembali</a>
							</div>
						</div>
					</div>
				</form>
			</div>
		</div>
	</div>
</div>

@endsection
