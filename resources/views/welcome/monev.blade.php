@extends('layouts.applanding')

@section('contentlanding')
    <style>
        #chartdiv {
            width: 100%;
            height: 500px;
        }
    </style>

    <section class="breadcrumb_area">
        <div class="container">
            <div class="sec_title text-center mb_70 wow fadeInUp" data-wow-delay="0.2s" style="visibility: visible; animation-delay: 0.2s; animation-name: fadeInUp;">
                <h2 class="text-white text-center"><b>MONEV</b></h2>
                <h6 class="text-warning text-center">Monitoring dan Evaluasi DIP</h6>
            </div>
            <div class="row wow fadeInLeft" data-wow-delay="0.6s">
                <div class="col-12">
                    <div class="card">
                        <div class="card-content">
                            <div class="card-body mb-5">
                                <form action="{{ route('monev.skpd') }}" method="POST" class="form">
                                    @csrf
                                    <div class="form-body">
                                        <div class="row">
                                            <div class="col-md-6 col-12">
                                                <div class="form-label-group">
                                                    <select name="idSkpd" id="idSkpd" class="select2 form-control" required>
                                                        <option value="">Pilih SKPD</option>
                                                        @foreach($skpd as $row)
                                                            <option value="{{ $row->id }}">{{ $row->skpd }}</option>
                                                        @endforeach
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="col-md-6 col-12">
                                                <div class="form-label-group">
                                                    <select name="tahun" id="tahun" class="select2 form-control">
                                                        <option value="">Tahun</option>
                                                        <option value="2020">2020</option>
                                                        <option value="2021">2021</option>
                                                        <option value="2022">2022</option>
                                                        <option value="2023">2023</option>
                                                        <option value="2024">2024</option>
                                                        <option value="2025">2025</option>
                                                    </select>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-6 col-12">
                                                <button type="submit" class="btn btn-sm btn-primary mr-1 mb-1">Submit</button>
                                            </div>
                                        </div>
                                    </div>
                                </form>
                                <br>
                                @if($data)
                                    <h6 class="text-center">
                                        @if($data->count() > 0)
                                            {{ $data[0]->skpd }}
                                        @else
                                            Data tidak ditemukan
                                        @endif
                                    </h6>
                                @endif
                                <div id="chartdiv"></div>
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
        $(".select2").select2({
            dropdownAutoWidth: true,
            width: '100%'
        });

        @if(!empty($data))
            am4core.ready(function() {
                am4core.useTheme(am4themes_animated);

                var chart = am4core.create("chartdiv", am4charts.XYChart3D);

                chart.data = [
                    @forelse($data as $value)
                        {
                            "kategori": "{{ $value->kategori }}",
                            "kategoriCount": {{ $value->kategoriCount }}
                        },
                    @empty
                        {
                            "kategori": "-",
                            "kategoriCount": 0
                        },
                    @endforelse
                ];

                let categoryAxis = chart.xAxes.push(new am4charts.CategoryAxis());
                categoryAxis.dataFields.category = "kategori";
                categoryAxis.renderer.labels.template.rotation = 270;
                categoryAxis.renderer.labels.template.hideOversized = false;
                categoryAxis.renderer.minGridDistance = 20;
                categoryAxis.renderer.labels.template.horizontalCenter = "right";
                categoryAxis.renderer.labels.template.verticalCenter = "middle";
                categoryAxis.tooltip.label.rotation = 270;
                categoryAxis.tooltip.label.horizontalCenter = "right";
                categoryAxis.tooltip.label.verticalCenter = "middle";

                let valueAxis = chart.yAxes.push(new am4charts.ValueAxis());
                valueAxis.title.text = "Jumlah DIP";
                valueAxis.title.fontWeight = "bold";

                var series = chart.series.push(new am4charts.ColumnSeries3D());
                series.dataFields.valueY = "kategoriCount";
                series.dataFields.categoryX = "kategori";
                series.name = "Visits";
                series.tooltipText = "{categoryX}: [bold]{valueY}[/]";
                series.columns.template.fillOpacity = .8;

                var columnTemplate = series.columns.template;
                columnTemplate.strokeWidth = 2;
                columnTemplate.strokeOpacity = 1;
                columnTemplate.stroke = am4core.color("#FFFFFF");

                columnTemplate.adapter.add("fill", function(fill, target) {
                return chart.colors.getIndex(target.dataItem.index);
                })

                columnTemplate.adapter.add("stroke", function(stroke, target) {
                return chart.colors.getIndex(target.dataItem.index);
                })

                chart.cursor = new am4charts.XYCursor();
                chart.cursor.lineX.strokeOpacity = 0;
                chart.cursor.lineY.strokeOpacity = 0;

                });
        @endif
    </script>
@endpush
