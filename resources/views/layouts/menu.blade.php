<nav class="site-menu-bar">
	<div class="site-menu-bar-toggle">
		<div class="wrap"><img class="svg" src="{{ asset('assets/images/chevron-right.svg') }}" /></div>
	</div>
	<ul class="site-main-menu">
		@if(Auth::user()->role_id == '1')
			<li class="site-main-menu-item {{{ (Request::is('home*') ? 'active' : '') }}}">
				<a class="site-main-menu-link" href="{{ route('home') }}">
					<img class="svg site-main-menu-icon" src="{{ asset('assets/images/icon-home.svg') }}" /><span>Dashboard</span>
				</a>
			</li>
			<li class="site-main-menu-item {{{ (Request::is('pendaftaran*') ? 'active' : '') }}}">
				<a class="site-main-menu-link" href="{{ route('pendaftaran') }}">
					<img class="svg site-main-menu-icon" src="{{ asset('assets/images/icon-registration.svg') }}" /><span>Pendaftaran</span>
				</a>
			</li>
			<li class="site-main-menu-item {{{ (Request::is('pembayaran*') ? 'active' : '') }}}">
				<a class="site-main-menu-link" href="{{ route('pembayaran') }}">
					<img class="svg site-main-menu-icon" src="{{ asset('assets/images/icon-payment.svg') }}" /><span>Pembayaran</span>
				</a>
			</li>
			<li class="site-main-menu-item {{{ (Request::is('siswa*') ? 'active' : '') }}}">
				<a class="site-main-menu-link" href="{{ route('siswa') }}">
					<img class="svg site-main-menu-icon" src="{{ asset('assets/images/icon-students.svg') }}" /><span>Siswa</span>
				</a>
			</li>
			<li class="site-main-menu-item {{{ (Request::is('instruktur*') ? 'active' : '') }}}">
				<a class="site-main-menu-link" href="{{ route('instruktur') }}">
					<img class="svg site-main-menu-icon" src="{{ asset('assets/images/icon-instructor.svg') }}" /><span>Instruktur</span>
				</a>
			</li>
			<li class="site-main-menu-item {{{ (Request::is('kelas*') ? 'active' : '') }}}">
				<a class="site-main-menu-link" href="{{ route('kelas') }}">
					<img class="svg site-main-menu-icon" src="{{ asset('assets/images/icon-class.svg') }}" /><span>Kelas</span>
				</a>
			</li>
			<li class="site-main-menu-item {{{ (Request::is('jadwal*') ? 'active' : '') }}}">
				<a class="site-main-menu-link" href="{{ route('jadwal') }}">
					<img class="svg site-main-menu-icon" src="{{ asset('assets/images/icon-schedule.svg') }}" /><span>Jadwal</span>
				</a>
			</li>
			<li class="site-main-menu-item {{{ (Request::is('program-kursus*') ? 'active' : '') }}}">
				<a class="site-main-menu-link" href="{{ route('program_kursus') }}">
					<img class="svg site-main-menu-icon" src="{{ asset('assets/images/icon-settings.svg') }}" /><span>Program Kursus</span>
				</a>
			</li>
		@elseif(Auth::user()->role_id == '2')
			<li class="site-main-menu-item {{{ (Request::is('home*') ? 'active' : '') }}}">
				<a class="site-main-menu-link" href="{{ route('home') }}">
					<img class="svg site-main-menu-icon" src="{{ asset('assets/images/icon-home.svg') }}" /><span>Dashboard</span>
				</a>
			</li>
			<li class="site-main-menu-item {{{ (Request::is('kelas*') ? 'active' : '') }}}">
				<a class="site-main-menu-link" href="{{ route('kelas') }}">
					<img class="svg site-main-menu-icon" src="{{ asset('assets/images/icon-class.svg') }}" /><span>Kelas</span>
				</a>
			</li>
			<li class="site-main-menu-item {{{ (Request::is('jadwal*') ? 'active' : '') }}}">
				<a class="site-main-menu-link" href="{{ route('jadwal') }}">
					<img class="svg site-main-menu-icon" src="{{ asset('assets/images/icon-schedule.svg') }}" /><span>Jadwal</span>
				</a>
			</li>
			<li class="site-main-menu-item {{{ (Request::is('instruktur*') ? 'active' : '') }}}">
				<a class="site-main-menu-link" href="{{ route('instruktur') }}">
					<img class="svg site-main-menu-icon" src="{{ asset('assets/images/icon-instructor.svg') }}" /><span>Instruktur</span>
				</a>
			</li>
			<li class="site-main-menu-item {{{ (Request::is('program-kursus*') ? 'active' : '') }}}">
				<a class="site-main-menu-link" href="{{ route('program_kursus') }}">
					<img class="svg site-main-menu-icon" src="{{ asset('assets/images/icon-settings.svg') }}" /><span>Program Kursus</span>
				</a>
			</li>
		@elseif(Auth::user()->role_id == '3')
			<li class="site-main-menu-item {{{ (Request::is('home*') ? 'active' : '') }}}">
				<a class="site-main-menu-link" href="{{ route('home') }}">
					<img class="svg site-main-menu-icon" src="{{ asset('assets/images/icon-home.svg') }}" /><span>Dashboard</span>
				</a>
			</li>
			<li class="site-main-menu-item {{{ (Request::is('pendaftaran*') ? 'active' : '') }}}">
				<a class="site-main-menu-link" href="{{ route('pendaftaran') }}">
					<img class="svg site-main-menu-icon" src="{{ asset('assets/images/icon-registration.svg') }}" /><span>Pendaftaran</span>
				</a>
			</li>
			<li class="site-main-menu-item {{{ (Request::is('pembayaran*') ? 'active' : '') }}}">
				<a class="site-main-menu-link" href="{{ route('pembayaran') }}">
					<img class="svg site-main-menu-icon" src="{{ asset('assets/images/icon-payment.svg') }}" /><span>Pembayaran</span>
				</a>
			</li>
			<li class="site-main-menu-item {{{ (Request::is('siswa*') ? 'active' : '') }}}">
				<a class="site-main-menu-link" href="{{ route('siswa') }}">
					<img class="svg site-main-menu-icon" src="{{ asset('assets/images/icon-students.svg') }}" /><span>Siswa</span>
				</a>
			</li>
		@elseif(Auth::user()->role_id == '4')
			<li class="site-main-menu-item {{{ (Request::is('home*') ? 'active' : '') }}}">
				<a class="site-main-menu-link" href="{{ route('home') }}">
					<img class="svg site-main-menu-icon" src="{{ asset('assets/images/icon-home.svg') }}" /><span>Dashboard</span>
				</a>
			</li>
			<li class="site-main-menu-item {{{ (Request::is('pembayaran*') ? 'active' : '') }}}">
				<a class="site-main-menu-link" href="{{ route('pembayaran') }}">
					<img class="svg site-main-menu-icon" src="{{ asset('assets/images/icon-payment.svg') }}" /><span>Pembayaran</span>
				</a>
			</li>
		@else
			<li class="site-main-menu-item {{{ (Request::is('home*') ? 'active' : '') }}}">
				<a class="site-main-menu-link" href="{{ route('home') }}">
					<img class="svg site-main-menu-icon" src="{{ asset('assets/images/icon-home.svg') }}" /><span>Dashboard</span>
				</a>
			</li>
			<li class="site-main-menu-item {{{ (Request::is('kelas*') ? 'active' : '') }}}">
				<a class="site-main-menu-link" href="{{ route('kelas') }}">
					<img class="svg site-main-menu-icon" src="{{ asset('assets/images/icon-class.svg') }}" /><span>Kelas</span>
				</a>
			</li>
		@endif
	</ul>
</nav>
