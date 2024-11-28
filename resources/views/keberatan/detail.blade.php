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
                <button type="button" class="btn btn-icon btn-outline-primary mr-1 mb-1" onclick="window.history.back();">
                    <i class="feather icon-skip-back"></i>
                </button>
            </div>
        </div>
        <div class="col-12">
            <div class="card">
                <div class="card-header">
                    <h4 class="card-title">Detail Keberatan</h4>
                </div>
                <div class="card-content">
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table table-bordered table-hover">
                                <tr>
                                    <th>NO. REGISTRASI KEBERATAN</th>
                                    <td>:</td>
                                    <td>{{ $data->nomorRegistrasi }}</td>
                                </tr>
                                <tr>
                                    <th>NO. PENDAFTARAN PERMOHONAN INFORMASI</th>
                                    <td>:</td>
                                    <td>{{ $data->noPendaftaran }}</td>
                                </tr>
                                <tr>
                                    <th>TUJUAN PENGGUNAAN INFORMASI</th>
                                    <td>:</td>
                                    <td>{{ $data->tujuanPenggunaanInformasi }}</td>
                                </tr>
                                <tr>
                                    <th>SKPD TUJUAN</th>
                                    <td>:</td>
                                    <td>{{ $data->skpd }}</td>
                                </tr>
                                <tr>
                                    <th>IDENTITAS PEMOHON</th>
                                    <td>:</td>
                                    <td>
                                        NAMA : {{ $data->namaPemohon }} <br>
                                        NIK : {{ $data->nik }} <br>
                                        ALAMAT : {{ $data->alamat }}, {{ $data->kabKot }}, {{ $data->provinsi }} <br>
                                        KONTAK : {{ $data->email }}/{{ $data->noKontak }}
                                    </td>
                                </tr>
                                <tr>
                                    <th>ALASAN PENGAJUAN KEBERATAN</th>
                                    <td>:</td>
                                    <td>{{ $data->alasanPengajuanKeberatan }}</td>
                                </tr>
                                <tr>
                                    <th>KASUS POSISI</th>
                                    <td>:</td>
                                    <td>{{ $data->kasusPosisi }}</td>
                                </tr>
                                <tr>
                                    <th>TGL. DIBUAT</th>
                                    <td>:</td>
                                    <td>{{ $data->created_at }}</td>
                                </tr>
                                <tr>
                                    <th>TGL. DIUBAH</th>
                                    <td>:</td>
                                    <td>{{ $data->updated_at }}</td>
                                </tr>
                                <tr>
                                    <th>TGL. TANGGAPAN ATAS KEBERATAN AKAN DIBERIKAN</th>
                                    <td>:</td>
                                    <td>{{ $data->tanggapan }}</td>
                                </tr>
                            </table>
                        </div>
                        @if (Auth::user()->hasRole('superadmin|adminskpd'))
                        <form action="{{ url('keberatan/tanggapan', $data->id) }}" method="post" class="form">
                            @csrf
                            <div class="form-body">
                                <div class="row">
                                    <div class="col-md-6 col-12">
                                        <div class="form-label-group">
                                            <input type="text" name="tanggapan" id="tanggapan" class="form-control datepicker" required>
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
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection