@extends('layouts.app')
@section('title', 'Cuentas por Cobrar')
@push('css')
    <style>
        #chartdiv2022, #chartdiv2023 {
            width: 100%;
            height: 250px;
        }
    </style>
@endpush
@section('content')
    @php
        //Total de Comerciales
        $comerciales_2022 = ($comerciales->where('year', 2022)->first()->quantity ?? 0);
        $comerciales_2023 = ($comerciales->where('year', 2023)->first()->quantity ?? 0);
        //Total de Entidades
        $entidades_2022 = ($entidades->where('year', 2022)->first()->quantity ?? 0);
        $entidades_2023 = ($entidades->where('year', 2023)->first()->quantity ?? 0);
        //Total de Otras
        $otras_2022 = ($otras->where('year', 2022)->first()->quantity ?? 0);
        $otras_2023 = ($otras->where('year', 2023)->first()->quantity ?? 0);
        //Total de Pasivos
        $ventas_2022 = ($ventas->where('year', 2022)->first()->quantity ?? 0);
        $ventas_2023 = ($ventas->where('year', 2023)->first()->quantity ?? 0);
        //Cálculo del resultado
        $resultado_2022 =  $ventas_2022/($comerciales_2022 + $entidades_2022 + $otras_2022);
        $resultado_2023 =  $ventas_2023/($comerciales_2023 + $entidades_2023 + $otras_2023);
    @endphp
    <div class="row">
        <div class="col-md-12">
            <div class="card shadow">
                <div class="card-header py-3">
                    <p class="text-primary m-0 fw-bold">Cuentas por Cobrar Comerciales y Otras Cuentas por Cobrar - 2022</p>
                </div>
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-4">
                            <label for="utilidad_bruta_2022" class="form-label">C. por Cobrar Comerciales</label>
                            <div class="input-group mb-3">
                                <span class="input-group-text">S/.</span>
                                <input readonly type="text" class="form-control" value="{{$comerciales_2022}}">
                            </div>
                        </div>
                        <div class="col-md-4">
                            <label for="utilidad_bruta_2022" class="form-label">C. por Cobrar a Entidades Relacionadas</label>
                            <div class="input-group mb-3">
                                <span class="input-group-text">S/.</span>
                                <input readonly type="text" class="form-control" value="{{$entidades_2022}}">
                            </div>
                        </div>
                        <div class="col-md-4">
                            <label for="utilidad_bruta_2022" class="form-label">Otras Cuentas por Cobrar</label>
                            <div class="input-group mb-3">
                                <span class="input-group-text">S/.</span>
                                <input readonly type="text" class="form-control" value="{{$otras_2022}}">
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div> 
        <div class="col-md-4">
            <div class="card shadow">
                <div class="card-header py-3">
                    <p class="text-primary m-0 fw-bold">R. Cuentas por Cobrar - 2022</p>
                </div>
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-12">
                            <label for="cuentas_totales_2022" class="form-label">Total de Cuentas</label>
                            <div class="input-group mb-3">
                                <span class="input-group-text">S/.</span>
                                <input readonly type="text" id="cuentas_totales_2022" class="form-control" value="{{$comerciales_2022 + $entidades_2022 + $otras_2022}}">
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
                                <span class="input-group-text"><i class="fa-solid fa-calendar text-info"></i></span>
                                <input type="text" class="form-control" value="{{number_format($resultado_2022,2)}}">
                                <span class="input-group-text"><i class="fa-regular fa-calendar-days text-success"></i></span>
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
                                Cantidad de veces que se recupera el dinero prestado <strong>{{number_format($resultado_2022,2)}}</strong> al año.
                            </p>
                        </div>
                    </div>
                </div>
                <div class="col-md-12">
                    <div class="card text-bg-secondary mb-3" style="max-width: 18rem;">
                        <div class="card-header">Rotación por Días</div>
                        <div class="card-body">
                            <p class="card-text">La recuperacion de dinero es en <strong>{{number_format(365/$resultado_2022,2)}}</strong> dias.</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>  
        <!-------------------------------------2023----------------------------------->
        <div class="col-md-12">
            <div class="card shadow">
                <div class="card-header py-3">
                    <p class="text-primary m-0 fw-bold">Cuentas por Cobrar Comerciales y Otras Cuentas por Cobrar - 2023</p>
                </div>
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-4">
                            <label class="form-label">C. por Cobrar Comerciales</label>
                            <div class="input-group mb-3">
                                <span class="input-group-text">S/.</span>
                                <input readonly type="text" class="form-control" value="{{$comerciales_2023}}">
                            </div>
                        </div>
                        <div class="col-md-4">
                            <label class="form-label">C. por Cobrar a Entidades Relacionadas</label>
                            <div class="input-group mb-3">
                                <span class="input-group-text">S/.</span>
                                <input readonly type="text" class="form-control" value="{{$entidades_2023}}">
                            </div>
                        </div>
                        <div class="col-md-4">
                            <label class="form-label">Otras Cuentas por Cobrar</label>
                            <div class="input-group mb-3">
                                <span class="input-group-text">S/.</span>
                                <input readonly type="text" class="form-control" value="{{$otras_2023}}">
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div> 
        <div class="col-md-4">
            <div class="card shadow">
                <div class="card-header py-3">
                    <p class="text-primary m-0 fw-bold">R. Cuentas por Cobrar - 2023</p>
                </div>
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-12">
                            <label for="cuentas_totales_2023" class="form-label">Total de Cuentas</label>
                            <div class="input-group mb-3">
                                <span class="input-group-text">S/.</span>
                                <input readonly type="text" id="cuentas_totales_2023" class="form-control" value="{{$comerciales_2023 + $entidades_2023 + $otras_2023}}">
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
                                <span class="input-group-text"><i class="fa-solid fa-calendar text-info"></i></span>
                                <input type="text" class="form-control" value="{{number_format($resultado_2023,2)}}">
                                <span class="input-group-text"><i class="fa-regular fa-calendar-days text-success"></i></span>
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
                                Cantidad de veces que se recupera el dinero prestado <strong>{{number_format($resultado_2023,2)}}</strong> al año.
                            </p>
                        </div>
                    </div>
                </div>
                <div class="col-md-12">
                    <div class="card text-bg-secondary mb-3" style="max-width: 18rem;">
                        <div class="card-header">Rotación por Días</div>
                        <div class="card-body">
                            <p class="card-text">La recuperacion de dinero es en <strong>{{number_format(365/$resultado_2023,2)}}</strong> dias.</p>
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
                    max: 200, // Adjusted max value to 200
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
                    var text = value.toFixed(2); // Showing value with three decimal places
                    var fill = am5.color(0x000000);

                    xAxis.axisRanges.each(function (axisRange) {
                        if (value >= axisRange.get("value") && value <= axisRange.get("endValue")) {
                            fill = axisRange.get("axisFill").get("fill");
                        }
                    });

                    label.set("text", text); // Set text with three decimal places
                    clockHand.pin.animate({ key: "fill", to: fill, duration: 500, easing: am5.ease.out(am5.ease.cubic) });
                    clockHand.hand.animate({ key: "fill", to: fill, duration: 500, easing: am5.ease.out(am5.ease.cubic) });
                });

                // Create axis ranges bands
                var bandsData = [{
                    title: "Bajo",
                    color: "#ee1f25",
                    lowScore: 0,
                    highScore: 50
                }, {
                    title: "Medio",
                    color: "#fdae19",
                    lowScore: 51,
                    highScore: 100
                }, {
                    title: "Alto",
                    color: "#54b947",
                    lowScore: 101,
                    highScore: 150
                }, {
                    title: "Super Alto",
                    color: "#008000",
                    lowScore: 151,
                    highScore: 200
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
                var cuentas_totales_2022 = parseFloat(document.getElementById("cuentas_totales_2022").value) || 0;
                var ventas_2022 = parseFloat(document.getElementById("ventas_2022").value) || 0;
                var result2022 = 365/( ventas_2022 / cuentas_totales_2022); // Assuming you want to scale the result
                document.getElementById("result_2022").value = result2022.toFixed(2); // Showing result with three decimal places

                var cuentas_totales_2023 = parseFloat(document.getElementById("cuentas_totales_2023").value) || 0;
                var ventas_2023 = parseFloat(document.getElementById("ventas_2023").value) || 0;
                var result2023 = 365/( ventas_2023 / cuentas_totales_2023); // Assuming you want to scale the result
                document.getElementById("result_2023").value = result2023.toFixed(2); // Showing result with three decimal places

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
