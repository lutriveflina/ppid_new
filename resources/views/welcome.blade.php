@extends('layouts.applanding')
@section('contentlanding')
{{-- <section class="saas_banner_area_two">
    <div class="section_intro">
        <div class="section_container">
            <div class="intro">
                <div class=" intro_content">
                    <h1 class="f_700 f_size_50 w_color f_p">Selamat Datang di Layanan PPID</h1>
                    <p class="w_color f_size_18">Kami akan melayani segala Informasi Publik yang anda butuhkan tentang
                        Pemerintah Kota Bukittinggi</p>
                </div>
            </div>
        </div>
    </div>
    <img class="shap_img" src="{{asset('landing-page/img/home-10/shape.png')}}" alt="">
    <div class="animation_img wow fadeInUp" data-wow-delay="0.3s">
        <div id="carouselExampleCaptions" class="carousel slide" data-ride="carousel">
            <ol class="carousel-indicators">
                @foreach($banner as $key => $value)
                <li data-target="#carouselExampleCaptions" data-slide-to="{{ $key }}"
                    class="{{ ($key == 0) ? 'active' : '' }}"></li>
                @endforeach
            </ol>
            <div class="carousel-inner">
                @foreach($banner as $item)
                <div class="carousel-item {{ ($key == 0) ? 'active' : '' }}">
                    <img src="{{ asset($item->gambar) }}" class="img-fluid img-thumbnail" alt="{{ $value->judul }}"
                        style="width: 830px; height: 517px;">
                    <div class="carousel-caption d-none d-md-block">
                        <h5>{{ $item->judul }}</h5>
                        <p>{{ $item->text }}</p>
                    </div>
                </div>
                @endforeach
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
    <br>
</section> --}}
<section class="new_startup_banner_area">
    <div class="container">
        <div class="row">
            <div class="col-lg-4 d-flex align-items-center">
                <div class="new_startup_content">
                    <h2 class="f_700 f_size_40 l_height50 w_color mb_20 wow fadeInRight" data-wow-delay="0.3s">Selamat
                        Datang di Portal Resmi<br><span>PPID</span> Kota Bukittinggi</h2>
                </div>
            </div>
            <div class="col-lg-8 wow fadeInLeft" data-wow-delay="0.4s">
                <div class="new_startup_img">
                    <div class="line line_one"><img src="{{asset('landing-page/img/new/line_01.png')}}" alt=""></div>
                    <div class="line line_two"><img src="{{asset('landing-page/img/new/line_02.png')}}" alt=""></div>
                    <div class="line line_three"><img src="{{asset('landing-page/img/new/line_03.png')}}" alt=""></div>
                    {{-- <img src="{{asset('landing-page/img/new/startup_banner_img.png')}}" alt=""> --}}
                    <div id="carouselExampleCaptions" class="carousel slide" data-ride="carousel">
                        <ol class="carousel-indicators">
                            @foreach($banner as $key => $value)
                            <li data-target="#carouselExampleCaptions" data-slide-to="{{ $key }}"
                                class="{{ ($key == 0) ? 'active' : '' }}"></li>
                            @endforeach
                        </ol>
                        <div class="carousel-inner">
                            @foreach($banner as $key => $value)
                            <div class="carousel-item {{ ($key == 0) ? 'active' : '' }}">
                                <img src="{{ Storage::url($value->gambar) }}" class="d-block w-100"
                                    alt="{{ $value->judul }}" style="width: 700px; height: 400px;">
                                {{-- <img src="{{ Storage::url($value->gambar) }}" class="img-fluid img-thumbnail"
                                    alt="{{ $value->judul }}" style="width: 830px; height: 517px;"> --}}
                                <div class="carousel-caption d-none d-md-block">
                                    <h5>{{ $value->judul }}</h5>
                                    <p>{{ $value->text }}</p>
                                </div>
                            </div>
                            @endforeach
                        </div>
                        <a class="carousel-control-prev" href="#carouselExampleCaptions" role="button"
                            data-slide="prev">
                            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                            <span class="sr-only">Previous</span>
                        </a>
                        <a class="carousel-control-next" href="#carouselExampleCaptions" role="button"
                            data-slide="next">
                            <span class="carousel-control-next-icon" aria-hidden="true"></span>
                            <span class="sr-only">Next</span>
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
{{-- <section class="support_subscribe_area sec_pad">
    <img class="h_leaf one wow fadeInUp" data-wow-delay="0.4s" src="img/new-home/tree-left.png" alt="">
    <img class="h_leaf two wow fadeInUp" data-wow-delay="0.6s" src="img/new-home/tree-right.png" alt="">
    <div class="container">
        <form action="#" class="support_subscribe mailchimp" method="post" novalidate="true">
            <input type="text" name="EMAIL" class="form-control memail" placeholder="Cari Informasi">
            <button class="btn btn-submit" type="submit"><i class="ti-arrow-right"></i></button>
            <p class="mchimp-errmessage" style="display: none;"></p>
            <p class="mchimp-sucmessage" style="display: none;"></p>
        </form>
        <div class="sec_title text-center mb_50 wow fadeInUp" data-wow-delay="0.3s">
            <h2 class="f_p f_size_30 l_height50 f_600 t_color3">Belum Menemukan informasi yang kamu cari?</h2>
            <p class="f_400 f_size_16">Klik Tombol Dibawah untuk mengajukan permohonan.</p>
            <div class="text-center">
                <a href="{{route('register')}}" class="btn_hover agency_banner_btn pay_btn pay_btn_two cus_mb-10">Ajukan
                    Permohonan</a>
            </div>
        </div>
    </div>
</section> --}}
<section class="support_integration_area">
    <div class="container">
        {{-- <div class="sec_title text-center mb_70 wow fadeInUp" data-wow-delay="0.3s">
            <h2 class="f_p f_size_30 l_height50 f_600 t_color3">Software Integrations</h2>
            <p class="f_400 f_size_16 mb-0">Why I say old chap that is spiffing lavatory chip shop gosh off his nut,
                smashing boot<br> are you taking the piss posh loo brilliant matie boy.!</p>
        </div> --}}
        <div class="container">
            <form action="{{ route('informasipublik.search') }}" class="support_subscribe" method="post"
                novalidate="false">
                @csrf
                <input type="text" name="judul" id="judul" class="form-control memail" placeholder="Cari Informasi">
                <button class="btn btn-submit" type="submit"><i class="ti-arrow-right"></i></button>
                <p class="mchimp-errmessage" style="display: none;"></p>
                <p class="mchimp-sucmessage" style="display: none;"></p>
            </form>
            <div class="sec_title text-center mb_50 wow fadeInUp" data-wow-delay="0.3s">
                <h2 class="f_p f_size_30 l_height50 f_600 t_color3">Belum Menemukan informasi yang kamu cari?</h2>
                <p class="f_400 f_size_16">Klik Tombol Dibawah untuk mengajukan permohonan.</p>
                <div class="text-center">
                    @if(Auth::check())
                    <a href="{{ route('permohonaninformasisss.create') }}"
                        class="btn_hover agency_banner_btn pay_btn pay_btn_two cus_mb-10">Ajukan Permohonan</a>
                    @else
                    <a href="{{route('register')}}"
                        class="btn_hover agency_banner_btn pay_btn pay_btn_two cus_mb-10">Ajukan Permohonan</a>
                    @endif
                </div>
            </div>
        </div>
        <div class="row flex-row-reverse">
            <div class="col-lg-12 col-md-10 col-sm-12">
                <div class="row">
                    <div class="col-lg-4 col-md-4 col-sm-6">
                        <a href="{{ url('transparansi') }}" class="s_integration_item">
                            <img src="{{asset('landing-page/img/home-10/icon2.png')}}" width="50px" height="50px"
                                alt="">
                            <h5>Transparansi</h5>
                        </a>
                    </div>
                    <div class="col-lg-4 col-md-4 col-sm-6">
                        <a href="{{ url('informasipublik/dip') }}" class="s_integration_item">
                            <img src="{{asset('landing-page/img/home-10/icon1.png')}}" width="50px" height="50px"
                                alt="">
                            <h5>Daftar Informasi Publik</h5>
                        </a>
                    </div>
                    <div class="col-lg-4 col-md-4 col-sm-6">
                        <a href="{{ url('statistik-kota') }}" class="s_integration_item">
                            <img src="{{asset('landing-page/img/pos/statistics.png')}}" width="50px" height="50px"
                                alt="">
                            <h5>Statistik Kota</h5>
                        </a>
                    </div>
                    <div class="col-lg-4 col-md-4 col-sm-6">
                        <a href="{{ url('galeri-view') }}" class="s_integration_item">
                            <img src="{{asset('landing-page/img/erp-home/erp_icon4.png')}}" width="50px" height="50px"
                                alt="">
                            <h5>Galeri</h5>
                        </a>
                    </div>
                    <div class="col-lg-4 col-md-4 col-sm-6">
                        <a href="{{ url('forums') }}" class="s_integration_item">
                            <img src="{{asset('landing-page/img/new-home/webhooks.png')}}" width="50px" height="50px"
                                alt="">
                            <h5>Forum PLID</h5>
                        </a>
                    </div>
                    <div class="col-lg-4 col-md-4 col-sm-6">
                        <a href="{{ url('survei-kepuasan') }}" class="s_integration_item">
                            <img src="{{asset('landing-page/img/seo/icon5.png')}}" width="50px" height="50px" alt="">
                            <h5>Survei Kepuasan</h5>
                        </a>
                    </div>
                    <div class="col-lg-4 col-md-4 col-sm-6">
                        <a href="{{ url('statistik-ppid') }}" class="s_integration_item">
                            <img src="{{asset('landing-page/img/statistik.jpg')}}" width="50px" height="50px" alt="">
                            <h5>Statistik PPID</h5>
                        </a>
                    </div>
                    <!-- <div class="col-lg-4 col-md-4 col-sm-6">
                            <a href="{{ url('feedback-ppid') }}" class="s_integration_item">
                                <img src="{{asset('landing-page/img/feedback.png')}}" width="50px" height="50px" alt="">
                                <h5>Kritik Dan Saran</h5>
                            </a>
                        </div> -->
                </div>
            </div>
            <div class="col-lg-3 col-md-2 col-sm-12">
                <img class="integration_img" src="img/new-home/tree.png" alt="">
            </div>
        </div>
    </div>
