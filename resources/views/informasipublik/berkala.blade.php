@extends('layouts.applanding')

@section('contentlanding')
    <section class="breadcrumb_area">
        {{-- <img class="breadcrumb_shap" src="{{asset('landing-page/img/breadcrumb/banner_bg.png')}}" alt=""> --}}
        <div class="container">
            <div class="sec_title text-center mb_70 wow fadeInUp" data-wow-delay="0.2s" style="visibility: visible; animation-delay: 0.2s; animation-name: fadeInUp;">
                {{-- <h1 class="f_700 f_size_50 w_color f_p">Informasi Tentang PPID</h1> --}}
                <h2 class="text-white text-center"><b>Informasi Yang Diumumkan Secara Berkala</b></h2>
                <!-- <h6 class="text-warning text-center">Silahkan klik tombol <b class="badge badge-info" title="Download"><i class="fas fa-download"></i></b> untuk melakukan download dokumen</h6> -->
                @if(Auth::check())
                <h6 class="text-warning text-center">Silahkan klik tombol <b class="badge badge-info" title="Download"><i class="fas fa-download"></i></b> untuk melakukan download dokumen</h6>
                @else
                <h6 class="text-warning text-center">Silahkan <a class="badge badge-warning" href="{{route('login')}}">Login</a> terlebih dahulu untuk melakukan download dokumen</h6>
                @endif
            </div>
            <div class="row wow fadeInLeft" data-wow-delay="0.6s">
                <div class="col-12">
                    <div class="card">
                        <div class="card-content">
                            <div class="card-body mb-5">
                                <div class="table-responsive">
                                    <table class="table table-bordered table-hover" id="dip">
                                        <thead>
                                            <tr>
                                                <th>NO</th>
                                                <th>JUDUL</th>
                                                <th>DOWNLOAD</th>
                                                <th>SKPD</th>
                                                <!-- <th>KANDUNGAN INFORMASI</th>
                                                <th>KATEGORI</th> -->
                                                <th>JENIS</th>
                                                <!-- <th>TIPE FILE</th> -->
                                                <th>TAHUN</th>
                                                <th>JUMLAH DIUNDUH</th>
                                            </tr>
                                        </thead>
                                        <tbody></tbody>
                                        <tfoot>
                                            <tr>
                                                <th>NO</th>
                                                <th>JUDUL</th>
                                                <th>DOWNLOAD</th>
                                                <th>SKPD</th>
                                                <!-- <th>KANDUNGAN INFORMASI</th>
                                                <th>KATEGORI</th> -->
                                                <th>JENIS</th>
                                                <!-- <th>TIPE FILE</th> -->
                                                <th>TAHUN</th>
                                                <th>JUMLAH DIUNDUH</th>
                                            </tr>
                                        </tfoot>
                                    </table>
                                </div>
                                {{-- <div class="row">

                                </div> --}}
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
            ajax: "{{ url('informasipublik/berkala') }}",
            columns: [
                {data: 'DT_RowIndex', name: 'DT_RowIndex'},
                {data: 'judul', name: 'judul'},
                {data: 'action', name: 'action', orderable: false, searchable: false},
                {data: 'skpd', name: 'skpd'},
                // {data: 'kandunganInformasi', name: 'kandunganInformasi'},
                // {data: 'kategori', name: 'kategori'},
                {data: 'jenis', name: 'jenis'},
                // {data: 'tipefile', name: 'tipefile'},
                {data: 'tahun', name: 'tahun'},
                {data: 'jml_diunduh', name: 'jml_diunduh'},
            ],
            initComplete: function () {
            // this.api().columns([2, 5, 6, 7]).every( function () {
            this.api().columns([2, 5, 6]).every( function () {
                var column = this;
                var select = $('<select><option value=""></option></select>')
                    .appendTo( $(column.footer()).empty() )
                    .on( 'change', function () {
                        var val = $.fn.dataTable.util.escapeRegex(
                            $(this).val()
                        );

                        column
                            .search( val ? '^'+val+'$' : '', true, false )
                            .draw();
                    } );

                column.data().unique().sort().each( function ( d, j ) {
                    select.append( '<option value="'+d+'">'+d+'</option>' )
                } );
            } );
        }
        });
    </script>
@endpush
