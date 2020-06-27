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
                            <th class="text-center">Numero de Proceso</th>
                            <th class="text-center">Modalidad</th>
                            <th class="text-center">Abogado</th>
                            <th class="text-center">Fecha de reparto</th>
                            <th class="text-center">Acciones</th>
                        </tr>
                      </thead>
                      <tbody>
                        <div id="listado">
                          @foreach($resultado as $result)
                            <tr>
                              <td class="text-center">{{$result->num_proceso}}</td>
                              <td class="text-center">{{ $result->modalidad}}</td>
                              <td class="text-center">{{ $result->abogado}}</td>
                              <td class="text-center">{{ $result->f_reparto}}</td>
                              <td><a href="{{route('mostrarP',['id'=>$result->num_proceso])}}" class="btn btn-outline-info">Seleccionar</a></td>
                            </tr>
                          @endforeach
                        </div>   
                      </tbody>
                       </tfoot>                  

                      </table>
                  </div>
                </div>
            </div>        
    </div>
</div>
@endsection