</section>

<section class="feedback_area_two sec_pad" style="position-relative; overflow:hidden;">
    <div class="container custom_container">
        <div class="sec_title mb_70 wow fadeInUp" data-wow-delay="0.4s">
            <h2 class="f_p f_size_40 l_height50 f_500 w_color">Bukittinggi Hari Ini</h2>
            {{-- <p class="f_400 f_size_18 mb-0">We bring together everything from balances and bills to your credit
                score and more.</p> --}}
        </div>
        <div id="fslider_three" class="feedback_slider_two owl-carousel">
            <div class="item">
                <iframe
                    src="https://www.facebook.com/plugins/page.php?href=https%3A%2F%2Fwww.facebook.com%2Fkominfobukittinggi&tabs=timeline&width=340&height=500&small_header=true&adapt_container_width=true&hide_cover=false&show_facepile=true&appId"
                    width="340" height="500" style="border:none;overflow:hidden" scrolling="no" frameborder="0"
                    allowTransparency="true" allow="encrypted-media"></iframe>
            </div>

            <div class="item">
                <iframe
                    src="https://www.facebook.com/plugins/page.php?href=https%3A%2F%2Fwww.facebook.com%2Fpemkotbukittinggi%2F&tabs=timeline&width=340&height=500&small_header=false&adapt_container_width=true&hide_cover=false&show_facepile=true&appId"
                    width="340" height="500" style="border:none;overflow:hidden" scrolling="no" frameborder="0"
                    allowTransparency="true" allow="encrypted-media"></iframe>
            </div>
            <div class="item">
                <div class="box-item" style="width: 340px; height: 500px; overflow-y:scroll;">
                    <blockquote class="instagram-media" data-instgrm-captioned
                        data-instgrm-permalink="https://www.instagram.com/p/CxGD0hLSV2q/?utm_source=ig_embed&amp;utm_campaign=loading"
                        data-instgrm-version="14">
                    </blockquote>
                    <script async src="//www.instagram.com/embed.js"></script>
                </div>
            </div>
            <div class="item">
                <div class="box-item" style="width: 340px; height: 500px; overflow-y:scroll;">
                    <blockquote class="instagram-media" data-instgrm-captioned
                        data-instgrm-permalink="https://www.instagram.com/p/CxGD0hLSV2q/?utm_source=ig_embed&amp;utm_campaign=loading"
                        data-instgrm-version="14"></blockquote>
                    <script async src="//www.instagram.com/embed.js"></script>
                </div>
            </div>

            <div class="item">
                <script src="https://apps.elfsight.com/p/platform.js" defer></script>
                <div class="elfsight-app-58b2a352-ca5b-40c8-8aed-d05a09f14537"></div>
            </div>
        </div>
    </div>
