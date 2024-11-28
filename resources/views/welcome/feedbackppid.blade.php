@extends('layouts.applanding')

@section('contentlanding')
    <section class="breadcrumb_area">
        {{-- <img class="breadcrumb_shap" src="{{asset('landing-page/img/breadcrumb/banner_bg.png')}}" alt=""> --}}
        <div class="container">
            <div class="sec_title text-center mb_70 wow fadeInUp" data-wow-delay="0.2s" style="visibility: visible; animation-delay: 0.2s; animation-name: fadeInUp;">
                <h2 class="text-white text-center"><b>Kirim Kritik dan Saran</b></h2>
            </div>
            <div class="row wow fadeInLeft" data-wow-delay="0.6s">
                <div class="col-12">
                    <div class="card">
                        <div class="card-content">
                            <div class="card-body mb-5">
                                <form action="" method="POST" enctype="multipart/form-data" class="form">
                                    @csrf
                                    <div class="form-group">
                                        <label for="exampleFormControlInput1">Nama Lengkap</label>
                                        <input type="name" class="form-control" id="nama" name="nama" placeholder="Nama Lengkap">
                                    </div>
                                    <div class="form-group">
                                        <label for="exampleFormControlInput1">Email</label>
                                        <input type="email" class="form-control" id="email" name="email" placeholder="email">
                                    </div>
                                    <div class="form-group">
                                        <label for="exampleFormControlTextarea1">Pesan</label>
                                        <textarea class="form-control" id="pesan" name="pesan" rows="6"></textarea>
                                    </div>
                                    <button type="submit" class="btn btn-primary">Submit</button>
                                </form>
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
       
    </script>
@endpush
