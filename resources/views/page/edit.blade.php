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
                <a href="{{ route('page.index') }}" class="btn btn-icon btn-outline-primary mr-1 mb-1">
                    <i class="feather icon-skip-back"></i>
                </a>
            </div>
        </div>
        <div class="col-12">
            <div class="card">
                <div class="card-header">
                    <h4 class="card-title">Edit Page</h4>
                </div>
                <div class="card-content">
                    <div class="card-body">
                        <form action="{{ route('page.update', $page->id) }}" method="POST" enctype="multipart/form-data" class="form">
                            @csrf
                            @method('PATCH')
                            <div class="form-body">
                                <div class="row">
                                    <div class="col-md-6 col-12">
                                        <div class="form-label-group">
                                            <textarea name="uraian" id="uraian" class="form-control" placeholder="Uraian (Opsional)">{{ $page->uraian }}</textarea>
                                        </div>
                                    </div>
                                    <div class="col-md-6 col-12">
                                        <div class="form-label-group">
                                            <select name="klasifikasi" id="klasifikasi" class="select2 form-control" required>
                                                <option value="">KLASIFIKASI PAGE</option>
                                                <option value="E-Kliping" {{ ($page->klasifikasi == 'E-Kliping') ? 'selected' : '' }}>E-Kliping</option>
                                                <option value="Standar Operasional Prosedur" {{ ($page->klasifikasi == 'Standar Operasional Prosedur') ? 'selected' : '' }}>Standar Operasional Prosedur</option>
                                                <option value="Alur Permohonan Informasi" {{ ($page->klasifikasi == 'Alur Permohonan Informasi') ? 'selected' : '' }}>Alur Permohonan Informasi</option>
                                                <option value="Alur Pengajuan Keberatan" {{ ($page->klasifikasi == 'Alur Pengajuan Keberatan') ? 'selected' : '' }}>Alur Pengajuan Keberatan</option>
                                                <option value="Alur Fasilitasi Sengketa Informasi" {{ ($page->klasifikasi == 'Alur Fasilitasi Sengketa Informasi') ? 'selected' : '' }}>Alur Fasilitasi Sengketa Informasi</option>
                                                <option value="Biaya Pelayanan" {{ ($page->klasifikasi == 'Biaya Pelayanan') ? 'selected' : '' }}>Biaya Pelayanan</option>
                                                <option value="Jadwal Pelayanan" {{ ($page->klasifikasi == 'Jadwal Pelayanan') ? 'selected' : '' }}>Jadwal Pelayanan</option>
                                                <option value="Prosedur Pengaduan (Lapor SP4N)" {{ ($page->klasifikasi == 'Prosedur Pengaduan (Lapor SP4N)') ? 'selected' : '' }}>Prosedur Pengaduan (Lapor SP4N)</option>
                                                <option value="Regulasi Keterbukaan Informasi Publik" {{ ($page->klasifikasi == 'Regulasi Keterbukaan Informasi Publik') ? 'selected' : '' }}>Regulasi Keterbukaan Informasi Publik</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-md-6 col-12">
                                        <fieldset class="form-group">
                                            <div class="custom-file">
                                                <input type="file" class="custom-file-input" id="file" name="file" required>
                                                <label class="custom-file-label" for="file">PILIH FILE</label>
                                            </div>
                                        </fieldset>
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
