
@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-around">
        <div class="col-md-3">
            <div class="card ">
                <div class="card-header">Buscar Garantía</div>
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
                   
                    <form method="GET" role="search" action="/buscarGar">
                        <div class="form-group">
                          <span>
                            <label>Buscar por:</label>
                            <select name="criterio">
                              <option value="id_garantia">Numero de garantia</option>
                              <option value="id_contrato">Contrato</option>
                              <option value="aseguradora">Aseguradora</option>
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
                     @if(Auth::user()->role=='Admin'||Auth::user()->role=='Agar' )
                      <li><a href="{{url('/crear-garantia')}}">Crear Garantia</a></li>
                      @endif
                  </div>
                </div>
              </div>

            <div class="col-md-9">
            <div class="card" >
                <div class="card-header">últimas garantías</div>
                  <div class="card-body">
                    <table class="table table-bordered" id="tableSolicitudes">
                      <thead>
                        <tr>
                            <th class="text-center">Codigo</th>
                            <th class="text-center">Aseguradora</th>
                            <th class="text-center">Fecha de expedición</th>
                            <th class="text-center">Fecha de aprobación</th>
                            <th class="text-center">Numero de anexo</th>
                            <th class="text-center">Acciones</th>
                        </tr>
                      </thead>
                      <tbody>
                        <div id="listado">
                          @foreach($rtas as $pro)                             
                            <tr>
                              <td class="text-center">{{ $pro->id_garantia}}</td>
                              <td class="text-center">{{ $pro->aseguradora}}</td>
                              <td class="text-center">{{ $pro->fecha_exp}}</td>
                              <td class="text-center">{{ $pro->f_aprobacion}}</td>
                              <td class="text-center">{{ $pro->Num_anexo}}</td>
                              @if(Auth::user()->role == "Admin")
                              <td class="text-center">
                              <!-- Botón en HTML (lanza el modal en Bootstrap) -->
                                  <a href="#victorModal{{$pro->id_garantia}}" role="button" class="btn btn-sm btn-primary" data-toggle="modal">Eliminar</a>
                                    
                                  <!-- Modal / Ventana / Overlay en HTML -->
                                  <div id="victorModal{{$pro->id_garantia}}" class="modal fade">
                                      <div class="modal-dialog">
                                          <div class="modal-content">
                                              <div class="modal-header">
                                                  <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                                                  <h4 class="modal-title">¿Estás seguro?</h4>
                                              </div>
                                              <div class="modal-body">
                                                  <p>¿Seguro que quieres borrar El proceso {{$pro->id_garantia}}?</p>
                                                  <p class="text-warning"><small>Si lo borras, nunca podrás recuperarlo.</small></p>
                                              </div>
                                              <div class="modal-footer">
                                                  <button type="button" class="btn btn-default" data-dismiss="modal">Cerrar</button>
                                                  <a href="{{url('/borraGar/'.$pro->id_garantia)}}" type="button" class="btn-danger">Eliminar</a>
                                              </div>
                                          </div>
                                      </div>
                                  </div>
                                 <a href="{{route('mostrarGar',['id'=>$pro->id_garantia])}}" class="btn btn-outline-info">Ver</a></td>
                              @else
                                <td class="text-center">
                                   <a href="{{route('mostrarGar',['id'=>$pro->id_garantia])}}" class="btn btn-outline-info">Ver</a></td>
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
         <div class="pull_rigth col-md-12">
                   <a href="{{url('/home')}}" class="btn btn-info">Página principal</a>
                 </div>  
 </div>
@endsection