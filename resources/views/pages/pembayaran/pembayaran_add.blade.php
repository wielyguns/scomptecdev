@extends('layouts.template')

@section('title', 'Kelas')

@section('content')

<div class="page-header">
	<h1 class="page-title">Pembayaran</h1>
</div>

<div class="page-content">
	<div class="panel">
		<div class="panel-body">
			<div class="form-wrap">
				<form class="form" method="post" action="{{ route('pembayaran_store') }}">
					{{ csrf_field() }}
					<div class="row">
						<div class="col-md-8">

							<h3 class="form-heading">Tambah Pembayaran</h3>

							<div class="form-group row">
								<div class="col-4"><label for="jenis">Jenis Pembayaran</label></div>
								<div class="col-8">
									<input type="text" name="jenis_pembayaran" class="form-control disabled" value="{{ $paymentType }}">
								</div>
							</div>

							<div class="form-group row">
								<div class="col-4"><label for="pendaftar_id">Data Pendaftar<span class="required">*</span></label></div>
								<div class="col-8">
									<select id="pendaftar_id" class="select-control" title="Pilih nama pendaftar" data-live-search="true" data-width="100%" name="pendaftar_id">
										@foreach($pendaftar as $pend)
										<option value="{{ $pend->id }}" data-p1="{{ $pend->biaya_pendaftaran }}" data-p2="{{ $pend->biaya_kursus }}" data-prog="{{ $pend->program_kursus->nama }}" {{ (old("pendaftar_id") == $pend->id ? "selected":"") }} {{ $pend->status_pembayaran == "Lunas" ? "disabled data-subtext=Lunas":"" }} > {{ $pend->nama }} </option>
										@endforeach()
									</select>
									@if($errors->has('pendaftar_id'))
										<span class="form-invalid"><i class="fas fa-times-circle icon"></i> {{ $errors->first('pendaftar_id') }}</span>
									@endif
								</div>
							</div>

							<div id="dataPend" class="collapse">
								<div class="form-group row">
									<div class="col-4"></div>
									<div class="col-8">
										<div class="info-panel">
											<label><span>Program Kursus</span><b class="price dProgram"></b></label>
											<label id="infoBP"><span>Biaya Pendaftaran</span><b class="price dBiaya1"></b></label>
											<label id="infoBK"><span>Biaya Kursus</span><b class="price dBiaya2"></b></label>
										</div>
									</div>
								</div>
							</div>

							<div class="form-group row">
								<div class="col-4"><label for="jenis">Terima Dari<span class="required">*</span></label></div>
								<div class="col-8">
									<input class="form-control" type="text" name="terima_dari" value="{{ old('terima_dari') }}">
									@if($errors->has('terima_dari'))
										<span class="form-invalid"><i class="fas fa-times-circle icon"></i> {{ $errors->first('terima_dari') }}</span>
									@endif
								</div>
							</div>

							<div class="form-group row">
								<div class="col-4"><label for="jenis">Jumlah Uang<span class="required">*</span></label></div>
								<div class="col-8">
									<input class="form-control" type="number" name="jumlah_uang" value="{{ old('jumlah_uang') }}">
									@if($errors->has('jumlah_uang'))
										<span class="form-invalid"><i class="fas fa-times-circle icon"></i> {{ $errors->first('jumlah_uang') }}</span>
									@endif
								</div>
							</div>

							<div class="form-group row">
								<div class="col-4"><label for="tgl_pembayaran">Tanggal Pembayaran<span class="required">*</span></label></div>
								<div class="col-8">
									<div class="input-group datepicker">
											<input class="form-control" name="tgl_pembayaran" type="text" autocomplete="off" value=""/>
											<div class="input-group-append"><span class="input-group-text">
													<label for="tgl_pembayaran"><i class="fal fa-calendar-alt"></i></label></span></div>
										</div>
									@if($errors->has('tgl_pembayaran'))
										<span class="form-invalid"><i class="fas fa-times-circle icon"></i> {{ $errors->first('tgl_pembayaran') }}</span>
									@endif
								</div>
							</div>

							<div class="form-group row">
								<div class="col-4"><label for="jenis">Catatan</label></div>
								<div class="col-8">
									<textarea class="form-control" name="pesan" rows="4">{{ old('pesan') }}</textarea>
								</div>
							</div>
						</div>

						<div class="col-md-3 ml-auto">
							<div class="form-action form-action-sidebar sticky-me">
								<button class="btn btn-primary btn-block" type="submit">Simpan</button>
								<a class="btn btn-transparent btn-block" href="{{ route('pembayaran') }}">Kembali</a>
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

if($('input[name=jenis_pembayaran]').val() == 'Pendaftaran'){
	$('input[name=jumlah_uang]').addClass('disabled');
} else {
	$('input[name=jumlah_uang]').removeClass('disabled');
}

$('#pendaftar_id').change(function(){
	var t = $(this),
		s = t.find('option:selected'),
		a = s.data('prog'),
		b = s.data('p1'),
		c = s.data('p2');

	$('.dProgram').text(a);
	$('.dBiaya1').text(b);
	$('.dBiaya2').text(c);
	$('#dataPend').collapse('show');

	$('input[name=jumlah_uang]').val(b);
})

</script>

@endsection
