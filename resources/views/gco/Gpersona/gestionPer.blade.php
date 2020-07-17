
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
                   
                    <form method="GET" role="search" action="{{url('/buscarPer')}}">
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
                    @if(Auth::user()->role=='Admin'||Auth::user()->role=='Aper' )
                      <li><a href="{{url('/crear-persona')}}">Crear Contratista</a></li>
                    @endif
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
                          @if(!is_null($rtas))
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
                                <td class="text-center">
                                   <a href="{{route('mostrarPer',['id'=>$pro->id_persona])}}" class="btn btn-outline-info">Ver</a></td>   

                            </tr>
                          @endforeach
                        </div> 
                        @else
                               <label>PARA EMPEZAR...INGRESE POR LA BUSQUEDA LOS DATOS DEL CONTRATISTA QUE VA A ASIGNAR AL CONTRATO</label>  
                      @endif
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