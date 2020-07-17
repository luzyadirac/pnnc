
@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-around">
        <div class="col-md-3">
            <div class="card ">
                <div class="card-header">Buscar Solicitud</div>
                  <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    @if (session('message'))
                        <div class="alert alert-success">
                            {{ session('message') }}
                        </div>
                    @endif
                   
                    <form method="GET" role="search" action="{{url('/buscarS')}}">
                        <div class="form-group">
                          <span>
                            <label>Buscar por:</label>
                            <select name="criterio">
                              <option value="N_solCDP">Numero de Solicitud</option>
                              <option value="N_radicado">Número de Radicado</option>
                              <option value="Objeto">Objeto</option>
                            </select>
                          </span>
                          <hr />
                          <input type="text" class="form-control" placeholder="ingrese parte del contenido buscado" name="search">
                        </div>
                        <button type="submit" class="btn btn-default">
                         Buscar
                        </button>
                    </form>
                    <hr />
                     @if(Auth::user()->role=='Admin'||Auth::user()->role=='Afin' )
                      <li><a href="{{url('/crear-solicitud')}}">Crear Solicitud</a></li>
                      @endif
                  </div>
                </div>
              </div>
            <div class="col-md-9">
            <div class="card" >
                <div class="card-header">Solicitudes sin CDP asignado</div>
                  <div class="card-body">
                    <table class="table table-bordered" id="tableSolicitudes">
                      <thead>
                        <tr>
                            <th class="text-center">Numero de solicitud</th>
                            <th class="text-center">Fuente</th>
                            <th class="text-center">Dependencia</th>
                             <th class="text-center">Fecha de actualización</th>
                            <th class="text-center">Acciones</th>
                        </tr>
                      </thead>
                      <tbody>
                        <div id="listado">

                          @foreach($solicitudes as $solicitud)
  
                            <tr>
                              <td class="text-center">{{$solicitud->N_solCDP}}</td>
                              @if($solicitud->Fuente==1)
                                <td class="text-center">Fonam</td>
                              @else
                                <td class="text-center">Nación</td>
                              @endif
                              <td class="text-center">{{ $solicitud->cod_dep}}</td>
                              <td class="text-center">{{ $solicitud->created_at}}</td>
                             <td class="text-center">
                                   <a href="{{route('mostrarS',['id_sol'=>$solicitud->N_solCDP])}}" class="btn btn-outline-info">Ver</td>
                            
                            </tr>
                          @endforeach
                        </div>   
                      </tbody>
                      <tfoot>
                        <tr>
                          <th class="text-center">Numero de solicitud</th>
                          <th class="text-center">Fuente</th>
                          <th class="text-center">Dependencia</th>
                          <th class="text-center">Acciones</th>
                        </tr>
                      </tfoot>
                    </table>
                    {{$solicitudes->links()}}
                  </div>
                 
                </div>
            </div>
        
    </div>
     <div class="pull_rigth col-md-12">
                   <a href="{{url('/home')}}" class="btn btn-info">Página principal</a>
                 </div>
          <br>
    <div class="row justify-content-around">
        <div class="col-md-3">
            <div class="card ">
                <div class="card-header">Buscar CDP</div>
                  <div class="card-body">
                   <form method="GET" role="search" action="{{url('/buscarC')}}">
                        <div class="form-group">
                          <span>
                            <label>Buscar por:</label>
                            <select name="criterio">
                              <option value="id_cdp">Numero de CDP</option>
                              <option value="observaciones">Observaciones</option>
                              <option value="fecha">Fecha</option>
                            </select>
                          </span>
                          <hr />
                          <input type="text" class="form-control" placeholder="qué quieres ver?" name="search">
                        </div>
                        <button type="submit" class="btn btn-default">
                          Buscar
                        </button>
                    </form>
                    <hr />
                     @if(Auth::user()->role=='Admin'||Auth::user()->role=='Afin' )
                      <li><a href="{{route('crearCdp',null)}}">Crear CDP</a></li>
                      @endif
                  </div>
                </div>
            </div>
        <div class="col-md-9">            
            <div class="card " >
                <div class="card-header">Los últimos CDP's registrados y asignados a proceso</div>
                  <div class="card-body">
                    <table class="table table-bordered" id="tableSolicitudes">
                      <thead>
                        <tr>
                            <th class="text-center">Numero de CDP</th>
                            <th class="text-center">Fecha</th>
                            <th class="text-center">Numero de solicitud</th>
                            <th class="text-center">Proceso asignado</th>
                            <th class="text-center">Acciones</th>
                        </tr>
                      </thead>
                      <tbody>
                        <div id="listado">

                          @foreach($certificados as $cert)
                            <tr>
                              <td class="text-center">{{$cert->id_cdp}}</td>
                              <td class="text-center">{{ $cert->fecha}}</td>
                              <td class="text-center">{{ $cert->cod_solicitud}}</td>
                               <td class="text-center">{{ $cert->num_proceso}}</td>
                              <td class="text-center"><a href="{{route('mostrarC',['id'=>$cert->id_cdp])}}" class="btn btn-outline-info">Ver</a></td>
                            </tr>
                          @endforeach
                        </div>   
                      </tbody>
                      <tfoot>
                        <tr>
                          <th class="text-center">Numero de CDP</th>
                          <th class="text-center">Fecha</th>
                          <th class="text-center">Numero de solicitud</th>
                          <th class="text-center">Proceso asignado</th>
                          <th class="text-center">Acciones</th>
                        </tr>
                      </tfoot>
                    </table>
                
                  </div>
                </div>
                <div class="{{route('home')}}"><a href="" class="btn btn-outline-info">Volver</a></div>
        </div>

  </div>
 </div>
@endsection