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
                    <h4 class="card-title">Edit Permohonan Informasi</h4>
                </div>
                <div class="card-content">
                    <div class="card-body">
                    <form action="{{ route('petugas.update', $petugas->id) }}" method="POST" class="form">
                            @csrf
                            @method('PATCH')
                            <div class="form-body">
                                <div class="row">
                                    <div class="col-md-6 col-12">
                                        <div class="form-label-group">
                                            <input type="number" id="nik" name="nik" class="form-control" placeholder="NIK/NIP" required oninput="javascript: if (this.value.length > this.maxLength) this.value = this.value.slice(0, this.maxLength);" maxlength="18" value="{{ $petugas->nik }}">
                                        </div>
                                    </div>
                                    <div class="col-md-6 col-12">
                                        <div class="form-label-group">
                                            <input type="text" id="name" class="form-control" placeholder="Nama" name="name" value="{{ $petugas->name }}" required>
                                        </div>
                                    </div>
                                    <div class="col-md-6 col-12">
                                        <div class="form-label-group">
                                            <select name="idSKPD" id="idSKPD" class="select2 form-control">
                                                <option value="">PILIH SKPD</option>
                                                @foreach($skpd as $row)
                                                    <option value="{{ $row->id }}" {{ ($petugas->idSKPD == $row->id) ? 'selected' : '' }}>{{ $row->skpd }}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-md-6 col-12">
                                        <div class="form-label-group">
                                            <textarea name="alamat" id="alamat" class="form-control" placeholder="Alamat (Opsional)">{{ $petugas->alamat }}</textarea>
                                        </div>
                                    </div>
                                    <div class="col-md-6 col-12">
                                        <div class="form-label-group">
                                            <input type="text" id="provinsi" class="form-control" placeholder="Provinsi (Opsional)" name="provinsi" value="{{ $petugas->provinsi }}">
                                        </div>
                                    </div>
                                    <div class="col-md-6 col-12">
                                        <div class="form-label-group">
                                            <input type="text" id="kabKot" class="form-control" placeholder="Kabupaten/Kota (Opsional)" name="kabKot" value="{{ $petugas->kabKot }}">
                                        </div>
                                    </div>
                                    <div class="col-md-6 col-12">
                                        <div class="form-label-group">
                                            <input type="email" id="email" class="form-control" placeholder="Email" name="email" value="{{ $petugas->email }}" required>
                                        </div>
                                    </div>
                                    <div class="col-md-6 col-12">
                                        <div class="form-label-group">
                                            <input type="numeric" id="noKontak" class="form-control" placeholder="NO. Kontak (Opsional)" name="noKontak" value="{{ $petugas->noKontak }}">
                                        </div>
                                    </div>
                                    <div class="col-md-6 col-12">
                                        <div class="form-label-group">
                                            <select name="role" id="role" class="select2 form-control" required>
                                                <option value="">PILIH ROLE</option>
                                                @foreach($roles as $role)
                                                    <option value="{{ $role->name }}" {{ ($petugas->hasRole($role->name) == $role->name) ? 'selected' : '' }}>{{ $role->name }}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-md-6 col-12">
                                        <div class="form-label-group">
                                            <input type="password" id="password" class="form-control" placeholder="Password" name="password">
                                        </div>
                                    </div>
                                    <div class="col-12">
                                        <button type="submit" class="btn btn-primary mr-1 mb-1">Submit</button>
                                        <button type="reset" class="btn btn-outline-warning mr-1 mb-1">Reset</button>
                                    </div>
                                </div>
                            </div>
                        </form>
                        <div class="table-responsive">
                            <table class="table table-bordered table-hover">
                                <tr>
                                    <th>NO. PENDAFTARAN</th>
                                    <td>:</td>
                                    <td>{{ $data->noPendaftaran }}</td>
                                </tr>
                                <tr>
                                    <th>RINCIAN INFORMASI</th>
                                    <td>:</td>
                                    <td>{{ $data->rincianInformasi }}</td>
                                </tr>
                                <tr>
                                    <th>TUJUAN PENGGUNAAN INFORMASI</th>
                                    <td>:</td>
                                    <td>{{ $data->tujuanPenggunaanInformasi }}</td>
                                </tr>
                                <tr>
                                    <th>CARA MEMPEROLEH INFORMASI</th>
                                    <td>:</td>
                                    <td>{{ $data->caraMemperolehInformasi }}</td>
                                </tr>
                                <tr>
                                    <th>CARA MENDAPATKAN SALINAN INFORMASI</th>
                                    <td>:</td>
                                    <td>{{ $data->caraMendapatkanSalinanInformasi }}</td>
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
                                    <th>SK Pendirian</th>
                                    <td>:</td>
                                    <td>
                                        <a href="{{ Storage::url($data->skPendirian) }}" target="blank">SK Pendirian</a>
                                    </td>
                                </tr>
                                <tr>
                                    <th>NAMA PETUGAS</th>
                                    <td>:</td>
                                    <td>{{ $data->namaPetugas }}</td>
                                </tr>
                                <tr>
                                    <th>STATUS</th>
                                    <td>:</td>
                                    <td>{{ $data->status }}</td>
                                </tr>
                                <tr>
                                    <th>ALASAN</th>
                                    <td>:</td>
                                    <td>{{ $data->alasan }}</td>
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
                            </table>
                        </div>
                        @if (Auth::user()->hasRole('superadmin|adminskpd'))
                        <form action="{{ url('permohonaninformasisss/verifikasi', $data->id) }}" method="post" class="form">
                            @csrf
                            <div class="form-body">
                                <div class="row">
                                    <div class="col-md-6 col-12">
                                        <div class="form-label-group">
                                            <select name="status" id="status" class="select2 form-control" required>
                                                <option value="">STATUS PERMOHONAN</option>
                                                @if (Auth::user()->hasRole('superadmin'))
                                                <option value="DISPOSISI">TERUSKAN KE SKPD</option>
                                                @endif
                                                <option value="DITOLAK">TOLAK</option>
                                                <option value="DIPROSES">DIPROSES</option>
                                                <option value="SELESAI">SELESAI</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-md-6 col-12">
                                        <div class="form-label-group">
                                            <textarea name="alasan" id="alasan" class="form-control" placeholder="Alasan (Opsional)"></textarea>
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