<!DOCTYPE html>
<html class="loading" lang="en" data-textdirection="ltr">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0, minimal-ui">
    <meta name="description" content="PPID Kota Bukittinggi">
    <meta name="keywords" content="PPID, Kota Bukittinggi, Bukittinggi, Pejabat Pengelola Informasi dan Dokumentasi">
    <meta name="author" content="Dinas Komunikasi dan Informatika Kota Bukittinggi">

    <title>Dashboard - PPID Kota Bukittinggi</title>

    <link rel="apple-touch-icon" href="{{ asset('landing-page/img/logo-ppid2.png') }}">
    <link rel="shortcut icon" type="image/x-icon" href="{{ asset('landing-page/img/logo-ppid2.png') }}">
    <link href="https://fonts.googleapis.com/css?family=Montserrat:300,400,500,600" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="{{ asset('admin/app-assets/vendors/css/vendors.min.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('admin/app-assets/vendors/css/charts/apexcharts.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('admin/app-assets/css/bootstrap.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('admin/app-assets/css/bootstrap-extended.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('admin/app-assets/css/colors.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('admin/app-assets/css/components.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('admin/app-assets/css/themes/dark-layout.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('admin/app-assets/css/themes/semi-dark-layout.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('admin/app-assets/css/core/menu/menu-types/vertical-menu.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('admin/app-assets/css/core/colors/palette-gradient.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('admin/app-assets/css/pages/dashboard-ecommerce.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('admin/app-assets/css/pages/card-analytics.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('admin/app-assets/vendors/css/tables/datatable/datatables.min.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('admin/app-assets/vendors/css/forms/select/select2.min.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('admin/assets/css/style.css') }}">
    <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/gijgo/1.9.13/combined/css/gijgo.min.css">
    @yield('head')

    <script async src="https://www.googletagmanager.com/gtag/js?id=G-H4CDED83Z0"></script>
    <script>
        window.dataLayer = window.dataLayer || [];
        function gtag(){dataLayer.push(arguments);}
        gtag('js', new Date());

        gtag('config', 'G-H4CDED83Z0');
    </script>
