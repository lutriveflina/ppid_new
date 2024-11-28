@extends('layouts.applanding')

@section('contentlanding')
    <section class="pos_banner_area">
        <div class="pos_slider owl-carousel ">
            <img class="shap_img" src="{{asset('landing-page/img/home-software/line_02.png')}}" alt="">
            <div class="pos_banner_item" style="background: url(img/pos/pos_slideshow1.jpg);"></div>
            {{-- <div class="pos_banner_item" style="background: url(img/pos/pos_slideshow2.jpg);"></div> --}}
            {{-- <div class="pos_banner_item" style="background: url(img/pos/pos_slideshow3.jpg);"></div> --}}
        </div>
        <div class="container">
            <br><br><br>
            <h2 class="text-white text-center"><b>Galeri PPID Kota Bukittinggi</b></h2>
            <div class="row wow fadeInLeft" data-wow-delay="0.6s">
                <div class="col-12">
                    <div class="card">
                        <div class="card-content">
                            <div class="card-body card-dashboard">
                                <div class="row">
                                    <div class="col-md-12 col-12 text-center">
                                        @foreach($galeri as $item)
                                            <a data-fancybox data-src="{{ Storage::url($item->gambar) }}" href="javascript:;">
                                                <img src="{{ Storage::url($item->gambar) }}" class="img-fluid img-thumbnail" alt="{{ Storage::url($item->judul) }}" style="width: 200px; height: 200px;">
                                            </a>
                                        @endforeach
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection