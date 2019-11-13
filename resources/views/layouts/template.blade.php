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
        <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.20/css/jquery.dataTables.min.css">
        <link rel="stylesheet" href="{{ asset('assets/styles/plugins.css') }}" />
        <link rel="stylesheet" href="{{ asset('assets/plugins/fontawesome-pro/css/fontawesome-all.min.css') }}" />
        <link rel="stylesheet" href="{{ asset('assets/styles/main.css') }}" />
        <style type="text/css">
            .badge { font-size: 12px; line-height: 21px; font-weight: normal; padding: 0 8px; display: inline-block; vertical-align: baseline; border-radius: 2px; }
            .tab-pane { padding: 12px 0 0 0; }
            .filter-label { display: inline-block; padding-right: 12px }
            table.dataTable thead th, table.dataTable thead td { border-bottom: 2px solid #e4eaec }
            table.dataTable.no-footer { border: 0 }
            table.dataTable thead th, table.dataTable thead td { padding: 8px 10px; font-weight: normal; }
            .dataTables_wrapper .dataTables_info { padding-top: 15px; }
            .dataTables_wrapper .dataTables_paginate { padding-top: 15px; }
            .dataTables_wrapper .dataTables_paginate .paginate_button {
                padding: 0; background: none; border: 1px solid transparent; margin: 0 3px;
            }
            .dataTables_wrapper .dataTables_paginate .paginate_button.disabled { opacity: .5 }
            .dataTables_wrapper .dataTables_paginate .paginate_button:hover,
            .dataTables_wrapper .dataTables_paginate .paginate_button:focus { 
                background: transparent; border: 1px solid transparent; color: #404297 !important; box-shadow: none;
            }
            /*.dataTables_wrapper .dataTables_paginate .paginate_button.previous { margin-right: 3px }*/
            /*.dataTables_wrapper .dataTables_paginate .paginate_button.next { margin-left: 6px }*/
            .dataTables_wrapper .dataTables_paginate .paginate_button.current,
            .dataTables_wrapper .dataTables_paginate .paginate_button.current:hover,
            .dataTables_wrapper .dataTables_paginate .paginate_button.current:focus {
                border: 1px solid #404297; background: #404297; color: #FFFFFF !important; box-shadow: none;
            }
            .dataTables_filter input { padding: 6px 12px; border: 1px solid #e2e2e2; border-radius: 4px; height: 38px; }
            .no-sort { pointer-events: none !important; background: none !important; }

            .table th:not(:last-child), .table td:not(:last-child) { border-right: 1px solid #F8F8F8 }

            .form-invalid { color: #ee5253; display: block; padding-top: 6px; font-size: 13px; line-height: 18px;}

            .info-panel { border: 1px solid #f5f5f5; background: #fcfcfc; padding: 6px 12px; border-radius: 4px; }
            .info-panel label { display: flex; width: 100%; position: relative; padding: 6px 0; margin: 0; }
            .info-panel label span { display: block; width: 100%; max-width: 40%; flex: 0 0 40%; }
            .info-panel label b { display: block; width: 100%; max-width: 40%; flex: 0 0 40%; padding-left: 15px }

            .datepicker { padding: 0 }
            .datepicker .input-group-text label { margin: 0 }

            .form-text-control { display: inline-block; line-height: 38px }

            .required { color: #ee5253; font-weight: bold; }

            .disabled { pointer-events: none; background: #f9f9f9; }

            .form-group .row {
                margin-right: -5px;
                margin-left: -5px;
            }
        </style>
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
        </footer>
    	@yield('modal')
	</body>
	<script src="{{ asset('assets/plugins/jquery/jquery-3.4.1.min.js') }}"></script>
    <script src="{{ asset('assets/plugins/bootstrap/popper.min.js') }}"></script>
    <script src="{{ asset('assets/plugins/bootstrap/bootstrap.min.js') }}"></script>
    <script src="{{ asset('assets/plugins/bootstrap-select/bootstrap-select.min.js') }}"></script>
    <script src="{{ asset('assets/plugins/bootstrap-datepicker/js/bootstrap-datepicker.min.js') }}"></script>
    <script src="{{ asset('assets/plugins/chartjs/chart.min.js') }}"></script>
    <script src="https://cdn.datatables.net/1.10.20/js/jquery.dataTables.js"></script>
    <script src="{{ asset('assets/scripts/app.js') }}"></script>
    <script src="{{ asset('assets/scripts/main.js') }}"></script>

    <script type="text/javascript">
        $('.table').each(function(){
            var t = $(this);

            t.dataTable({
                "oLanguage": {
                    "sLengthMenu": '<span class="filter-label">Tampilkan</span><select class="select-control" data-width="60px">'+
                        '<option value="10">10</option>'+
                        '<option value="20">20</option>'+
                        '<option value="30">30</option>'+
                        '</select>',
                    "sInfo": 'Menampilkan _START_ sampai _END_ dari _TOTAL_ data',
                    "sSearch": 'Cari ',
                    "sZeroRecords": 'Belum ada data!',
                    "oPaginate": {
                        "sNext": '<i class="fas fa-chevron-right"></i>',
                        "sPrevious": '<i class="fas fa-chevron-left"></i>',
                    }
                },
                "initComplete": function( settings, json ) {
                    $(".select-control").selectpicker({style:"btn-select",size:4,liveSearchPlaceholder:"Cari disini.."})
                }
            });
        })
    </script>

	@yield('addscript')

</html>
