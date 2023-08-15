@extends('layouts.app')
@section('scripts')
<script>
  $(".radio").on('click',function(){
    $(".flipcard").hide();
    var divcase=$(this).val()=="2"?"users":"clients";
    $("#"+divcase).show();
    $("#tipo").val($(this).val());
  })

</script>
@endsection
@section('content')
<div class="container-fluid py-4">
    <div class="row justify-content-center">
        <div class="col-xl-4">
            <div class="card">
            <div class="card-header">
                  <h4 class="font-weight-bolder">Nuevo Usuario</h4>
                </div>
                <div class="card-body">
                  <form role="form" method='POST' action="{{route('users.store')}}">
                    @csrf
                    <div class="input-group input-group-outline mb-3">
                      <label class="form-label">Nombre</label>
                      <input value="{{old('nombre')}}" type="text" class="form-control @error('nombre') is-invalid @enderror" name='nombre'>
                      @error('nombre')<span class="invalid-feedback" role="alert"><strong>{{ $message }}</strong></span>@enderror
                    </div>
                    <div class="input-group input-group-outline mb-3">
                      <label class="form-label">Email</label>
                      <input value="{{old('email')}}" type="email" class="form-control @error('nombre') is-invalid @enderror" name="email">
                      @error('email')<span class="invalid-feedback" role="alert"><strong>{{ $message }}</strong></span>@enderror
                    </div>
                    <div class="input-group input-group-outline mb-3">
                      <label class="form-label">Password</label>
                      <input value="{{old('password')}}" type="password" class="form-control @error('password') is-invalid @enderror" name="password">
                      @error('password')<span class="invalid-feedback" role="alert"><strong>{{ $message }}</strong></span>@enderror
                    </div>
                    <div class="input-group input-group-outline mb-3">
                      <label class="form-label">Confirmar Password</label>
                      <input value="{{old('confirm')}}" type="password" class="form-control @error('confirm') is-invalid @enderror" name="confirm">
                      @error('confirm')<span class="invalid-feedback" role="alert"><strong>{{ $message }}</strong></span>@enderror
                    </div>
                    <div class="input-group input-group-outline mb-3">
                      <div class="row">
                        <label class="">Tipo de usuario</label>
                        <div class="col-5"><input checked type="radio" name="tipo" value="2" class="radio">Sistema</div>
                        <div class="col-7"><input checked type="radio" name="tipo" value="3" class="radio">Capturista</div>
                      </div>
                    </div>
                    <div id="users" class="flipcard" style="display:none;">
                      <div class="form-check form-check-info text-start ps-0">
                        <label class="form-check-label" for="flexCheckDefault">
                          Departamento de atencion
                        </label>
                        <select name="departamento" id="" class="class-form @error('departamento') is-invalid @enderror">
                          @foreach($departamentos as $dpto)
                          <option value="{{$dpto->id}}">{{$dpto->descripcion}}</option>
                          @endforeach
                        </select>
                        @error('departamento')<span class="invalid-feedback" role="alert"><strong>{{ $message }}</strong></span>@enderror
                      </div>
                    </div>
                    <div id="clients" class="flipcard" style="display:none;">
                      <div class="form-check form-check-info text-start ps-0">
                        <label class="form-check-label" for="flexCheckDefault">
                          Cliente
                        </label>
                        <select name="cliente" id="" class="class-form @error('cliente') is-invalid @enderror">
                          @foreach($clientes as $cliente)
                          <option value="{{$cliente->id}}">{{$cliente->nombre}}</option>
                          @endforeach
                        </select>
                        @error('cliente')<span class="invalid-feedback" role="alert"><strong>{{ $message }}</strong></span>@enderror
                      </div>
                    </div>
                    <div class="text-center">
                      <input type="hidden" name="tipousuario" id="tipo"> 
                      <button type="submit" class="btn btn-lg bg-gradient-primary btn-lg w-100 mt-4 mb-0">Guardar</button>
                    </div>
                  </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection