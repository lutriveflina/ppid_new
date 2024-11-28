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
                <a href="{{ route('petugas.create') }}" class="btn btn-icon btn-outline-primary mr-1 mb-1">
                    <i class="feather icon-plus"></i>
                </a>
            </div>
        </div>
        <div class="col-12">
            <div class="card">
                <div class="card-header">
                    <h4 class="card-title">Data Petugas/Pengunjung</h4>
                </div>
                <div class="card-content">
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table zero-configuration" id="petugas" width="100%">
                                <thead class="text-center">
                                    <tr>
                                        <th width="5px">No</th>
                                        <th>NIK/NIP</th>
                                        <th>NAMA</th>
                                        <th>SKPD</th>
                                        <th>EMAIL</th>
                                        <th>NO. KONTAK</th>
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
        $('#petugas').on('submit', '.delete-form' ,function(e){
            return confirm('Anda yakin mau menghapus item ini ?');
        });

        var table = $('#petugas').DataTable({
            processing: true,
            serverSide: true,
            ajax: "{{ route('petugas.index') }}",
            columns: [
                {data: 'DT_RowIndex', name: 'DT_RowIndex'},
                {data: 'nik', name: 'nik'},
                {data: 'name', name: 'name'},
                {data: 'skpd', name: 'skpd'},
                {data: 'email', name: 'email'},
                {data: 'noKontak', name: 'noKontak'},
                {data: 'action', name: 'action', orderable: false, searchable: false},
            ]
        });
    </script>
@endpush