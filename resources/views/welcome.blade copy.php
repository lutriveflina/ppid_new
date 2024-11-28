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
    <link rel="stylesheet" href="{{ asset('landing-page/vendors/animation/animate.css') }}">
    <link rel="stylesheet" href="{{ asset('landing-page/vendors/owl-carousel/assets/owl.carousel.min.css') }}">
    <link rel="stylesheet" href="{{ asset('landing-page/vendors/magnify-pop/magnific-popup.css') }}">
    <link rel="stylesheet" href="{{ asset('landing-page/vendors/nice-select/nice-select.css') }}">
    <link rel="stylesheet" href="{{ asset('landing-page/vendors/scroll/jquery.mCustomScrollbar.min.css') }}">
    <link rel="stylesheet" href="{{ asset('landing-page/vendors/elagent/style.css') }}">
    <link rel="stylesheet" href="{{ asset('landing-page/css/style.css') }}">
    <link rel="stylesheet" href="{{ asset('landing-page/css/responsive.css') }}">
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
                    <a class="navbar-brand sticky_logo" href="{{ url('/') }}">
                        <img src="{{ asset('landing-page/img/logo-ppid2.png') }}" srcset="landing-page/img/logo-ppid2.png 2x" alt="logo">
                        <img src="{{ asset('landing-page/img/logo-ppid2.png') }}" srcset="landing-page/img/logo-ppid2.png 2x" alt="">
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

                    <div class="collapse navbar-collapse justify-content-center" id="navbarSupportedContent">
                        <ul class="navbar-nav menu w_menu ">
                            <li class="nav-item dropdown submenu mega_menu mega_menu_two active">
                                <a class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Home</a>
                            </li>
                            <li class="dropdown submenu nav-item">
                                <a title="Profil" class="dropdown-toggle nav-link" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false" href="#">Profil</a>
                                <ul role="menu" class=" dropdown-menu">
                                    <li class="nav-item"><a title="Kontak" class="nav-link" href="about.html">Kontak</a></li>
                                    <li class="nav-item"><a title="Maklumat Pelayanan" class="nav-link" href="process.html">Maklumat Pelayanan</a></li>
                                    <li class="nav-item"><a title="Struktur Organisasi" class="nav-link" href="price.html">Struktur Organisasi</a></li>
                                    <li class="nav-item"><a title="Visi dan Misi" class="nav-link" href="price.html">Visi dan Misi</a></li>
                                    <li class="nav-item"><a title="Tugas dan Wewenag PPID" class="nav-link" href="price.html">Tugas dan Wewenag PPID</a></li>
                                    <li class="nav-item"><a title="Profil Singkat PPID" class="nav-link" href="price.html">Profil Singkat PPID</a></li>
                                    <li class="nav-item"><a title="Kata Sambutan" class="nav-link" href="price.html">Kata Sambutan</a></li>
                                    {{-- <li class="dropdown submenu nav-item"><a title="404" class="dropdown-toggle nav-link" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false" href="#">404<span class="arrow_carrot-right"></span> </a>
                                        <ul class=" dropdown-menu">
                                            <li class="nav-item"><a title="404 01" class="nav-link" href="404.html">404 01</a></li>
                                            <li class="nav-item"><a title="404 02" class="nav-link" href="404-two.html">404 02</a></li>
                                        </ul>
                                    </li> --}}
                                </ul>
                            </li>
                            <li class="dropdown submenu nav-item">
                                <a title="Berita" class="dropdown-toggle nav-link" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false" href="#">Berita</a>
                                <ul role="menu" class=" dropdown-menu">
                                    <li class="nav-item"><a title="Berita PPID" class="nav-link" href="about.html">Berita PPID</a></li>
                                    <li class="nav-item"><a title="Berita Umum" class="nav-link" href="process.html">Berita Umum</a></li>
                                    <li class="nav-item"><a title="Berita Pariwisata" class="nav-link" href="price.html">Berita Pariwisata</a></li>
                                    <li class="nav-item"><a title="Berita Pemerintahan" class="nav-link" href="price.html">Berita Pemerintahan</a></li>
                                    <li class="nav-item"><a title="Berita Daerah" class="nav-link" href="price.html">Berita Daerah</a></li>
                                    <li class="nav-item"><a title="Berita Lain-lain" class="nav-link" href="price.html">Berita Lain-lain</a></li>
                                </ul>
                            </li>
                            <li class="dropdown submenu nav-item">
                                <a title="Informasi Publik" class="dropdown-toggle nav-link" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false" href="#">Informasi Publik</a>
                                <ul role="menu" class=" dropdown-menu">
                                    <li class="nav-item"><a title="Semua Daftar Informasi Publik (DIP)" class="nav-link" href="{{route('informasipublik.dip')}}">Semua Daftar Informasi Publik (DIP)</a></li>
                                    <li class="nav-item"><a title="Informasi yang Diumumkan Secara Berkala" class="nav-link" href="process.html">Informasi yang Diumumkan Secara Berkala</a></li>
                                    <li class="nav-item"><a title="Informasi yang Diumumkan Secara Serta Merta" class="nav-link" href="price.html">Informasi yang Diumumkan Secara Serta Merta</a></li>
                                    <li class="nav-item"><a title="Informasi yang Wajib Tersedia Setiap Saat" class="nav-link" href="price.html">Informasi yang Wajib Tersedia Setiap Saat</a></li>
                                    <li class="nav-item"><a title="Informasi yang Dikecualikan" class="nav-link" href="price.html">Informasi yang Dikecualikan</a></li>
                                    <li class="nav-item"><a title="Informasi Regulasi" class="nav-link" href="price.html">Informasi Regulasi</a></li>
                                </ul>
                            </li>
                            <li class="dropdown submenu nav-item">
                                <a title="Transparansi" class="dropdown-toggle nav-link" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false" href="#">Transparansi</a>
                                <ul role="menu" class=" dropdown-menu">
                                    <li class="nav-item"><a title="Anggaran Nagari" class="nav-link" href="about.html">Anggaran Nagari</a></li>
                                    <li class="nav-item"><a title="Ringkasan DPA-SKPD" class="nav-link" href="process.html">Ringkasan DPA-SKPD</a></li>
                                    <li class="nav-item"><a title="Ringkasan DPA-PPKD" class="nav-link" href="price.html">Ringkasan DPA-PPKD</a></li>
                                    <li class="nav-item"><a title="Laporan Realisasi Anggaran SKPD" class="nav-link" href="price.html">Laporan Realisasi Anggaran SKPD</a></li>
                                    <li class="nav-item"><a title="Laporan Realisasi Anggaran PPKD" class="nav-link" href="price.html">Laporan Realisasi Anggaran PPKD</a></li>
                                </ul>
                            </li>
                            <li class="dropdown submenu nav-item">
                                <a title="Layanan" class="dropdown-toggle nav-link" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false" href="#">Layanan</a>
                                <ul role="menu" class=" dropdown-menu">
                                    <li class="nav-item"><a title="Standar Operasioanal Prosedur" class="nav-link" href="about.html">Standar Operasioanal Prosedur</a></li>
                                    <li class="nav-item"><a title="Alur Pengajuan Keberatan" class="nav-link" href="process.html">Alur Pengajuan Keberatan</a></li>
                                    <li class="nav-item"><a title="Formulir Keberatan" class="nav-link" href="price.html">Formulir Keberatan</a></li>
                                    <li class="nav-item"><a title="Tata Cara Pengaduan" class="nav-link" href="price.html">Tata Cara Pengaduan</a></li>
                                    <li class="nav-item"><a title="Alur Fasilitasi Sengketa Informasi" class="nav-link" href="price.html">Alur Fasilitasi Sengketa Informasi</a></li>
                                    <li class="nav-item"><a title="Jadwal Pelayanan" class="nav-link" href="price.html">Jadwal Pelayanan</a></li>
                                    <li class="nav-item"><a title="Biaya Pelayanan" class="nav-link" href="price.html">Biaya Pelayanan</a></li>
                                    <li class="nav-item"><a title="Alur Permohonan" class="nav-link" href="price.html">Alur Permohonan</a></li>
                                    <li class="nav-item"><a title="Formulir Permohonan" class="nav-link" href="price.html">Formulir Permohonan</a></li>
                                    <li class="nav-item"><a title="Pengajuan Keberatan" class="nav-link" href="price.html">Pengajuan Keberatan</a></li>
                                    <li class="nav-item"><a title="Cek E-Tiket" class="nav-link" href="price.html">Cek E-Tiket</a></li>
                                </ul>
                            </li>
                            <li class="dropdown submenu nav-item">
                                <a title="Laporan" class="dropdown-toggle nav-link" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false" href="#">Laporan</a>
                                <ul role="menu" class=" dropdown-menu">
                                    <li class="nav-item"><a title="Laporan Layanan Informasi Publik" class="nav-link" href="about.html">Laporan Layanan Informasi Publik</a></li>
                                    <li class="nav-item"><a title="Laporan Rekapitulasi Permohonan Informasi Publik" class="nav-link" href="process.html">Laporan Rekapitulasi Permohonan Informasi Publik</a></li>
                                    <li class="nav-item"><a title="Laporan Daftar Permohonan Informasi" class="nav-link" href="price.html">Laporan Daftar Permohonan Informasi</a></li>
                                    <li class="nav-item"><a title="Laporan Survei Kepuasan Layanan Informasi Publik" class="nav-link" href="price.html">Laporan Survei Kepuasan Layanan Informasi Publik</a></li>
                                </ul>
                            </li>
                            <li class="dropdown submenu nav-item">
                                <a title="Regulasi" class="dropdown-toggle nav-link" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false" href="#">Regulasi</a>
                                <ul role="menu" class=" dropdown-menu">
                                    <li class="nav-item"><a title="Regulasi Keterbukaan Informasi Publik" class="nav-link" href="about.html">Regulasi Keterbukaan Informasi Publik</a></li>
                                    <li class="nav-item"><a title="Jaringan Dokumentasi dan Informasi Hukum JDIH" class="nav-link" href="process.html">Jaringan Dokumentasi dan Informasi Hukum JDIH</a></li>
                                </ul>
                            </li>
                            <li class="dropdown submenu nav-item">
                                <a title="Galeri" class="dropdown-toggle nav-link" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false" href="#">Galeri</a>
                                <ul role="menu" class=" dropdown-menu">
                                    <li class="nav-item"><a title="Foto" class="nav-link" href="about.html">Foto</a></li>
                                    <li class="nav-item"><a title="Video" class="nav-link" href="process.html">Video</a></li>
                                </ul>
                            </li>
                        </ul>
                        {{-- <a class="btn_get btn_hover saas_btn" href="{{route('login')}}">Login</a> --}}
                    </div>
                    <div class="nav_right_btn">
                        <a href="{{route('login')}}" class="login_btn active">Login</a>
                        {{-- <a href="{{route('register')}}" class="login_btn active">Sign Up</a> --}}
                    </div>
                </div>
            </nav>
        </header>

        <section class="saas_banner_area_two">
            <div class="section_intro">
                <div class="section_container">
                    <div class="intro">
                        <div class=" intro_content">
                            <h1 class="f_700 f_size_50 w_color f_p">Selamat Datang di Layanan PPID</h1>
                            <p class="w_color f_size_18">Kami akan melayani segala Informasi Publik yang anda butuhkan tentang Pemerintah Kota Bukittinggi</p>
                            <form class="mailchimp" method="post">
                                <div class="input-group subcribes">
                                    <input type="text" name="EMAIL" class="form-control memail" placeholder="saasland@gmail.com">
                                    <button class="btn btn_submit f_size_15 f_500" type="submit">Get Started</button>
                                </div>
                                <p class="mchimp-errmessage" style="display: none;"></p>
                                <p class="mchimp-sucmessage" style="display: none;"></p>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
            <img class="shap_img" src="landing-page/img/home-10/shape.png" alt="">
            <div class="animation_img wow fadeInUp" data-wow-delay="0.3s">
                {{-- <img src="landing-page/img/home-10/dashboard_img.png" alt=""> --}}
                <div id="carouselExampleCaptions" class="carousel slide" data-ride="carousel">
                    <ol class="carousel-indicators">
                      <li data-target="#carouselExampleCaptions" data-slide-to="0" class="active"></li>
                      <li data-target="#carouselExampleCaptions" data-slide-to="1"></li>
                      <li data-target="#carouselExampleCaptions" data-slide-to="2"></li>
                    </ol>
                    <div class="carousel-inner">
                      <div class="carousel-item active">
                        <img src="landing-page/img/home-10/dashboard_img.png" class="" alt="...">
                        <div class="carousel-caption d-none d-md-block">
                          <h5>First slide label</h5>
                          <p>Nulla vitae elit libero, a pharetra augue mollis interdum.</p>
                        </div>
                      </div>
                      <div class="carousel-item">
                        <img src="landing-page/img/home-10/dashboard_img.png" class="" alt="...">
                        <div class="carousel-caption d-none d-md-block">
                          <h5>Second slide label</h5>
                          <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit.</p>
                        </div>
                      </div>
                      <div class="carousel-item">
                        <img src="landing-page/img/home-10/dashboard_img.png" class="" alt="...">
                        <div class="carousel-caption d-none d-md-block">
                          <h5>Third slide label</h5>
                          <p>Praesent commodo cursus magna, vel scelerisque nisl consectetur.</p>
                        </div>
                      </div>
                    </div>
                    <a class="carousel-control-prev" href="#carouselExampleCaptions" role="button" data-slide="prev">
                      <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                      <span class="sr-only">Previous</span>
                    </a>
                    <a class="carousel-control-next" href="#carouselExampleCaptions" role="button" data-slide="next">
                      <span class="carousel-control-next-icon" aria-hidden="true"></span>
                      <span class="sr-only">Next</span>
                    </a>
                  </div>
            </div>
        </section>

        <section class="saas_features_area_two">
            <div class="container">
                <div class="sec_title text-center mb_70 wow fadeInUp" data-wow-delay="0.3s">
                    <h2 class="f_p f_size_30 l_height50 f_600 t_color">Awesome Features</h2>
                    <p class="f_400 f_size_16">When you buy a dedicated server, you get a machine with resources<br> solely allocated to your business.</p>
                </div>
                <div class="row mb_30">
                    <div class="col-lg-4 col-sm-6">
                        <div class="saas_features_item text-center wow fadeInUp" data-wow-delay="0.3s">
                            <img src="landing-page/img/home-10/icon1.png" alt="">
                            <h4 class="f_size_20 f_p t_color f_500">Awesome design</h4>
                            <p class="f_400 f_size_15 mb-0">Tosser blag bubble and squeak up the duff A bit of how's your father blatant morish char cuppa.!</p>
                        </div>
                    </div>
                    <div class="col-lg-4 col-sm-6">
                        <div class="saas_features_item text-center wow fadeInUp" data-wow-delay="0.5s">
                            <img src="landing-page/img/home-10/icon2.png" alt="">
                            <h4 class="f_size_20 f_p t_color f_500">Easy Customize</h4>
                            <p class="f_400 f_size_15 mb-0">Tosser blag bubble and squeak up the duff A bit of how's your father blatant morish char cuppa.!</p>
                        </div>
                    </div>
                    <div class="col-lg-4 col-sm-6">
                        <div class="saas_features_item text-center wow fadeInUp" data-wow-delay="0.7s">
                            <img src="landing-page/img/home-10/icon3.png" alt="">
                            <h4 class="f_size_20 f_p t_color f_500">Extreme Security</h4>
                            <p class="f_400 f_size_15 mb-0">Tosser blag bubble and squeak up the duff A bit of how's your father blatant morish char cuppa.!</p>
                        </div>
                    </div>
                </div>
                <div class="hr mt_100 mb-0"></div>
            </div>
        </section>

        <section class="saas_service_area sec_pad">
            <div class="container">
                <div class="sec_title text-center mb_70 wow fadeInUp" data-wow-delay="0.3s">
                    <h2 class="f_p f_size_30 l_height50 f_600 t_color">Whom RedSwitches is for?</h2>
                    <p class="f_400 f_size_16">Well at public school cheeky bugger grub burke codswallop smashing only a quid<br> pardon you lavatory chip shop, geeza loo horse play.</p>
                </div>
                <div class="row saas_service_item">
                    <div class="col-lg-6">
                        <div class="saas_service_img wow fadeInLeft" data-wow-delay="0.5s">
                            <img src="landing-page/img/home-10/service_one.png" alt="">
                        </div>
                    </div>
                    <div class="col-lg-6 d-flex align-items-center">
                        <div class="saas_service_content pr_100 wow fadeInRight" data-wow-delay="0.7s">
                            <div class="icon icon_one"><i class="ti-control-shuffle"></i></div>
                            <h4 class="f_500 f_p t_color">For Developers</h4>
                            <p class="f_p f_400">Harry don't get shirty with me loo hanky panky in my flat bog jolly good blag bamboozled the BBC well fantastic, excuse my French crikey geeza spiffing lost the plot codswallop brilliant blower pardon.!</p>
                            <a href="#" class="gr_btn"><span class="text">Learn More</span></a>
                        </div>
                    </div>
                </div>
                <div class="row flex-row-reverse saas_service_item">
                    <div class="col-lg-6">
                        <div class="saas_service_img wow fadeInRight" data-wow-delay="0.4s">
                            <img src="landing-page/img/home-10/Design.png" alt="">
                        </div>
                    </div>
                    <div class="col-lg-6 d-flex align-items-center">
                        <div class="saas_service_content pl_100 wow fadeInLeft" data-wow-delay="0.6s">
                            <div class="icon icon_two"><i class="ti-split-v-alt"></i></div>
                            <h4 class="f_500 f_p t_color">For Startup</h4>
                            <p class="f_p f_400">Harry don't get shirty with me loo hanky panky in my flat bog jolly good blag bamboozled the BBC well fantastic, excuse my French crikey geeza spiffing lost the plot codswallop brilliant blower pardon.!</p>
                            <a href="#" class="gr_btn"><span class="text">Learn More</span></a>
                        </div>
                    </div>
                </div>
                <div class="row saas_service_item">
                    <div class="col-lg-6">
                        <div class="saas_service_img wow fadeInLeft" data-wow-delay="0.4s">
                            <img src="landing-page/img/home-10/enterprice.png" alt="">
                        </div>
                    </div>
                    <div class="col-lg-6 d-flex align-items-center">
                        <div class="saas_service_content pr_100 wow fadeInRight" data-wow-delay="0.6s">
                            <div class="icon icon_three"><i class="ti-bar-chart-alt"></i></div>
                            <h4 class="f_500 f_p t_color">For Enterprines</h4>
                            <p class="f_p f_400">Harry don't get shirty with me loo hanky panky in my flat bog jolly good blag bamboozled the BBC well fantastic, excuse my French crikey geeza spiffing lost the plot codswallop brilliant blower pardon.!</p>
                            <a href="#" class="gr_btn"><span class="text">Learn More</span></a>
                        </div>
                    </div>
                </div>
                <div class="row flex-row-reverse saas_service_item">
                    <div class="col-lg-6">
                        <div class="saas_service_img wow fadeInRight" data-wow-delay="0.4s">
                            <img src="landing-page/img/home-10/Development.png" alt="">
                        </div>
                    </div>
                    <div class="col-lg-6 d-flex align-items-center">
                        <div class="saas_service_content pl_100 wow fadeInLeft" data-wow-delay="0.4s">
                            <div class="icon icon_four"><i class="ti-settings"></i></div>
                            <h4 class="f_500 f_p t_color">For Bare metal Servers</h4>
                            <p class="f_p f_400">Harry don't get shirty with me loo hanky panky in my flat bog jolly good blag bamboozled the BBC well fantastic, excuse my French crikey geeza spiffing lost the plot codswallop brilliant blower pardon.!</p>
                            <a href="#" class="gr_btn"><span class="text">Learn More</span></a>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <section class="sass_partner_logo_area sec_pad">
            <div class="container">
                <div class="sec_title text-center wow fadeInUp" data-wow-delay="0.3s">
                    <h2 class="f_p f_size_30 l_height50 f_600 t_color">We Offer Around 100 Applications</h2>
                    <p class="f_400 f_size_16">Well at public school cheeky bugger grub burke codswallop smashing only a quid<br> pardon you lavatory chip shop, geeza loo horse play.</p>
                </div>
                <div class="partner_logo_area_four">
                    <div class="row partner_info">
                        <div class="logo_item">
                            <a href="#"><img src="landing-page/img/home3/logo_01.png" alt=""></a>
                        </div>
                        <div class="logo_item">
                            <a href="#"><img src="landing-page/img/home3/logo_02.png" alt=""></a>
                        </div>
                        <div class="logo_item">
                            <a href="#"><img src="landing-page/img/home3/logo_03.png" alt=""></a>
                        </div>
                        <div class="logo_item">
                            <a href="#"><img src="landing-page/img/home3/logo_04.png" alt=""></a>
                        </div>
                        <div class="logo_item">
                            <a href="#"><img src="landing-page/img/home3/logo_05.png" alt=""></a>
                        </div>
                        <div class="logo_item">
                            <a href="#"><img src="landing-page/img/home3/logo_03.png" alt=""></a>
                        </div>
                        <div class="logo_item">
                            <a href="#"><img src="landing-page/img/home3/logo_04.png" alt=""></a>
                        </div>
                        <div class="logo_item">
                            <a href="#"><img src="landing-page/img/home3/logo_05.png" alt=""></a>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <section class="saas_subscribe_area">
            <div class="container">
                <div class="row saas_action_content wow fadeInUp" data-wow-delay="0.2s">
                    <div class="col-lg-8">
                        <h4 class="f_p f_size_30 l_height50 f_400 t_color mb-0">Ready to get Started?</h4>
                    </div>
                    <div class="col-lg-4 d-flex justify-content-end">
                        <a href="{{route('register')}}" class="gr_btn"><span class="text">Creater an Account</span></a>
                    </div>
                </div>
            </div>
        </section>
        <footer class="footer_area footer_dark_one footer_dark_ten pt_120">
            <div class="footer_top">
                <div class="container">
                    <div class="row">
                        <div class="col-lg-3 col-md-6">
                            <div class="f_widget dark_widget company_widget wow fadeInUp" data-wow-delay="0.2s">
                                <a href="index.html" class="f-logo"><img src="landing-page/img/logo3.png" srcset="landing-page/img/logo-3-2x.png 2x" alt="logo"></a>
                                <div class="widget-wrap">
                                    <p class="f_400 f_p f_size_15 mb-0 l_height34"><span>Email:</span> <a href="mailto:saasland@gmail.com" class="f_400">saasland@gmail.com</a></p>
                                    <p class="f_400 f_p f_size_15 mb-0 l_height34"><span>Phone:</span> <a href="tel:948256347968" class="f_400">+948 256 347 968</a></p>
                                </div>
                                <div class="f_social_icon_two">
                                    <a href="#" class="ti-facebook"></a>
                                    <a href="#" class="ti-twitter-alt"></a>
                                    <a href="#" class="ti-vimeo-alt"></a>
                                    <a href="#" class="ti-pinterest"></a>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-3 col-md-6">
                            <div class="f_widget dark_widget about-widget pl_70 wow fadeInUp" data-wow-delay="0.4s">
                                <h3 class="f-title f_600 t_color f_size_18 mb_40">About Us</h3>
                                <ul class="list-unstyled f_list">
                                    <li><a href="#">Company</a></li>
                                    <li><a href="#">Leadership</a></li>
                                    <li><a href="#">Diversity</a></li>
                                    <li><a href="#">Jobs</a></li>
                                    <li><a href="#">Press</a></li>
                                    <li><a href="#">Wavelength</a></li>
                                </ul>
                            </div>
                        </div>
                        <div class="col-lg-3 col-md-6">
                            <div class="f_widget dark_widget about-widget pl_20 wow fadeInUp" data-wow-delay="0.6s">
                                <h3 class="f-title f_600 t_color f_size_18 mb_40">Workflow Solutions</h3>
                                <ul class="list-unstyled f_list">
                                    <li><a href="#">Company</a></li>
                                    <li><a href="#">Leadership</a></li>
                                    <li><a href="#">Diversity</a></li>
                                    <li><a href="#">Jobs</a></li>
                                    <li><a href="#">Press</a></li>
                                    <li><a href="#">Wavelength</a></li>
                                </ul>
                            </div>
                        </div>
                        <div class="col-lg-3 col-md-6">
                            <div class="f_widget dark_widget about-widget pl_20 wow fadeInUp" data-wow-delay="0.7s">
                                <h3 class="f-title f_600 t_color f_size_18 mb_40">Team Solutions</h3>
                                <ul class="list-unstyled f_list">
                                    <li><a href="#">Company</a></li>
                                    <li><a href="#">Leadership</a></li>
                                    <li><a href="#">Diversity</a></li>
                                    <li><a href="#">Jobs</a></li>
                                    <li><a href="#">Press</a></li>
                                    <li><a href="#">Wavelength</a></li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="footer_bottom dark_f_bottom">
                <div class="container">
                    <div class="row align-items-center">
                        <div class="col-lg-6 col-md-5 col-sm-12">
                            <p class="mb-0 f_400">Copyright © 2018 Desing by <a href="#">DroitThemes</a></p>
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
    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="landing-page/js/jquery-3.2.1.min.js"></script>
    <script src="landing-page/js/propper.js"></script>
    <script src="landing-page/js/bootstrap.min.js"></script>
    <script src="landing-page/vendors/wow/wow.min.js"></script>
    <script src="landing-page/vendors/sckroller/jquery.parallax-scroll.js"></script>
    <script src="landing-page/vendors/owl-carousel/owl.carousel.min.js"></script>
    <script src="landing-page/vendors/imagesloaded/imagesloaded.pkgd.min.js"></script>
    <script src="landing-page/vendors/isotope/isotope-min.js"></script>
    <script src="landing-page/vendors/magnify-pop/jquery.magnific-popup.min.js"></script>
    <script src="landing-page/vendors/bootstrap-selector/js/bootstrap-select.min.js"></script>
    <script src="landing-page/vendors/nice-select/jquery.nice-select.min.js"></script>
    <script src="landing-page/vendors/scroll/jquery.mCustomScrollbar.concat.min.js"></script>
    <script src="landing-page/js/plugins.js"></script>
    <script src="landing-page/js/main.js"></script>
</body>

</html>