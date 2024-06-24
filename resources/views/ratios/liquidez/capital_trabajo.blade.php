@extends('layouts.app')
@section('title', 'Liquidez-Corriente')
@push('css')
    <style>
        #chartdiv2022,
        #chartdiv2023 {
            width: 100%;
            height: 250px;
        }
    </style>
@endpush
@section('content')
    <div class="row">
        <div class="col-md-3">
            <div class="card shadow">
                <div class="card-header py-3">
                    <p class="text-primary m-0 fw-bold">CAPITAL DE TRABAJO - 2022</p>
                </div>
                <div class="card-body">
                    @php
                        //Total de Activos
                        $activos_corrientes_totales_2022 =
                            ($activos_corrientes->where('year', 2022)->first()->total_quantity ?? 0) + 1882;
                        $activos_corrientes_totales_2023 =
                            ($activos_corrientes->where('year', 2023)->first()->total_quantity ?? 0) + 30;
                        //Total de Pasivos
                        $pasivos_corrientes_totales_2022 =
                            ($pasivos_corrientes->where('year', 2022)->first()->total_quantity ?? 0) + 6873;
                        $pasivos_corrientes_totales_2023 =
                            ($pasivos_corrientes->where('year', 2023)->first()->total_quantity ?? 0) + 19;
                        // Cálculo del resultado
                        $resultado_2022 = $activos_corrientes_totales_2022 - $pasivos_corrientes_totales_2022;
                        $resultado_2023 = $activos_corrientes_totales_2023 - $pasivos_corrientes_totales_2023;
                    @endphp
                    <div class="row">
                        <div class="col-md-12">
                            <label for="currentAssets" class="form-label">Activos Corrientes</label>
                            <div class="input-group mb-3">
                                <span class="input-group-text">S/.</span>
                                <input readonly type="text" id="activos_corrientes_totales_2022" class="form-control"
                                    value="{{ $activos_corrientes_totales_2022 }}">
                            </div>
                        </div>
                        <div class="col-md-12">
                            <label for="currentLiabilities" class="form-label">Pasivos Corrientes</label>
                            <div class="input-group mb-3">
                                <span class="input-group-text">S/.</span>
                                <input readonly type="text" id="pasivos_corrientes_totales_2022" class="form-control"
                                    value="{{ $pasivos_corrientes_totales_2022 }}">
                            </div>
                        </div>
                        <div class="col-md-12">
                            <label for="result" class="form-label">Resultado</label>
                            <div class="input-group mb-3">
                                <span class="input-group-text">S/.</span>
                                <input readonly type="text" id="result_2022" class="form-control"
                                    value="{{ number_format($resultado_2022, 2) }}">
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-9">
            <div class="card shadow">
                <div class="card-header py-3">
                    <p class="text-primary m-0 fw-bold">MEDICIÓN - 2022</p>
                </div>
                <div class="card-body">
                    <div id="chartdiv2022"></div>
                </div>
            </div>
        </div>
        <!-- Capital de Trabajo 2023 -->
        <div class="col-md-3">
            <div class="card shadow">
                <div class="card-header py-3">
                    <p class="text-primary m-0 fw-bold">CAPITAL DE TRABAJO - 2023</p>
                </div>
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-12">
                            <label for="currentAssets" class="form-label">Activos Corrientes</label>
                            <div class="input-group mb-3">
                                <span class="input-group-text">S/.</span>
                                <input readonly type="text" id="activos_corrientes_totales_2023" class="form-control"
                                    value="{{ $activos_corrientes_totales_2023 }}">
                            </div>
                        </div>
                        <div class="col-md-12">
                            <label for="currentLiabilities" class="form-label">Pasivos Corrientes</label>
                            <div class="input-group mb-3">
                                <span class="input-group-text">S/.</span>
                                <input readonly type="text" id="pasivos_corrientes_totales_2023" class="form-control"
                                    value="{{ $pasivos_corrientes_totales_2023 }}">
                            </div>
                        </div>
                        <div class="col-md-12">
                            <label for="result" class="form-label">Resultado</label>
                            <div class="input-group mb-3">
                                <span class="input-group-text">S/.</span>
                                <input readonly type="text" id="result_2023" class="form-control"
                                    value="{{ number_format($resultado_2023, 2) }}">
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-9">
            <div class="card shadow">
                <div class="card-header py-3">
                    <p class="text-primary m-0 fw-bold">MEDICIÓN - 2023</p>
                </div>
                <div class="card-body">
                    <div id="chartdiv2023"></div>
                </div>
            </div>
        </div>
    </div>
