
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
                   
                    <form method="GET" role="search" action="/buscarS">
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
                          <input type="text" class="form-control" placeholder="qué quieres ver?" name="search">
                        </div>
                        <button type="submit" class="btn btn-default">
                         Buscar
                        </button>
                    </form>
                    <hr />
                      <li><a href="{{url('/crear-solicitud')}}">Crear Solicitud</a></li>
                  </div>
                </div>
              </div>
            <div class="col-md-9">
            <div class="card" >
                <div class="card-header">Solicitudes sin asignar</div>
                  <div class="card-body">
                    <table class="table table-bordered" id="tableSolicitudes">
                      <thead>
                        <tr>
                            <th class="text-center">Numero de solicitud</th>
                            <th class="text-center">Fuente</th>
                            <th class="text-center">Dependencia</th>
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
                              @if(Auth::user()->role == "Admin")
                              <td class="text-center">
                              <!-- Botón en HTML (lanza el modal en Bootstrap) -->
                                  <a href="#victorModal{{$solicitud->N_solCDP}}" role="button" class="btn btn-sm btn-primary" data-toggle="modal">Eliminar</a>
                                    
                                  <!-- Modal / Ventana / Overlay en HTML -->
                                  <div id="victorModal{{$solicitud->N_solCDP}}" class="modal fade">
                                      <div class="modal-dialog">
                                          <div class="modal-content">
                                              <div class="modal-header">
                                                  <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                                                  <h4 class="modal-title">¿Estás seguro?</h4>
                                              </div>
                                              <div class="modal-body">
                                                  <p>¿Seguro que quieres borrar la solicitud {{$solicitud->N_solCDP}}?</p>
                                                  <p class="text-warning"><small>Si lo borras, nunca podrás recuperarlo.</small></p>
                                              </div>
                                              <div class="modal-footer">
                                                  <button type="button" class="btn btn-default" data-dismiss="modal">Cerrar</button>
                                                  <button type="button" class="btn btn-danger">Eliminar</button>
                                              </div>
                                          </div>
                                      </div>
                                  </div>
                                 <a href="{{route('mostrarS',['id_sol'=>$solicitud->N_solCDP])}}" class="btn btn-outline-info">Ver</td>
                              @else
                                <td class="text-center">
                                   <a href="{{route('mostrarS',['id_sol'=>$solicitud->N_solCDP])}}" class="btn btn-outline-info">Ver</td>
                              @endif

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
          <br>
    <div class="row justify-content-around">
        <div class="col-md-3">
            <div class="card ">
                <div class="card-header">Buscar CDP</div>
                  <div class="card-body">
                   <form method="GET" role="search" action="/buscarC">
                        <div class="form-group">
                          <span>
                            <label>Buscar por:</label>
                            <select name="criterio">
                              <option value="id_cdp">Numero de CDP</option>
                              <option value="observaciones">otro</option>
                              <option value="Objeto">otro</option>
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
                      <li><a href="{{url('/crear-cdp')}}">Crear CDP</a></li>
                  </div>
                </div>
            </div>
        <div class="col-md-9">            
            <div class="card " >
                <div class="card-header">Los últimos CDP's registrados</div>
                  <div class="card-body">
                    <table class="table table-bordered" id="tableSolicitudes">
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

                          @foreach($certificados as $cert)
                            <tr>
                              <td class="text-center">{{$cert->id_cdp}}</td>
                              <td class="text-center">{{ $cert->fecha}}</td>
                              <td class="text-center">{{ $cert->cod_solicitud}}</td>
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