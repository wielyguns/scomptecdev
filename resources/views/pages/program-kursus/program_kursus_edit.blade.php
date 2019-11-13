@extends('layouts.template')

@section('title', 'Data Program Kursus')

@section('content')


<div class="page-header">
	<h1 class="page-title">Program Kursus</h1>
</div>

<div class="page-content">
	<div class="panel">
		<div class="panel-body" style="min-height: 55vh">
			<div class="form-wrap">
				<form class="form" method="post" action="{{ route('program_kursus_update', $program_kursus->id) }}">
					{{ csrf_field() }}
					{{ method_field('PUT') }}
					<div class="row">
						<div class="col-md-8">
							<div class="form-group row">
								<div class="col-4">
									<label>Nama Program</label>
								</div>
								<div class="col-8">
									<input class="form-control" type="text" name="nama" value="{{ $program_kursus->nama }}">
									@if($errors->has('nama'))
										<span class="form-invalid"><i class="fas fa-times-circle icon"></i> {{ $errors->first('nama') }}</span>
									@endif
								</div>
							</div>
							<div class="form-group row">
								<div class="col-4">
									<label>Kode Program</label>
								</div>
								<div class="col-8">
									<input class="form-control" type="text" name="kode" value="{{ $program_kursus->kode }}">
									@if($errors->has('kode'))
										<span class="form-invalid"><i class="fas fa-times-circle icon"></i> {{ $errors->first('kode') }}</span>
									@endif
								</div>
							</div>
							<div class="form-group row">
								<div class="col-4">
									<label>Biaya Pendaftaran</label>
								</div>
								<div class="col-8">
									<input class="form-control" type="text" name="biaya_pendaftaran" value="{{ $program_kursus->biaya_pendaftaran }}">
									@if($errors->has('biaya_pendaftaran'))
										<span class="form-invalid"><i class="fas fa-times-circle icon"></i> {{ $errors->first('biaya_pendaftaran') }}</span>
									@endif
								</div>
							</div>
							<div class="form-group row">
								<div class="col-4">
									<label>Biaya Reguler</label>
								</div>
								<div class="col-8">
									<input class="form-control" type="text" name="biaya_reguler" value="{{ $program_kursus->biaya_reguler }}">
									@if($errors->has('biaya_reguler'))
										<span class="form-invalid"><i class="fas fa-times-circle icon"></i> {{ $errors->first('biaya_reguler') }}</span>
									@endif
								</div>
							</div>
							<div class="form-group row">
								<div class="col-4">
									<label>Biaya Private</label>
								</div>
								<div class="col-8">
									<input class="form-control" type="text" name="biaya_private" value="{{ $program_kursus->biaya_private }}">
									@if($errors->has('biaya_private'))
										<span class="form-invalid"><i class="fas fa-times-circle icon"></i> {{ $errors->first('biaya_private') }}</span>
									@endif
								</div>
							</div>
							<div class="form-action">
								<a class="btn btn-transparent" href="{{ route('program_kursus') }}">Kembali</a>
								<button class="btn btn-primary" type="submit">Simpan</button>
							</div>
						</div>
					</div>
				</form>
			</div>
		</div>
	</div>
</div>

@endsection
