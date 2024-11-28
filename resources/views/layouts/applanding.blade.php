<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <meta name="description" content="PPID Kota Bukittinggi">
    <meta name="keywords" content="PPID, Kota Bukittinggi, Bukittinggi, Pejabat Pengelola Informasi dan Dokumentasi">
    <meta name="author" content="Dinas Komunikasi dan Informatika Kota Bukittinggi">

    <link rel="shortcut icon" href="{{ asset('landing-page/img/logo-ppid2.png') }}" type="image/x-icon">

    <title>PPID Kota Bukittinggi</title>

    <link rel="stylesheet" href="{{ asset('landing-page/css/bootstrap.min.css') }}">
    <link rel="stylesheet" href="{{ asset('landing-page/vendors/bootstrap-selector/css/bootstrap-select.min.css') }}">
    <link rel="stylesheet" href="{{ asset('landing-page/vendors/themify-icon/themify-icons.css') }}">
    <link rel="stylesheet" href="{{ asset('landing-page/vendors/flaticon/flaticon.css') }}">
    <link rel="stylesheet" href="{{ asset('landing-page/vendors/font-awesome/css/all.css') }}">
    <link rel="stylesheet" href="{{ asset('landing-page/vendors/animation/animate.css') }}">
    <link rel="stylesheet" href="{{ asset('landing-page/vendors/owl-carousel/assets/owl.carousel.min.css') }}">
    <link rel="stylesheet" href="{{ asset('landing-page/vendors/magnify-pop/magnific-popup.css') }}">
    <link rel="stylesheet" href="{{ asset('landing-page/vendors/nice-select/nice-select.css') }}">
    <link rel="stylesheet" href="{{ asset('landing-page/vendors/scroll/jquery.mCustomScrollbar.min.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('admin/app-assets/vendors/css/forms/select/select2.min.css') }}">
    <link rel="stylesheet" href="{{ asset('landing-page/vendors/elagent/style.css') }}">
    <link rel="stylesheet" href="{{ asset('landing-page/css/style.css') }}">
    <link rel="stylesheet" href="{{ asset('landing-page/css/responsive.css') }}">
    <link rel="stylesheet" href="{{ asset('css/jquery.fancybox.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('admin/app-assets/vendors/css/tables/datatable/datatables.min.css') }}">

    <style>
        body{
            font-size: 10pt;
        }
        .marquee {
            /* margin: 0 auto; */
            width: 150%;
            /* height: 30px; */
            white-space: nowrap;
            overflow: hidden;
            /* box-sizing: border-box; */
            /* position: relative; */
        }
        .marquee:before,
        .marquee:after {
            /* position: absolute; */
            /* top: 0; */
            /* width: 50px; */
            /* height: 30px; */
            /* content: ""; */
            /* z-index: 1; */
        }
        .marquee:before {
            /* left: 0; */
            background: linear-gradient(to right, #ccc 10%, transparent 80%);
        }
        .marquee:after {
            /* right: 0; */
            background: linear-gradient(to left, #ccc 10%, transparent 80%);
        }
        .marquee__content {
            width: 70%;
            display: flex;
            line-height: 30px;
            animation: marquee 15s linear infinite forwards;
        }
        .marquee__content:hover {
            animation-play-state: paused;
        }
        @keyframes marquee {
            0% {
            transform: translateX(0);
            }
            100% {
            transform: translateX(-66.6%);
            }
        }
    </style>

    <script async src="https://www.googletagmanager.com/gtag/js?id=G-H4CDED83Z0"></script>
    <script>
    window.dataLayer = window.dataLayer || [];
    function gtag(){dataLayer.push(arguments);}
    gtag('js', new Date());

    gtag('config', 'G-H4CDED83Z0');
    </script>
</head>

<body>
    <div id="preloader">
        <div id="ctn-preloader" class="ctn-preloader">
            <div class="animation-preloader">
                <div class="spinner"></div>
                <div class="txt-loading">
                    <span data-text-preloader="P" class="letters-loading">
                        P
                    </span>
                    <span data-text-preloader="P" class="letters-loading">
                        P
                    </span>
                    <span data-text-preloader="I" class="letters-loading">
                        I
                    </span>
                    <span data-text-preloader="D" class="letters-loading">
                        D
                    </span>
                    <span data-text-preloader="-" class="letters-loading">
                        -
                    </span>
                    <span data-text-preloader="B" class="letters-loading">
                        B
                    </span>
                    <span data-text-preloader="K" class="letters-loading">
                        K
                    </span>
                    <span data-text-preloader="T" class="letters-loading">
                        T
                    </span>
                </div>
                <p class="text-center">Loading</p>
            </div>
            <div class="loader">
                <div class="row">
                    <div class="col-3 loader-section section-left">
                        <div class="bg"></div>
                    </div>
                    <div class="col-3 loader-section section-left">
                        <div class="bg"></div>
                    </div>
                    <div class="col-3 loader-section section-right">
                        <div class="bg"></div>
                    </div>
                    <div class="col-3 loader-section section-right">
                        <div class="bg"></div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="body_wrapper">
        <header class="header_area">
            <nav class="navbar navbar-expand-lg menu_one menu_eight">
                <div class="container">
                    <a class="navbar-brand" href="{{ url('/') }}">
                        <img src="{{ asset('landing-page/img/logo-kota3.png') }}" srcset="{{asset('landing-page/img/logo-kota3.png')}} 2x" alt="">
                        <img src="{{ asset('landing-page/img/logo-ppid3.png') }}" srcset="{{asset('landing-page/img/logo-ppid3.png')}} 2x" alt="">
                    </a>
                    <button class="navbar-toggler collapsed" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                        <span class="menu_toggle">
                            <span class="hamburger">
                                <span></span>
                                <span></span>
                                <span></span>
                            </span>
                            <span class="hamburger-cross">
                                <span></span>
                                <span></span>
                            </span>
                        </span>
                    </button>

                    <div class="collapse navbar-collapse justify-content-between" id="navbarSupportedContent">
                        <ul class="navbar-nav menu w_menu ">
                            <li class="nav-item dropdown submenu mega_menu mega_menu_two {{set_active('welcome')}}">
                                <a class="nav-link dropdown-toggle" href="{{ url('/') }}">Home</a>
                            </li>
                            <li class="dropdown submenu nav-item {{set_active('index-profil')}}">
                                <a title="Profil" class="dropdown-toggle nav-link" href="{{route('index-profil')}}">Profil</a>
                            </li>
                            <li class="dropdown submenu nav-item {{set_active(['informasipublik.dip','informasipublik.berkala','informasipublik.sertamerta','informasipublik.setiapsaat'])}}">
                                <a title="Informasi Publik" class="dropdown-toggle nav-link" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false" href="#">Informasi Publik</a>
                                <ul role="menu" class=" dropdown-menu">
                                    <li class="nav-item {{set_active('informasipublik.dip')}}"><a title="Semua Daftar Informasi Publik (DIP)" class="nav-link" href="{{route('informasipublik.dip')}}">Semua Daftar Informasi Publik (DIP)</a></li>
                                    <li class="nav-item {{set_active('informasipublik.berkala')}}"><a title="Informasi yang Diumumkan Secara Berkala" class="nav-link" href="{{route('informasipublik.berkala')}}">Informasi yang Diumumkan Secara Berkala</a></li>
                                    <li class="nav-item {{set_active('informasipublik.sertamerta')}}"><a title="Informasi yang Diumumkan Secara Serta Merta" class="nav-link" href="{{route('informasipublik.sertamerta')}}">Informasi yang Diumumkan Secara Serta Merta</a></li>
                                    <li class="nav-item {{set_active('informasipublik.setiapsaat')}}"><a title="Informasi yang Wajib Tersedia Setiap Saat" class="nav-link" href="{{route('informasipublik.setiapsaat')}}">Informasi yang Wajib Tersedia Setiap Saat</a></li>
                                </ul>
                            </li>
                            <li class="dropdown submenu nav-item">
                                <a title="Layanan" class="dropdown-toggle nav-link" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false" href="#">Layanan</a>
                                <ul role="menu" class=" dropdown-menu">
                                    <li class="nav-item"><a title="Standar Operasional Prosedur" class="nav-link" href="{{ url('sop') }}">Standar Operasional Prosedur</a></li>
                                    <li class="nav-item"><a title="Alur Permohonan Informasi" class="nav-link" href="{{ url('alur-permohonan') }}">Alur Permohonan Informasi</a></li>
                                    <li class="nav-item"><a title="Formulir Permohonan" class="nav-link" href="{{ route('register') }}">Formulir Permohonan</a></li>
                                    <li class="nav-item"><a title="Alur Pengajuan Keberatan" class="nav-link" href="{{ url('alur-keberatan') }}">Alur Pengajuan Keberatan</a></li>
                                    <li class="nav-item"><a title="Formulir Pengajuan Keberatan" class="nav-link" href="{{ route('keberatan.create') }}">Formulir Pengajuan Keberatan</a></li>
                                    <li class="nav-item"><a title="Alur Fasilitasi Sengketa Informasi" class="nav-link" href="{{ url('alur-sengketa') }}">Alur Fasilitasi Sengketa Informasi</a></li>
                                    <li class="nav-item"><a title="Biaya Pelayanan" class="nav-link" href="{{ url('biaya-pelayanan') }}">Biaya Pelayanan</a></li>
                                    <li class="nav-item"><a title="Jadwal Pelayanan" class="nav-link" href="{{ url('jadwal-pelayanan') }}">Jadwal Pelayanan</a></li>
                                    <li class="nav-item"><a title="Prosedur Pengaduan (Lapor SP4N)" class="nav-link" href="https://bukittinggikota.lapor.go.id/" target="_blank">Prosedur Pengaduan (Lapor SP4N)</a></li>
                                </ul>
                            </li>
                            <li class="dropdown submenu nav-item">
                                <a title="Regulasi" class="dropdown-toggle nav-link" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false" href="#">Regulasi</a>
                                <ul role="menu" class=" dropdown-menu">
                                    <li class="nav-item"><a title="Regulasi Keterbukaan Informasi Publik" class="nav-link" href="{{ url('regulasi-keterbukaan') }}">Regulasi Keterbukaan Informasi Publik</a></li>
                                    <li class="nav-item"><a title="Jaringan Dokumentasi dan Informasi Hukum JDIH" class="nav-link" href="https://jdih.bukittinggikota.go.id/" target="_blank">Jaringan Dokumentasi dan Informasi Hukum JDIH</a></li>
                                </ul>
                            </li>
                            <li class="nav-item dropdown submenu mega_menu mega_menu_two {{set_active('monev.index')}}">
                                <a class="nav-link dropdown-toggle" href="{{route('monev.index')}}">Monev</a>
                            </li>
                            <li class="nav-item dropdown submenu mega_menu mega_menu_two {{set_active('ekliping')}}">
                                <a class="nav-link dropdown-toggle" href="{{url('ekliping')}}">E-Kliping</a>
                            </li>
                            <li class="nav-item dropdown submenu mega_menu mega_menu_two {{set_active('informasipublik.sakip')}}">
                                <a class="nav-link dropdown-toggle" href="{{route('informasipublik.sakip')}}">Sakip</a>
                            </li>
                            {{-- <li class="dropdown submenu nav-item">
                                <a title="Galeri" class="dropdown-toggle nav-link" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false" href="#">Galeri</a>
                                <ul role="menu" class=" dropdown-menu">
                                    <li class="nav-item"><a title="Foto" class="nav-link" href="#">Foto</a></li>
                                    <li class="nav-item"><a title="Video" class="nav-link" href="#">Video</a></li>
                                </ul>
                            </li> --}}
                        </ul>
                        @if (Auth::check())
                        <a class="btn_get btn_hover saas_btn" href="{{url('/home')}}">Dashboard</a>
                        @else
                        <a class="btn_get btn_hover saas_btn" href="{{route('login')}}">Login</a>
                        @endif
                    </div>
                </div>
            </nav>
        </header>

        @yield('contentlanding')

        <footer class="footer_area footer_dark_one footer_dark_ten pt_120">
            <div class="footer_top">
                <div class="container">
                    <div class="row">
                        <div class="col-sm-3">
                            <div class="f_widget dark_widget company_widget wow fadeInUp" data-wow-delay="0.2s">
                                <a href="index.html" class="f-logo"><img src="{{ asset('landing-page/img/logo-ppid2.png') }}" srcset="{{ asset('landing-page/img/logo-ppid2.png') }} 2x" alt="logo"></a>
                                <div class="widget-wrap">
                                    <p class="f_400 f_p f_size_15 mb-0 l_height34"><span>Email:</span> <a href="mailto:ppid.bukittinggi@gmail.com" class="f_400">ppid.bukittinggi@gmail.com</a></p>
                                    <p class="f_400 f_p f_size_15 mb-0 l_height34"><span>Phone:</span> <a href="tel:075233369" class="f_400">(0752) 33369 ext. 117</a></p>
                                </div>
                                <div class="f_social_icon_two">
                                    <a href="https://www.facebook.com/kominfobukittinggi" target="_blank" title="Facebook Diskominfo Bukittinggi" class="ti-facebook"></a>
                                    <a href="https://www.instagram.com/diskominfo.bukittinggi/" target="_blank" title="Instagram Diskominfo Bukittinggi" class="ti-instagram"></a>
                                    <a href="https://www.youtube.com/channel/UCUpcl9y6KfOnUa6KrR5Reow" target="_blank" title="Youtube Diskominfo Bukittinggi" class="ti-youtube"></a>
                                </div>
                                <div class="f_social_icon_two">
                                    <a href="https://play.google.com/store/apps/details?id=com.diskominfobkt.ppid" target="_blank" title="Facebook Pemko Bukittinggi" class=""><img src="{{asset('landing-page/img/logo website/google-icon.png')}}" height="55px" alt=""></a>
                                    {{-- <a href="#"><img src="{{asset('landing-page/img/logo website/Lapor-SP4N.png')}}" height="55px" alt=""></a> --}}
                                </div>
                            </div>
                        </div>
                        <div class="col-sm-3">
                            <div class="f_widget dark_widget about-widget pl_70 wow fadeInUp" data-wow-delay="0.4s">
                                <h3 class="f-title f_600 t_color f_size_18 mb_40">Statistik</h3>
                                <ul class="list-unstyled f_list">
                                    <li>Total DIP : {{ $totalDIP->totalDIP }}</li>
                                    <li>Jumlah Permohonan : {{ $totalPermohonan->totalPermohonan }}</li>
                                    <li>Jumlah Diproses : {{ $diproses->totalPermohonan }}</li>
                                    <li>Jumlah Selesai : {{ $selesai->totalPermohonan }}</li>
                                    <li>Jumlah Ditolak : {{ $ditolak->totalPermohonan }}</li>
                                    <li>Jumlah Unduhan : {{ $totalUnduhan->totalUnduhan }}</li>
                                    <li>Total Pengunjung</li>
                                    <li>Hari Ini : {{ $visit_today->visit_today }}</li>
                                    <li>Kemarin : {{ $visit_yerterday->visit_yerterday }}</li>
                                    <li>Total : {{ $visit_total->visit_total }}</li>
                                    {{-- <li>
                                        <a href='https://www.free-counters.org/'>https://www.free-counters.org/</a> <script type='text/javascript' src='https://www.freevisitorcounters.com/auth.php?id=310032d5f901bf2df14b22bcced540e53ba405c9'></script>
                                        <script type="text/javascript" src="https://www.freevisitorcounters.com/en/home/counter/740931/t/0"></script>
                                    </li> --}}
                                </ul>
                            </div>
                        </div>
                        <div class="col-sm-6">
                            <div class="f_widget dark_widget about-widget pl_70 wow fadeInUp" data-wow-delay="0.4s">
                                <p>Alamat : Kantor Balai Kota Jl. Kusuma Bhakti, Kubu Gulai Bancah, Kec. Mandiangin Koto Selayan, Kota Bukittinggi, Sumatera Barat 26113 </p>
                                <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d15959.060050642569!2d100.35739669724293!3d-0.29618049521449924!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2fd5475cca7b0893%3A0xf9cd23e3ce13fb27!2sDinas%20Kominfo%20Bukittinggi!5e0!3m2!1sid!2sid!4v1694510216318!5m2!1sid!2sid" width="500" height="300" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
                                <!-- <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3989.768738563529!2d100.36562401462655!3d-0.28564233543330825!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2fd5475cb4bad16f%3A0x9d6bd60976b4dcc!2sBalai%20Kota%20Bukittinggi!5e0!3m2!1sid!2sid!4v1597118255605!5m2!1sid!2sid" width="500" height="300" frameborder="0" style="border:0;" allowfullscreen="" aria-hidden="false" tabindex="0"></iframe> -->
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="footer_bottom dark_f_bottom">
                <div class="container">
                    <div class="row align-items-center">
                        <div class="col-lg-6 col-md-5 col-sm-12">
                            <p class="mb-0 f_400">Develop by <a href="#">Dinas Komunikasi dan Informatika Kota Bukittinggi</a>, © {{ date('Y') }}</p>
                        </div>
                        <div class="col-lg-6 col-md-4 col-sm-12">
                            <ul class="list-unstyled f_menu text-right">
                                <li><a href="#">Terms of Use</a></li>
                                <li><a href="#">Privacy Policy</a></li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </footer>
    </div>

    <script src="{{asset('landing-page/js/jquery-3.2.1.min.js')}}"></script>
    <script src="{{asset('landing-page/js/propper.js')}}"></script>
    <script src="{{asset('landing-page/js/bootstrap.min.js')}}"></script>
    <script src="{{asset('landing-page/vendors/wow/wow.min.js')}}"></script>
    <script src="{{asset('landing-page/vendors/sckroller/jquery.parallax-scroll.js')}}"></script>
    <script src="{{asset('landing-page/vendors/owl-carousel/owl.carousel.min.js')}}"></script>
    <script src="{{asset('landing-page/vendors/imagesloaded/imagesloaded.pkgd.min.js')}}"></script>
    <script src="{{asset('landing-page/vendors/isotope/isotope-min.js')}}"></script>
    <script src="{{asset('landing-page/vendors/magnify-pop/jquery.magnific-popup.min.js')}}"></script>
    <script src="{{asset('landing-page/vendors/bootstrap-selector/js/bootstrap-select.min.js')}}"></script>
    <script src="{{asset('landing-page/vendors/nice-select/jquery.nice-select.min.js')}}"></script>
    <script src="{{asset('landing-page/vendors/scroll/jquery.mCustomScrollbar.concat.min.js')}}"></script>
    <script src="{{asset('landing-page/js/plugins.js')}}"></script>
    <script src="{{asset('landing-page/js/main.js')}}"></script>
    <script src="{{ asset('admin/app-assets/vendors/js/tables/datatable/pdfmake.min.js') }}"></script>
    <script src="{{ asset('admin/app-assets/vendors/js/tables/datatable/vfs_fonts.js') }}"></script>
    <script src="{{ asset('admin/app-assets/vendors/js/tables/datatable/datatables.min.js') }}"></script>
    <script src="{{ asset('admin/app-assets/vendors/js/tables/datatable/datatables.buttons.min.js') }}"></script>
    <script src="{{ asset('admin/app-assets/vendors/js/tables/datatable/buttons.html5.min.js') }}"></script>
    <script src="{{ asset('admin/app-assets/vendors/js/tables/datatable/buttons.print.min.js') }}"></script>
    <script src="{{ asset('admin/app-assets/vendors/js/tables/datatable/buttons.bootstrap.min.js') }}"></script>
    <script src="{{ asset('admin/app-assets/vendors/js/tables/datatable/datatables.bootstrap4.min.js') }}"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/pdfobject/2.1.1/pdfobject.min.js"></script>
    <script src="{{ asset('admin/app-assets/js/scripts/datatables/datatable.js') }}"></script>
    <script src="{{ asset('admin/app-assets/vendors/js/forms/select/select2.full.min.js') }}"></script>
    <script src="{{ asset('js/jquery.fancybox.js') }}"></script>
    <script src="https://cdn.amcharts.com/lib/4/core.js"></script>
    <script src="https://cdn.amcharts.com/lib/4/charts.js"></script>
    <script src="https://cdn.amcharts.com/lib/4/themes/animated.js"></script>

    <!--Start of Tawk.to Script-->
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
    <!--End of Tawk.to Script-->
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
