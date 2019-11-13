<table class="table">
	<tr>
		<td>Nama</td>
		<td>{{ $data->nama }}</td>
	</tr>
	<tr>
		<td>Jenis Kursus</td>
		<td>{{ $data->jenis_kursus }}</td>
	</tr>
	<tr>
		<td>Biaya Pendaftaran</td>
		<td>{{ number_format($data->biaya_pendaftaran) }}</td>
	</tr>
</table>