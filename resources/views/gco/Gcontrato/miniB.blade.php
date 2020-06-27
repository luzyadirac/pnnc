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
                   
                    <form method="GET" role="search" action="/buscarPer2">
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
                      
                  </div>
                </div>
              </div>

            <div class="col-md-9">
            <div class="card" >
                <div class="card-header">Contratistas Encontrados</div>
                  <div class="card-body">
                    <table class="table table-bordered" id="tableSolicitudes">
                      <thead>
                        <tr>                        
                            <th class="text-center">Documento de Contratista</th>
                            <th class="text-center">Nombres</th>
                            <th class="text-center">Correo institucional</th>
                            <th class="text-center">Profesión</th>
                            <th class="text-center">Acciones</th>
                        </tr>
                      </thead>
                      <tbody>
                        <div id="listado">
                          @if(isset($resultado))
                          @foreach($resultado as $result)
                            <tr>
                              <td class="text-center">{{$result->documento}}</td>
                              <td class="text-center">{{ $result->Nombres}}</td>
                              <td class="text-center">{{ $result->correo_I}}</td>
                              <td class="text-center">{{ $result->profesion  }}</td>
                              <td><a href="{{route('crearContrato',['id'=>$result->documento])}}" class="btn btn-outline-info">Seleccionar</a></td>
                            </tr>
                          @endforeach
                          @endif
                        </div>   
                      </tbody>
                           

                      </table>
                  </div>
                </div>
            </div>
        
    </div>    
 </div>
@endsection