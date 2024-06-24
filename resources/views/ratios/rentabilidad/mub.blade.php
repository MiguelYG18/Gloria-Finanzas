@extends('layouts.app')
@section('title', 'MUB')
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
        <div class="col-md-4">
            <div class="card shadow">
                <div class="card-header py-3">
                    <p class="text-primary m-0 fw-bold">MUB - 2022</p>
                </div>
                <div class="card-body">
                    @php
                        //Total de Activos
                        $utilidad_bruta_2022 = ($utilidad_bruta->where('year', 2022)->first()->quantity ?? 0);
                        $utilidad_bruta_2023 = ($utilidad_bruta->where('year', 2023)->first()->quantity ?? 0);
                        //Total de Pasivos
                        $ventas_2022 = ($ventas->where('year', 2022)->first()->quantity ?? 0);
                        $ventas_2023 = ($ventas->where('year', 2023)->first()->quantity ?? 0);
                        // Cálculo del resultado
                        $resultado_2022 =  $utilidad_bruta_2022 / $ventas_2022;
                        $resultado_2023 =  $utilidad_bruta_2023 / $ventas_2023;
                    @endphp
                    <div class="row">
                        <div class="col-md-12">
                            <label for="utilidad_bruta_2022" class="form-label">Utilidad Bruta</label>
                            <div class="input-group mb-3">
                                <span class="input-group-text">S/.</span>
                                <input readonly type="text" id="utilidad_bruta_2022" class="form-control" value="{{$utilidad_bruta_2022}}">
                            </div>
                        </div>
                        <div class="col-md-12">
                            <label for="ventas_2022" class="form-label">Ventas</label>
                            <div class="input-group mb-3">
                                <span class="input-group-text">S/.</span>
                                <input readonly type="text" id="ventas_2022" class="form-control" value="{{$ventas_2022}}">
                            </div>
                        </div>
                        <div class="col-md-12">
                            <label for="result2022" class="form-label">Resultado</label>
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
        <div class="col-md-3">
            <div class="row">
                <div class="col-md-12">
                    <div class="card text-bg-secondary mb-3" style="max-width: 18rem;">
                        <div class="card-header">INTERPRETACIÓN</div>
                        <div class="card-body">
                          <p class="card-text">
                            Significa que por cada sol vendido se genera <strong>S/.{{number_format($resultado_2022,2)}}</strong> disponible para cubrir los gastos de operación o del total de las ventas se genera <strong>{{number_format($resultado_2022 * 100,2)}}%</strong> para cubrir los gastos de la empresa.
                          </p>
                        </div>
                    </div>
                </div>
                <div class="col-md-12">
                    <div class="card text-bg-secondary mb-3" style="max-width: 18rem;">
                        <div class="card-header">PORCENTAJE</div>
                        <div class="card-body text-center">
                          <p class="card-text">{{number_format($resultado_2022 * 100,2)}}%</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>  
        <div class="col-md-4">
            <div class="card shadow">
                <div class="card-header py-3">
                    <p class="text-primary m-0 fw-bold">MUB - 2023</p>
                </div>
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-12">
                            <label for="utilidad_bruta_2023" class="form-label">Utilidad Bruta</label>
                            <div class="input-group mb-3">
                                <span class="input-group-text">S/.</span>
                                <input readonly type="text" id="utilidad_bruta_2023" class="form-control" value="{{$utilidad_bruta_2023}}">
                            </div>
                        </div>
                        <div class="col-md-12">
                            <label for="ventas_2023" class="form-label">Ventas</label>
                            <div class="input-group mb-3">
                                <span class="input-group-text">S/.</span>
                                <input readonly type="text" id="ventas_2023" class="form-control" value="{{$ventas_2023}}">
                            </div>
                        </div>
                        <div class="col-md-12">
                            <label for="result2023" class="form-label">Resultado</label>
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
        <div class="col-md-3">
            <div class="row">
                <div class="col-md-12">
                    <div class="card text-bg-secondary mb-3" style="max-width: 18rem;">
                        <div class="card-header">INTERPRETACIÓN</div>
                        <div class="card-body">
                          <p class="card-text">
                            Significa que por cada sol vendido se genera <strong>S/.{{number_format($resultado_2023,2)}}</strong> disponible para cubrir los gastos de operación o del total de las ventas se genera <strong>{{number_format($resultado_2023 * 100,2)}}%</strong> para cubrir los gastos de la empresa.                          </p>
                        </div>
                    </div>
                </div>
                <div class="col-md-12">
                    <div class="card text-bg-secondary mb-3" style="max-width: 18rem;">
                        <div class="card-header">PORCENTAJE</div>
                        <div class="card-body text-center">
                          <p class="card-text">{{number_format($resultado_2023 * 100,2)}}%</p>
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
                var utilidad_bruta_2022 = parseFloat(document.getElementById("utilidad_bruta_2022").value) || 0;
                var ventas_2022 = parseFloat(document.getElementById("ventas_2022").value) || 0;
                var result2022 = (utilidad_bruta_2022 / ventas_2022);
                document.getElementById("result_2022").value = result2022.toFixed(3); // Showing result with two decimal places

                var utilidad_bruta_2023 = parseFloat(document.getElementById("utilidad_bruta_2023").value) || 0;
                var ventas_2023 = parseFloat(document.getElementById("ventas_2023").value) || 0;
                var result2023 = (utilidad_bruta_2023 / ventas_2023);
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
