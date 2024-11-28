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
                <a href="{{ route('petugas.index') }}" class="btn btn-icon btn-outline-primary mr-1 mb-1">
                    <i class="feather icon-skip-back"></i>
                </a>
            </div>
        </div>
        <div class="col-12">
            <div class="card">
                <div class="card-header">
                    <h4 class="card-title">Edit Petugas/Pengunjung {{ $petugas->name }}</h4>
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
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection