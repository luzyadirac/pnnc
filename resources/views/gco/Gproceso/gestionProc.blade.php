
@extends('layouts.app')


@section('content')
<div class="container">
    <div class="row justify-content-around">
        <div class="col-md-3">
            <div class="card ">
                <div class="card-header">Buscar Proceso</div>
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
                   
                    <form method="GET" role="search" action="{{url('/buscarP/')}}">
                        <div class="form-group">
                          <span>
                            <label>Buscar por:</label>
                            <select name="criterio">
                              <option value="num_proceso">Numero de proceso</option>
                              <option value="abogado">Abogado</option>
                              <option value="modalidad">Modalidad</option>
                              <option value="estado">Estado</option>
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
                      <li><a href="{{url('/crear-proceso')}}">Crear Proceso</a></li>
                  </div>
                </div>
              </div>

            <div class="col-md-9">
            <div class="card" >
                <div class="card-header">Procesos Recientes</div>
                  <div class="card-body">
                    <table class="table table-bordered" id="tableSolicitudes">
                      <thead>
                        <tr>
                            <th class="text-center">Numero de Proceso</th>
                            <th class="text-center">Modalidad</th>
                            <th class="text-center">Abogado</th>
                            <th class="text-center">Acciones</th>
                        </tr>
                      </thead>
                      <tbody>
                        <div id="listado">
                          @foreach($rtas as $pro)
                             
                            <tr>
                              <td class="text-center">{{ $pro->num_proceso}}</td>
                              <td class="text-center">{{ $pro->modalidad}}</td>
                              <td class="text-center">{{ $pro->abogado}}</td>
                                <td class="text-center">
                                   <a href="{{route('mostrarP',['id'=>$pro->num_proceso])}}" class="btn btn-outline-info">Ver</td>

                            </tr>
                          @endforeach
                        </div>   
                      </tbody>
                      <tfoot>
                        <tr>
                          <th class="text-center">Numero de Proceso</th>
                          <th class="text-center">Modalidad</th>
                          <th class="text-center">Abogado</th>
                          <th class="text-center">Acciones</th>
                        </tr>
                      </tfoot>
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