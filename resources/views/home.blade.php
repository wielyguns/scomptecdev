@extends('layouts.template')

@section('title', 'Dashboard')

@section('content')

	<div class="page-header">
		<h1 class="page-title">Dashboard</h1>
	</div>
	<div class="page-content">
		<div class="row">
			{{-- superadmin --}}
			@if(Auth::user()->role_id == '1')
				<div class="col-lg-4">
					<div class="panel">
						<div class="panel-body">
							<div class="summary">
								<h2 class="summary-label">Pendaftar Bulan Ini</h2><span class="summary-value">374<i class="summary-value-text">peserta</i></span>
								<div class="progress">
									<div class="progress-bar" style="width: 32%"></div>
								</div>
								<div class="summary-note">32% lebih banyak dari bulan lalu</div>
							</div>
						</div>
					</div>
				</div>
				<div class="col-lg-4">
					<div class="panel">
						<div class="panel-body">
							<div class="summary">
								<h2 class="summary-label">Jumlah Siswa Aktif Bulan Ini</h2><span class="summary-value">234<i class="summary-value-text">peserta</i></span>
								<div class="progress">
									<div class="progress-bar" style="width: 12%"></div>
								</div>
								<div class="summary-note">12% lebih banyak dari bulan lalu</div>
							</div>
						</div>
					</div>
				</div>
				<div class="col-lg-4">
					<div class="panel">
						<div class="panel-body">
							<div class="summary">
								<h2 class="summary-label">Jumlah Kelas Bulan Ini</h2><span class="summary-value">35<i class="summary-value-text">peserta</i></span>
								<div class="progress">
									<div class="progress-bar" style="width: 32%"></div>
								</div>
								<div class="summary-note">32% lebih banyak dari bulan lalu</div>
							</div>
						</div>
					</div>
				</div>
				<div class="col-lg-8">
					<div class="panel">
						<div class="panel-header">
							<h2 class="panel-title">Grafik Pendaftaran</h2>
						</div>
						<div class="panel-body">
							<div class="chart chart-donut">
								<canvas class="canvas" id="myChart" width="400" height="400"></canvas>
							</div>
						</div>
					</div>
				</div>
				<div class="col-lg-4">
					<div class="panel">
						<div class="panel-header">
							<h2 class="panel-title">Profile</h2>
						</div>
						<div class="panel-body">
							<div class="user-info">
								<div class="user-info-image" style="background-image: url({{ asset('assets/images/user.jpg)') }}"></div>
								<h3 class="user-info-title">{{ Auth::user()->name }}</h3>
								<div class="user-info-role">{{ Auth::user()->role->name }}</div>
								<div class="user-info-text"><span>Terakhir login: 20-10-19</span><span>Terakhir password diubah: 20-10-19</span></div>
							</div>
						</div>
						<div class="panel-footer"><a href="#">Ubah password</a></div>
					</div>
				</div>

				<div class="col-lg-12">
					<div class="panel">
						<div class="panel-header">
							<h2 class="panel-title">Grafik Jumlah Kelas Bulan Ini</h2>
						</div>
						<div class="panel-body">
							<div class="chart chart-donut">
								<canvas class="canvas" id="kelasChart" width="400" height="400"></canvas>
							</div>
						</div>
					</div>
				</div>

			{{-- kordinator --}}
			@elseif(Auth::user()->role_id == '2')
				<div class="col-lg-6">
					<div class="panel">
						<div class="panel-body">
							<div class="summary">
								<h2 class="summary-label">Jumlah Kelas Bulan Ini</h2><span class="summary-value">35<i class="summary-value-text">peserta</i></span>
								<div class="progress">
									<div class="progress-bar" style="width: 32%"></div>
								</div>
								<div class="summary-note">32% lebih banyak dari bulan lalu</div>
							</div>
						</div>
					</div>
				</div>
				<div class="col-lg-6">
					<div class="panel">
						<div class="panel-body">
							<div class="summary">
								<h2 class="summary-label">Jumlah Siswa Aktif Bulan Ini</h2><span class="summary-value">234<i class="summary-value-text">peserta</i></span>
								<div class="progress">
									<div class="progress-bar" style="width: 12%"></div>
								</div>
								<div class="summary-note">12% lebih banyak dari bulan lalu</div>
							</div>
						</div>
					</div>
				</div>
				<div class="col-lg-8">
					<div class="panel">
						<div class="panel-header">
							<h2 class="panel-title">Grafik Jumlah Kelas Bulan Ini</h2>
						</div>
						<div class="panel-body">
							<div class="chart chart-donut">
								<canvas class="canvas" id="kelasChart" width="400" height="400"></canvas>
							</div>
						</div>
					</div>
				</div>
				<div class="col-lg-4">
					<div class="panel">
						<div class="panel-header">
							<h2 class="panel-title">Profile</h2>
						</div>
						<div class="panel-body">
							<div class="user-info">
								<div class="user-info-image" style="background-image: url({{ asset('assets/images/user.jpg)') }}"></div>
								<h3 class="user-info-title">{{ Auth::user()->name }}</h3>
								<div class="user-info-role">{{ Auth::user()->role->name }}</div>
								<div class="user-info-text"><span>Terakhir login: 20-10-19</span><span>Terakhir password diubah: 20-10-19</span></div>
							</div>
						</div>
						<div class="panel-footer"><a href="#">Ubah password</a></div>
					</div>
				</div>

			{{-- admin --}}
			@elseif(Auth::user()->role_id == '3')
				<div class="col-lg-6">
					<div class="panel">
						<div class="panel-body">
							<div class="summary">
								<h2 class="summary-label">Pendaftar Bulan Ini</h2><span class="summary-value">374<i class="summary-value-text">peserta</i></span>
								<div class="progress">
									<div class="progress-bar" style="width: 32%"></div>
								</div>
								<div class="summary-note">32% lebih banyak dari bulan lalu</div>
							</div>
						</div>
					</div>
				</div>
				<div class="col-lg-6">
					<div class="panel">
						<div class="panel-body">
							<div class="summary">
								<h2 class="summary-label">Jumlah Siswa Aktif Bulan Ini</h2><span class="summary-value">234<i class="summary-value-text">peserta</i></span>
								<div class="progress">
									<div class="progress-bar" style="width: 12%"></div>
								</div>
								<div class="summary-note">12% lebih banyak dari bulan lalu</div>
							</div>
						</div>
					</div>
				</div>
				<div class="col-lg-8">
					<div class="panel">
						<div class="panel-header">
							<h2 class="panel-title">Grafik Pendaftaran</h2>
						</div>
						<div class="panel-body">
							<div class="chart chart-donut">
								<canvas class="canvas" id="myChart" width="400" height="400"></canvas>
							</div>
						</div>
					</div>
				</div>
				<div class="col-lg-4">
					<div class="panel">
						<div class="panel-header">
							<h2 class="panel-title">Profile</h2>
						</div>
						<div class="panel-body">
							<div class="user-info">
								<div class="user-info-image" style="background-image: url({{ asset('assets/images/user.jpg)') }}"></div>
								<h3 class="user-info-title">{{ Auth::user()->name }}</h3>
								<div class="user-info-role">{{ Auth::user()->role->name }}</div>
								<div class="user-info-text"><span>Terakhir login: 20-10-19</span><span>Terakhir password diubah: 20-10-19</span></div>
							</div>
						</div>
						<div class="panel-footer"><a href="#">Ubah password</a></div>
					</div>
				</div>

			{{-- keuangan --}}
			@elseif(Auth::user()->role_id == '4')
				<div class="col-lg-4">
					<div class="panel">
						<div class="panel-header">
							<h2 class="panel-title">Profile</h2>
						</div>
						<div class="panel-body">
							<div class="user-info">
								<div class="user-info-image" style="background-image: url({{ asset('assets/images/user.jpg)') }}"></div>
								<h3 class="user-info-title">{{ Auth::user()->name }}</h3>
								<div class="user-info-role">{{ Auth::user()->role->name }}</div>
								<div class="user-info-text"><span>Terakhir login: 20-10-19</span><span>Terakhir password diubah: 20-10-19</span></div>
							</div>
						</div>
						<div class="panel-footer"><a href="#">Ubah password</a></div>
					</div>
				</div>

			{{-- user --}}
			@else				
				<div class="col-lg-4">
					<div class="panel">
						<div class="panel-header">
							<h2 class="panel-title">Profile</h2>
						</div>
						<div class="panel-body">
							<div class="user-info">
								<div class="user-info-image" style="background-image: url({{ asset('assets/images/user.jpg)') }}"></div>
								<h3 class="user-info-title">{{ Auth::user()->name }}</h3>
								<div class="user-info-role">{{ Auth::user()->role->name }}</div>
								<div class="user-info-text"><span>Terakhir login: 20-10-19</span><span>Terakhir password diubah: 20-10-19</span></div>
							</div>
						</div>
						<div class="panel-footer"><a href="#">Ubah password</a></div>
					</div>
				</div>
			@endif
		</div>
	</div>
	

