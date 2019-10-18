@extends('layouts.template')

@section('title', 'Data Program Kursus')

@section('content')

<div class="box-content">
	<section class="content-head">
		<div class="content-title">
			<h1 class="title">Ubah Data Program Kursus</h1>
		</div>
		<div class="content-action">
			<a class="back" href="{{ route('program_kursus') }}">Kembali</a>		
		</div>
	</section>
	<section class="content-wrap">
		<div class="form-wrap row">
			<div class="col-8">
				<form method="post" action="{{ route('program_kursus_update', $program_kursus->id) }}">
					{{ csrf_field() }}
					{{ method_field('PUT') }}
					<div class="form-group row">
						<div class="col-4">
							<label>Nama Program</label>
						</div>
						<div class="col-8">
							@if($errors->has('nama'))
								<input class="form-control invalid" type="text" name="nama" value="{{ old('nama') }}">
								<span class="form-invalid"><i class="fas fa-times-circle icon"></i> {{ $errors->first('nama') }}</span>
							@else
								<input class="form-control" type="text" name="nama" value="{{ $program_kursus->nama }}">
							@endif
						</div>
						
					</div>
					<div class="form-group row">
						<div class="col-4">
							<label>Kode Program</label>
						</div>
						<div class="col-8">
							@if($errors->has('kode'))
								<input class="form-control invalid" type="text" name="kode" value="{{ old('kode') }}">
								<span class="form-invalid"><i class="fas fa-times-circle icon"></i> {{ $errors->first('kode') }}</span>
							@else
								<input class="form-control" type="text" name="kode" value="{{ $program_kursus->kode }}">
							@endif
						</div>
					</div>
					<div class="form-action">
						<div class="ml-auto"><a class="btn btn-link" href="{{ route('program_kursus') }}">Kembali</a>
							<button class="btn btn-primary" type="submit">Simpan</button>
						</div>
					</div>
				</form>
			</div>
		</div>
	</section>

@endsection
