@extends('layouts.app')
@section('title', 'Resultados')
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
                        <table class="table my-0" id="accounts">
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
                        
                                    $percentage2022 = $detail2022 ? number_format(abs(($detail2022->quantity / 5233845) * 100), 2) : 'N/A';
                                    $percentage2023 = $detail2023 ? number_format(abs(($detail2023->quantity / 5361771) * 100), 2) : 'N/A';
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
        <div class="col-md-12">
            <div class="card shadow">
                <div class="card-header py-3">
                    <p class="text-primary m-0 fw-bold">ANÁLISIS HORIZONTAL</p>
                </div>
                <div class="card-body">
                    <div class="table-responsive table" id="dataTable-2" role="grid" aria-describedby="dataTable_info">
                        <table class="table my-0" id="horizontal">
                            <thead>
                                <tr>
                                    <td rowspan="2" style="width: 50px;text-align: center !important; font-weight:bold">#</td>
                                    <td rowspan="2" style="width: 100px;text-align: center !important; font-weight:bold">Cuenta</td>
                                    <td colspan="4" style="width: 300px;text-align: center !important; font-weight:bold">Absolutos</td>
                                </tr>
                                <tr>
                                    <td style="width: 100px;text-align: center !important; font-weight:bold">2022</td>
                                    <td style="width: 100px;text-align: center !important; font-weight:bold">2023</td>
                                    <td style="width: 100px;text-align: center !important; font-weight:bold">Absolutos</td>
                                    <td style="width: 100px;text-align: center !important; font-weight:bold">Relativos</td>
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
    $('#accounts').DataTable({
        responsive: true,
        autoWidth:false,
        "language": {
            "lengthMenu": "Mostrar "+
                            `<select class="custom-select custom-select-sm w-50 form-select form-select-sm mb-2">
                                <option value="5">5</option>
                                <option value="10">10</option>
                                <option value="15">15</option>
                                <option value="20">20</option>
                            </select>`,
            "zeroRecords": "No se encontró nada - lo siento",
            "info": "Mostrando la página _PAGE_ de _PAGES_ de _TOTAL_ cuentas",
            "infoEmpty": "No hay registros disponibles",
            "infoFiltered": "(filtrado de _MAX_ registros totales)",
            "search": "Buscar:",
            "emptyTable": "No hay datos disponibles en la tabla",
            "paginate":{
                "next":">",
                "previous":"<"
            }
        }
    });
</script>   
<script>
    $('#horizontal').DataTable({
        responsive: true,
        autoWidth:false,
        "language": {
            "lengthMenu": "Mostrar "+
                            `<select class="custom-select custom-select-sm w-50 form-select form-select-sm mb-2">
                                <option value="5">5</option>
                                <option value="10">10</option>
                                <option value="15">15</option>
                                <option value="20">20</option>
                            </select>`,
            "zeroRecords": "No se encontró nada - lo siento",
            "info": "Mostrando la página _PAGE_ de _PAGES_ de _TOTAL_ cuentas",
            "infoEmpty": "No hay registros disponibles",
            "infoFiltered": "(filtrado de _MAX_ registros totales)",
            "search": "Buscar:",
            "emptyTable": "No hay datos disponibles en la tabla",
            "paginate":{
                "next":">",
                "previous":"<"
            }
        }
    });
</script>   
@endpush
