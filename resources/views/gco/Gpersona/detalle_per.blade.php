@extends('layouts.app')


@section('content')
<div class="container">
	<div class="col-md-12 col-md-offset-3" >
		<h2>Detalle del Contratista</h2>
		<hr/>
			<div class="col-md-8">
				<div class="card">
					<div class="card-header">No. de documento <b>{{$solicitud->documento}}</b></div>
				<!--datos de la solicitud-->

				<div class="card-body">
					@if(isset($solicitud ))
					<ul class="list-group">
					    <li class="list-group-item">Nombres: {{$solicitud->Nombres}} {{$solicitud->Apellidos}}</li>
					    <li class="list-group-item">Fecha de nacimiento: {{$solicitud->fecha_nac}} </li>
					    <li class="list-group-item">Correo Personal: {{$solicitud->correo_p}}</li>
					    <li class="list-group-item">Correo Institucional:{{$solicitud->correo_I}}</li>
					    <li class="list-group-item">Estado: 
								@if($solicitud->estado == 10)
                                Sin asignar Contrato 
                                @elseif($solicitud->estado == 20)
                                Con contrato Vigente
                                <a href="{{route('mostrarPer',['id'=>$pro->id_persona])}}" class="btn btn-outline-info">Ver Contrato</a>
                                @else
                                Inactivo
                                @endif
					    </li>
					      <li class="list-group-item">Link:{{$solicitud->link}}</li>
 				    </ul>
				  @endif
					<div class="pull-rigth">
						<a href="{{route('editPer',['id'=>$solicitud->documento])}}" class="btn btn-info">Editar</a>
						<a href="{{url('/gestionar-persona')}}" class="btn btn-primary">volver</a>
					</div>
				</div>
				</div>

			</div>

	</div>
					
</div>

@endsection