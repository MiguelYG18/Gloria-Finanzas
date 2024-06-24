@extends('layouts.app')
@section('title', 'Dashboard')
@push('css')
@endpush
@section('content')
    <div class="row">
        <div class="col-md-12">
            <div class="card shadow">
                <div class="card-header py-3">
                    <p class="text-primary m-0 fw-bold">GRÁFICO DE BARRAS 2022-2023</p>
                </div>
                <div class="card-body">
                    <canvas id="myBarChart" width="100%" height="30"></canvas>
                </div>
            </div>
        </div>
        <div class="col-md-6">
            <div class="card shadow">
                <div class="card-header py-3">
                    <p class="text-primary m-0 fw-bold">GRÁFICO DE ÁREA DE ACTIVOS</p>
                </div>
                <div class="card-body">
                    <canvas id="myAreaChartActivos" width="100%" height="30"></canvas>
                </div>
            </div>
        </div>
        <div class="col-md-6">
            <div class="card shadow">
                <div class="card-header py-3">
                    <p class="text-primary m-0 fw-bold">GRÁFICO DE ÁREA DE PASIVOS</p>
                </div>
                <div class="card-body">
                    <canvas id="myAreaChartPasivos" width="100%" height="30"></canvas>
                </div>
            </div>
        </div>
        <div class="col-md-12">
            <div class="card shadow">
                <div class="card-header py-3">
                    <p class="text-primary m-0 fw-bold">GRÁFICO DE ÁREA DE PATRIMONIO</p>
                </div>
                <div class="card-body">
                    <canvas id="myAreaChartPatrimonio" width="100%" height="30"></canvas>
                </div>
            </div>
        </div>
        <div class="col-md-6">
            <div class="card shadow">
                <div class="card-header py-3">
                    <p class="text-primary m-0 fw-bold">GRÁFICO DE PIE DE ACTIVOS 2022</p>
                </div>
                <div class="card-body">
                    <canvas id="myPieChartActivo2022" width="100%" height="30"></canvas>
                </div>
            </div>
        </div>
        <div class="col-md-6">
            <div class="card shadow">
                <div class="card-header py-3">
                    <p class="text-primary m-0 fw-bold">GRÁFICO DE PIE DE ACTIVOS 2023</p>
                </div>
                <div class="card-body">
                    <canvas id="myPieChartActivo2023" width="100%" height="30"></canvas>
                </div>
            </div>
        </div>
        <div class="col-md-6">
            <div class="card shadow">
                <div class="card-header py-3">
                    <p class="text-primary m-0 fw-bold">GRÁFICO DE PIE DE PASIVOS 2022</p>
                </div>
                <div class="card-body">
                    <canvas id="myPieChartPasivo2022" width="100%" height="30"></canvas>
                </div>
            </div>
        </div>
        <div class="col-md-6">
            <div class="card shadow">
                <div class="card-header py-3">
                    <p class="text-primary m-0 fw-bold">GRÁFICO DE PIE DE PASIVOS 2023</p>
                </div>
                <div class="card-body">
                    <canvas id="myPieChartPasivo2023" width="100%" height="30"></canvas>
                </div>
            </div>
        </div>
    </div>
