@extends('layouts.app')
@section('content')
<div class="container-fluid py-4">
    <div class="row justify-content-center">
        <div class="col-xl-10">
            <div class="card">
            <div class="card-header">
                  <h4 class="font-weight-bolder">Nuevo Ticket</h4>
                </div>
                <div class="card-body">
                  <form role="form" method='POST' action="{{route('tickets.store')}}" enctype="multipart/form-data">
                    @csrf
                    <div class="input-group input-group-outline mb-3">
                      <div class="row col-12 ml-5">
                        <label class="">Area de atencion</label>
                        <select type="text" class="pl-5 form-control @error('dpto') is-invalid @enderror" name='dpto'>
                        @foreach($dptos as $dpto)
                        <option value="{{$dpto->id}}">{{$dpto->descripcion}}</option>
                        @endforeach
                      </select>
                      @error('dpto')<span class="invalid-feedback" role="alert"><strong>{{ $message }}</strong></span>@enderror
                      </div>
                    </div>
                    <div class="input-group input-group-outline mb-3">
                      <label class="form-label">Solicitud</label>
                      <input value="{{old('titulo')}}" type="text" class="form-control @error('titulo') is-invalid @enderror" name='titulo'>
                      @error('titulo')<span class="invalid-feedback" role="alert"><strong>{{ $message }}</strong></span>@enderror
                    </div>
                    <div class="input-group input-group-outline mb-3">
                        <textarea rows="10" placeholder="Descripcion del problema" class="form-control @error('descripcion') is-invalid @enderror" name='descripcion'>{{old('descripcion')}}</textarea>
                        @error('descripcion')<span class="invalid-feedback" role="alert"><strong>{{ $message }}</strong></span>@enderror
                    </div>
                    <div class="input-group input-group-outline mb-3">
                        <div class="row">
                            <label class="">De ser necesario incluya una imagen</label>
                            <div class="col">
                                <input class="@error('file') is-invalid @enderror form-control" type="file" name="file"/>
                            </div>
                        </div>
                        @error('file')<div class="invalid-feedback">{{ $message }}</div>@enderror
                    </div>
                    <div class="text-center">
                      <button type="submit" class="btn btn-lg bg-gradient-primary btn-lg w-100 mt-4 mb-0">Guardar</button>
                    </div>
                  </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection