@extends('layouts.app')
@section('scripts')
<script>
    const myCarouselElement = document.querySelector('#myCarousel')
    const carousel = new bootstrap.Carousel(myCarouselElement, {
        touch: false
        })
</script>
@endsection
@section('content')
<div class="container-fluid py-4">
    <div class="row">
        <div class="col-xl-3 col-sm-6 mb-xl-0 mb-4">
            <div class="card" onclick="carousel.to(0)">
                <div class="card-header p-3 pt-2">
                    <div class="icon icon-lg icon-shape bg-gradient-dark shadow-dark text-center border-radius-xl mt-n4 position-absolute">
                        <i class="material-icons opacity-10">watch</i>
                    </div>
                    <div class="text-end pt-1">
                        <p class="text-sm mb-0 text-capitalize">En espera</p>
                        <h4 class="mb-0">{{$tck_hold->count()}}</h4>
                    </div>
                </div>
                <hr class="dark horizontal my-0">
                <div class="card-footer p-3">
                    <p class="mb-0"><span class="text-success text-sm font-weight-bolder"></span>Tickets sin respuesta</p>
                </div>
            </div>
        </div>
        <div class="col-xl-3 col-sm-6 mb-xl-0 mb-4">
            <div class="card" onclick="carousel.to(1)">
                <div class="card-header p-3 pt-2">
                    <div class="icon icon-lg icon-shape bg-gradient-primary shadow-primary text-center border-radius-xl mt-n4 position-absolute">
                        <i class="material-icons opacity-10">folder_open</i>
                    </div>
                    <div class="text-end pt-1">
                        @role('users')
                        <p class="text-sm mb-0 text-capitalize">Asignados a mi</p>
                        @else
                        <p class="text-sm mb-0 text-capitalize">Asignados a usuario</p>
                        @endrole
                        <h4 class="mb-0">{{$tck_mine->count()}}</h4>
                    </div>
                </div>
                <hr class="dark horizontal my-0">
                <div class="card-footer p-3">
                    <p class="mb-0"><span class="text-success text-sm font-weight-bolder"></span>Tickets en atencion</p>
                </div>
            </div>
        </div>
        <div class="col-xl-3 col-sm-6 mb-xl-0 mb-4">
            <div class="card" onclick="carousel.to(2)">
                <div class="card-header p-3 pt-2">
                    <div class="icon icon-lg icon-shape bg-gradient-success shadow-success text-center border-radius-xl mt-n4 position-absolute">
                        <i class="material-icons opacity-10">folder</i>
                    </div>
                    <div class="text-end pt-1">
                        <p class="text-sm mb-0 text-capitalize">Tickets Cerrados</p>
                        <h4 class="mb-0">{{$tck_closed->count()}}</h4>
                    </div>
                </div>
                <hr class="dark horizontal my-0">
                <div class="card-footer p-3">
                    <p class="mb-0"><span class="text-danger text-sm font-weight-bolder"></span> Tickets atendidos</p>
                </div>
            </div>
        </div>
        <div class="col-xl-3 col-sm-6">
            <div class="card" onclick="carousel.to(3)">
                <div class="card-header p-3 pt-2">
                    <div class="icon icon-lg icon-shape bg-gradient-info shadow-info text-center border-radius-xl mt-n4 position-absolute">
                        <i class="material-icons opacity-10">pending</i>
                    </div>
                    <div class="text-end pt-1">
                        <p class="text-sm mb-0 text-capitalize">Tickets Libres</p>
                        <h4 class="mb-0">{{$tck_open->count()}}</h4>
                    </div>
                </div>
                <hr class="dark horizontal my-0">
                <div class="card-footer p-3">
                    <p class="mb-0"><span class="text-success text-sm font-weight-bolder"></span>Ticketes sin Asignar</p>
                </div>
            </div>
        </div>
    </div>
    <div class="row py-4">
        <div class="col-12">
            <div id="myCarousel" class="carousel slide">
                <div class="carousel-inner">
                    <div class="carousel-item active">
                        <div class="card my-4">
                            <div  class="card-header p-0 position-relative mt-n4 mx-3 z-index-2">
                                <div class="bg-gradient-primary shadow-primary border-radius-lg pt-4 pb-3">
                                    <h6 class="text-white text-capitalize ps-3">Tickets en espera de respuesta</h6>
                                </div>
                            </div>
                            <div class="card-body px-0 pb-2">
                                <div class="table-responsive p-0">
                                    <table class="table align-items-center mb-0">
                                        <thead>
                                            <tr>
                                            <th class="text-uppercase text-primary text-xxs font-weight-bolder">Fecha</th>
                                            <th class="text-center text-uppercase text-primary text-xxs font-weight-bolder">Creado por</th>
                                            <th class="text-center text-uppercase text-primary text-xxs font-weight-bolder">Asignado a</th>
                                            <th class="text-center text-uppercase text-primary text-xxs font-weight-bolder">Nivel</th>
                                            <th class="text-center text-uppercase text-primary text-xxs font-weight-bolder">Titulo</th>
                                            <th class="text-center text-uppercase text-primary text-xxs font-weight-bolder">Status</th>
                                            <th class="text-secondary"></th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach($tck_hold as $tck)
                                            <tr>
                                                <td class="align-middle text-center">
                                                    <span class="text-primary text-xs font-weight-bold">{{$tck->created_at}}</span>
                                                </td>
                                                <td>
                                                    <p class="text-xs font-weight-bold mb-0">{{$tck->cliente}}</p>
                                                    <p class="text-xs text-primary mb-0">{{$tck->empresa}}</p>
                                                </td>
                                                <td>
                                                    <p class="text-xs font-weight-bold mb-0">{{$tck->asignado}}</p>
                                                    <p class="text-xs text-primary mb-0">{{$tck->departamento}}</p>
                                                </td>
                                                <td class="align-middle text-center text-sm">
                                                    <span class="badge badge-sm bg-gradient-danger">{{$tck->nivel}}</span>
                                                </td>
                                                <td class="align-middle text-center">
                                                    <span class="text-primary text-xs font-weight-bold">{{$tck->titulo}}</span>
                                                </td>
                                                <td class="align-middle text-center">
                                                    <span class="text-secoprimaryndary text-xs font-weight-bold">{{$tck->status}}</span>
                                                </td>
                                                <td class="align-middle">
                                                    <a href="{{route(tickets.show(['ticket',$tck->id]))}}" class="text-primary font-weight-bold text-xs" data-toggle="tooltip" data-original-title="Edit user">
                                                        Detalle
                                                    </a>
                                                </td>
                                            </tr>
                                            @endforeach
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="carousel-item">
                        <div class="card my-4">
                            <div  class="card-header p-0 position-relative mt-n4 mx-3 z-index-2">
                                <div class="bg-gradient-primary shadow-primary border-radius-lg pt-4 pb-3">
                                    <h6 class="text-white text-capitalize ps-3">Tickets asignados</h6>
                                </div>
                            </div>
                            <div class="card-body px-0 pb-2">
                                <div class="table-responsive p-0">
                                    <table class="table align-items-center mb-0">
                                        <thead>
                                            <tr>
                                            <th class="text-uppercase text-primary text-xxs font-weight-bolder">Fecha</th>
                                            <th class="text-center text-uppercase text-primary text-xxs font-weight-bolder">Creado por</th>
                                            <th class="text-center text-uppercase text-primary text-xxs font-weight-bolder">Asignado a</th>
                                            <th class="text-center text-uppercase text-primary text-xxs font-weight-bolder">Nivel</th>
                                            <th class="text-center text-uppercase text-primary text-xxs font-weight-bolder">Titulo</th>
                                            <th class="text-center text-uppercase text-primary text-xxs font-weight-bolder">Status</th>
                                            <th class="text-secondary opacity-7"></th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach($tck_mine as $tck)
                                            <tr>
                                                <td class="align-middle text-center">
                                                    <span class="text-primary text-xs font-weight-bold">{{$tck->created_at}}</span>
                                                </td>
                                                <td>
                                                    <p class="text-xs font-weight-bold mb-0">{{$tck->cliente}}</p>
                                                    <p class="text-xs text-primary mb-0">{{$tck->empresa}}</p>
                                                </td>
                                                <td>
                                                    <p class="text-xs font-weight-bold mb-0">{{$tck->asignado}}</p>
                                                    <p class="text-xs text-primary mb-0">{{$tck->departamento}}</p>
                                                </td>
                                                <td class="align-middle text-center text-sm">
                                                    <span class="badge badge-sm bg-gradient-danger">{{$tck->nivel}}</span>
                                                </td>
                                                <td class="align-middle text-center">
                                                    <span class="text-primary text-xs font-weight-bold">{{$tck->titulo}}</span>
                                                </td>
                                                <td class="align-middle text-center">
                                                    <span class="text-secoprimaryndary text-xs font-weight-bold">{{$tck->status}}</span>
                                                </td>
                                                <td class="align-middle">
                                                    <a href="{{route('tickets.show',['ticket'=>$tck->id])}}" class="text-primary font-weight-bold text-xs" data-toggle="tooltip" data-original-title="Edit user">
                                                        Detalle
                                                    </a>
                                                </td>
                                            </tr>
                                            @endforeach
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="carousel-item">
                        <div class="card my-4">
                            <div  class="card-header p-0 position-relative mt-n4 mx-3 z-index-2">
                                <div class="bg-gradient-primary shadow-primary border-radius-lg pt-4 pb-3">
                                    <h6 class="text-white text-capitalize ps-3">Tickets atendidos</h6>
                                </div>
                            </div>
                            <div class="card-body px-0 pb-2">
                                <div class="table-responsive p-0">
                                    <table class="table align-items-center mb-0">
                                        <thead>
                                            <tr>
                                            <th class="text-uppercase text-primary text-xxs font-weight-bolder">Fecha</th>
                                            <th class="text-center text-uppercase text-primary text-xxs font-weight-bolder">Creado por</th>
                                            <th class="text-center text-uppercase text-primary text-xxs font-weight-bolder">Asignado a</th>
                                            <th class="text-center text-uppercase text-primary text-xxs font-weight-bolder">Nivel</th>
                                            <th class="text-center text-uppercase text-primary text-xxs font-weight-bolder">Titulo</th>
                                            <th class="text-center text-uppercase text-primary text-xxs font-weight-bolder">Status</th>
                                            <th class="text-secondary opacity-7"></th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach($tck_closed as $tck)
                                            <tr>
                                                <td class="align-middle text-center">
                                                    <span class="text-primary text-xs font-weight-bold">{{$tck->created_at}}</span>
                                                </td>
                                                <td>
                                                    <p class="text-xs font-weight-bold mb-0">{{$tck->cliente}}</p>
                                                    <p class="text-xs text-primary mb-0">{{$tck->empresa}}</p>
                                                </td>
                                                <td>
                                                    <p class="text-xs font-weight-bold mb-0">{{$tck->asignado}}</p>
                                                    <p class="text-xs text-primary mb-0">{{$tck->departamento}}</p>
                                                </td>
                                                <td class="align-middle text-center text-sm">
                                                    <span class="badge badge-sm bg-gradient-danger">{{$tck->nivel}}</span>
                                                </td>
                                                <td class="align-middle text-center">
                                                    <span class="text-primary text-xs font-weight-bold">{{$tck->titulo}}</span>
                                                </td>
                                                <td class="align-middle text-center">
                                                    <span class="text-secoprimaryndary text-xs font-weight-bold">{{$tck->status}}</span>
                                                </td>
                                                <td class="align-middle">
                                                    <a href="{{route('tickets.show',['ticket'=>$tck->id])}}" class="text-primary font-weight-bold text-xs" data-toggle="tooltip" data-original-title="Edit user">
                                                        Detalle
                                                    </a>
                                                </td>
                                            </tr>
                                            @endforeach
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="carousel-item">
                        <div class="card my-4">
                            <div  class="card-header p-0 position-relative mt-n4 mx-3 z-index-2">
                                <div class="bg-gradient-primary shadow-primary border-radius-lg pt-4 pb-3">
                                    <h6 class="text-white text-capitalize ps-3">Tickets en espera de respuesta</h6>
                                </div>
                            </div>
                            <div class="card-body px-0 pb-2">
                                <div class="table-responsive p-0">
                                    <table class="table align-items-center mb-0">
                                        <thead>
                                            <tr>
                                            <th class="text-uppercase text-primary text-xxs font-weight-bolder">Fecha</th>
                                            <th class="text-center text-uppercase text-primary text-xxs font-weight-bolder">Creado por</th>
                                            <th class="text-center text-uppercase text-primary text-xxs font-weight-bolder">Asignado a</th>
                                            <th class="text-center text-uppercase text-primary text-xxs font-weight-bolder">Nivel</th>
                                            <th class="text-center text-uppercase text-primary text-xxs font-weight-bolder">Titulo</th>
                                            <th class="text-center text-uppercase text-primary text-xxs font-weight-bolder">Status</th>
                                            <th class="text-secondary opacity-7"></th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach($tck_open as $tck)
                                            <tr>
                                                <td class="align-middle text-center">
                                                    <span class="text-primary text-xs font-weight-bold">{{$tck->created_at}}</span>
                                                </td>
                                                <td>
                                                    <p class="text-xs font-weight-bold mb-0">{{$tck->cliente}}</p>
                                                    <p class="text-xs text-primary mb-0">{{$tck->empresa}}</p>
                                                </td>
                                                <td>
                                                    <p class="text-xs font-weight-bold mb-0">{{$tck->asignado}}</p>
                                                    <p class="text-xs text-primary mb-0">{{$tck->departamento}}</p>
                                                </td>
                                                <td class="align-middle text-center text-sm">
                                                    <span class="badge badge-sm bg-gradient-danger">{{$tck->nivel}}</span>
                                                </td>
                                                <td class="align-middle text-center">
                                                    <span class="text-primary text-xs font-weight-bold">{{$tck->titulo}}</span>
                                                </td>
                                                <td class="align-middle text-center">
                                                    <span class="text-secoprimaryndary text-xs font-weight-bold">{{$tck->status}}</span>
                                                </td>
                                                <td class="align-middle">
                                                    <a href="{{route('tickets.show',['ticket'=>$tck->id])}}" class="text-primary font-weight-bold text-xs" data-toggle="tooltip" data-original-title="Edit user">
                                                        Detalle
                                                    </a>
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
            </div>
        </div>
    </div>
</div>
@endsection