</head>
<body class="vertical-layout vertical-menu-modern 2-columns  navbar-floating footer-static  " data-open="click" data-menu="vertical-menu-modern" data-col="2-columns">
    <nav class="header-navbar navbar-expand-lg navbar navbar-with-menu floating-nav navbar-light navbar-shadow">
        <div class="navbar-wrapper">
            <div class="navbar-container content">
                <div class="navbar-collapse" id="navbar-mobile">
                    <div class="mr-auto float-left bookmark-wrapper d-flex align-items-center">
                        <ul class="nav navbar-nav">
                            <li class="nav-item mobile-menu d-xl-none mr-auto"><a class="nav-link nav-menu-main menu-toggle hidden-xs" href="#"><i class="ficon feather icon-menu"></i></a></li>
                        </ul>
                        <ul class="nav navbar-nav bookmark-icons">
                            {{-- <li class="nav-item d-none d-lg-block"><a class="nav-link" href="{{ route('profile.index') }}" data-toggle="tooltip" data-placement="top" title="Profile"><i class="ficon feather icon-user"></i></a></li>
                            <li class="nav-item d-none d-lg-block"><a class="nav-link" href="{{ route('logout') }}" data-toggle="tooltip" data-placement="top" title="Logout" onclick="event.preventDefault(); document.getElementById('logout-form').submit();"><i class="ficon feather icon-log-out"></i></a></li>
                            <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                @csrf
                            </form> --}}
                        </ul>
                    </div>
                    <ul class="nav navbar-nav float-right">
                        <li class="nav-item d-none d-lg-block"><a class="nav-link nav-link-expand"><i class="ficon feather icon-maximize"></i></a></li>
                        <li class="dropdown dropdown-user nav-item">
                            <a class="dropdown-toggle nav-link dropdown-user-link" href="#" data-toggle="dropdown">
                                <div class="user-nav d-sm-flex d-none"><span class="user-name text-bold-600">@if(Auth::check()) {{ Auth::user()->name }} @endif</span><span class="user-status">Available</span></div><span><img class="round" src="{{ asset('admin/app-assets/images/portrait/small/profile_user_avatar_people_app_website-512.webp') }}" alt="avatar" height="40" width="40"></span>
                            </a>
                            <div class="dropdown-menu dropdown-menu-right">
                                <a class="dropdown-item" href="page-user-profile.html"><i class="feather icon-user"></i> Edit Profile</a>
                                <a class="dropdown-item" href="app-email.html"><i class="feather icon-mail"></i> My Inbox</a>
                                <a class="dropdown-item" href="app-todo.html"><i class="feather icon-check-square"></i> Task</a>
                                <a class="dropdown-item" href="app-chat.html"><i class="feather icon-message-square"></i> Chats</a>
                                <div class="dropdown-divider"></div>
                                <a class="dropdown-item" href="{{ route('logout') }}"
                                    onclick="event.preventDefault();
                                    document.getElementById('logout-form').submit();">
                                    <i class="feather icon-power"></i> Logout
                                </a>
                                <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                    @csrf
                                </form>
                            </div>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </nav>
    <!-- END: Header-->


    <!-- BEGIN: Main Menu-->
    <div class="main-menu menu-fixed menu-light menu-accordion menu-shadow" data-scroll-to-active="true">
        <div class="navbar-header">
            <ul class="nav navbar-nav flex-row">
                <li class="nav-item mr-auto"><a class="navbar-brand" href="admin/html/ltr/vertical-menu-template/index.html">
                    {{-- <div class="brand-logo"></div> --}}
                    {{-- <h2 class="brand-text mb-0">Vuexy</h2> --}}
                    <a class="" href="#"><img src="{{ asset('landing-page/img/logo-ppid2.png') }}" alt="logo" width="40px"></a>
                </li>
                <li class="nav-item nav-toggle"><a class="nav-link modern-nav-toggle pr-0" data-toggle="collapse"><i class="feather icon-x d-block d-xl-none font-medium-4 primary toggle-icon"></i><i class="toggle-icon feather icon-disc font-medium-4 d-none d-xl-block collapse-toggle-icon primary" data-ticon="icon-disc"></i></a></li>
            </ul>
        </div>
        <div class="shadow-bottom"></div>
        <div class="main-menu-content">
            <ul class="navigation navigation-main" id="main-menu-navigation" data-menu="menu-navigation">
                <li class=" nav-item {{set_active('home')}}">
                    <a href="{{ url('home') }}"><i class="feather icon-home"></i><span class="menu-title" data-i18n="Dashboard">Dashboard</span></a>
                </li>
                @role('superadmin|adminskpd')
                <li class=" nav-item">
                    <a href="{{ url('/') }}" target="_blank"><i class="feather icon-external-link"></i><span class="menu-title" data-i18n="Lihat Situs">Lihat Situs</span></a>
                </li>
                @endrole
                @role('pengunjung')
                <li class=" nav-item">
                    <a href="https://ppid.bukittinggikota.go.id/informasipublik/dip" target="_blank"><i class="feather icon-external-link"></i><span class="menu-title" data-i18n="Lihat Situs">Download File</span></a>
                </li>
                @endrole
                
                @role('superadmin|adminskpd')
                <li class=" navigation-header"><span>Layanan</span></li>
                <li class=" nav-item"><a href="app-email.html"><i class="feather icon-mail"></i><span class="menu-title" data-i18n="Download Panduan">Download Panduan</span></a></li>
                @endrole
                @role('pengunjung')
                <li class=" nav-item"><a href="{{ route('permohonaninformasisss.index') }}"><i class="feather icon-file"></i><span class="menu-title" data-i18n="Permohonan Informasi">Permohonan Informasi</span></a></li>
                <li class=" nav-item"><a href="{{ route('keberatan.index') }}"><i class="feather icon-alert-triangle"></i><span class="menu-title" data-i18n="Keberatan">Keberatan</span></a></li>
                @endrole
                <li class=" nav-item {{set_active('informasidiunduh')}}"><a href="{{ url('informasidiunduh') }}"><i class="feather icon-download"></i><span class="menu-title" data-i18n="Informasi Diunduh">Informasi Diunduh</span></a></li>
                
                @role('superadmin|adminskpd')
                <li class=" nav-item"><a href="#"><i class="feather icon-airplay"></i><span class="menu-title" data-i18n="Permohonan">Permohonan</span></a>
                    <ul class="menu-content">
                        @if(Auth::user()->hasRole('superadmin'))
                            <li><a href="{{ route('mejalayanan.create') }}"><i class="feather icon-circle"></i><span class="menu-item" data-i18n="Meja Layanan">Meja Layanan</span></a></li>
                            <li class="{{set_active('permohonaninformasisss.latest')}}"><a href="{{ route('permohonaninformasisss.latest') }}"><i class="feather icon-circle"></i><span class="menu-item" data-i18n="Permohonan Masuk">Permohonan Masuk</span></a></li>
                        @endif
                        <li class="{{ set_active('permohonaninformasisss.disposisi') }}"><a href="{{ route('permohonaninformasisss.disposisi') }}"><i class="feather icon-circle"></i><span class="menu-item" data-i18n="Permohonan Disposisi">Permohonan Disposisi</span></a></li>
                        <li class="{{ set_active('permohonaninformasisss.diproses') }}"><a href="{{ route('permohonaninformasisss.diproses') }}"><i class="feather icon-circle"></i><span class="menu-item" data-i18n="Permohonan Diproses">Permohonan Diproses</span></a></li>
                        <li class="{{ set_active('permohonaninformasisss.selesai') }}"><a href="{{ route('permohonaninformasisss.selesai') }}"><i class="feather icon-circle"></i><span class="menu-item" data-i18n="Permohonan Selesai">Permohonan Selesai</span></a></li>
                        <li class="{{ set_active('permohonaninformasisss.ditolak') }}"><a href="{{ route('permohonaninformasisss.ditolak') }}"><i class="feather icon-circle"></i><span class="menu-item" data-i18n="Permohonan Ditolak">Permohonan Ditolak</span></a></li>
                        @if(Auth::user()->hasRole('superadmin'))
                        <li><a href="{{ route('keberatan.index') }}"><i class="feather icon-circle"></i><span class="menu-item" data-i18n="Keberatan">Keberatan</span></a></li>
                        @endif
                        <li class="{{ set_active('permohonaninformasisss.semuapermohonan') }}"><a href="{{ route('permohonaninformasisss.semuapermohonan') }}"><i class="feather icon-circle"></i><span class="menu-item" data-i18n="Semua Permohonan">Semua Permohonan</span></a></li>
                    </ul>
                </li>
                <li class=" nav-item"><a href="#"><i class="feather icon-file-plus"></i><span class="menu-title" data-i18n="Dokumen Informasi Publik">Dokumen Informasi Publik</span></a>
                    <ul class="menu-content">
                        <li class="{{set_active('dip.create')}}"><a href="{{ route('dip.create') }}"><i class="feather icon-circle"></i><span class="menu-item" data-i18n="Buat Dokumen">Buat Dokumen</span></a></li>
                        <li class="{{set_active('dip.draft')}}"><a href="{{ url('dip-draft') }}"><i class="feather icon-circle"></i><span class="menu-item" data-i18n="Draft">Draft</span></a></li>
                        <li class="{{set_active('dip.index')}}"><a href="{{ route('dip.index') }}"><i class="feather icon-circle"></i><span class="menu-item" data-i18n="Semua Dokumen">Semua Dokumen</span></a></li>
                        <li class="{{set_active('dip-menunggu-verifikasi')}}"><a href="{{ url('dip-menunggu-verifikasi') }}"><i class="feather icon-circle"></i><span class="menu-item" data-i18n="Semua Dokumen">Menunggu Verifikasi</span></a></li>
                        <li class="{{set_active('dip-ditolak')}}"><a href="{{ url('dip-ditolak') }}"><i class="feather icon-circle"></i><span class="menu-item" data-i18n="Semua Dokumen">Ditolak</span></a></li>
                    </ul>
                </li>
                <!-- <li class=" nav-item"><a href="#"><i class="feather icon-file-plus"></i><span class="menu-title" data-i18n="Dokumen Informasi Publik">Data DIP</span></a>
                    <ul class="menu-content">
                        <li class="{{set_active('dip.create')}}"><a href="{{ route('dip.create') }}"><i class="feather icon-circle"></i><span class="menu-item" data-i18n="Buat Dokumen">DIP Tidak di Publish</span></a></li>
                        <li class="{{set_active('dip.draft')}}"><a href="{{ url('dip-draft') }}"><i class="feather icon-circle"></i><span class="menu-item" data-i18n="Draft">DIP di Publish</span></a></li>
                    </ul>
                </li> -->
                @endrole
                @role('superadmin')
                <li class=" navigation-header"><span>Master</span></li>
                <li class=" nav-item {{set_active('feedback')}}"><a href="{{ url('feedback') }}"><i class="feather icon-mail"></i><span class="menu-title" data-i18n="Feedback">Feedback</span></a></li>

                <li class=" nav-item"><a href="#"><i class="feather icon-menu"></i><span class="menu-title" data-i18n="Pengguna">Pengguna</span></a>
                    <ul class="menu-content">
                        <li class="{{ set_active('skpd.index') }}"><a href="{{ route('skpd.index') }}"><i class="feather icon-circle"></i><span class="menu-item" data-i18n="Operasional/SKPD">Operasional/SKPD</span></a></li>
                        <li class="{{ set_active('petugas.index') }}"><a href="{{ route('petugas.index') }}"><i class="feather icon-circle"></i><span class="menu-item" data-i18n="Petugas">Petugas/Pengguna</span></a></li>
                    </ul>
                </li>
                <li class=" nav-item"><a href="#"><i class="feather icon-menu"></i><span class="menu-title" data-i18n="Pengaturan">Pengaturan</span></a>
                    <ul class="menu-content">
                        <li class="{{ set_active('banner.index') }}"><a href="{{ route('banner.index') }}"><i class="feather icon-circle"></i><span class="menu-item" data-i18n="Banner">Banner/Galeri</span></a></li>
                        <li><a href="{{ route('kategori.index') }}"><i class="feather icon-circle"></i><span class="menu-item" data-i18n="Kategori">Kategori</span></a></li>
                        <li><a href="{{ route('jenis.index') }}"><i class="feather icon-circle"></i><span class="menu-item" data-i18n="Jenis">Jenis</span></a></li>
                        <li><a href="{{ route('tipefile.index') }}"><i class="feather icon-circle"></i><span class="menu-item" data-i18n="Tipe File">Tipe File</span></a></li>
                        <li><a href="{{ route('page.index') }}"><i class="feather icon-circle"></i><span class="menu-item" data-i18n="Page">Page</span></a></li>
                        {{-- <li><a href="{{ route('statusdokumen.index') }}"><i class="feather icon-circle"></i><span class="menu-item" data-i18n="Status Dokumen/Permohonan">Status Dokumen/Permohonan</span></a></li> --}}
                        @if(Auth::user()->hasRole('superadmin'))
                        <li><a href="{{ url('logs') }}" target="_blank"><i class="feather icon-circle"></i><span class="menu-item" data-i18n="Log Aplikasi">Log Aplikasi</span></a></li>
                        <li><a href="{{ url('activity') }}" target="_blank"><i class="feather icon-circle"></i><span class="menu-item" data-i18n="Log User">Log User</span></a></li>
                        @endif
                    </ul>
                </li>
                @endrole
                <li class=" nav-item"><a href="#"><i class="feather icon-user"></i><span class="menu-title" data-i18n="Permohonan">User Menu</span></a>
                    <ul class="menu-content">
                        <li class="{{ set_active('profile.index') }}"><a href="{{ route('profile.index') }}"><i class="feather icon-circle"></i><span class="menu-item" data-i18n="Profile">Profile</span></a></li>
                        <li class="{{ set_active('logout') }}"><a href="{{ route('logout') }}" onclick="event.preventDefault();document.getElementById('logout-form').submit();"><i class="feather icon-circle"></i><span class="menu-item" data-i18n="Logout">Logout</span></a></li>
                        <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                            @csrf
                        </form>
                    </ul>
                </li>
            </ul>
        </div>
    </div>

    <div class="app-content content">
        <div class="content-overlay"></div>
        <div class="header-navbar-shadow"></div>
        <div class="content-wrapper">
            <div class="content-header row">
            </div>
            <div class="content-body">
                @yield('content')
            </div>
        </div>
    </div>

    <div class="sidenav-overlay"></div>
    <div class="drag-target"></div>

    <footer class="footer footer-static footer-light">
        <p class="clearfix blue-grey lighten-2 mb-0"><span class="float-md-left d-block d-md-inline-block mt-25">Develop By <a class="text-bold-800 grey darken-2" href="#" target="_blank">Diskominfo Kota Bukittinggi, </a>&copy; {{ date('Y') }}</span><span class="float-md-right d-none d-md-block">Hand-crafted & Made with<i class="feather icon-heart pink"></i></span>
            <button class="btn btn-primary btn-icon scroll-top" type="button"><i class="feather icon-arrow-up"></i></button>
        </p>
    </footer>

    <script src="{{ asset('admin/app-assets/vendors/js/vendors.min.js') }}"></script>
    <script src="{{ asset('admin/app-assets/vendors/js/charts/apexcharts.min.js') }}"></script>
    <script src="{{ asset('admin/app-assets/js/core/app-menu.js') }}"></script>
    <script src="{{ asset('admin/app-assets/js/core/app.js') }}"></script>
    <script src="{{ asset('admin/app-assets/js/scripts/components.js') }}"></script>
    <script src="{{ asset('admin/app-assets/js/scripts/pages/dashboard-ecommerce.js') }}"></script>
    <script src="{{ asset('admin/app-assets/vendors/js/tables/datatable/pdfmake.min.js') }}"></script>
    <script src="{{ asset('admin/app-assets/vendors/js/tables/datatable/vfs_fonts.js') }}"></script>
    <script src="{{ asset('admin/app-assets/vendors/js/tables/datatable/datatables.min.js') }}"></script>
    <script src="{{ asset('admin/app-assets/vendors/js/tables/datatable/datatables.buttons.min.js') }}"></script>
    <script src="{{ asset('admin/app-assets/vendors/js/tables/datatable/buttons.html5.min.js') }}"></script>
    <script src="{{ asset('admin/app-assets/vendors/js/tables/datatable/buttons.print.min.js') }}"></script>
    <script src="{{ asset('admin/app-assets/vendors/js/tables/datatable/buttons.bootstrap.min.js') }}"></script>
    <script src="{{ asset('admin/app-assets/vendors/js/tables/datatable/datatables.bootstrap4.min.js') }}"></script>
    <script src="{{ asset('admin/app-assets/js/scripts/datatables/datatable.js') }}"></script>
    <script src="{{ asset('admin/app-assets/vendors/js/forms/select/select2.full.min.js') }}"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/gijgo/1.9.13/combined/js/gijgo.min.js"></script>
    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
    <script src="{{ asset('js/app.js') }}" defer></script>
    @include('sweet::alert')
    @yield('js')
    <script>
        $(".select2").select2({
            dropdownAutoWidth: true,
            width: '100%'
        });
        $('.datepicker').datepicker({
            uiLibrary: 'bootstrap4',
            format: 'yyyy-mm-dd'
        });
        let startYear = 2017;
        let endYear = new Date().getFullYear();
        for (i = endYear; i > startYear; i--)
        {
            $('#tahun').append($('<option />').val(i).html(i));
        }
    </script>
    <script type="text/javascript">
        var Tawk_API=Tawk_API||{}, Tawk_LoadStart=new Date();
        (function(){
        var s1=document.createElement("script"),s0=document.getElementsByTagName("script")[0];
        s1.async=true;
        s1.src='https://embed.tawk.to/650026760f2b18434fd80982/1ha49cg73';
        s1.charset='UTF-8';
        s1.setAttribute('crossorigin','*');
        s0.parentNode.insertBefore(s1,s0);
        })();
    </script>
    <!-- <script type="text/javascript">
        var Tawk_API=Tawk_API||{}, Tawk_LoadStart=new Date();
        (function(){
        var s1=document.createElement("script"),s0=document.getElementsByTagName("script")[0];
        s1.async=true;
        s1.src='https://embed.tawk.to/5f30f8f65c885a1b7fb7b5f3/default';
        s1.charset='UTF-8';
        s1.setAttribute('crossorigin','*');
        s0.parentNode.insertBefore(s1,s0);
        })();
    </script> -->
    @stack('scripts')
</body>
</html>
