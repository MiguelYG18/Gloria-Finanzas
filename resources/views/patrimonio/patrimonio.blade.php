@extends('layouts.app')
@section('title', 'Patrimonio')
@push('css')
    <!--Alertas-->
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <!--CSS TABLA-->
    <link rel="stylesheet" href="https://cdn.datatables.net/2.0.3/css/dataTables.bootstrap5.css">
@endpush
@section('content')
    <div class="row">
        <div class="col-md-12">
            <div class="card shadow">
                <div class="card-header py-3">
                    <p class="text-primary m-0 fw-bold">ANÁLISIS VERTICAL</p>
                </div>
                <div class="card-body">
                    <div class="table-responsive table" id="dataTable-2" role="grid" aria-describedby="dataTable_info">
                        <table class="table my-0">
                            <thead>
                                <tr>
                                    <td rowspan="2" style="width: 50px;text-align: center !important; font-weight:bold">#</td>
                                    <td rowspan="2" style="width: 100px;text-align: center !important; font-weight:bold">Cuenta</td>
                                    <td colspan="3" style="width: 300px;text-align: center !important; font-weight:bold">2022</td>
                                    <td colspan="3" style="width: 300px;text-align: center !important; font-weight:bold">2023</td>
                                </tr>
                                <tr>
                                    <td style="width: 100px;text-align: center !important; font-weight:bold">Monto</td>
                                    <td style="width: 100px;text-align: center !important; font-weight:bold">AV</td>
                                    <td style="width: 180px;text-align: center !important; font-weight:bold">Gráfico</td>
                                    <td style="width: 100px;text-align: center !important; font-weight:bold">Monto</td>
                                    <td style="width: 100px;text-align: center !important; font-weight:bold">AV</td>
                                    <td style="width: 180px;text-align: center !important; font-weight:bold">Gráfico</td>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($accounts as $value => $account)
                                <tr>
                                    <td style="text-align: center;">{{ $value+1 }}</td>
                                    <td style="text-align: center;">{{ $account->name }}</td>
                                    @php
                                        $detail2022 = $account->details->firstWhere('year', 2022);
                                        $detail2023 = $account->details->firstWhere('year', 2023);
                        
                                        $percentage2022 = $detail2022 ? number_format(($detail2022->quantity / 1577243) * 100, 2) : 'N/A';
                                        $percentage2023 = $detail2023 ? number_format(($detail2023->quantity / 1764572) * 100, 2) : 'N/A';
                                    @endphp
                                    <!--------------------------2022-------------------------------->
                                    <td style="text-align: center;"><strong>S/.</strong> {{ $detail2022 ? $detail2022->quantity : 'N/A' }}</td>
                                    <td class="{{ $percentage2022 > $percentage2023 ? 'text-success' : 'text-danger' }}" style="text-align: center;">
                                        {{ $percentage2022 }} %
                                        @if($percentage2022 > $percentage2023)
                                            <i class="fa-solid fa-arrow-up"></i>
                                        @else
                                            <i class="fa-solid fa-arrow-down"></i>
                                        @endif
                                    </td>
                                    <td style="text-align: center;">
                                        <div class="progress progress-md" style="position: relative;">
                                            <div class="progress-bar bg-primary" role="progressbar" style="width: {{ is_numeric($percentage2022) ? $percentage2022 : 0 }}%; position: relative;" aria-valuenow="{{ is_numeric($percentage2022) ? $percentage2022 : 0 }}" aria-valuemin="0" aria-valuemax="100">
                                            </div>
                                        </div>{{ is_numeric($percentage2022) ? $percentage2022 : 'N/A' }}%
                                    </td>
                                    <!--------------------------2023-------------------------------->
                                    <td style="text-align: center;"><strong>S/.</strong> {{ $detail2023 ? $detail2023->quantity : 'N/A' }}</td>
                                    <td class="{{ $percentage2023 > $percentage2022 ? 'text-success' : 'text-danger' }}" style="text-align: center;">
                                        {{ $percentage2023 }} %
                                        @if($percentage2023 > $percentage2022)
                                            <i class="fa-solid fa-arrow-up"></i>
                                        @else
                                            <i class="fa-solid fa-arrow-down"></i>
                                        @endif
                                    </td>
                                    <td style="text-align: center;">
                                        <div class="progress progress-md" style="position: relative;">
                                            <div class="progress-bar bg-success" role="progressbar" style="width: {{ is_numeric($percentage2023) ? $percentage2023 : 0 }}%; position: relative;" aria-valuenow="{{ is_numeric($percentage2023) ? $percentage2023 : 0 }}" aria-valuemin="0" aria-valuemax="100">
                                            </div>
                                        </div>{{ is_numeric($percentage2023) ? $percentage2023 : 'N/A' }}%
                                    </td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-6">
            <div class="card shadow">
                <div class="card-header py-3">
                    <p class="text-primary m-0 fw-bold">GRÁFICO DE PIE - 2022</p>
                </div>
                <div class="card-body">
                    <canvas id="myPieChart2022" width="100%" height="50"></canvas>
                </div>
            </div>
        </div>
        <div class="col-md-6">
            <div class="card shadow">
                <div class="card-header py-3">
                    <p class="text-primary m-0 fw-bold">GRÁFICO DE PIE - 2023</p>
                </div>
                <div class="card-body">
                    <canvas id="myPieChart2023" width="100%" height="50"></canvas>
                </div>
            </div>
        </div>
        <div class="col-md-12">
            <div class="card shadow">
                <div class="card-header py-3">
                    <p class="text-primary m-0 fw-bold">ANÁLISIS HORIZONTAL</p>
                </div>
                <div class="card-body">
                    <div class="table-responsive table" id="dataTable-2" role="grid" aria-describedby="dataTable_info">
                        <table class="table my-0">
                            <thead>
                                <tr>
                                    <td rowspan="2" style="width: 50px;text-align: center !important; font-weight:bold">#</td>
                                    <td rowspan="2" style="width: 100px;text-align: center !important; font-weight:bold">Cuenta</td>
                                    <td colspan="4" style="width: 300px;text-align: center !important; font-weight:bold">Análisis Horizontal</td>
                                </tr>
                                <tr>
                                    <td style="width: 100px;text-align: center !important; font-weight:bold">2022</td>
                                    <td style="width: 100px;text-align: center !important; font-weight:bold">2023</td>
                                    <td style="width: 100px;text-align: center !important; font-weight:bold">Absoluto</td>
                                    <td style="width: 100px;text-align: center !important; font-weight:bold">Relativo</td>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($accounts as $value => $account)
                                <tr>
                                    <td style="text-align: center;">{{ $value+1 }}</td>
                                    <td style="text-align: center;">{{ $account->name }}</td>
                                    @php
                                        $detail2022 = $account->details->firstWhere('year', 2022);
                                        $detail2023 = $account->details->firstWhere('year', 2023);
                                        $variacionabsoluta=($detail2023->quantity - $detail2022->quantity);
                                        $percentage = $variacionabsoluta ? number_format(($variacionabsoluta / $detail2022->quantity) * 100, 2) : '0.00';
                                    @endphp
                                    <!--------------------------2022-------------------------------->
                                    <td style="text-align: center;"><strong>S/.</strong> {{ $detail2022 ? $detail2022->quantity : 'N/A' }}</td>
                                    <td style="text-align: center;"><strong>S/.</strong> {{ $detail2023 ? $detail2023->quantity : 'N/A' }}</td>
                                    <td class="text-center"><strong>S/.</strong> {{$variacionabsoluta}}</td>
                                    <td class="text-success" style="text-align: center;">
                                        @if ($variacionabsoluta == 0)
                                            <span class="text-primary">{{ $percentage }} % </span>
                                        @elseif ($variacionabsoluta > 0)
                                            <span class="text-success">{{ $percentage }} % <i class="fa-solid fa-arrow-up"></i></span>
                                        @else
                                            <span class="text-danger">{{ $percentage }} % <i class="fa-solid fa-arrow-down"></i></span>
                                        @endif
                                        
                                    </td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
@push('js')
    <script>
        // Pasar los datos desde PHP a JavaScript
        const labels = @json($labels);
        const data2022 = @json($data2022);
        const data2023 = @json($data2023);

        // Totales para 2022 y 2023
        const total2022 = 1577243;
        const total2023 = 1764572;

        // Calcular los porcentajes para 2022 y 2023
        const percentages2022 = data2022.map(value => ((value / total2022) * 100).toFixed(2));
        const percentages2023 = data2023.map(value => ((value / total2023) * 100).toFixed(2));

        // Set new default font family and font color to mimic Bootstrap's default styling
        Chart.defaults.global.defaultFontFamily = '-apple-system,system-ui,BlinkMacSystemFont,"Segoe UI",Roboto,"Helvetica Neue",Arial,sans-serif';
        Chart.defaults.global.defaultFontColor = '#292b2c';

        // Función para generar una paleta de colores automáticamente
        function generateColors(numColors) {
            const colors = [];
            for (let i = 0; i < numColors; i++) {
                const hue = (i * 360) / numColors;
                colors.push(`hsl(${hue}, 50%, 60%)`);
            }
            return colors;
        }

        // Función para crear gráficos de pie
        function createPieChart(ctx, labels, percentages) {
            const colors = generateColors(percentages.length);
            return new Chart(ctx, {
                type: 'pie',
                data: {
                    labels: labels,
                    datasets: [{
                        data: percentages,
                        backgroundColor: colors
                    }],
                },
                options: {
                    legend: {
                        display: true,
                        position: 'bottom',
                        labels: {
                            boxWidth: 20, // Ancho de las cajas de la leyenda
                            padding: 10, // Espaciado entre las cajas de la leyenda
                            usePointStyle: true, // Usa el estilo de punto para las cajas de la leyenda
                            fontColor: '#00476D', // Cambiar el color de las letras de la leyenda
                            fontStyle: 'bold' // Cambiar a negrita
                        }
                    },
                    tooltips: {
                        callbacks: {
                            label: function (tooltipItem, data) {
                                let label = data.labels[tooltipItem.index] || '';
                                if (label) {
                                    label += ': ';
                                }
                                label += parseFloat(data.datasets[tooltipItem.datasetIndex].data[tooltipItem.index]).toFixed(2) + '%';
                                return label;
                            }
                        }
                    }
                }
            });
        }

        // Crear los gráficos de pie
        createPieChart(document.getElementById("myPieChart2022"), labels, percentages2022);
        createPieChart(document.getElementById("myPieChart2023"), labels, percentages2023);
    </script>
@endpush
