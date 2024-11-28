@extends('layouts.app')

@section('content')
<section id="multiple-column-form">
    <div class="row match-height">
        <div class="col-12">
            @if ($message = Session::get('success'))
                <div class="alert alert-success alert-block">
                    <button type="button" class="close" data-dismiss="alert">×</button> 
                    <strong>{{ $message }}</strong>
                </div>
            @endif
            @if ($errors->any())
                @foreach ($errors->all() as $error)
                    <div class="alert alert-danger alert-block">
                        <button type="button" class="close" data-dismiss="alert">×</button> 
                        <strong>{{ $error }}</strong>
                    </div>
                @endforeach
            @endif
        </div>
        <div class="col-12">
            <div class="pull-left">
                <a href="{{ route('permohonaninformasisss.index') }}" class="btn btn-primary mr-1 mb-1">
                    <i class="feather icon-skip-back">Kembali</i>
                </a>
            </div>
        </div>
        <div class="col-12">
            <div class="card">
                <div class="card-header">
                    <h4 class="card-title">Buat Permohonan Baru</h4>
                </div>
                <div class="card-content">
                    <div class="card-body">
                        <form action="{{ route('permohonaninformasisss.store') }}" method="POST" enctype="multipart/form-data" class="form">
                            @csrf
                            <div class="form-body">
                                <div class="row">
                                    <div class="col-md-12 col-12">
                                        <div class="form-label-group">
                                            <textarea name="rincianInformasi" id="rincianInformasi" cols="12" rows="10" class="form-control" placeholder="Rincian Informasi" required></textarea>
                                        </div>
                                    </div>
                                    <div class="col-md-12 col-12">
                                        <div class="form-label-group">
                                            <textarea name="tujuanPenggunaanInformasi" id="tujuanPenggunaanInformasi" cols="12" rows="10" class="form-control" placeholder="Tujuan Penggunaan Informasi" required></textarea>
                                        </div>
                                    </div>
                                    <div class="col-md-6 col-12">
                                        <div class="form-label-group">
                                            <select name="idSkpd" id="idSkpd" class="select2 form-control" required>
                                                <option value="">SKPD TUJUAN</option>
                                                @foreach($skpd as $row)
                                                    <option value="{{ $row->id }}">{{ $row->skpd }}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-md-6 col-12">
                                        <div class="form-label-group">
                                            <select name="caraMemperolehInformasi" id="caraMemperolehInformasi" class="select2 form-control" required>
                                                <option value="">CARA MEMPEROLEH INFORMASI</option>
                                                <option value="Melihat">Melihat</option>
                                                <option value="Membaca">Membaca</option>
                                                <option value="Mendengarkan">Mendengarkan</option>
                                                <option value="Mencatat">Mencatat</option>
                                                <option value="Mendapatkan Salinan Hardcopy">Mendapatkan Salinan Hardcopy</option>
                                                <option value="Mendapatkan Salinan Softcopy">Mendapatkan Salinan Softcopy</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-md-6 col-12">
                                        <div class="form-label-group">
                                            <select name="caraMendapatkanSalinanInformasi" id="caraMendapatkanSalinanInformasi" class="select2 form-control" required>
                                                <option value="">CARA MENDAPATKAN SALINAN INFORMASI</option>
                                                <option value="Mengambil Langsung">Mengambil Langsung</option>
                                                <option value="Kurir">Kurir</option>
                                                <option value="Pos">Pos</option>
                                                <option value="Faksimili">Faksimili</option>
                                                <option value="E-mail">E-mail</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-md-6 col-12">
                                        <fieldset class="form-group">
                                            <div class="custom-file">
                                                <input type="file" class="custom-file-input" id="skPendirian" name="skPendirian">
                                                <label class="custom-file-label" for="skPendirian"><i>**</i> SK PENDIRIAN</label>
                                            </div>
                                        </fieldset>
                                    </div>
                                    <div class="col-md-12 col-12">
                                        <i style="color: red">** Khusus bagi selain perorangan (Max 5MB)</i>
                                    </div>
                                </div>
                                <br>
                                <div class="row">
                                    <div class="col-12">
                                        <button type="submit" class="btn btn-primary mr-1 mb-1">Submit</button>
                                        <button type="reset" class="btn btn-outline-warning mr-1 mb-1">Reset</button>
                                    </div>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection

@push('scripts')
    <script>
        $("select[readonly]").find("option:not(:selected)").hide().attr("disabled",true);
    </script>
@endpush