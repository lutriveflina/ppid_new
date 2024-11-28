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
        </div>
        <div class="col-12">
            <div class="pull-left">
                <a href="{{ route('dip.index') }}" class="btn btn-icon btn-outline-primary mr-1 mb-1">
                    <i class="feather icon-skip-back"></i>
                </a>
            </div>
        </div>
        <div class="col-12">
            <div class="card">
                <div class="card-header">
                    <h4 class="card-title">Detail Dokumen {{ $dip->judul }}</h4>
                </div>
                <div class="card-content">
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table zero-configuration" id="dip" width="100%">
                                <tr>
                                    <th>JUDUL</th>
                                    <td>:</td>
                                    <td>
                                        <a href="{{ Storage::url($dip->file) }}" target="_blank">{{ $dip->judul }}</a>
                                    </td>
                                </tr>
                                <tr>
                                    <th>SKPD</th>
                                    <td>:</td>
                                    <td>{{ $dip->skpd }}</td>
                                </tr>
                                <tr>
                                    <th>KANDUNGAN INFORMASI</th>
                                    <td>:</td>
                                    <td>{{ $dip->kandunganInformasi }}</td>
                                </tr>
                                <tr>
                                    <th>KATEGORI</th>
                                    <td>:</td>
                                    <td>{{ $dip->kategori }}</td>
                                </tr>
                                <tr>
                                    <th>JENIS</th>
                                    <td>:</td>
                                    <td>{{ $dip->jenis }}</td>
                                </tr>
                                <tr>
                                    <th>TAHUN</th>
                                    <td>:</td>
                                    <td>{{ $dip->tahun }}</td>
                                </tr>
                                <tr>
                                    <th>TIPE FILE</th>
                                    <td>:</td>
                                    <td>{{ $dip->tipeFile }}</td>
                                </tr>
                                <tr>
                                    <th>PETUGAS</th>
                                    <td>:</td>
                                    <td>{{ $dip->name }}</td>
                                </tr>
                                <tr>
                                    <th>TGL. UPLOAD</th>
                                    <td>:</td>
                                    <td>{{ $dip->created_at }}</td>
                                </tr>
                            </table>
                        </div>
                        <form action="{{ url('dip/verifikasi', $dip->id) }}" method="post" class="form">
                            @csrf
                            <div class="form-body">
                                <div class="row">
                                    <div class="col-md-6 col-12">
                                        <div class="form-label-group">
                                            <select name="statusDokumen" id="statusDokumen" class="select2 form-control" required>
                                                <option value="">STATUS DOKUMEN</option>
                                                <option value="DISETUJUI">SETUJUI</option>
                                                <option value="DITOLAK">TOLAK</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-md-6 col-12">
                                        <div class="form-label-group">
                                            <textarea name="keterangan" id="keterangan" class="form-control" placeholder="Keterangan (Opsional)"></textarea>
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
