@extends('layouts.app');
@section('content')
<div class="container-fluid py-4">
    <div class="row">
        <div class="col-xl-12">
            <div class="card">
                <a href="{{route('clientes.create')}}" class="btn btn-sm btn-success">Agregar nuevo</a>
                <table class="table table-condensed table-stripped">
                    <thead>
                        <tr>
                            <th>Nombre</th>
                            <th>Contacto</th>
                            <th>Telefono</th>
                            <th>Status</th>
                        </tr>
                    </thead>
                    <tbody>
                    @foreach($clientes as $cliente)
                        <tr>
                            <td>{{$cliente->nombre}}</td>
                            <td>{{$cliente->contacto}}</td>
                            <td>{{$cliente->telefono}}</td>
                            <td>{{$cliente->status}}</td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
@endsection