@endsection
@push('js')
    <!-- Resources -->
    <script src="https://cdn.amcharts.com/lib/5/index.js"></script>
    <script src="https://cdn.amcharts.com/lib/5/xy.js"></script>
    <script src="https://cdn.amcharts.com/lib/5/themes/Animated.js"></script>

    <!-- Chart code -->
    <script>
        am5.ready(function() {
            // Data for 2022 and 2023
            var data2022 = [{
                    "category": "AC",
                    "value": {{ $activos_corrientes_totales_2022 }}
                },
                {
                    "category": "PC",
                    "value": {{ $pasivos_corrientes_totales_2022 }}
                },
                {
                    "category": "CT",
                    "value": {{ $resultado_2022 }}
                }
            ];

            var data2023 = [{
                    "category": "AC",
                    "value": {{ $activos_corrientes_totales_2023 }}
                },
                {
                    "category": "PC",
                    "value": {{ $pasivos_corrientes_totales_2023 }}
                },
                {
                    "category": "CT",
                    "value": {{ $resultado_2023 }}
                }
            ];

            // Function to create the chart
            function createChart(chartId, data) {
                // Create root element
                var root = am5.Root.new(chartId);

                // Set themes
                root.setThemes([
                    am5themes_Animated.new(root)
                ]);

                // Create chart
                var chart = root.container.children.push(am5xy.XYChart.new(root, {
                    panX: true,
                    panY: true,
                    wheelX: "panX",
                    wheelY: "zoomX",
                    pinchZoomX: true,
                    paddingLeft: 0,
                    paddingRight: 1
                }));

                // Add cursor
                var cursor = chart.set("cursor", am5xy.XYCursor.new(root, {}));
                cursor.lineY.set("visible", false);

                // Create axes
                var xRenderer = am5xy.AxisRendererX.new(root, { 
                    minGridDistance: 30, 
                    minorGridEnabled: true
                });

                xRenderer.labels.template.setAll({
                    rotation: -90,
                    centerY: am5.p50,
                    centerX: am5.p100,
                    paddingRight: 15,
                    fill: am5.color("#00476D"),  // Color de las letras
                    fontWeight: "bold"           // Grosor de las letras
                });

                xRenderer.grid.template.setAll({
                    location: 1,
                    stroke: am5.color("#FFFFFF"),  // Color de las líneas
                    strokeWidth: 2                // Grosor de las líneas
                });

                var xAxis = chart.xAxes.push(am5xy.CategoryAxis.new(root, {
                    maxDeviation: 0.3,
                    categoryField: "category",
                    renderer: xRenderer,
                    tooltip: am5.Tooltip.new(root, {})
                }));

                var yRenderer = am5xy.AxisRendererY.new(root, {
                    strokeOpacity: 1,
                    stroke: am5.color("#FFFFFF"),  // Color de las líneas
                    strokeWidth: 2                // Grosor de las líneas
                });

                yRenderer.grid.template.setAll({
                    stroke: am5.color("#FFFFFF"),  // Color de las líneas horizontales
                    strokeWidth: 2                // Grosor de las líneas horizontales
                });

                yRenderer.labels.template.setAll({
                    fill: am5.color("#00476D"),   // Color de las letras
                    fontWeight: "bold"            // Grosor de las letras
                });

                var yAxis = chart.yAxes.push(am5xy.ValueAxis.new(root, {
                    maxDeviation: 0.3,
                    renderer: yRenderer
                }));

                // Create series
                var series = chart.series.push(am5xy.ColumnSeries.new(root, {
                    name: "Values",
                    xAxis: xAxis,
                    yAxis: yAxis,
                    valueYField: "value",
                    sequencedInterpolation: true,
                    categoryXField: "category",
                    tooltip: am5.Tooltip.new(root, {
                        labelText: "{valueY}"
                    })
                }));

                series.columns.template.setAll({ 
                    cornerRadiusTL: 5, 
                    cornerRadiusTR: 5, 
                    strokeOpacity: 0 
                });

                series.columns.template.adapters.add("fill", function (fill, target) {
                    return chart.get("colors").getIndex(series.columns.indexOf(target));
                });

                series.columns.template.adapters.add("stroke", function (stroke, target) {
                    return chart.get("colors").getIndex(series.columns.indexOf(target));
                });

                // Set data
                xAxis.data.setAll(data);
                series.data.setAll(data);

                // Make stuff animate on load
                series.appear(1000);
                chart.appear(1000, 100);
            }

            // Create charts
            createChart("chartdiv2022", data2022);
            createChart("chartdiv2023", data2023);
        }); // end am5.ready()
    </script>
@endpush
