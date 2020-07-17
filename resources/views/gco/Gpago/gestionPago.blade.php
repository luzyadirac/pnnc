
@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-around">
        <div class="col-md-3">
            <div class="card ">
                <div class="card-header">Buscar Pago</div>
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
                   
                    <form method="GET" role="search" action="{{url('/buscarPago')}}">
                        <div class="form-group">
                          <span>
                            <label>Buscar por:</label>
                            <select name="criterio">
                              <option value="f_pago">Fecha pago</option>
                              <option value="cod_contrato">Contrato</option>
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
                     @if(Auth::user()->role=='Admin'||Auth::user()->role=='Afin' )
                      <li><a href="{{url('/crear-pago')}}">Crear Pago</a></li>
                      @endif
                  </div>
                </div>
              </div>

            <div class="col-md-9">
            <div class="card" >
                <div class="card-header">últimos pagos realizados</div>
                  <div class="card-body">
                    <table class="table table-bordered" id="tableSolicitudes">
                      <thead>
                        <tr>
                            <th class="text-center">Numero de pago</th>
                            <th class="text-center">Fecha de pago</th>
                            <th class="text-center">Valor pagado</th>
                            <th class="text-center">Observaciones</th>
                            <th class="text-center">cod_contrato</th>
                            <th class="text-center">Acciones</th>
                        </tr>
                      </thead>
                      <tbody>
                        <div id="listado">
                          @foreach($rtas as $pro)                             
                            <tr>
                              <td class="text-center">{{ $pro->id_pago}}</td>
                              <td class="text-center">{{ $pro->f_pago}}</td>
                              <td class="text-center">{{ $pro->valor_pago}}</td>
                              <td class="text-center">{{ $pro->observaciones}}</td>
                              <td class="text-center">{{ $pro->cod_contrato}}</td>
                              @if(Auth::user()->role == "Admin")
                              <td class="text-center">
                              <!-- Botón en HTML (lanza el modal en Bootstrap) -->
                                  <a href="#victorModal{{$pro->id_pago}}" role="button" class="btn btn-sm btn-primary" data-toggle="modal">Eliminar</a>
                                    
                                  <!-- Modal / Ventana / Overlay en HTML -->
                                  <div id="victorModal{{$pro->id_pago}}" class="modal fade">
                                      <div class="modal-dialog">
                                          <div class="modal-content">
                                              <div class="modal-header">
                                                  <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                                                  <h4 class="modal-title">¿Estás seguro?</h4>
                                              </div>
                                              <div class="modal-body">
                                                  <p>¿Seguro que quieres borrar el pago {{$pro->id_pago}}?</p>
                                                  <p class="text-warning"><small>Si lo borras, nunca podrás recuperarlo.</small></p>
                                              </div>
                                              <div class="modal-footer">
                                                  <button type="button" class="btn btn-default" data-dismiss="modal">Cerrar</button>
                                                  <a href="{{url('/borraPago/'.$pro->id_pago)}}" type="button" class="btn-danger">Eliminar</button>
                                              </div>
                                          </div>
                                      </div>
                                  </div>
                                 <a href="{{route('mostrarPago',['id'=>$pro->id_pago])}}" class="btn btn-outline-info">Ver</a></td>
                              @else
                                <td class="text-center">
                                   <a href="{{route('mostrarPago',['id'=>$pro->id_pago])}}" class="btn btn-outline-info">Ver</a></td>
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