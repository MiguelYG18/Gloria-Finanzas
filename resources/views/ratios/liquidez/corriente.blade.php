@extends('layouts.app')
@section('title', 'Liquidez-Corriente')
@push('css')
    <style>
        #chartdiv2022, #chartdiv2023 {
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
                    <p class="text-primary m-0 fw-bold">CORRIENTE - 2022</p>
                </div>
                <div class="card-body">
                    @php
                        //Total de Activos
                        $activos_corrientes_totales_2022 = ($activos_corrientes->where('year', 2022)->first()->total_quantity ?? 0) + 1882;
                        $activos_corrientes_totales_2023 = ($activos_corrientes->where('year', 2023)->first()->total_quantity ?? 0) + 30;
                        //Total de Pasivos
                        $pasivos_corrientes_totales_2022 = ($pasivos_corrientes->where('year', 2022)->first()->total_quantity ?? 0) + 6873;
                        $pasivos_corrientes_totales_2023 = ($pasivos_corrientes->where('year', 2023)->first()->total_quantity ?? 0) + 19;
                        // Cálculo del resultado
                        $resultado_2022 = $activos_corrientes_totales_2022 / $pasivos_corrientes_totales_2022;
                        $resultado_2023 = $activos_corrientes_totales_2023 / $pasivos_corrientes_totales_2023;
                    @endphp
                    <div class="row">
                        <div class="col-md-12">
                            <label for="currentAssets" class="form-label">Activos Corrientes</label>
                            <div class="input-group mb-3">
                                <span class="input-group-text">S/.</span>
                                <input readonly type="text" id="activos_corrientes_totales_2022" class="form-control" value="{{$activos_corrientes_totales_2022}}">
                            </div>
                        </div>
                        <div class="col-md-12">
                            <label for="currentLiabilities" class="form-label">Pasivos Corrientes</label>
                            <div class="input-group mb-3">
                                <span class="input-group-text">S/.</span>
                                <input readonly type="text" id="pasivos_corrientes_totales_2022" class="form-control" value="{{$pasivos_corrientes_totales_2022}}">
                            </div>
                        </div>
                        <div class="col-md-12">
                            <label for="result" class="form-label">Resultado</label>
                            <div class="input-group mb-3">
                                <span class="input-group-text">S/.</span>
                                <input readonly type="text" id="result_2022" class="form-control">
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div> 
        <div class="col-md-5">
            <div class="card shadow">
                <div class="card-header py-3">
                    <p class="text-primary m-0 fw-bold">MEDICIÓN - 2022</p>
                </div>
                <div class="card-body">
                    <div id="chartdiv2022"></div>
                </div>
            </div>
        </div>
        <div class="col-md-4">
            <div class="row">
                <div class="col-md-12">
                    <div class="card mb-3
                        @if($resultado_2022 > 0 && $resultado_2022 < 0.5)
                            text-bg-danger
                        @elseif($resultado_2022 >= 0.5 && $resultado_2022 < 1.0)
                            text-bg-warning
                        @elseif($resultado_2022 >= 1.0 && $resultado_2022 < 2.0)
                            text-bg-success
                        @elseif($resultado_2022 >= 2.0)
                            text-bg-info
                        @endif">
                        <div class="card-header">INTERPRETACIÓN</div>
                        <div class="card-body">
                          <p class="card-text">
                            Por cada nuevo sol de deuda a corto plazo que tiene cuenta con <strong>S/. {{ number_format($resultado_2022, 2) }}</strong> en efectivo para hacerle frente.
                          </p>
                        </div>
                    </div>
                </div>
                <div class="col-md-12">
                    <div class="col-md-12">
                        <div class="card {{ $resultado_2022 > 2 ? 'text-bg-danger' : 'text-bg-success' }} mb-3">
                            <div class="card-header">INTERPRETACIÓN</div>
                            <div class="card-body">
                                @if ($resultado_2022 > 2)
                                    @php
                                        $activo_ocioso_2022=$resultado_2022-2;
                                    @endphp
                                    <p class="card-text">
                                        La empresa pierde rentabilidad al mantener <strong>S/. {{ number_format($activo_ocioso_2022, 2) }}</strong> de activo ocioso por cada nuevo sol de deuda.
                                    </p>
                                @else
                                    <p class="card-text"><strong>La empresa no tiene activos ociosos.</strong></p>
                                @endif
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div> 
        <div class="col-md-3">
            <div class="card shadow">
                <div class="card-header py-3">
                    <p class="text-primary m-0 fw-bold">CORRIENTE - 2023</p>
                </div>
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-12">
                            <label for="currentAssets" class="form-label">Activos Corrientes</label>
                            <div class="input-group mb-3">
                                <span class="input-group-text">S/.</span>
                                <input readonly type="text" id="activos_corrientes_totales_2023" class="form-control" value="{{$activos_corrientes_totales_2023}}">
                            </div>
                        </div>
                        <div class="col-md-12">
                            <label for="currentLiabilities" class="form-label">Pasivos Corrientes</label>
                            <div class="input-group mb-3">
                                <span class="input-group-text">S/.</span>
                                <input readonly type="text" id="pasivos_corrientes_totales_2023" class="form-control" value="{{$pasivos_corrientes_totales_2023}}">
                            </div>
                        </div>
                        <div class="col-md-12">
                            <label for="result" class="form-label">Resultado</label>
                            <div class="input-group mb-3">
                                <span class="input-group-text">S/.</span>
                                <input readonly type="text" id="result_2023" class="form-control">
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div> 
        <div class="col-md-5">
            <div class="card shadow">
                <div class="card-header py-3">
                    <p class="text-primary m-0 fw-bold">MEDICIÓN - 2023</p>
                </div>
                <div class="card-body">
                    <div id="chartdiv2023"></div>
                </div>
            </div>
        </div>
        <div class="col-md-4">
            <div class="row">
                <div class="col-md-12">
                    <div class="card mb-3
                        @if($resultado_2023 > 0 && $resultado_2023 < 0.5)
                            text-bg-danger
                        @elseif($resultado_2023 >= 0.5 && $resultado_2023 < 1.0)
                            text-bg-warning
                        @elseif($resultado_2023 >= 1.0 && $resultado_2023 < 2.0)
                            text-bg-success
                        @elseif($resultado_2023 >= 2.0)
                            text-bg-info
                        @endif">
                        <div class="card-header">INTERPRETACIÓN</div>
                        <div class="card-body">
                          <p class="card-text">
                            Por cada nuevo sol de deuda a corto plazo que tiene cuenta con <strong>S/. {{ number_format($resultado_2023, 2) }}</strong> en efectivo para hacerle frente.
                          </p>
                        </div>
                    </div>
                </div>
                <div class="col-md-12">
                    <div class="col-md-12">
                        <div class="card {{ $resultado_2023 > 2 ? 'text-bg-danger' : 'text-bg-success' }} mb-3">
                            <div class="card-header">INTERPRETACIÓN</div>
                            <div class="card-body">
                                @if ($resultado_2023 > 2)
                                    @php
                                        $activo_ocioso_2032=$resultado_2023-2;
                                    @endphp
                                    <p class="card-text">
                                        La empresa pierde rentabilidad al mantener <strong>S/. {{ number_format($activo_ocioso_2023, 2) }}</strong> de activo ocioso por cada nuevo sol de deuda.
                                    </p>
                                @else
                                    <p class="card-text"><strong>La empresa no tiene activos ociosos.</strong></p>
                                @endif
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div> 
    </div>