</section>

<section class="partner_logo_area_three  bg_color">
    <div class="container">
        {{-- <div class="row partner_info partner_info_two ">
            <div class="logo_item wow fadeInLeft" data-wow-delay="0.2s"
                style="visibility: visible; animation-delay: 0.2s; animation-name: fadeInLeft;">
                <a href="https://www.bukittinggikota.go.id/" target="_blank"><img
                        src="{{asset('landing-page/img/logo_website/websitekota.png')}}" height="55px" alt=""></a>
            </div>
            <div class="logo_item wow fadeInLeft" data-wow-delay="0.4s"
                style="visibility: visible; animation-delay: 0.4s; animation-name: fadeInLeft;">
                <a href="https://jdih.bukittinggikota.go.id/" target="_blank"><img
                        src="{{asset('landing-page/img/logo_website/jdih.png')}}" height="55px" alt=""></a>
            </div>
            <div class="logo_item wow fadeInLeft" data-wow-delay="0.6s"
                style="visibility: visible; animation-delay: 0.6s; animation-name: fadeInLeft;">
                <a href="https://lpse.bukittinggikota.go.id/" target="_blank"><img
                        src="{{asset('landing-page/img/logo_website/lpse.png')}}" height="55px" alt=""></a>
            </div>
            <div class="logo_item wow fadeInLeft" data-wow-delay="0.8s"
                style="visibility: visible; animation-delay: 0.8s; animation-name: fadeInLeft;">
                <a href="https://www.lapor.go.id/" target="_blank"><img
                        src="{{asset('landing-page/img/logo_website/Lapor-SP4N.png')}}" height="55px" alt=""></a>
            </div>
            <div class="logo_item wow fadeInLeft" data-wow-delay="1.0s"
                style="visibility: visible; animation-delay: 1.0s; animation-name: fadeInLeft;">
                <a href="https://covid19.bukittinggikota.go.id/" target="_blank"><img
                        src="{{asset('landing-page/img/logo_website/corona.png')}}" height="80px" alt=""></a>
            </div>
            <div class="logo_item wow fadeInLeft" data-wow-delay="1.2s"
                style="visibility: visible; animation-delay: 1.2s; animation-name: fadeInLeft;">
                <a href="https://covid19.bukittinggikota.go.id/" target="_blank"><img
                        src="{{asset('landing-page/img/logo_website/kliping.png')}}" height="80px" alt=""></a>
            </div>
        </div> --}}
        <div class="row partner_info partner_info_two ">
            <!-- <div class="marquee">
                    <div class="marquee__content"> -->
            <div class="col-md-2">
                <div class="d-flex justify-content-center wow fadeInLeft" data-wow-delay="0.2s"
                    style="visibility: visible; animation-delay: 0.2s; animation-name: fadeInLeft;">
                    <a href="https://www.bukittinggikota.go.id/" target="_blank"><img
                            src="{{asset('landing-page/img/websitekota.png')}}" height="50" width="100%" alt=""></a>
                </div>
            </div>
            <div class="col-md-2">
                <div class="d-flex justify-content-center wow fadeInLeft" data-wow-delay="0.2s"
                    style="visibility: visible; animation-delay: 0.2s; animation-name: fadeInLeft;">
                    <a href="https://splp.bukittinggikota.go.id/" target="_blank">
                        <h1><strong>SPLP</strong></h1>
                    </a>
                </div>
            </div>
            <div class="col-md-2">
                <div class="d-flex justify-content-center wow fadeInLeft" data-wow-delay="0.4s"
                    style="visibility: visible; animation-delay: 0.4s; animation-name: fadeInLeft;">
                    <a href="https://jdih.bukittinggikota.go.id/" target="_blank"><img
                            src="{{asset('landing-page/img/logo_website/jdih.png')}}" height="60" width="60" alt=""></a>
                </div>
            </div>
            <div class="col-md-2">
                <div class="d-flex justify-content-center wow fadeInLeft" data-wow-delay="0.4s"
                    style="visibility: visible; animation-delay: 1,2s; animation-name: fadeInLeft;">
                    <a href="https://sbh.bukittinggikota.go.id" target="_blank"><img
                            src="{{asset('landing-page/img/logo_website/sbh.png')}}" height="60" width="60" alt=""></a>
                </div>
            </div>
            <div class="col-md-2">
                <div class="d-flex justify-content-center wow fadeInLeft" data-wow-delay="0.6s"
                    style="visibility: visible; animation-delay: 0.6s; animation-name: fadeInLeft;">
                    <a href="https://lpse.bukittinggikota.go.id/" target="_blank"><img
                            src="{{asset('landing-page/img/logo_website/lpse.png')}}" height="50" width="100%"
                            alt=""></a>
                </div>
            </div>
            <div class="col-md-2">
                <div class="d-flex justify-content-center wow fadeInLeft" data-wow-delay="0.8s"
                    style="visibility: visible; animation-delay: 0.8s; animation-name: fadeInLeft;">
                    <a href="https://www.lapor.go.id/" target="_blank"><img
                            src="{{asset('landing-page/img/logo_website/Lapor-SP4N.png')}}" height="50" width="100%"
                            alt=""></a>
                </div>
            </div>
            <div class="col-md-2">
                <div class="d-flex justify-content-center wow fadeInLeft" data-wow-delay="1.0s"
                    style="visibility: visible; animation-delay: 1.0s; animation-name: fadeInLeft;">
                    <a href="https://covid19.bukittinggikota.go.id/" target="_blank"><img
                            src="{{asset('landing-page/img/logo_website/corona.png')}}" height="60" width="100%"
                            alt=""></a>
                </div>
            </div>
            <div class="col-md-2">
                <div class="d-flex justify-content-center wow fadeInLeft" data-wow-delay="1.2s"
                    style="visibility: visible; animation-delay: 1.2s; animation-name: fadeInLeft;">
                    <a href="http://news.bukittinggikota.go.id/" target="_blank"><img
                            src="{{asset('landing-page/img/logo_website/kliping.png')}}" height="60" width="60"
                            alt=""></a>
                </div>
            </div>
            <div class="col-md-2">
                <div class="d-flex justify-content-center wow fadeInLeft" data-wow-delay="1.2s"
                    style="visibility: visible; animation-delay: 1.2s; animation-name: fadeInLeft;">
                    <a href="https://bukittinggikota.sikn.go.id/" target="_blank"><img
                            src="{{asset('landing-page/img/logo_website/logo-anri.jpg')}}" height="50" width="100%"
                            alt=""></a>
                </div>
            </div>
            <div class="col-md-2">
                <div class="d-flex justify-content-center wow fadeInLeft" data-wow-delay="1.2s"
                    style="visibility: visible; animation-delay: 1.2s; animation-name: fadeInLeft;">
                    <a href="https://jikn.go.id/" target="_blank"><img
                            src="{{asset('landing-page/img/logo_website/logo-anri.jpg')}}" height="50" width="100%"
                            alt=""></a>
                </div>
            </div>
            <div class="col-md-2">
                <div class="d-flex justify-content-center wow fadeInLeft" data-wow-delay="1.2s"
                    style="visibility: visible; animation-delay: 1.2s; animation-name: fadeInLeft;">
                    <a href="https://www.sikeda.bukittinggikota.go.id/" target="_blank"><img
                            src="{{asset('landing-page/img/logo_website/logo-anri.jpg')}}" height="50" width="100%"
                            alt=""></a>
                </div>
            </div>
            <div class="col-md-2">
                <div class="d-flex justify-content-center wow fadeInLeft" data-wow-delay="1.2s"
                    style="visibility: visible; animation-delay: 1.2s; animation-name: fadeInLeft;">
                    <a href="https://ppid.sumbarprov.go.id/" target="_blank"><img
                            src="{{asset('landing-page/img/logo_website/ppid-sumbar.png')}}" height="50" width="100%"
                            alt=""></a>
                </div>
            </div>
            <div class="col-md-2">
                <div class="d-flex justify-content-center wow fadeInLeft" data-wow-delay="1.2s"
                    style="visibility: visible; animation-delay: 1.2s; animation-name: fadeInLeft;">
                    <a href="https://komisiinformasi.go.id/" target="_blank"><img
                            src="{{asset('landing-page/img/logo_website/logo_politisize.png')}}" height="50"
                            width="100%" alt=""></a>
                </div>
            </div>
            <div class="col-md-2">
                <div class="d-flex justify-content-center wow fadeInLeft" data-wow-delay="1.2s"
                    style="visibility: visible; animation-delay: 1.2s; animation-name: fadeInLeft;">
                    <a href="https://ppid.kemendagri.go.id/" target="_blank"><img
                            src="{{asset('landing-page/img/logo_website/kemendagri.png')}}" height="50" width="100%"
                            alt=""></a>
                </div>
            </div>
            <div class="col-md-2">
                <div class="d-flex justify-content-center wow fadeInLeft" data-wow-delay="1.2s"
                    style="visibility: visible; animation-delay: 1.2s; animation-name: fadeInLeft;">
                    <a href="https://eppid.kominfo.go.id/" target="_blank"><img
                            src="{{asset('landing-page/img/logo_website/logo-kominfo.png')}}" height="50" width="100%"
                            alt=""></a>
                </div>
            </div>
            <!-- </div>
                </div> -->
        </div>
    </div>
