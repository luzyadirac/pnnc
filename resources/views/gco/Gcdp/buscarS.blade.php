@extends('layouts.app')


@section('content')
<div class="container">
    <div class="row justify-content-around">
        <div class="col-md-9">
            <div class="card" >
                <div class="card-header">Resultado de la consulta</div>
                  <div class="card-body">
                    <table class="table table-bordered" id="tableSolicitudes">
                      @if($asunto == 'SOLICITUD')
                      <thead>
                        <tr>                        
                            <th class="text-center">Numero de solicitud</th>
                            <th class="text-center">valor</th>
                            <th class="text-center">Dependencia</th>
                            <th class="text-center">Objeto</th>
                            <th class="text-center">Acciones</th>
                        </tr>
                      </thead>
                      <tbody>
                        <div id="listado">
                          @foreach($resultado as $result)
                            <tr>
                              <td class="text-center">{{$result->N_solCDP}}</td>
                              <td class="text-center">{{ $result->Valor}}</td>
                              <td class="text-center">{{ $result->cod_dep}}</td>
                              <td class="text-center">{{ $result->Objeto}}</td>
                              <td><a href="{{route('mostrarS',['id_sol'=>$result->N_solCDP])}}" class="btn btn-outline-info">Seleccionar</a></td>
                            </tr>
                          @endforeach
                        </div>   
                      </tbody>
                       </tfoot>
                      @endif

                      @if($asunto == 'CDP')
                      <thead>
                        <tr>                        
                            <th class="text-center">Numero de CDP</th>
                            <th class="text-center">Fecha</th>
                            <th class="text-center">Numero de solicitud</th>
                            <th class="text-center">Acciones</th>
                        </tr>
                      </thead>
                      <tbody>
                        <div id="listado">
                          @foreach($resultado as $result)
                            <tr>
                              <td class="text-center">{{$result->id_cdp}}</td>
                              <td class="text-center">{{ $result->fecha}}</td>
                              <td class="text-center">{{ $result->cod_solicitud}}</td>
                              <td class="text-center"><a href="{{route('mostrarC',['id'=>$result->id_cdp])}}" class="btn btn-outline-info">Seleccionar</a></td>
                            </tr>
                          @endforeach
                        </div>   
                      </tbody>
                       </tfoot>
                      @endif
                    </table>
                  </div>
                </div>
            </div>
        
    </div>
				</div>
@endsection