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
                <a href="{{ route('kategori.create') }}" class="btn btn-icon btn-outline-primary mr-1 mb-1">
                    <i class="feather icon-plus"></i>
                </a>
            </div>
        </div>
        <div class="col-12">
            <div class="card">
                <div class="card-header">
                    <h4 class="card-title">Data Kategori</h4>
                </div>
                <div class="card-content">
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table zero-configuration" id="kategori" width="100%">
                                <thead class="text-center">
                                    <tr>
                                        <th width="5px">No</th>
                                        <th>KATEGORI</th>
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
        $('#kategori').on('submit', '.delete-form' ,function(e){
            return confirm('Anda yakin mau menghapus item ini ?');
        });

        var table = $('#kategori').DataTable({
            processing: true,
            serverSide: true,
            ajax: "{{ route('kategori.index') }}",
            columns: [
                {data: 'DT_RowIndex', name: 'DT_RowIndex'},
                {data: 'kategori', name: 'kategori'},
                {data: 'action', name: 'action', orderable: false, searchable: false},
            ]
        });
    </script>
@endpush