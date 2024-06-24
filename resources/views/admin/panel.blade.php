@extends('layouts.app')
@section('title', 'Panel')
@push('css')
    <style>
        .carousel-item img {
            object-fit: cover;
            width: 100%;
            height: 100%;
        }
    
        /* Ajustar altura de las imágenes en pantallas pequeñas */
        @media (max-width: 768px) {
            .carousel-item img {
                height: 200px; /* Ajusta este valor según tus necesidades */
            }
        }
    
        /* Ajustar altura de las imágenes en pantallas medianas */
        @media (min-width: 769px) and (max-width: 992px) {
            .carousel-item img {
                height: 300px; /* Ajusta este valor según tus necesidades */
            }
        }
    
        /* Ajustar altura de las imágenes en pantallas grandes */
        @media (min-width: 993px) {
            .carousel-item img {
                height: 401px; /* Ajusta este valor según tus necesidades */
            }
        }
  </style>
@endpush
@section('content')
    <div class="row">
        <div class="col-md-12">
            <div id="carouselExampleIndicators" class="carousel slide">
                <div class="carousel-indicators">
                    <button type="button" style="background-color: #00476D !important;" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="0" class="active" aria-current="true" aria-label="Slide 1"></button>
                    <button type="button" style="background-color: #00476D !important;" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="1" aria-label="Slide 2"></button>
                    <button type="button" style="background-color: #00476D !important;" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="2" aria-label="Slide 3"></button>
                </div>
                <div class="carousel-inner">
                    <div class="carousel-item active">
                        <img src="{{asset('assets/image/nutricion.png')}}" class="d-block w-100">
                    </div>
                    <div class="carousel-item">
                        <img src="{{asset('assets/image/sostenibilidad.png')}}" class="d-block w-100">
                    </div>
                    <div class="carousel-item">
                        <img src="{{asset('assets/image/sociedad.png')}}" class="d-block w-100">
                    </div>
                </div>
                <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide="prev">
                    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                    <span class="visually-hidden">Previous</span>
                </button>
                <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide="next">
                    <span class="carousel-control-next-icon" aria-hidden="true"></span>
                    <span class="visually-hidden">Next</span>
                </button>
            </div>
        </div>
        <div class="col-md-6 mt-3">
            <div class="card flex-fill border-0 illustration">
                <div class="card-body p-0 d-flex flex-fill">
                    <div class="row g-0 w-100">
                        <div class="col-md-9">
                            <div class="p-3 m-1">
                                <h4><strong>MISIÓN</strong></h4>
                                <p class="mb-0">Desarrollar los mercados de alimentos con productos ricos, nutritivos y accesibles, de forma eficiente y sustentable, asegurando la calidad, el cuidado de las personas y un futuro más saludable.</p>
                            </div>
                        </div>
                        <div class="col-md-3 align-self-center text-center">
                            <img src="{{asset('assets/image/mision.svg')}}" class="img-fluid illustration-img" alt="">
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-6 mt-3">
            <div class="card flex-fill border-0 illustration">
                <div class="card-body p-0 d-flex flex-fill">
                    <div class="row g-0 w-100">
                        <div class="col-md-8">
                            <div class="p-3 m-1">
                                <h4><strong>VISIÓN</strong></h4>
                                <p class="mb-0">Ser la mejor empresa de alimentos en Latinoamérica, reconocida por nuestro aporte a la nutrición, sustentabilidad, innovación y desarrollo de talento de nuestros colaboradores.</p>
                            </div>
                        </div>
                        <div class="col-md-4 align-self-center text-center">
                            <img src="{{asset('assets/image/vision.png')}}" class="img-fluid illustration-img" alt="">
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-12 text-center">
            <h3 class="text-danger"><strong>Plantas Principales</strong></h3>
        </div>
        <div class="col-md-6 mt-3">
            <div class="card mb-3" style="max-width: 540px;">
                <div class="row g-0">
                  <div class="col-md-4">
                    <img src="{{asset('assets/image/planta_I.jpeg')}}" class="img-fluid rounded-start w-100" style="object-fit: cover; height: 100%;">
                  </div>
                  <div class="col-md-8">
                    <div class="card-body">
                      <h5 class="card-title text-danger"><strong>Planta Lima - Huachipa</strong></h5>
                      <p class="card-text">Para información de visitas a Planta Lima contactar a:</p>
                      <p class="card-text"><small class="text-body-secondary">visitasaplanta@gloria.com.pe</small></p>
                    </div>
                  </div>
                </div>
            </div>
        </div>
        <div class="col-md-6 mt-3">
            <div class="card mb-3" style="max-width: 540px;">
                <div class="row g-0">
                    <div class="col-md-4">
                        <img src="{{asset('assets/image/planta_II.jpg')}}" class="img-fluid rounded-start w-100" style="object-fit: cover; height: 100%;">
                    </div>
                    <div class="col-md-8">
                        <div class="card-body">
                            <h5 class="card-title text-danger"><strong>Planta Arequipa</strong></h5>
                            <p class="card-text">Para información de visitas a Planta Lima contactar a:</p>
                            <p class="card-text"><small class="text-body-secondary">mgamarra@gloria.com.pe</small></p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
@push('js')
@endpush
