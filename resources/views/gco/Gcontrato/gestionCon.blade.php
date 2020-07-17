
@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-around">
        <div class="col-md-3">
            <div class="card ">
                <div class="card-header">Buscar Contrato</div>
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
                   
                    <form method="GET" role="search" action="/buscarCon">
                        <div class="form-group">
                          <span>
                            <label>Buscar por:</label>
                            <select name="criterio">
                              <option value="num_cto">Numero de Contrato</option>
                              <option value="supervisor">Contratista</option>
                              <option value="clase">Clase</option>
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
                     @if(Auth::user()->role=='Admin'||Auth::user()->role=='Ages' )
                      <li><a href="{{route('crearContrato',['null'])}}">Crear Contrato</a></li>
                      @endif
                  </div>
                </div>
              </div>

            <div class="col-md-9">
            <div class="card" >
                <div class="card-header">Contratos Recientes</div>
                  <div class="card-body">
                    <table class="table table-bordered" id="tableSolicitudes">
                      <thead>
                        <tr>
                            <th class="text-center">Numero de Contrato</th>
                            <th class="text-center">Contratista</th>
                            <th class="text-center">Clase de Contrato</th>
                            <th class="text-center">Acciones</th>
                        </tr>
                      </thead>
                      <tbody>
                        <div id="listado">
                          @foreach($rtas as $pro)                             
                            <tr>
                              <td class="text-center">{{ $pro->num_cto}}</td>
                              <td class="text-center">{{ $pro->contratista}}</td>
                              <td class="text-center">{{ $pro->clase}}</td>                                                                          
                              <td class="text-center">
                                   <a href="{{route('mostrarCo',['id'=>$pro->id])}}" class="btn btn-outline-info">Ver</td>           

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