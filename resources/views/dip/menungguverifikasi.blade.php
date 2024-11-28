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
                <a href="{{ route('dip.create') }}" class="btn btn-icon btn-outline-primary mr-1 mb-1">
                    <i class="feather icon-plus"></i>
                </a>
            </div>
        </div>
        <div class="col-12">
            <div class="card">
                <div class="card-header">
                    <h4 class="card-title">Dokumen Menunggu Verifikasi</h4>
                </div>
                <div class="card-content">
                    <div class="card-body">
                        <div class="btn-group" role="group" aria-label="Basic example">
                            <a href="{{ url('print-dip-pdf') }}" class="btn btn-danger"><i class="fa fa-file-pdf-o"></i> PDF</a>
                            <a href="{{ url('print-dip-excel') }}" class="btn btn-success"><i class="fa fa-file-excel-o"></i> Excel</a>
                        </div>
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
                                        <th>TAHUN</th>
                                        <th>JUMLAH UNDUHAN</th>
                                        <th>STATUS</th>
                                        <th>KETERANGAN</th>
                                        <th width="150px">Action</th>
                                    </tr>
                                </thead>
                                <tbody></tbody>
                                <tfoot>
                                    <tr>
                                        <th width="5px">No</th>
                                        <th>JUDUL</th>
                                        <th>SKPD</th>
                                        <th>JENIS</th>
                                        <th>KATEGORI</th>
                                        <th>PENERBIT</th>
                                        <th>TAHUN</th>
                                        <th>JUMLAH UNDUHAN</th>
                                        <th>STATUS</th>
                                        <th>KETERANGAN</th>
                                        <th width="150px">Action</th>
                                    </tr>
                                </tfoot>
                            </table>
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
        $('#dip').on('submit', '.delete-form' ,function(e){
            return confirm('Anda yakin mau menghapus item ini ?');
        });

        var table = $('#dip').DataTable({
            processing: true,
            serverSide: true,
            ajax: "{{ url('dip-menunggu-verifikasi') }}",
            columns: [
                {data: 'DT_RowIndex', name: 'DT_RowIndex'},
                {data: 'judul', name: 'judul'},
                {data: 'skpd', name: 'skpd'},
                {data: 'jenis', name: 'jenis'},
                {data: 'kategori', name: 'kategori'},
                {data: 'penerbit', name: 'penerbit'},
                {data: 'tahun', name: 'tahun'},
                {data: 'jml_diunduh', name: 'jml_diunduh'},
                {data: 'statusDokumen', name: 'statusDokumen'},
                {data: 'keterangan', name: 'keterangan'},
                {data: 'action', name: 'action', orderable: false, searchable: false},
            ]
        });
    </script>
@endpush
