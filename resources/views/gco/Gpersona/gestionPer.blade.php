
@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-around">
        <div class="col-md-3">
            <div class="card ">
                <div class="card-header">Buscar Contratista</div>
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
                   
                    <form method="GET" role="search" action="/buscarPer">
                        <div class="form-group">
                          <span>
                            <label>Buscar por:</label>
                            <select name="criterio">
                              <option value="documento">Numero de documento</option>
                              <option value="Apellidos">Apellidos</option>
                              <option value="correo_I">Correo institucional</option>
                            </select>
                          </span>
                          <hr />
                          <input type="text" class="form-control" placeholder="ingrese dato a buscar" name="search">
                        </div>
                          <button type="submit" class="btn btn-default">
                          Buscar
                        </button>
                    </form>
                    <hr />
                      <li><a href="{{url('/crear-persona')}}">Crear Contratista</a></li>
                  </div>
                </div>
              </div>

            <div class="col-md-9">
            <div class="card" >
                <div class="card-header">Contratistas Recientes</div>
                  <div class="card-body">
                    <table class="table table-bordered" id="tableSolicitudes">
                      <thead>
                        <tr>
                            <th class="text-center">Documento de Contratista</th>
                            <th class="text-center">Nombres</th>
                            <th class="text-center">Profesión</th>
                            <th class="text-center">Estado</th>
                            <th class="text-center">Acciones</th>
                        </tr>
                      </thead>
                      <tbody>
                        <div id="listado">
                          @foreach($rtas as $pro)                             
                            <tr>
                              <td class="text-center">{{ $pro->documento}}</td>
                              <td class="text-center">{{ $pro->Nombres}} {{ $pro->Apellidos}}</td>
                              <td class="text-center">{{ $pro->profesion}}</td>
                              <td class="text-center">
                                @if($pro->estado == 10)
                                Sin asignar Contrato 
                                @elseif($pro->estado == 20)
                                Con contrato Vigente
                                @else
                                Inactivo
                                @endif
                                </td>
                  
                              @if(Auth::user()->role == "Admin")
                              <td class="text-center">
                              <!-- Botón en HTML (lanza el modal en Bootstrap) -->
                                  <a href="#victorModal{{$pro->num_proceso}}" role="button" class="btn btn-sm btn-primary" data-toggle="modal">Eliminar</a>
                                    
                                  <!-- Modal / Ventana / Overlay en HTML -->
                                  <div id="victorModal{{$pro->num_proceso}}" class="modal fade">
                                      <div class="modal-dialog">
                                          <div class="modal-content">
                                              <div class="modal-header">
                                                  <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                                                  <h4 class="modal-title">¿Estás seguro?</h4>
                                              </div>
                                              <div class="modal-body">
                                                  <p>¿Seguro que quieres borrar El proceso {{$pro->num_proceso}}?</p>
                                                  <p class="text-warning"><small>Si lo borras, nunca podrás recuperarlo.</small></p>
                                              </div>
                                              <div class="modal-footer">
                                                  <button type="button" class="btn btn-default" data-dismiss="modal">Cerrar</button>
                                                  <button type="button" class="btn btn-danger">Eliminar</button>
                                              </div>
                                          </div>
                                      </div>
                                  </div>
                                 <a href="{{route('mostrarPer',['id'=>$pro->id_persona])}}" class="btn btn-outline-info">Ver</a></td>
                              @else
                                <td class="text-center">
                                   <a href="{{route('mostrarPer',['id'=>$pro->id_persona])}}" class="btn btn-outline-info">Ver</a></td>
                              @endif

                            </tr>
                          @endforeach
                        </div>   
                      </tbody>
                     
                    </table>
                    {{$rtas->links()}}
                  </div>
                </div>
            </div>
        
    </div>    
 </div>
@endsection