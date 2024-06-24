@extends('layouts.app')
@section('title', 'Cuentas')
    @push('css')
        <!--Alertas-->
        <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
        <!--CSS TABLA-->
        <link rel="stylesheet" href="https://cdn.datatables.net/2.0.3/css/dataTables.bootstrap5.css">
    @endpush
    @section('content')
        @if (session('success'))
            <script>
                let message ="{{session('success')}}";
                const Toast = Swal.mixin({
                    toast: true,
                    position: "top-end",
                    showConfirmButton: false,
                    timer: 3000,
                    timerProgressBar: true,
                    didOpen: (toast) => {
                        toast.onmouseenter = Swal.stopTimer;
                        toast.onmouseleave = Swal.resumeTimer;
                    }
                });
                Toast.fire({
                    icon: "success",
                    title: message
                });
            </script>            
        @endif   
    <div class="row">
        <div class="col-md-12">
            <div class="card shadow">
                <div class="card-header py-3">
                    <p class="text-primary m-0 fw-bold">Lista de Cuentas</p>
                </div>
                <div class="card-body">
                    <div class="table-responsive table" id="dataTable-2" role="grid" aria-describedby="dataTable_info">
                        <table class="table my-0" id="accounts">
                            <thead>
                                <tr>
                                    <th style="width: 20px;text-align: center !important; font-weight:bold">#</th>
                                    <th style="width: 100px;text-align: center !important; font-weight:bold">Cuenta</th>
                                    <th style="width: 100px;text-align: center !important; font-weight:bold">Tipo</th>
                                    <th style="width: 100px;text-align: center !important; font-weight:bold">Categoria</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($accounts as $value=>$account)
                                    <tr>
                                        <td style="text-align: center;">{{$value + 1}}</td>
                                        <td style="text-align: center;">{{$account->name}}</td>
                                        <td style="text-align: center;">{{$account->type}}</td>
                                        <td style="text-align: center;">
                                            {{ $account->category ?? 'N/D' }}
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
    @endpush
