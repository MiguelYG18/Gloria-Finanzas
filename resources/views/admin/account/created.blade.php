@extends('layouts.app')
@section('title', 'Crear Cuenta')
    @push('css')
        <!-- Latest compiled and minified CSS -->
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-select@1.14.0-beta3/dist/css/bootstrap-select.min.css">                
        <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>   
    @endpush
    @section('content')  
        <div class="row">
            <div class="col-md-12">
                <div class="card shadow">
                    <div class="card-header py-3">
                        <p class="text-primary m-0 fw-bold">Formulario de la Cuenta</p>
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
                                        <span class="input-group-text" id="inputGroup-sizing-default">Nombre</span>
                                        <input type="text" id="name" name="name" class="form-control" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-default" value="{{old('name')}}">
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="input-group mb-3">
                                        <label class="input-group-text" for="type">Tipo</label>
                                        <select title="Seleccion..." data-style="btn-secondary" name="type" id="type" data-size="3" class="form-control selectpicker show-tick">
                                            <option value="Activo">Activo</option>
                                            <option value="Pasivo">Pasivo</option>
                                            <option value="Patrimonio">Patrimonio</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="input-group mb-3">
                                        <label class="input-group-text" for="category">Categoría</label>
                                        <select title="Seleccione"  data-style="btn-secondary" id="category" name="category" data-size="2" class="form-control selectpicker show-tick">
                                            <option value="Corriente">Corriente</option>
                                            <option value="No Corriente">No Corriente</option>
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
