<!DOCTYPE html>
<html lang="en">

    <head>
        <meta charset="UTF-8" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
        <meta name="viewport" content="width=device-width, initial-scale=1" />
        <title>scomptec - @yield('title')</title>
        <meta name="description" content="" />
        <meta name="theme-color" content="#404297" />
        <link rel="shortcut icon" href="favicon.ico" />
        <link rel="stylesheet" href="{{ asset('assets/styles/plugins.css') }}" />
        <link rel="stylesheet" href="{{ asset('assets/styles/main.css') }}" />
    </head>

	<body>
		<header class="site-header">
            <div class="site-header-wrap">
                <div class="site-header-logo"><a href="{{ route('home') }}"><img src="{{ asset('assets/images/logo-scomptec.png') }}" /></a></div>
                <div class="site-header-user dropdown" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    <div class="site-user-img" style="background-image: url({{ asset('assets/images/user.jpg') }})"></div>
                    <div class="site-user-info"><span class="site-user-name">{{ Auth::user()->name }} </span></div>
                    <div class="dropdown-menu dropdown-menu-right">
                        <div class="dropdown-label"> 
                            <span class="hide-xs d-none d-sm-block">Welcome!</span>
                            <span class="site-user-name d-block d-sm-none">{{ Auth::user()->name }}</span>
                            <span class="site-user-role"><span>{{ Auth::user()->role->name }}</span>
                        </div>
                        <a class="dropdown-item" href="">
                            <img class="svg dropdown-icon dropdown-icon-prepend" src="{{ asset('assets/images/icon-user.svg') }}" />Profil
                        </a>
                        <a class="dropdown-item" href=""> <img class="svg dropdown-icon dropdown-icon-prepend" src="{{ asset('assets/images/icon-settings.svg') }}" />Pengaturan
                        </a>
                        <div class="dropdown-divider"></div><a class="dropdown-item" href="{{ route('logout') }}"  onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                            <img class="svg dropdown-icon dropdown-icon-prepend" src="{{ asset('assets/images/icon-sign-out.svg') }}" />Log out
                        </a>
                        <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
							@csrf
						</form>
                    </div>
                </div>
            </div>
        </header>
        <asside id="main-menu">
			@include('layouts.menu')
		</asside>
		<main class="page">
			@yield('content')
		</main>
		<footer class="site-footer">
            <div class="site-footer-left">&copy; Copyright 2019 by Scomptec. All Rights Reserved.</div>
            <div class="site-footer-right">Crafted by <a href="#">Rizqy Nurmansyah</a></div>
        </footer>
    	@yield('modal')
	</body>
	<script src="{{ asset('assets/plugins/jquery/jquery-3.4.1.min.js') }}"></script>
    <script src="{{ asset('assets/plugins/bootstrap/popper.min.js') }}"></script>
    <script src="{{ asset('assets/plugins/bootstrap/bootstrap.min.js') }}"></script>
    <script src="{{ asset('assets/plugins/bootstrap-select/bootstrap-select.min.js') }}"></script>
    <script src="{{ asset('assets/plugins/bootstrap-datepicker/js/bootstrap-datepicker.min.js') }}"></script>
    <script src="{{ asset('assets/plugins/chartjs/chart.min.js') }}"></script>
    <script src="{{ asset('assets/scripts/app.js') }}"></script>
    <script src="{{ asset('assets/scripts/main.js') }}"></script>

	@yield('addscript')

</html>
