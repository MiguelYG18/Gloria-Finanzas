@extends('layouts.app')
@section('title', 'Crear Cuenta')
    @push('css')
        <!--Alertas-->
        <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>    
        <!-- Latest compiled and minified CSS -->
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-select@1.14.0-beta3/dist/css/bootstrap-select.min.css">                
        <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>   
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
                        <p class="text-primary m-0 fw-bold">Formulario del Detalles de Cuentas</p>
                    </div>
                    <div class="card-body">
                        <div class="col-md-12">
                            @if ($errors->any())
                                <div class="alert alert-danger alert-dismissible fade show" role="alert">
                                    <i class="fa-solid fa-circle-exclamation"></i>
                                    {{ implode(' ', $errors->all()) }}
                                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                                </div>
                            @endif
                        </div>
                        <form action="" method="post">
                            @csrf
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="input-group mb-3">
                                        <label class="input-group-text" for="type">Cuenta</label>
                                        <select title="Seleccion..." data-style="btn-secondary" name="id_account" id="id_account" data-size="5" data-live-search="true" class="form-control selectpicker show-tick">
                                            @foreach ($accounts as $account)
                                                <option value="{{$account->id}}">{{$account->name}}--{{$account->type}}--{{$account->category}}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="input-group mb-3">
                                        <span class="input-group-text" id="inputGroup-sizing-default">Monto</span>
                                        <input type="text" id="quantity" name="quantity" class="form-control" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-default" value="{{old('quantity')}}">
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="input-group mb-3">
                                        <label class="input-group-text" for="category">Año</label>
                                        <select title="Seleccione"  data-style="btn-secondary" id="year" name="year" data-size="2" class="form-control selectpicker show-tick">
                                            <option value="2022">2022</option>
                                            <option value="2023">2023</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-md-12 text-center">
                                    <button class="btn btn-primary btn-sm" type="submit" style="background-color: #00476D !important;">
                                        Guardar
                                    </button>
                                </div> 
                            </div>
                        </form>
                    </div>
                </div>
            </div>        
        </div>  
    @endsection
    @push('js')
        <!-- Latest compiled and minified JavaScript -->
        <script src="https://cdn.jsdelivr.net/npm/bootstrap-select@1.14.0-beta3/dist/js/bootstrap-select.min.js"></script>
    @endpush
