@extends('layouts.app');
@section('content')
<div class="container-fluid py-4">
    <div class="row">
        <div class="col-xl-12">
            <div class="card">
                <a href="{{route('users.create')}}" class="btn btn-sm btn-success">Agregar nuevo</a>
                <table class="table table-condensed table-stripped">
                    <thead>
                        <tr>
                            <th>Nombre</th>
                            <th>Email</th>
                            <th>Departamento</th>
                            <th>Tipo</th>
                            <th>Status</th>
                        </tr>
                    </thead>
                    <tbody>
                    @foreach($usuarios as $usuario)
                        <tr>
                            <td>{{$usuario->name}}</td>
                            <td>{{$usuario->email}}</td>
                            <td>{{$usuario->department}}</td>
                            <td>{{$usuario->getRoleNames()}}</td>
                            <td>{{$usuario->status}}</td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
@endsection