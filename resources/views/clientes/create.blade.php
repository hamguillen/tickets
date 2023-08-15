@extends('layouts.app')
@section('content')
<div class="container-fluid py-4">
    <div class="row justify-content-center">
        <div class="col-xl-4">
            <div class="card">
            <div class="card-header">
                  <h4 class="font-weight-bolder">Nuevo Cliente</h4>
                </div>
                <div class="card-body">
                  <form role="form" method='POST' action="{{route('clientes.store')}}">
                    @csrf
                    <div class="input-group input-group-outline mb-3">
                      <label class="form-label">Nombre</label>
                      <input value="{{old('nombre')}}" type="text" class="form-control @error('nombre') is-invalid @enderror" name='nombre'>
                      @error('nombre')<span class="invalid-feedback" role="alert"><strong>{{ $message }}</strong></span>@enderror
                    </div>
                    <div class="input-group input-group-outline mb-3">
                      <label class="form-label">Contacto</label>
                      <input value="{{old('contacto')}}" type="text" class="form-control @error('contacto') is-invalid @enderror" name='contacto'>
                      @error('contacto')<span class="invalid-feedback" role="alert"><strong>{{ $message }}</strong></span>@enderror
                    </div>
                    <div class="input-group input-group-outline mb-3">
                      <label class="form-label">Telefono</label>
                      <input value="{{old('telefono')}}" type="text" class="form-control @error('telefono') is-invalid @enderror" name='telefono'>
                      @error('telefono')<span class="invalid-feedback" role="alert"><strong>{{ $message }}</strong></span>@enderror
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