@extends('layouts.app')
@section('content')
<section id="dashboard-ecommerce">
    <div class="row">
        <div class="col-lg-12 col-sm-12 col-12">
            <div class="card">
                <div class="card-header d-flex justify-content-between align-items-end">
                    <h4>Dashboard</h4>
                </div>
                <div class="card-content">
                    <div class="card-body pt-0">
                        @if(Auth::user()->hasRole('superadmin'))
                        <span class="badge badge-primary">DIP Menunggu Verifikasi</span>    
                        <div class="table-responsive">
                            <table class="table zero-configuration" id="dip" width="100%">
                                <thead class="text-center">
                                    <tr>
                                        <th width="5px">No</th>
                                        <th>JUDUL</th>
                                        <th>SKPD</th>
                                        <th>JENIS</th>
                                        <th>KATEGORI</th>
                                        <th>PENERBIT</th>
                                        <th>STATUS</th>
                                        <th>KETERANGAN</th>
                                        <th width="150px">Action</th>
                                    </tr>
                                </thead>
                                <tbody></tbody>
                            </table>
                        </div>
                        @endif
                        @if(Auth::user()->hasRole('adminskpd'))
                        <span class="badge badge-primary">Permohonan Disposisi</span> 
                        <div class="table-responsive">
                            <table class="table zero-configuration" id="permohonaninformasi" width="100%">
                                <thead class="text-center">
                                    <tr>
                                        <th width="5px">No</th>
                                        <th>NO. PENDAFTARAN</th>
                                        <th>SKPD</th>
                                        <th>TGL. DIBUAT</th>
                                        <th>STATUS</th>
                                        <th>TGL. DIUBAH</th>
                                        <th width="150px">Action</th>
                                    </tr>
                                </thead>
                                <tbody></tbody>
                            </table>
                        </div>
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection