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
                            <th class="text-center">Numero de garantia</th>
                            <th class="text-center">Aseguradora</th>
                            <th class="text-center">Fecha de aprobación</th>
                            <th class="text-center">Contrato</th>
                            <th class="text-center">Acciones</th>
                        </tr>
                      </thead>
                      <tbody>
                        <div id="listado">
                          @foreach($resultado as $result)
                            <tr>
                              <td class="text-center">{{$result->id_garantia}}</td>
                              <td class="text-center">{{ $result->aseguradora}}</td>
                              <td class="text-center">{{ $result->f_aprobacion}}</td>
                              <td class="text-center">{{ $result->id_contrato  }}</td>
                              <td><a href="{{route('mostrarGar',['id'=>$result->id_garantia])}}" class="btn btn-outline-info">Seleccionar</a></td>
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