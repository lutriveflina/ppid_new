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
        <h2 class="text-white text-center"><b>KEBERATAN</b></h2>
        <h6 class="text-warning text-center">Prosedur Keberatan</h6>
        <div class="row wow fadeInLeft" data-wow-delay="0.6s">
            <div class="col-12">
                <div class="card">
                    <div class="card-content">
                        <div class="card-body card-dashboard">
                            <div class="col-sm-12">
                                @if($data)
                                    <img src="{{ Storage::url($data->file) }}" class="img img-fluid img-thumbnail" style="width: 100%; height: 700px;" alt="">
                                @endif
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection