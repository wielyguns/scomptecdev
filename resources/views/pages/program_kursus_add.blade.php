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
				<form class="form" method="post" action="{{ route('program_kursus_store') }}">
					{{ csrf_field() }}
					<div class="row">
						<div class="col-md-8">
							<div class="form-group row">
								<div class="col-4">
									<label>Nama Program</label>
								</div>
								<div class="col-8">
									@if($errors->has('nama'))
										<input class="form-control invalid" type="text" name="nama" value="{{ old('nama') }}">
										<span class="form-invalid"><i class="fas fa-times-circle icon"></i> {{ $errors->first('nama') }}</span>
									@else
										<input class="form-control" type="text" name="nama" value="{{ old('nama') }}">
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
										<input class="form-control" type="text" name="kode" value="{{ old('kode') }}">
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