@endsection
@push('js')
    <script src="https://cdn.jsdelivr.net/npm/chart.js@2.9.4"></script>
    <script src="https://cdn.jsdelivr.net/npm/chartjs-plugin-datalabels@0.7.0"></script>
    <script>
        // Set new default font family and font color to mimic Bootstrap's default styling
        Chart.defaults.global.defaultFontFamily = '-apple-system, system-ui, BlinkMacSystemFont, "Segoe UI", Roboto, "Helvetica Neue", Arial, sans-serif';
        Chart.defaults.global.defaultFontColor = '#00476D';
        Chart.defaults.global.defaultFontSize = 14;
        Chart.defaults.global.defaultFontStyle = 'bold';
    
        // Datos del 2022 y 2023
        var data2022 = [4633530, 3056287, 1577243];
        var data2023 = [4425971, 2661399, 1764572];
    
        // Crear gráfico de barras comparativo
        var ctx = document.getElementById("myBarChart").getContext('2d');
        var myBarChart = new Chart(ctx, {
            type: 'bar',
            data: {
                labels: ["Activos", "Pasivos", "Patrimonio"],
                datasets: [
                    {
                        label: "2022",
                        backgroundColor: "rgba(2,117,216,1)",
                        borderColor: "rgba(2,117,216,1)",
                        data: data2022,
                    },
                    {
                        label: "2023",
                        backgroundColor: "rgba(92,184,92,1)",
                        borderColor: "rgba(92,184,92,1)",
                        data: data2023,
                    }
                ]
            },
            options: {
                scales: {
                    xAxes: [{
                        gridLines: {
                            display: true,
                            color: "rgba(255, 255, 255, 1)",
                            lineWidth: 2
                        },
                        ticks: {
                            maxTicksLimit: 6,
                            fontStyle: 'bold'
                        }
                    }],
                    yAxes: [{
                        ticks: {
                            min: 0,
                            max: 8000000,
                            maxTicksLimit: 5,
                            fontStyle: 'bold'
                        },
                        gridLines: {
                            display: true,
                            color: "rgba(255, 255, 255, 1)",
                            lineWidth: 2
                        }
                    }]
                },
                legend: {
                    display: true,
                    position: 'top',
                }
            }
        });
    
        // Datos del 2022 para Activos
        var dataActivo2022 = [2329582, 2303948];
        var totalActivo2022 = 4633530;
    
        // Datos del 2023 para Activos
        var dataActivo2023 = [1923611, 2502360];
        var totalActivo2023 = 4425971;
    
        // Datos del 2022 para Pasivos
        var dataPasivo2022 = [1494387, 1561900];
        var totalPasivo2022 = 3056287;
    
        // Datos del 2023 para Pasivos
        var dataPasivo2023 = [1374406, 1286993];
        var totalPasivo2023 = 2661399;
    
        // Crear gráfico de Activos 2022
        var ctxActivo2022 = document.getElementById("myPieChartActivo2022").getContext('2d');
        var myPieChartActivo2022 = new Chart(ctxActivo2022, {
            type: 'pie',
            data: {
                labels: ["Activos Corrientes", "Activos No Corrientes"],
                datasets: [{
                    data: dataActivo2022,
                    backgroundColor: ['#007bff', '#ffc107']
                }]
            },
            options: {
                legend: {
                    position: 'right'
                },
                plugins: {
                    datalabels: {
                        formatter: (value, context) => {
                            var percentage = ((value / totalActivo2022) * 100).toFixed(2) + '%';
                            return percentage;
                        },
                        color: '#fff',
                    }
                }
            }
        });
    
        // Crear gráfico de Activos 2023
        var ctxActivo2023 = document.getElementById("myPieChartActivo2023").getContext('2d');
        var myPieChartActivo2023 = new Chart(ctxActivo2023, {
            type: 'pie',
            data: {
                labels: ["Activos Corrientes", "Activos No Corrientes"],
                datasets: [{
                    data: dataActivo2023,
                    backgroundColor: ['#007bff', '#dc3545']
                }]
            },
            options: {
                legend: {
                    position: 'right'
                },
                plugins: {
                    datalabels: {
                        formatter: (value, context) => {
                            var percentage = ((value / totalActivo2023) * 100).toFixed(2) + '%';
                            return percentage;
                        },
                        color: '#fff',
                    }
                }
            }
        });
    
        // Crear gráfico de Pasivos 2022
        var ctxPasivo2022 = document.getElementById("myPieChartPasivo2022").getContext('2d');
        var myPieChartPasivo2022 = new Chart(ctxPasivo2022, {
            type: 'pie',
            data: {
                labels: ["Pasivos Corrientes", "Pasivos No Corrientes"],
                datasets: [{
                    data: dataPasivo2022,
                    backgroundColor: ['#ffc107', '#28a745']
                }]
            },
            options: {
                legend: {
                    position: 'right'
                },
                plugins: {
                    datalabels: {
                        formatter: (value, context) => {
                            var percentage = ((value / totalPasivo2022) * 100).toFixed(2) + '%';
                            return percentage;
                        },
                        color: '#fff',
                    }
                }
            }
        });
    
        // Crear gráfico de Pasivos 2023
        var ctxPasivo2023 = document.getElementById("myPieChartPasivo2023").getContext('2d');
        var myPieChartPasivo2023 = new Chart(ctxPasivo2023, {
            type: 'pie',
            data: {
                labels: ["Pasivos Corrientes", "Pasivos No Corrientes"],
                datasets: [{
                    data: dataPasivo2023,
                    backgroundColor: ['#6f42c1', '#28a745']
                }]
            },
            options: {
                legend: {
                    position: 'right'
                },
                plugins: {
                    datalabels: {
                        formatter: (value, context) => {
                            var percentage = ((value / totalPasivo2023) * 100).toFixed(2) + '%';
                            return percentage;
                        },
                        color: '#fff',
                    }
                }
            }
        });
    
        // Crear gráfico de área para Activos
        var ctxactivos = document.getElementById("myAreaChartActivos").getContext('2d');
        var myAreaChartActivos = new Chart(ctxactivos, {
            type: 'line',
            data: {
                labels: ["2020", "2021", "2022", "2023"],
                datasets: [{
                    label: "Activos",
                    lineTension: 0.3,
                    backgroundColor: "rgba(2,117,216,0.2)",
                    borderColor: "rgba(2,117,216,1)",
                    pointRadius: 5,
                    pointBackgroundColor: "rgba(2,117,216,1)",
                    pointBorderColor: "rgba(255,255,255,0.8)",
                    pointHoverRadius: 5,
                    pointHoverBackgroundColor: "rgba(2,117,216,1)",
                    pointHitRadius: 50,
                    pointBorderWidth: 2,
                    data: [3920321, 4324577, 4633530, 4425971],
                }],
            },
            options: {
                scales: {
                    xAxes: [{
                        time: {
                            unit: 'date'
                        },
                        gridLines: {
                            display: true,
                            color: "rgba(255, 255, 255, 1)",
                            lineWidth: 2
                        },
                        ticks: {
                            maxTicksLimit: 7
                        }
                    }],
                    yAxes: [{
                        ticks: {
                            min: 0,
                            max: 6000000,
                            maxTicksLimit: 5
                        },
                        gridLines: {
                            color: "rgba(255, 255, 255, 1)",
                            lineWidth: 2
                        }
                    }],
                },
                legend: {
                    display: false
                },
                plugins: {
                    datalabels: {
                        display: false // Desactiva las etiquetas de datos solo para el gráfico de área
                    }
                }
            }
        });
    
        // Crear gráfico de área para Pasivos
        var ctxpasivos = document.getElementById("myAreaChartPasivos").getContext('2d');
        var myAreaChartPasivos = new Chart(ctxpasivos, {
            type: 'line',
            data: {
                labels: ["2020", "2021", "2022", "2023"],
                datasets: [{
                    label: "Pasivos",
                    lineTension: 0.3,
                    backgroundColor: "rgba(2,117,216,0.2)",
                    borderColor: "rgba(2,117,216,1)",
                    pointRadius: 5,
                    pointBackgroundColor: "rgba(2,117,216,1)",
                    pointBorderColor: "rgba(255,255,255,0.8)",
                    pointHoverRadius: 5,
                    pointHoverBackgroundColor: "rgba(2,117,216,1)",
                    pointHitRadius: 50,
                    pointBorderWidth: 2,
                    data: [2001194, 2958915, 3056287, 2661399],
                }],
            },
            options: {
                scales: {
                    xAxes: [{
                        time: {
                            unit: 'date'
                        },
                        gridLines: {
                            display: true,
                            color: "rgba(255, 255, 255, 1)",
                            lineWidth: 2
                        },
                        ticks: {
                            maxTicksLimit: 7
                        }
                    }],
                    yAxes: [{
                        ticks: {
                            min: 0,
                            max: 4000000,
                            maxTicksLimit: 5
                        },
                        gridLines: {
                            color: "rgba(255, 255, 255, 1)",
                            lineWidth: 2
                        }
                    }],
                },
                legend: {
                    display: false
                },
                plugins: {
                    datalabels: {
                        display: false // Desactiva las etiquetas de datos solo para el gráfico de área
                    }
                }
            }
        });
    
        // Crear gráfico de área para Patrimonio
        var ctxpatrimonio = document.getElementById("myAreaChartPatrimonio").getContext('2d');
        var myAreaChartPatrimonio = new Chart(ctxpatrimonio, {
            type: 'line',
            data: {
                labels: ["2020", "2021", "2022", "2023"],
                datasets: [{
                    label: "Patrimonio",
                    lineTension: 0.3,
                    backgroundColor: "rgba(2,117,216,0.2)",
                    borderColor: "rgba(2,117,216,1)",
                    pointRadius: 5,
                    pointBackgroundColor: "rgba(2,117,216,1)",
                    pointBorderColor: "rgba(255,255,255,0.8)",
                    pointHoverRadius: 5,
                    pointHoverBackgroundColor: "rgba(2,117,216,1)",
                    pointHitRadius: 50,
                    pointBorderWidth: 2,
                    data: [1919127, 1365662, 1577243, 1764572],
                }],
            },
            options: {
                scales: {
                    xAxes: [{
                        time: {
                            unit: 'date'
                        },
                        gridLines: {
                            display: true,
                            color: "rgba(255, 255, 255, 1)",
                            lineWidth: 2
                        },
                        ticks: {
                            maxTicksLimit: 7
                        }
                    }],
                    yAxes: [{
                        ticks: {
                            min: 0,
                            max: 3000000,
                            maxTicksLimit: 5
                        },
                        gridLines: {
                            color: "rgba(255, 255, 255, 1)",
                            lineWidth: 2
                        }
                    }],
                },
                legend: {
                    display: false
                },
                plugins: {
                    datalabels: {
                        display: false // Desactiva las etiquetas de datos solo para el gráfico de área
                    }
                }
            }
        });
    </script>
@endpush
