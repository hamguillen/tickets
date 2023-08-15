@extends('layouts.app')
@section('content')
<div class="container-fluid py-4">
    <div class="row">
        <div class="col-xl-12">
            <div class="card">
                <a href="{{route('tickets.create')}}" class="btn btn-sm btn-success">Agregar nuevo</a>
                <table class="table table-condensed table-stripped">
                    <thead>
                        <tr>
                            <th>Fecha</th>
                            <th>Departamento</th>
                            <th>Asignado a</th>
                            <th>Nivel</th>
                            <th>Solicitud</th>
                            <th>Status</th>
                            <th></th>
                        </tr>
                    </thead>
                    <tbody>
                    @foreach($tickets as $ticket)
                        <tr>
                            <td>{{$ticket->created_at}}</td>
                            <td>{{$ticket->departamento}}</td>
                            <td>{{$ticket->asignado}}</td>
                            <td>{{$ticket->nivel}}</td>
                            <td>{{$ticket->title}}</td>
                            <td>{{$ticket->status}}</td>
                            <td><a href="{{route('tickets.show',['ticket'=>$ticket->id])}}">Detalle</a></td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
@endsection