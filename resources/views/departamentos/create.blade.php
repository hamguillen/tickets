@extends('layouts.app')
@section('content')
<div class="container-fluid py-4">
    <div class="row justify-content-center">
        <div class="col-xl-4">
            <div class="card">
            <div class="card-header">
                  <h4 class="font-weight-bolder">Nuevo Departamento de Atencion</h4>
                </div>
                <div class="card-body">
                  <form role="form" method='POST' action="{{route('departamentos.store')}}">
                    @csrf
                    <div class="input-group input-group-outline mb-3">
                      <label class="form-label">Descripcion</label>
                      <input value="{{old('descripcion')}}" type="text" class="form-control @error('descripcion') is-invalid @enderror" name='descripcion'>
                      @error('descripcion')<span class="invalid-feedback" role="alert"><strong>{{ $message }}</strong></span>@enderror
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