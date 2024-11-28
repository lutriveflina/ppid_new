@extends('layouts.applanding')

@section('contentlanding')
<style>
    .pdfobject-container { height: 30rem; border: 1rem solid rgba(0,0,0,.1); }
    .scroll {
        max-height: 400px;
        overflow-y: auto;
        overflow-x: auto;
    }
</style>
<section class="pos_banner_area">
    <div class="pos_slider owl-carousel ">
        <img class="shap_img" src="{{asset('landing-page/img/home-software/line_02.png')}}" alt="">
        <div class="pos_banner_item" style="background: url(img/pos/pos_slideshow1.jpg);"></div>
        {{-- <div class="pos_banner_item" style="background: url(img/pos/pos_slideshow2.jpg);"></div> --}}
        {{-- <div class="pos_banner_item" style="background: url(img/pos/pos_slideshow3.jpg);"></div> --}}
    </div>
    <div class="container">
        <h2 class="text-white text-center"><b>SOP</b></h2>
        <h6 class="text-warning text-center">Standar Operasional Prosedur PPID Kota Bukittinggi</h6>
        <div class="row wow fadeInLeft" data-wow-delay="0.6s">
            <div class="col-12">
                <div class="card">
                    <div class="card-content">
                        <div class="card-body card-dashboard">
                            <div class="scroll">
                                <div id="sop"></div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection

@push('scripts')
<script>
    @if($data)
    PDFObject.embed("{{ Storage::url($data->file) }}", "#sop");
    @endif
</script>
@endpush