@endsection
@push('js')
<!-- Resources -->
<script src="https://cdn.amcharts.com/lib/5/index.js"></script>
<script src="https://cdn.amcharts.com/lib/5/xy.js"></script>
<script src="https://cdn.amcharts.com/lib/5/radar.js"></script>
<script src="https://cdn.amcharts.com/lib/5/themes/Animated.js"></script>
<!-- Chart code -->
<script>
    am5.ready(function() {
        // Create root elements
        var root2022 = am5.Root.new("chartdiv2022");
        var root2023 = am5.Root.new("chartdiv2023");

        // Set themes
        root2022.setThemes([ am5themes_Animated.new(root2022) ]);
        root2023.setThemes([ am5themes_Animated.new(root2023) ]);

        // Function to create chart
        function createChart(root) {
            // Create chart
            var chart = root.container.children.push(am5radar.RadarChart.new(root, {
                panX: false,
                panY: false,
                startAngle: 160,
                endAngle: 380
            }));

            // Create axis and its renderer
            var axisRenderer = am5radar.AxisRendererCircular.new(root, {
                innerRadius: -40
            });
            axisRenderer.grid.template.setAll({
                stroke: root.interfaceColors.get("background"),
                visible: true,
                strokeOpacity: 0.8
            });
            // Configurar el color de los números del eje
            axisRenderer.labels.template.setAll({
                fill: am5.color(0x00476D), // Color de los números
                fontWeight: "bold" // Negrita
            });
            var xAxis = chart.xAxes.push(am5xy.ValueAxis.new(root, {
                maxDeviation: 0,
                min: 0,
                max: 2.0,
                strictMinMax: true,
                renderer: axisRenderer
            }));

            // Add clock hand
            var axisDataItem = xAxis.makeDataItem({});
            var clockHand = am5radar.ClockHand.new(root, {
                pinRadius: am5.percent(20),
                radius: am5.percent(100),
                bottomWidth: 40
            });

            var bullet = axisDataItem.set("bullet", am5xy.AxisBullet.new(root, {
                sprite: clockHand
            }));

            xAxis.createAxisRange(axisDataItem);

            var label = chart.radarContainer.children.push(am5.Label.new(root, {
                fill: am5.color(0xffffff),
                centerX: am5.percent(50),
                textAlign: "center",
                centerY: am5.percent(50),
                fontSize: "1.2em"
            }));

            axisDataItem.set("value", 0); // initial value

            bullet.get("sprite").on("rotation", function () {
                var value = axisDataItem.get("value");
                var text = value.toFixed(3); // Showing value with two decimal places
                var fill = am5.color(0x000000);

                xAxis.axisRanges.each(function (axisRange) {
                    if (value >= axisRange.get("value") && value <= axisRange.get("endValue")) {
                        fill = axisRange.get("axisFill").get("fill");
                    }
                });

                label.set("text", text); // Set text with two decimal places
                clockHand.pin.animate({ key: "fill", to: fill, duration: 500, easing: am5.ease.out(am5.ease.cubic) });
                clockHand.hand.animate({ key: "fill", to: fill, duration: 500, easing: am5.ease.out(am5.ease.cubic) });
            });

            // Create axis ranges bands
            var bandsData = [{
                title: "Bajo",
                color: "#ee1f25",
                lowScore: 0,
                highScore: 0.5
            }, {
                title: "Medio",
                color: "#fdae19",
                lowScore: 0.51,
                highScore: 1.0
            }, {
                title: "Alto",
                color: "#54b947",
                lowScore: 1.01,
                highScore: 1.5
            }, {
                title: "Super Alto",
                color: "#008000",
                lowScore: 1.51,
                highScore: 2.0
            }];

            am5.array.each(bandsData, function (data) {
                var axisRange = xAxis.createAxisRange(xAxis.makeDataItem({}));
                axisRange.setAll({
                    value: data.lowScore,
                    endValue: data.highScore
                });
                axisRange.get("axisFill").setAll({
                    visible: true,
                    fill: am5.color(data.color),
                    fillOpacity: 0.8
                });
                axisRange.get("label").setAll({
                    text: data.title,
                    inside: true,
                    radius: 15,
                    fontSize: "0.9em",
                    fill: root.interfaceColors.get("background")
                });
            });

            // Make stuff animate on load
            chart.appear(1000, 200);

            return { chart, axisDataItem };
        }

        // Create both charts
        var chart2022 = createChart(root2022);
        var chart2023 = createChart(root2023);

        // Perform calculations and update charts
        function updateCharts() {
            var activos_corrientes_totales_2022 = parseFloat(document.getElementById("activos_corrientes_totales_2022").value) || 0;
            var pasivos_corrientes_totales_2022 = parseFloat(document.getElementById("pasivos_corrientes_totales_2022").value) || 0;
            var result2022 = (activos_corrientes_totales_2022 / pasivos_corrientes_totales_2022);
            document.getElementById("result_2022").value = result2022.toFixed(3); // Showing result with two decimal places

            var activos_corrientes_totales_2023 = parseFloat(document.getElementById("activos_corrientes_totales_2023").value) || 0;
            var pasivos_corrientes_totales_2023 = parseFloat(document.getElementById("pasivos_corrientes_totales_2023").value) || 0;
            var result2023 = (activos_corrientes_totales_2023 / pasivos_corrientes_totales_2023);
            document.getElementById("result_2023").value = result2023.toFixed(3); // Showing result with two decimal places

            // Update charts
            chart2022.axisDataItem.animate({
                key: "value",
                to: result2022,
                duration: 500,
                easing: am5.ease.out(am5.ease.cubic)
            });

            chart2023.axisDataItem.animate({
                key: "value",
                to: result2023,
                duration: 500,
                easing: am5.ease.out(am5.ease.cubic)
            });
        }
        // Call updateCharts after a short delay to ensure the charts are ready
        setTimeout(updateCharts, 500);
    }); // end am5.ready()
</script>
@endpush