@endsection

@section('addscript')
	<script>
		if($('#myChart').length > 0){
			var ctx = document.getElementById('myChart').getContext('2d');
			var chart = new Chart(ctx, {
				type: 'doughnut',
				data: {
					datasets: [{
						data: [100, 20, 30, 24, 13, 12, 21, 87, 67],
						backgroundColor: [
							'rgb(249, 202, 36)',
							'rgb(240, 147, 43)',
							'rgb(235, 77, 75)',
							'rgb(106, 176, 76)',
							'rgb(126, 214, 223)',
							'rgb(224, 86, 253)',
							'rgb(48, 51, 107)',
							'rgb(34, 166, 179)',
							'rgb(223, 249, 251)',
						]
					}],
					labels: [
						'Aplikasi Perkantoran',
						'Desain Grafis',
						'AutoCAD 2D/3d',
						'PHP',
						'VB. Net',
						'Network - LAN',
						'Teknik Komputer',
						'Digital Marketing',
						'Pemrograman Android',
					]
				},
				options: {
					responsive: true,
					maintainAspectRatio: false,
					legend: {
						position: 'bottom',
						labels: {
							boxWidth: 12,
							fontSize: 11,
						}
					},
					animation: {
						animateScale: true,
						animateRotate: false,
					},
				}
			});
		}


		if($('#kelasChart').length > 0){
			var ctx2 = document.getElementById('kelasChart').getContext('2d');
			var myBarChart = new Chart(ctx2, {
				type: 'horizontalBar',
				data: {
					datasets: [{
						data: [10, 2, 3, 2, 1, 1, 2, 8, 6],
						backgroundColor: [
							'rgb(249, 202, 36)',
							'rgb(240, 147, 43)',
							'rgb(235, 77, 75)',
							'rgb(106, 176, 76)',
							'rgb(126, 214, 223)',
							'rgb(224, 86, 253)',
							'rgb(48, 51, 107)',
							'rgb(34, 166, 179)',
							'rgb(223, 249, 251)',
						]
					}],
					labels: [
						'Apl. Perkantoran',
						'D. Grafis',
						'AutoCAD 2D/3d',
						'PHP',
						'VB. Net',
						'Network - LAN',
						'Teknik Komputer',
						'Digital Marketing',
						'P. Android',
					],
					min: 0,
				},
				options: {
					responsive: true,
					maintainAspectRatio: false,
					legend: {
						display: false
					},
					animation: {
						animateScale: true,
						animateRotate: false,
					},

					scales: {
						xAxes: [{
							ticks: {
								min: 0,
								max: 15
							 },
						}]
					}
				}
			});
		}
	</script>
@endsection
