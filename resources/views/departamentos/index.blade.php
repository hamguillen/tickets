@extends('layouts.app');
@section('content')
<div class="container-fluid py-4">
    <div class="row">
        <div class="col-xl-12">
            <div class="card">
                <a href="{{route('departamentos.create')}}" class="btn btn-sm btn-success">Agregar nuevo</a>
                <table class="table table-condensed table-stripped">
                    <thead>
                        <tr>
                            <th>Descripcion</th>
                            <th>Status</th>
                        </tr>
                    </thead>
                    <tbody>
                    @foreach($dptos as $dpto)
                        <tr>
                            <td>{{$dpto->descripcion}}</td>
                            <td>{{$dpto->status}}</td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
@endsection