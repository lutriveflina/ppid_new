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
        @if(!Auth::user()->hasRole('superadmin'))
        <div class="col-12">
            <div class="pull-left">
                <a href="{{ route('keberatan.create') }}" class="btn btn-primary mr-1 mb-1">
                    <i class="feather icon-plus">Ajukan Keberatan</i>
                </a>
            </div>
        </div>
        @endif
        <div class="col-12">
            <div class="card">
                <div class="card-header">
                    <h4 class="card-title">Keberatan</h4>
                </div>
                <div class="card-content">
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table zero-configuration" id="keberatan" width="100%">
                                <thead class="text-center">
                                    <tr>
                                        <th width="5px">NO</th>
                                        <th>NO. REGISTRASI KEBERATAN</th>
                                        <th>NO. PENDAFTARAN PERMOHONAN</th>
                                        <th>SKPD</th>
                                        <th>TGL. DIBUAT</th>
                                        <th>TGL. TANGGAPAN ATAS KEBERATAN AKAN DIBERIKAN</th>
                                        <th>TGL. DIUBAH</th>
                                        <th width="150px">Action</th>
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
        var table = $('#keberatan').DataTable({
            processing: true,
            serverSide: true,
            ajax: "{{ route('keberatan.index') }}",
            columns: [
                {data: 'DT_RowIndex', name: 'DT_RowIndex'},
                {data: 'nomorRegistrasi', name: 'nomorRegistrasi'},
                {data: 'noPendaftaran', name: 'noPendaftaran'},
                {data: 'skpd', name: 'skpd'},
                {data: 'created_at', name: 'created_at'},
                {data: 'tanggapan', name: 'tanggapan'},
                {data: 'updated_at', name: 'updated_at'},
                {data: 'action', name: 'action', orderable: false, searchable: false},
            ]
        });
    </script>
@endpush
