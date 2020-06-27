@extends('layouts.app')


@section('content')
<div class="container">
    <div class="row justify-content-around">
        <div class="col-md-9">
            <div class="card" >
                <div class="card-header">Resultado de la consulta</div>
                  <div class="card-body">
                    <table class="table table-bordered" id="tableSolicitudes">
                      <thead>
                        <tr>                        
                            <th class="text-center">Documento de Contratista</th>
                            <th class="text-center">Nombres</th>
                            <th class="text-center">Correo institucional</th>
                            <th class="text-center">Profesión</th>
                            <th class="text-center">Acciones</th>
                        </tr>
                      </thead>
                      <tbody>
                        <div id="listado">
                          @foreach($resultado as $result)
                            <tr>
                              <td class="text-center">{{$result->documento}}</td>
                              <td class="text-center">{{ $result->Nombres}}</td>
                              <td class="text-center">{{ $result->correo_I}}</td>
                              <td class="text-center">{{ $result->profesion  }}</td>
                              <td><a href="{{route('mostrarPer',['id'=>$result->documento])}}" class="btn btn-outline-info">Seleccionar</a></td>
                            </tr>
                          @endforeach
                        </div>   
                      </tbody>
                           

                      </table>
                  </div>
                </div>
            </div>        
    </div>
</div>
@endsection