</section>

<!-- Floating Action Button for Accessibility -->
<div class="accessibility-fab">
    <button class="fab-main" id="accessibilityBtn" title="Fitur Aksesibilitas">
        <i class="fas fa-universal-access"></i>
    </button>
    <div class="fab-menu" id="accessibilityMenu">
        <div class="fab-menu-header">
            <h5>Fitur Aksesibilitas</h5>
            <button class="close-menu" id="closeMenu">&times;</button>
        </div>
        <div class="fab-menu-content">
            <button class="fab-option" data-action="voice-mode">
                <i class="fas fa-volume-up"></i> Mode Suara
            </button>
            <button class="fab-option" data-action="increase-text">
                <i class="fas fa-search-plus"></i> Perbesar Teks
            </button>
            <button class="fab-option" data-action="decrease-text">
                <i class="fas fa-search-minus"></i> Perkecil Teks
            </button>
            <button class="fab-option" data-action="grayscale">
                <i class="fas fa-adjust"></i> Skala Abu-abu
            </button>
            <button class="fab-option" data-action="high-contrast">
                <i class="fas fa-eye"></i> Kontras Tinggi
            </button>
            <button class="fab-option" data-action="dark-background">
                <i class="fas fa-moon"></i> Latar Gelap
            </button>
            <button class="fab-option" data-action="light-background">
                <i class="fas fa-sun"></i> Latar Terang
            </button>
            <button class="fab-option" data-action="readable-font">
                <i class="fas fa-font"></i> Tulisan Dapat Dibaca
            </button>
            <button class="fab-option" data-action="underline-links">
                <i class="fas fa-underline"></i> Garis Bawahi Tautan
            </button>
            <button class="fab-option" data-action="text-align">
                <i class="fas fa-align-left"></i> Rata Tulisan
            </button>
            <button class="fab-option" data-action="reset-all">
                <i class="fas fa-undo"></i> Atur Ulang
            </button>
        </div>
    </div>
