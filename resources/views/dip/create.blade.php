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
                <a href="{{ route('dip.index') }}" class="btn btn-icon btn-outline-primary mr-1 mb-1">
                    <i class="feather icon-skip-back"></i>
                </a>
            </div>
        </div>
        <div class="col-12">
            <div class="card">
                <div class="card-header">
                    <h4 class="card-title">Buat Dokumen Baru</h4>
                </div>
                <div class="card-content">
                    <div class="card-body">
                        <form action="{{ route('dip.store') }}" method="POST" enctype="multipart/form-data" class="form">
                            @csrf
                            <div class="form-body">
                                <div class="row">
                                    <div class="col-md-6 col-12">
                                        <div class="form-label-group">
                                            <input type="text" id="judul" class="form-control" placeholder="Judul" name="judul" required>
                                        </div>
                                    </div>
                                    <div class="col-md-6 col-12">
                                        <div class="form-label-group">
                                            <select name="idSkpd" id="idSkpd" class="select2 form-control" required>
                                                <option value="">TERBITKAN SEBAGAI</option>
                                                @foreach($skpd as $row)
                                                    <option value="{{ $row->id }}" {{ ($row->id == Auth::user()->idSKPD) ? 'selected' : '' }}>{{ $row->skpd }}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-6 col-12">
                                        <div class="form-label-group">
                                            <textarea name="kandunganInformasi" id="kandunganInformasi" class="form-control" rows="12" cols="80" placeholder="Kandungan Informasi" required></textarea>
                                        </div>
                                        <div class="form-label-group">
                                            <select name="tahun" id="tahun" class="select2 form-control" required>
                                                <option value="">TAHUN</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-md-6 col-12">
                                        <div class="form-label-group">
                                            <select name="idKategori" id="idKategori" class="select2 form-control" required>
                                                <option value="">KATEGORI</option>
                                                @foreach($kategori as $row)
                                                    <option value="{{ $row->id }}">{{ $row->kategori }}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                        <div class="form-label-group">
                                            <select name="idJenis" id="idJenis" class="select2 form-control" required>
                                                <option value="">JENIS</option>
                                                @foreach($jenis as $row)
                                                    <option value="{{ $row->id }}">{{ $row->jenis }}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                        <div class="form-label-group">
                                            <select name="idTipeFile" id="idTipeFile" class="select2 form-control" required>
                                                <option value="">TIPE FILE</option>
                                                @foreach($tipefile as $row)
                                                    <option value="{{ $row->id }}">{{ $row->tipeFile }}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                        <fieldset class="form-group">
                                            <div class="custom-file">
                                                <input type="file" class="custom-file-input" id="file" name="file" required>
                                                <label class="custom-file-label" for="file">PILIH FILE</label>
                                            </div>
                                        </fieldset>
                                        <div class="form-label-group">
                                            <select name="statusDokumen" id="statusDokumen" class="select2 form-control" required>
                                                <option value="">STATUS DOKUMEN</option>
                                                <option value="DRAFT">DRAFT</option>
                                                @if (Auth::user()->hasRole('superadmin'))
                                                    <option value="DISETUJUI">DISETUJUI</option>
                                                @endif
                                                <option value="MENUNGGU VERIFIKASI PPID UTAMA">KIRIM KE PPID UTAMA</option>
                                            </select>
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

@push('scripts')
    <script>
        $("select[readonly]").find("option:not(:selected)").hide().attr("disabled",true);
    </script>
@endpush
