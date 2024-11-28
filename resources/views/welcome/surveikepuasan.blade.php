@extends('layouts.applanding')

@section('contentlanding')
<style>
    #chartdiv {
        width: 100%;
        height: 500px;
    }
</style>

<section class="pos_banner_area">
    <div class="pos_slider owl-carousel ">
        <img class="shap_img" src="{{asset('landing-page/img/home-software/line_02.png')}}" alt="">
        <div class="pos_banner_item" style="background: url(img/pos/pos_slideshow1.jpg);"></div>
        {{-- <div class="pos_banner_item" style="background: url(img/pos/pos_slideshow2.jpg);"></div> --}}
        {{-- <div class="pos_banner_item" style="background: url(img/pos/pos_slideshow3.jpg);"></div> --}}
    </div>
    <div class="container">
        <h2 class="text-white text-center"><b>SURVEI</b></h2>
        <h6 class="text-warning text-center">Survei Kepuasan Masyarakat</h6>
        <div class="row wow fadeInLeft" data-wow-delay="0.6s">
            <div class="col-12">
                <div class="card">
                    <div class="card-content">
                        <div class="card-body card-dashboard">
                            <div class="col-sm-12">
                                <div class="row">
                                    <div class="col-12">
                                        <div id="chartdiv"></div>
                                    </div>
                                </div>
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
        am4core.ready(function() {
            am4core.useTheme(am4themes_animated);

            var chart = am4core.create("chartdiv", am4charts.XYChart3D);

            chart.data = [
                {
                    "kategori": "Puas",
                    "kategoriCount": 92.0,
                },
                {
                    "kategori": "Tidak Puas",
                    "kategoriCount": 8.0,
                },
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
            valueAxis.title.text = "Jumlah (%)";
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
    </script>
@endpush