</div>

<style>
    .accessibility-fab {
        position: fixed;
        top: 50%;
        right: 30px;
        transform: translateY(-50%);
        z-index: 1000;
    }

    .fab-main {
        width: 60px;
        height: 60px;
        border-radius: 50%;
        background: #007bff;
        color: white;
        border: none;
        box-shadow: 0 4px 20px rgba(0, 123, 255, 0.4);
        cursor: pointer;
        font-size: 24px;
        transition: all 0.3s ease;
        display: flex;
        align-items: center;
        justify-content: center;
    }

    .fab-main:hover {
        background: #0056b3;
        transform: scale(1.1);
        box-shadow: 0 6px 25px rgba(0, 123, 255, 0.6);
    }

    .fab-menu {
        position: absolute;
        top: 50%;
        right: 70px;
        transform: translateY(-50%);
        width: 300px;
        max-height: 500px;
        background: white;
        border-radius: 15px;
        box-shadow: 0 10px 30px rgba(0, 0, 0, 0.2);
        display: none;
        overflow: hidden;
        border: 1px solid #e0e0e0;
    }

    .fab-menu.show {
        display: block;
        animation: slideUp 0.3s ease;
    }

    @keyframes slideUp {
        from {
            opacity: 0;
            transform: translateY(20px);
        }

        to {
            opacity: 1;
            transform: translateY(0);
        }
    }

    .fab-menu-header {
        background: #007bff;
        color: white;
        padding: 15px 20px;
        display: flex;
        justify-content: space-between;
        align-items: center;
    }

    .fab-menu-header h5 {
        margin: 0;
        font-size: 16px;
        font-weight: 600;
    }

    .close-menu {
        background: none;
        border: none;
        color: white;
        font-size: 24px;
        cursor: pointer;
        line-height: 1;
        padding: 0;
    }

    .fab-menu-content {
        max-height: 400px;
        overflow-y: auto;
        padding: 10px 0;
    }

    .fab-option {
        width: 100%;
        padding: 12px 20px;
        border: none;
        background: none;
        text-align: left;
        cursor: pointer;
        transition: background-color 0.2s ease;
        display: flex;
        align-items: center;
        gap: 12px;
        font-size: 14px;
        color: #333;
    }

    .fab-option:hover {
        background-color: #f8f9fa;
    }

    .fab-option.active {
        background-color: #e3f2fd;
        color: #007bff;
    }

    .fab-option i {
        width: 20px;
        text-align: center;
    }

    /* Accessibility Features Styles */
    .high-contrast {
        filter: contrast(200%);
    }

    .grayscale {
        filter: grayscale(100%);
    }

    .dark-background {
        background-color: #121212 !important;
        color: #ffffff !important;
    }

    .dark-background * {
        background-color: inherit !important;
        color: inherit !important;
    }

    .light-background {
        background-color: #ffffff !important;
        color: #000000 !important;
    }

    .readable-font {
        font-family: 'Arial', 'Helvetica', sans-serif !important;
    }

    .underline-links a {
        text-decoration: underline !important;
    }

    .text-align-left {
        text-align: left !important;
    }

    .text-align-center {
        text-align: center !important;
    }

    .text-align-right {
        text-align: right !important;
    }

    .text-size-small {
        font-size: 0.8em !important;
    }

    .text-size-large {
        font-size: 1.2em !important;
    }

    .text-size-extra-large {
        font-size: 1.5em !important;
    }

    /* Responsive */
    @media (max-width: 768px) {
        .accessibility-fab {
            top: 50%;
            right: 20px;
            transform: translateY(-50%);
        }

        .fab-main {
            width: 50px;
            height: 50px;
            font-size: 20px;
        }

        .fab-menu {
            width: 280px;
            right: 60px;
            top: 50%;
            transform: translateY(-50%);
        }
    }
