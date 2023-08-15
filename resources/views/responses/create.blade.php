@extends('layouts.app')
@section('content')
<div class="container-fluid py-4">
    <div class="row justify-content-center">
        <div class="col-xl-10">
            <div class="card">
            <div class="card-header">
                  <h4 class="font-weight-bolder">Responder Ticket - {{$ticket->title}}</h4>
                </div>
                <div class="card-body">
                  <form role="form" method='POST' action="{{route('responses.store')}}" enctype="multipart/form-data">
                    @csrf
                    <div class="input-group input-group-outline mb-3 is-filled">
                      <label class="form-label">Ultimo mensaje</label>
                      <input readonly value="{{(is_null($lastmessage)?$ticket->description:$lastmessage->response)}}" type="text" class="form-control @error('titulo') is-invalid @enderror" name='titulo'>
                    </div>
                    <div class="input-group input-group-outline mb-3">
                        <textarea rows="10" placeholder="Indique su respuesta" class="form-control @error('response') is-invalid @enderror" name='response'>{{old('response')}}</textarea>
                        @error('response')<span class="invalid-feedback" role="alert"><strong>{{ $message }}</strong></span>@enderror
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
                        <input type="hidden" name="ticket" value="{{$ticket->id}}">
                      <button type="submit" class="btn btn-lg bg-gradient-primary btn-lg w-100 mt-4 mb-0">Guardar</button>
                    </div>
                  </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection