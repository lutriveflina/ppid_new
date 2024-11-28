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
                <a href="{{ route('keberatan.index') }}" class="btn btn-primary mr-1 mb-1">
                    <i class="feather icon-skip-back">Kembali</i>
                </a>
            </div>
        </div>
        <div class="col-12">
            <div class="card">
                <div class="card-header">
                    <h4 class="card-title">Buat Keberatan Baru</h4>
                </div>
                <div class="card-content">
                    <div class="card-body">
                        <form action="{{ route('keberatan.store') }}" method="POST" enctype="multipart/form-data" class="form">
                            @csrf
                            <div class="form-body">
                                <div class="row">
                                    <div class="col-md-6 col-12">
                                        <div class="form-label-group">
                                            <select name="idPermohonanInformasi" id="idPermohonanInformasi" class="select2 form-control" required>
                                                <option value="">NOMOR PENDAFTARAN PERMOHONAN INFORMASI</option>
                                                @foreach($permohonan as $row)
                                                    <option value="{{ $row->id }}">{{ $row->noPendaftaran }}</option>
                                                @endforeach
                                            </select>
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
                                            <select name="alasanPengajuanKeberatan" id="alasanPengajuanKeberatan" class="select2 form-control" required>
                                                <option value="">ALASAN PENGAJUAN KEBERATAN</option>
                                                <option value="Permohonan Informasi Ditolak">Permohonan Informasi Ditolak</option>
                                                <option value="Informasi Berkala Tidak Disediakan">Informasi Berkala Tidak Disediakan</option>
                                                <option value="Permintaan Informasi Tidak Ditanggapi">Permintaan Informasi Tidak Ditanggapi</option>
                                                <option value="Permintaan Informasi Ditanggapi Tidak Sebagaimana Yang Diminta">Permintaan Informasi Ditanggapi Tidak Sebagaimana Yang Diminta</option>
                                                <option value="Permintaan Informasi Tidak Dipenuhi">Permintaan Informasi Tidak Dipenuhi</option>
                                                <option value="Biaya Yang Dikenakan Tidak Wajar">Biaya Yang Dikenakan Tidak Wajar</option>
                                                <option value="Informasi Disampaikan Melebihi Jangka Waktu Yang Ditentukan">Informasi Disampaikan Melebihi Jangka Waktu Yang Ditentukan</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-md-6 col-12">
                                        <div class="form-label-group">
                                            <textarea name="kasusPosisi" id="kasusPosisi" cols="12" rows="10" class="form-control" placeholder="Kasus Posisi" required></textarea>
                                        </div>
                                    </div>
                                </div>
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