@extends('layouts.app')
@section('styles')
<style>
  .myselect{
    border:1px solid #fff;
    padding:5px;
    
  }
  .myselect:focus{
    background-color:#000;
  }
</style>
@endsection
@section('content')
<div class="container-fluid px-2 px-md-4">
<div class="page-header min-height-100 border-radius-xl mt-4" >
        <span class="mask  bg-gradient-primary  opacity-6"></span>
      </div>
    <div class="card card-body mx-3 mx-md-4 mt-n6">
        <div class="row">
          <div class="row">
            <div class="col-12 col-xl-4">
              <div class="card card-plain h-100">
                <div class="card-header pb-0 p-3">
                  <div class="row">
                    <div class="col-md-8 d-flex align-items-center">
                      <h6 class="mb-0">{{$ticketinfo[0]->cliente}}</h6>
                    </div>
                    <div class="col-md-4 text-end">
                      <a href="javascript:;">
                        <i class="fas fa-user text-secondary text-sm" data-bs-toggle="tooltip" data-bs-placement="top" title=""></i>
                      </a>
                    </div>
                    <div class="col-md-12 d-flex align-items-center">
                      <h6 class="mb-0">{{$ticketinfo[0]->title}}</h6>
                    </div>
                  </div>
                </div>
                <div class="card-body p-3">
                  <p class="text-sm">
                    {{$ticketinfo[0]->description}}
                  </p>
                  <hr class="horizontal gray-light my-4">
                  <ul class="list-group">
                    <li class="list-group-item border-0 ps-0 pt-0 text-sm"><strong class="text-dark">Creado:</strong> {{$ticketinfo[0]->created_at}}</li>
                    <li class="list-group-item border-0 ps-0 text-sm"><strong class="text-dark">Departamento:</strong> {{$ticketinfo[0]->departamento}}</li>
                    <li class="list-group-item border-0 ps-0 text-sm"><strong class="text-dark">Asignado a:</strong> {{$ticketinfo[0]->asignado}}</li>
                    <li class="list-group-item border-0 ps-0 text-sm"><strong class="text-dark">Nivel atencion:</strong> {{$ticketinfo[0]->nivel}}</li>
                    <li class="list-group-item border-0 ps-0 text-sm"><strong class="text-dark">Status:</strong> {{$ticketinfo[0]->status}}</li>
                    <li class="list-group-item border-0 ps-0 text-sm"><strong class="text-dark">Cliente:</strong> {{$ticketinfo[0]->empresa}}</li>
                    @can('admin.index')
                    @if($ticketinfo[0]->assign_id==0)
                   <li class="list-group-item border-0 d-flex align-items-center px-0 mb-2 pt-0">
                      <div class="d-flex align-items-start flex-column justify-content-center">
                        <form action="{{route('tickets.update',['ticket'=>$ticketinfo[0]->id])}}" method="post">
                          @method('PUT')
                          @csrf 
                          <label for="">Asignar operador</label>
                          <select name="asignado" id="" class="form-control myselect">
                            @foreach($users as $user)
                            <option value="{{$user->id}}">{{$user->name}}</option>
                            @endforeach
                          </select>
                          <label for="">Asignar nivel de atencion</label>
                          <select name="nivel" id="" class="form-control myselect">
                            @foreach($flags as $flag)
                            <option value="{{$flag->id}}">{{$flag->descripcion}}</option>
                            @endforeach
                          </select>
                          <input type="submit" value="Asignar ticket" class="btn btn-sm btn-secondary mt-3">
                        </form>
                      </div>
                    </li>
                    @endif
                   @endcan
                  </ul>
                </div>
              </div>
            </div>
            <div class="col-12 col-xl-8">
              <div class="card card-plain h-100">
                <div class="card-header pb-0 p-3">
                  <h6 class="mb-0">Seguimiento</h6>
                </div>
                <div class="card-body p-3">
                  <ul class="list-group">
                    @if($tickets_response->count())
                    @foreach($tickets_response as $response)
                    <li class="list-group-item border-0 d-flex align-items-center px-0 mb-2 pt-0">
                      <div class="d-flex align-items-start flex-column justify-content-center">
                        <h6 class="mb-0 text-sm">{{$response->nombre}}</h6>
                        <p class="mb-0 text-xs">{{$response->response}}</p>
                      </div>
                    </li>
                    @endforeach
                    @endif
                    <li class="list-group-item border-0 d-flex align-items-center px-0 mb-2 pt-0">
                      <div class="d-flex align-items-start flex-column justify-content-center">
                      @if($tickets_response->count()==0)
                        <h6 class="mb-0 text-sm">No hay mensajes de seguimiento</h6>
                      @endif
                        @if($ticketinfo[0]->assign_id==auth()->user()->id || $ticketinfo[0]->user_id==auth()->user()->id )
                        <a href="{{route('responses.create',['ticket'=>$ticketinfo[0]->id])}}" class="btn btn-success">Generar respuesta</a>
                        @endif
                      </div>
                    </li>
                  </ul>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
</div>
@endsection