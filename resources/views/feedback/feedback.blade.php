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
                    <h4 class="card-title">Semua Pesan</h4>
                </div>
                <div class="card-content">
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table zero-configuration" id="permohonaninformasisss" width="100%">
                                <thead class="text-center">
                                    <tr>
                                        <th width="5px">No</th>
                                        <th>NAMA</th>
                                        <th>EMAIL</th>
                                        <th>PESAN</th>
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
        $('#permohonaninformasisss').on('submit', '.delete-form' ,function(e){
            return confirm('Anda yakin mau menghapus item ini ?');
        });
        var table = $('#pesan').DataTable({
            processing: true,
            serverSide: true,
            ajax: "{{ route('permohonaninformasisss.semuapermohonan') }}",
            columns: [
                {data: 'DT_RowIndex', name: 'DT_RowIndex'},
                {data: 'noPendaftaran', name: 'noPendaftaran'},
                {data: 'skpd', name: 'skpd'},
                {data: 'created_at', name: 'created_at'},
                {data: 'action', name: 'action', orderable: false, searchable: false},
            ]
        });
    </script>
@endpush