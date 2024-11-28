@extends('layouts.applanding')

@section('contentlanding')

    <section class="breadcrumb_area">
        {{-- <img class="breadcrumb_shap" src="{{asset('landing-page/img/breadcrumb/banner_bg.png')}}" alt=""> --}}
        <div class="container">
            <div class="sec_title text-center mb_70 wow fadeInUp" data-wow-delay="0.2s" style="visibility: visible; animation-delay: 0.2s; animation-name: fadeInUp;">
                <h2 class="text-white text-center"><b>Hasil Pencarian</b></h2>
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
                                                <th>KANDUNGAN INFORMASI</th>
                                                <th>KATEGORI</th>
                                                <th>JENIS</th>
                                                <th>TIPE FILE</th>
                                                <th>TAHUN</th>
                                                <th>JUMLAH DIUNDUH</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach($data as $key => $value)
                                            <tr>
                                                <td>{{ $key + 1 }}</td>
                                                <td>{{ $value->judul }}</td>
                                                <td>
                                                    @if(Auth::check())
                                                        <a href="{{ url('dip/download/'. $value->id. '/'. Auth::user()->id) }}" class='btn btn-icon btn-outline-info mr-1 mb-1 btn-sm' title='Download'><i class='fas fa-download'></i></a>
                                                    @endif
                                                </td>
                                                <td>{{ $value->skpd }}</td>
                                                <td>{{ $value->kandunganInformasi }}</td>
                                                <td>{{ $value->kategori }}</td>
                                                <td>{{ $value->jenis }}</td>
                                                <td>{{ $value->tipefile }}</td>
                                                <td>{{ $value->tahun }}</td>
                                                <td>{{ $value->jml_diunduh }}</td>
                                                
                                            </tr>
                                            @endforeach
                                        </tbody>
                                        <tfoot>
                                            <tr>
                                                <th>NO</th>
                                                <th>JUDUL</th>
                                                <th>DOWNLOAD</th>
                                                <th>SKPD</th>
                                                <th>KANDUNGAN INFORMASI</th>
                                                <th>KATEGORI</th>
                                                <th>JENIS</th>
                                                <th>TIPE FILE</th>
                                                <th>TAHUN</th>
                                                <th>JUMLAH DIUNDUH</th>
                                            </tr>
                                        </tfoot>
                                    </table>
                                </div>
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
            initComplete: function () {
                this.api().columns([2, 4, 5, 6, 7]).every( function () {
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