</style>

<script>
    document.addEventListener('DOMContentLoaded', function () {
        const accessibilityBtn = document.getElementById('accessibilityBtn');
        const accessibilityMenu = document.getElementById('accessibilityMenu');
        const closeMenu = document.getElementById('closeMenu');
        const fabOptions = document.querySelectorAll('.fab-option');

        let currentFontSize = 1;
        let isVoiceMode = false;
        let currentTextAlign = 'left';

        // Toggle menu
        accessibilityBtn.addEventListener('click', function () {
            accessibilityMenu.classList.toggle('show');
        });

        // Close menu
        closeMenu.addEventListener('click', function () {
            accessibilityMenu.classList.remove('show');
        });

        // Close menu when clicking outside
        document.addEventListener('click', function (e) {
            if (!accessibilityBtn.contains(e.target) && !accessibilityMenu.contains(e.target)) {
                accessibilityMenu.classList.remove('show');
            }
        });

        // Handle accessibility options
        fabOptions.forEach(option => {
            option.addEventListener('click', function () {
                const action = this.getAttribute('data-action');
                handleAccessibilityAction(action, this);
            });
        });

        function handleAccessibilityAction(action, element) {
            const body = document.body;

            switch (action) {
                case 'voice-mode':
                    toggleVoiceMode(element);
                    break;
                case 'increase-text':
                    adjustFontSize(0.1);
                    break;
                case 'decrease-text':
                    adjustFontSize(-0.1);
                    break;
                case 'grayscale':
                    toggleClass(body, 'grayscale', element);
                    break;
                case 'high-contrast':
                    toggleClass(body, 'high-contrast', element);
                    break;
                case 'dark-background':
                    body.classList.remove('light-background');
                    toggleClass(body, 'dark-background', element);
                    updateButtonState('light-background', false);
                    break;
                case 'light-background':
                    body.classList.remove('dark-background');
                    toggleClass(body, 'light-background', element);
                    updateButtonState('dark-background', false);
                    break;
                case 'readable-font':
                    toggleClass(body, 'readable-font', element);
                    break;
                case 'underline-links':
                    toggleClass(body, 'underline-links', element);
                    break;
                case 'text-align':
                    toggleTextAlign(element);
                    break;
                case 'reset-all':
                    resetAll();
                    break;
            }
        }

        function toggleClass(element, className, button) {
            element.classList.toggle(className);
            button.classList.toggle('active');
        }

        function toggleVoiceMode(button) {
            isVoiceMode = !isVoiceMode;
            button.classList.toggle('active');

            if (isVoiceMode) {
                // Enable voice mode - you can integrate with Web Speech API here
                console.log('Voice mode enabled');
                if ('speechSynthesis' in window) {
                    // Read the welcome message first
                    const welcomeMessage = 'Selamat Datang di Portal Resmi PPID Kota Bukittinggi. Kami akan melayani segala Informasi Publik yang anda butuhkan tentang Pemerintah Kota Bukittinggi.';
                    const utterance = new SpeechSynthesisUtterance(welcomeMessage);
                    utterance.rate = 0.8;
                    utterance.pitch = 1;
                    utterance.volume = 1;

                    // Set voice to Indonesian if available
                    const voices = speechSynthesis.getVoices();
                    const indonesianVoice = voices.find(voice =>
                        voice.lang.includes('id') || voice.lang.includes('ID') ||
                        voice.name.toLowerCase().includes('indonesia')
                    );
                    if (indonesianVoice) {
                        utterance.voice = indonesianVoice;
                    }

                    speechSynthesis.speak(utterance);

                    // Add event listener to read page content when hovering
                    enableVoiceNavigation();
                } else {
                    alert('Browser Anda tidak mendukung fitur Text-to-Speech');
                }
            } else {
                console.log('Voice mode disabled');
                if ('speechSynthesis' in window) {
                    speechSynthesis.cancel();
                    const farewell = 'Mode suara dinonaktifkan';
                    const utterance = new SpeechSynthesisUtterance(farewell);
                    utterance.rate = 0.8;
                    speechSynthesis.speak(utterance);
                }
                disableVoiceNavigation();
            }
        }

        function adjustFontSize(increment) {
            currentFontSize += increment;
            currentFontSize = Math.max(0.5, Math.min(2, currentFontSize));
            document.documentElement.style.fontSize = currentFontSize + 'em';
        }

        function toggleTextAlign(button) {
            const alignments = ['left', 'center', 'right'];
            const currentIndex = alignments.indexOf(currentTextAlign);
            const nextIndex = (currentIndex + 1) % alignments.length;
            currentTextAlign = alignments[nextIndex];

            // Remove all text alignment classes
            alignments.forEach(align => {
                document.body.classList.remove(`text-align-${align}`);
            });

            // Add new alignment class
            document.body.classList.add(`text-align-${currentTextAlign}`);

            // Update button text
            const icon = button.querySelector('i');
            icon.className = `fas fa-align-${currentTextAlign}`;

            button.classList.add('active');
            setTimeout(() => button.classList.remove('active'), 1000);
        }

        function updateButtonState(action, isActive) {
            const button = document.querySelector(`[data-action="${action}"]`);
            if (button) {
                if (isActive) {
                    button.classList.add('active');
                } else {
                    button.classList.remove('active');
                }
            }
        }

        function resetAll() {
            // Reset all classes
            const body = document.body;
            body.className = body.className.replace(/grayscale|high-contrast|dark-background|light-background|readable-font|underline-links|text-align-\w+/g, '');

            // Reset font size
            currentFontSize = 1;
            document.documentElement.style.fontSize = '';

            // Reset voice mode
            isVoiceMode = false;
            if ('speechSynthesis' in window) {
                speechSynthesis.cancel();
            }

            // Reset text alignment
            currentTextAlign = 'left';

            // Remove active states from all buttons
            fabOptions.forEach(option => {
                option.classList.remove('active');
            });

            // Close menu
            accessibilityMenu.classList.remove('show');

            console.log('All accessibility features reset');
        }

        // Add voice narration for links and buttons when voice mode is active
        function enableVoiceNavigation() {
            document.addEventListener('mouseenter', voiceMouseEnterHandler, true);
            document.addEventListener('click', voiceClickHandler, true);

            // Add keyboard navigation for voice mode
            document.addEventListener('keydown', voiceKeydownHandler);
        }

        function disableVoiceNavigation() {
            document.removeEventListener('mouseenter', voiceMouseEnterHandler, true);
            document.removeEventListener('click', voiceClickHandler, true);
            document.removeEventListener('keydown', voiceKeydownHandler);
        }

        function voiceMouseEnterHandler(e) {
            if (isVoiceMode && 'speechSynthesis' in window) {
                // Stop current speech
                speechSynthesis.cancel();

                let textToSpeak = '';

                if (e.target.tagName === 'A') {
                    textToSpeak = 'Link: ' + (e.target.textContent.trim() || e.target.getAttribute('title') || e.target.getAttribute('alt') || 'tautan');
                } else if (e.target.tagName === 'BUTTON') {
                    textToSpeak = 'Tombol: ' + (e.target.textContent.trim() || e.target.getAttribute('title') || e.target.getAttribute('alt') || 'tombol');
                } else if (e.target.tagName === 'H1' || e.target.tagName === 'H2' || e.target.tagName === 'H3' || e.target.tagName === 'H4' || e.target.tagName === 'H5') {
                    textToSpeak = 'Judul: ' + e.target.textContent.trim();
                } else if (e.target.tagName === 'P') {
                    textToSpeak = e.target.textContent.trim();
                } else if (e.target.tagName === 'IMG') {
                    textToSpeak = 'Gambar: ' + (e.target.getAttribute('alt') || e.target.getAttribute('title') || 'gambar');
                }

                if (textToSpeak && textToSpeak.length > 0) {
                    const utterance = new SpeechSynthesisUtterance(textToSpeak);
                    utterance.rate = 0.9;
                    utterance.pitch = 1;
                    utterance.volume = 0.8;

                    // Set voice to Indonesian if available
                    const voices = speechSynthesis.getVoices();
                    const indonesianVoice = voices.find(voice =>
                        voice.lang.includes('id') || voice.lang.includes('ID') ||
                        voice.name.toLowerCase().includes('indonesia')
                    );
                    if (indonesianVoice) {
                        utterance.voice = indonesianVoice;
                    }

                    speechSynthesis.speak(utterance);
                }
            }
        }

        function voiceClickHandler(e) {
            if (isVoiceMode && 'speechSynthesis' in window) {
                const clickText = 'Diklik: ' + (e.target.textContent.trim() || e.target.getAttribute('title') || 'elemen');
                const utterance = new SpeechSynthesisUtterance(clickText);
                utterance.rate = 1;
                speechSynthesis.speak(utterance);
            }
        }

        function voiceKeydownHandler(e) {
            if (isVoiceMode && 'speechSynthesis' in window) {
                if (e.key === 'Enter' || e.key === ' ') {
                    const focusedElement = document.activeElement;
                    if (focusedElement && focusedElement.textContent) {
                        const keyText = 'Dipilih: ' + focusedElement.textContent.trim();
                        const utterance = new SpeechSynthesisUtterance(keyText);
                        utterance.rate = 1;
                        speechSynthesis.speak(utterance);
                    }
                }
            }
        }

        // Load voices when available
        speechSynthesis.addEventListener('voiceschanged', function () {
            const voices = speechSynthesis.getVoices();
            console.log('Available voices:', voices.map(v => v.name + ' (' + v.lang + ')'));
        });

        // Read welcome message when page loads if voice mode is enabled
        function readWelcomeOnLoad() {
            if (isVoiceMode && 'speechSynthesis' in window) {
                setTimeout(() => {
                    const welcomeText = 'Halaman berhasil dimuat. Selamat Datang di Portal Resmi PPID Kota Bukittinggi';
                    const utterance = new SpeechSynthesisUtterance(welcomeText);
                    utterance.rate = 0.8;
                    speechSynthesis.speak(utterance);
                }, 1000);
            }
        }

        // Add manual read function for specific sections
        function readSection(sectionText, prefix = '') {
            if ('speechSynthesis' in window) {
                speechSynthesis.cancel();
                const fullText = prefix + sectionText;
                const utterance = new SpeechSynthesisUtterance(fullText);
                utterance.rate = 0.8;
                utterance.pitch = 1;

                const voices = speechSynthesis.getVoices();
                const indonesianVoice = voices.find(voice =>
                    voice.lang.includes('id') || voice.lang.includes('ID') ||
                    voice.name.toLowerCase().includes('indonesia')
                );
                if (indonesianVoice) {
                    utterance.voice = indonesianVoice;
                }

                speechSynthesis.speak(utterance);
            }
        }

        // Add click listeners to main sections for voice reading
        document.addEventListener('DOMContentLoaded', function () {
            // Add voice button to main sections
            const mainTitle = document.querySelector('.new_startup_content h2');
            if (mainTitle && isVoiceMode) {
                mainTitle.addEventListener('click', function () {
                    readSection(this.textContent, 'Judul utama: ');
                });
            }
        });

        document.addEventListener('mouseenter', function (e) {
            if (isVoiceMode && 'speechSynthesis' in window) {
                if (e.target.tagName === 'A' || e.target.tagName === 'BUTTON') {
                    const text = e.target.textContent || e.target.getAttribute('title') || e.target.getAttribute('alt');
                    if (text) {
                        const utterance = new SpeechSynthesisUtterance(text);
                        utterance.rate = 0.8;
                        speechSynthesis.speak(utterance);
                    }
                }
            }
        }, true);
    });
</script>
@endsection