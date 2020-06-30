
@extends('layouts.app')


@section('content')
<div class="container">
    <div class="row justify-content-around">
        <div class="col-md-3">
            <div class="card ">
                <div class="card-header">Reportes</div>
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
                   Seleccione el tipo de reporte que desea:
                                      <hr />
                      <li><a href="{{route('gestionarReport','1')}}">Reportes Generales</a></li>
                                          <hr />
                      <li><a href="{{route('gestionarReport','2')}}">Reportes de Seguimiento</a></li> 
                  </div>
                </div>
              </div>

            <div class="col-md-9">
            <div class="card" >
                <div class="card-header">Listado de reportes</div>
                  <div class="card-body">
                    @if($dato == '1')
                        @include ('gco.Greportes.generales') 
                    @endif
                    @if($dato == '2')
                        @include ('gco.Greportes.auditor') 
                    @endif
                    
                  </div>
                </div>
            </div>
        
    </div>    
 </div>
@endsection