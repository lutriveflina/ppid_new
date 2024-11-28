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
            <div class="card">
                <div class="card-header">
                    <h4 class="card-title">Riwayat Unduh Dokumen</h4>
                </div>
                <div class="card-content">
                    <div class="card-body">
                        <div class="btn-group" role="group" aria-label="Basic example">
                            <a href="{{ url('print-informasidiunduh-pdf') }}" class="btn btn-danger"><i class="fa fa-file-pdf-o"></i> PDF</a>
                            <a href="{{ url('print-informasidiunduh-excel') }}" class="btn btn-success"><i class="fa fa-file-excel-o"></i> Excel</a>
                        </div>
                        <div class="table-responsive">
                            <table class="table zero-configuration" id="dip" width="100%">
                                <thead class="text-center">
                                    <tr>
                                        <th width="5px">No</th>
                                        <th>JUDUL</th>
                                        <th>KATEGORI</th>
                                        <th>JENIS</th>
                                        <th>SKPD</th>
                                        <th>USER</th>
                                        <th>TGL. UNDUH</th>
                                    </tr>
                                </thead>
                                <tbody></tbody>
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
        var table = $('#dip').DataTable({
            processing: true,
            serverSide: true,
            ajax: "{{ url('informasidiunduh') }}",
            columns: [
                {data: 'DT_RowIndex', name: 'DT_RowIndex'},
                {data: 'judul', name: 'judul'},
                {data: 'kategori', name: 'kategori'},
                {data: 'jenis', name: 'jenis'},
                {data: 'skpd', name: 'skpd'},
                {data: 'name', name: 'name'},
                {data: 'created_at', name: 'keterangan'},
            ]
        });
    </script>
@endpush