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
                            <th class="text-center">Numero de Contrato</th>
                            <th class="text-center">Plazo</th>
                            <th class="text-center">Fecha inicio</th>
                            <th class="text-center">Fecha Final</th>
                            <th class="text-center">Acciones</th>
                        </tr>
                      </thead>
                      <tbody>
                        <div id="listado">
                          @foreach($resultado as $result)
                            <tr>
                              <td class="text-center">{{$result->num_cto}}</td>
                              <td class="text-center">{{ $result->plazo}}</td>
                              <td class="text-center">{{ $result->f_ini}}</td>
                              <td class="text-center">{{ $result->f_fin}}</td>
                              <td><a href="{{route('mostrarCo',['id'=>$result->id])}}" class="btn btn-outline-info">Seleccionar</a></td>
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