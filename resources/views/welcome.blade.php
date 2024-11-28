@extends('layouts.applanding')
@section('contentlanding')
    {{-- <section class="saas_banner_area_two">
        <div class="section_intro">
            <div class="section_container">
                <div class="intro">
                    <div class=" intro_content">
                        <h1 class="f_700 f_size_50 w_color f_p">Selamat Datang di Layanan PPID</h1>
                        <p class="w_color f_size_18">Kami akan melayani segala Informasi Publik yang anda butuhkan tentang Pemerintah Kota Bukittinggi</p>
                    </div>
                </div>
            </div>
        </div>
        <img class="shap_img" src="{{asset('landing-page/img/home-10/shape.png')}}" alt="">
        <div class="animation_img wow fadeInUp" data-wow-delay="0.3s">
            <div id="carouselExampleCaptions" class="carousel slide" data-ride="carousel">
                <ol class="carousel-indicators">
                    @foreach($banner as $key => $value)
                        <li data-target="#carouselExampleCaptions" data-slide-to="{{ $key }}" class="{{ ($key == 0) ? 'active' : '' }}"></li>
                    @endforeach
                </ol>
                <div class="carousel-inner">
                    @foreach($banner as $item)
                        <div class="carousel-item {{ ($key == 0) ? 'active' : '' }}">
                            <img src="{{ asset($item->gambar) }}" class="img-fluid img-thumbnail" alt="{{ $value->judul }}" style="width: 830px; height: 517px;">
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
                        <h2 class="f_700 f_size_40 l_height50 w_color mb_20 wow fadeInRight" data-wow-delay="0.3s">Selamat Datang di Portal Resmi<br><span>PPID</span> Kota Bukittinggi</h2>
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
                                    <li data-target="#carouselExampleCaptions" data-slide-to="{{ $key }}" class="{{ ($key == 0) ? 'active' : '' }}"></li>
                                @endforeach
                            </ol>
                            <div class="carousel-inner">
                                @foreach($banner as $key => $value)
                                    <div class="carousel-item {{ ($key == 0) ? 'active' : '' }}">
                                        <img src="{{ Storage::url($value->gambar) }}" class="d-block w-100" alt="{{ $value->judul }}" style="width: 700px; height: 400px;">
                                        {{-- <img src="{{ Storage::url($value->gambar) }}" class="img-fluid img-thumbnail" alt="{{ $value->judul }}" style="width: 830px; height: 517px;"> --}}
                                        <div class="carousel-caption d-none d-md-block">
                                        <h5>{{ $value->judul }}</h5>
                                        <p>{{ $value->text }}</p>
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
                    <a href="{{route('register')}}" class="btn_hover agency_banner_btn pay_btn pay_btn_two cus_mb-10">Ajukan Permohonan</a>
                </div>
            </div>
        </div>
    </section> --}}
    <section class="support_integration_area">
        <div class="container">
            {{-- <div class="sec_title text-center mb_70 wow fadeInUp" data-wow-delay="0.3s">
                <h2 class="f_p f_size_30 l_height50 f_600 t_color3">Software Integrations</h2>
                <p class="f_400 f_size_16 mb-0">Why I say old chap that is spiffing lavatory chip shop gosh off his nut, smashing boot<br> are you taking the piss posh loo brilliant matie boy.!</p>
            </div> --}}
            <div class="container">
                <form action="{{ route('informasipublik.search') }}" class="support_subscribe" method="post" novalidate="false">
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
                        <a href="{{ route('permohonaninformasisss.create') }}" class="btn_hover agency_banner_btn pay_btn pay_btn_two cus_mb-10">Ajukan Permohonan</a>
                    @else
                        <a href="{{route('register')}}" class="btn_hover agency_banner_btn pay_btn pay_btn_two cus_mb-10">Ajukan Permohonan</a>
                    @endif
                    </div>
                </div>
            </div>
            <div class="row flex-row-reverse">
                <div class="col-lg-12 col-md-10 col-sm-12">
                    <div class="row">
                        <div class="col-lg-4 col-md-4 col-sm-6">
                            <a href="{{ url('transparansi') }}" class="s_integration_item">
                                <img src="{{asset('landing-page/img/home-10/icon2.png')}}" width="50px" height="50px" alt="">
                                <h5>Transparansi</h5>
                            </a>
                        </div>
                        <div class="col-lg-4 col-md-4 col-sm-6">
                            <a href="{{ url('informasipublik/dip') }}" class="s_integration_item">
                                <img src="{{asset('landing-page/img/home-10/icon1.png')}}" width="50px" height="50px" alt="">
                                <h5>Daftar Informasi Publik</h5>
                            </a>
                        </div>
                        <div class="col-lg-4 col-md-4 col-sm-6">
                            <a href="{{ url('statistik-kota') }}" class="s_integration_item">
                                <img src="{{asset('landing-page/img/pos/statistics.png')}}" width="50px" height="50px" alt="">
                                <h5>Statistik Kota</h5>
                            </a>
                        </div>
                        <div class="col-lg-4 col-md-4 col-sm-6">
                            <a href="{{ url('galeri-view') }}" class="s_integration_item">
                                <img src="{{asset('landing-page/img/erp-home/erp_icon4.png')}}" width="50px" height="50px" alt="">
                                <h5>Galeri</h5>
                            </a>
                        </div>
                        <div class="col-lg-4 col-md-4 col-sm-6">
                            <a href="{{ url('forums') }}" class="s_integration_item">
                                <img src="{{asset('landing-page/img/new-home/webhooks.png')}}" width="50px" height="50px" alt="">
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
                {{-- <p class="f_400 f_size_18 mb-0">We bring together everything from balances and bills to your credit score and more.</p> --}}
            </div>
            <div id="fslider_three" class="feedback_slider_two owl-carousel">
                <div class="item">
                    <iframe src="https://www.facebook.com/plugins/page.php?href=https%3A%2F%2Fwww.facebook.com%2Fkominfobukittinggi&tabs=timeline&width=340&height=500&small_header=true&adapt_container_width=true&hide_cover=false&show_facepile=true&appId" width="340" height="500" style="border:none;overflow:hidden" scrolling="no" frameborder="0" allowTransparency="true" allow="encrypted-media"></iframe>
                </div>
            
                <div class="item">
                    <iframe src="https://www.facebook.com/plugins/page.php?href=https%3A%2F%2Fwww.facebook.com%2Fpemkotbukittinggi%2F&tabs=timeline&width=340&height=500&small_header=false&adapt_container_width=true&hide_cover=false&show_facepile=true&appId" width="340" height="500" style="border:none;overflow:hidden" scrolling="no" frameborder="0" allowTransparency="true" allow="encrypted-media"></iframe>
                </div>
                <div class="item">
                    <div class="box-item" style="width: 340px; height: 500px; overflow-y:scroll;">
                        <blockquote class="instagram-media" data-instgrm-captioned data-instgrm-permalink="https://www.instagram.com/p/CxGD0hLSV2q/?utm_source=ig_embed&amp;utm_campaign=loading" data-instgrm-version="14" >
                        </blockquote> 
                        <script async src="//www.instagram.com/embed.js"></script>
                    </div>
                </div>
                <div class="item">
                    <div class="box-item" style="width: 340px; height: 500px; overflow-y:scroll;">
                        <blockquote class="instagram-media" data-instgrm-captioned data-instgrm-permalink="https://www.instagram.com/p/CxGD0hLSV2q/?utm_source=ig_embed&amp;utm_campaign=loading" data-instgrm-version="14"></blockquote>
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
                <div class="logo_item wow fadeInLeft" data-wow-delay="0.2s" style="visibility: visible; animation-delay: 0.2s; animation-name: fadeInLeft;">
                    <a href="https://www.bukittinggikota.go.id/" target="_blank"><img src="{{asset('landing-page/img/logo_website/websitekota.png')}}" height="55px" alt=""></a>
                </div>
                <div class="logo_item wow fadeInLeft" data-wow-delay="0.4s" style="visibility: visible; animation-delay: 0.4s; animation-name: fadeInLeft;">
                    <a href="https://jdih.bukittinggikota.go.id/" target="_blank"><img src="{{asset('landing-page/img/logo_website/jdih.png')}}" height="55px" alt=""></a>
                </div>
                <div class="logo_item wow fadeInLeft" data-wow-delay="0.6s" style="visibility: visible; animation-delay: 0.6s; animation-name: fadeInLeft;">
                    <a href="https://lpse.bukittinggikota.go.id/" target="_blank"><img src="{{asset('landing-page/img/logo_website/lpse.png')}}" height="55px" alt=""></a>
                </div>
                <div class="logo_item wow fadeInLeft" data-wow-delay="0.8s" style="visibility: visible; animation-delay: 0.8s; animation-name: fadeInLeft;">
                    <a href="https://www.lapor.go.id/" target="_blank"><img src="{{asset('landing-page/img/logo_website/Lapor-SP4N.png')}}" height="55px" alt=""></a>
                </div>
                <div class="logo_item wow fadeInLeft" data-wow-delay="1.0s" style="visibility: visible; animation-delay: 1.0s; animation-name: fadeInLeft;">
                    <a href="https://covid19.bukittinggikota.go.id/" target="_blank"><img src="{{asset('landing-page/img/logo_website/corona.png')}}" height="80px" alt=""></a>
                </div>
                <div class="logo_item wow fadeInLeft" data-wow-delay="1.2s" style="visibility: visible; animation-delay: 1.2s; animation-name: fadeInLeft;">
                    <a href="https://covid19.bukittinggikota.go.id/" target="_blank"><img src="{{asset('landing-page/img/logo_website/kliping.png')}}" height="80px" alt=""></a>
                </div>
            </div> --}}
            <div class="row partner_info partner_info_two ">
                <!-- <div class="marquee">
                    <div class="marquee__content"> -->
                        <div class="col-md-2">
                            <div class="d-flex justify-content-center wow fadeInLeft" data-wow-delay="0.2s" style="visibility: visible; animation-delay: 0.2s; animation-name: fadeInLeft;">
                                <a href="https://www.bukittinggikota.go.id/" target="_blank"><img src="{{asset('landing-page/img/websitekota.png')}}" height="50" width="100%" alt=""></a>
                            </div>
                        </div>
                        <div class="col-md-2">
                            <div class="d-flex justify-content-center wow fadeInLeft" data-wow-delay="0.2s" style="visibility: visible; animation-delay: 0.2s; animation-name: fadeInLeft;">
                                <a href="https://splp.bukittinggikota.go.id/" target="_blank"><h1><strong>SPLP</strong></h1></a>
                            </div>
                        </div>
                        <div class="col-md-2">
                            <div class="d-flex justify-content-center wow fadeInLeft" data-wow-delay="0.4s" style="visibility: visible; animation-delay: 0.4s; animation-name: fadeInLeft;">
                                <a href="https://jdih.bukittinggikota.go.id/" target="_blank"><img src="{{asset('landing-page/img/logo_website/jdih.png')}}" height="60" width="60" alt=""></a>
                            </div>
                        </div>
                        <div class="col-md-2">
                            <div class="d-flex justify-content-center wow fadeInLeft" data-wow-delay="0.4s" style="visibility: visible; animation-delay: 1,2s; animation-name: fadeInLeft;">
                                <a href="https://sbh.bukittinggikota.go.id" target="_blank"><img src="{{asset('landing-page/img/logo_website/sbh.png')}}" height="60" width="60" alt=""></a>
                            </div>
                        </div>
                        <div class="col-md-2">
                            <div class="d-flex justify-content-center wow fadeInLeft" data-wow-delay="0.6s" style="visibility: visible; animation-delay: 0.6s; animation-name: fadeInLeft;">
                                <a href="https://lpse.bukittinggikota.go.id/" target="_blank"><img src="{{asset('landing-page/img/logo_website/lpse.png')}}" height="50" width="100%" alt=""></a>
                            </div>
                        </div>
                        <div class="col-md-2">
                            <div class="d-flex justify-content-center wow fadeInLeft" data-wow-delay="0.8s" style="visibility: visible; animation-delay: 0.8s; animation-name: fadeInLeft;">
                                <a href="https://www.lapor.go.id/" target="_blank"><img src="{{asset('landing-page/img/logo_website/Lapor-SP4N.png')}}" height="50" width="100%" alt=""></a>
                            </div>
                        </div>
                        <div class="col-md-2">
                            <div class="d-flex justify-content-center wow fadeInLeft" data-wow-delay="1.0s" style="visibility: visible; animation-delay: 1.0s; animation-name: fadeInLeft;">
                                <a href="https://covid19.bukittinggikota.go.id/" target="_blank"><img src="{{asset('landing-page/img/logo_website/corona.png')}}" height="60" width="100%" alt=""></a>
                            </div>
                        </div>
                        <div class="col-md-2">
                            <div class="d-flex justify-content-center wow fadeInLeft" data-wow-delay="1.2s" style="visibility: visible; animation-delay: 1.2s; animation-name: fadeInLeft;">
                                <a href="http://news.bukittinggikota.go.id/" target="_blank"><img src="{{asset('landing-page/img/logo_website/kliping.png')}}" height="60" width="60" alt=""></a>
                            </div>
                        </div>
                        <div class="col-md-2">
                            <div class="d-flex justify-content-center wow fadeInLeft" data-wow-delay="1.2s" style="visibility: visible; animation-delay: 1.2s; animation-name: fadeInLeft;">
                                <a href="https://bukittinggikota.sikn.go.id/" target="_blank"><img src="{{asset('landing-page/img/logo_website/logo-anri.jpg')}}" height="50" width="100%" alt=""></a>
                            </div>
                        </div>
                        <div class="col-md-2">
                            <div class="d-flex justify-content-center wow fadeInLeft" data-wow-delay="1.2s" style="visibility: visible; animation-delay: 1.2s; animation-name: fadeInLeft;">
                                <a href="https://jikn.go.id/" target="_blank"><img src="{{asset('landing-page/img/logo_website/logo-anri.jpg')}}" height="50" width="100%" alt=""></a>
                            </div>
                        </div>
                        <div class="col-md-2">
                            <div class="d-flex justify-content-center wow fadeInLeft" data-wow-delay="1.2s" style="visibility: visible; animation-delay: 1.2s; animation-name: fadeInLeft;">
                                <a href="https://www.sikeda.bukittinggikota.go.id/" target="_blank"><img src="{{asset('landing-page/img/logo_website/logo-anri.jpg')}}" height="50" width="100%" alt=""></a>
                            </div>
                        </div>
                        <div class="col-md-2">
                            <div class="d-flex justify-content-center wow fadeInLeft" data-wow-delay="1.2s" style="visibility: visible; animation-delay: 1.2s; animation-name: fadeInLeft;">
                                <a href="https://ppid.sumbarprov.go.id/" target="_blank"><img src="{{asset('landing-page/img/logo_website/ppid-sumbar.png')}}" height="50" width="100%" alt=""></a>
                            </div>
                        </div>
                        <div class="col-md-2">
                            <div class="d-flex justify-content-center wow fadeInLeft" data-wow-delay="1.2s" style="visibility: visible; animation-delay: 1.2s; animation-name: fadeInLeft;">
                                <a href="https://komisiinformasi.go.id/" target="_blank"><img src="{{asset('landing-page/img/logo_website/logo_politisize.png')}}" height="50" width="100%" alt=""></a>
                            </div>
                        </div>
                        <div class="col-md-2">
                            <div class="d-flex justify-content-center wow fadeInLeft" data-wow-delay="1.2s" style="visibility: visible; animation-delay: 1.2s; animation-name: fadeInLeft;">
                                <a href="https://ppid.kemendagri.go.id/" target="_blank"><img src="{{asset('landing-page/img/logo_website/kemendagri.png')}}" height="50" width="100%" alt=""></a>
                            </div>
                        </div>
                        <div class="col-md-2">
                            <div class="d-flex justify-content-center wow fadeInLeft" data-wow-delay="1.2s" style="visibility: visible; animation-delay: 1.2s; animation-name: fadeInLeft;">
                                <a href="https://eppid.kominfo.go.id/" target="_blank"><img src="{{asset('landing-page/img/logo_website/logo-kominfo.png')}}" height="50" width="100%" alt=""></a>
                            </div>
                        </div>
                    <!-- </div>
                </div> -->
            </div>
        </div>
    </section>
@endsection
