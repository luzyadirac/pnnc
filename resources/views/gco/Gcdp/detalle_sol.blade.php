@extends('layouts.app')


@section('content')
<div class="container">
	<div class="col-md-12 col-md-offset-3" >
		<h2>Detalle de la solicitud </h2>
		<hr/>
			<div class="col-md-8">
				<div class="card">
					<div class="card-header">No. de solicitud <b>{{$solicitud->N_solCDP}}</b></div>
				<!--datos de la solicitud-->

				<div class="card-body">
					@if(isset($solicitud ))
					<ul class="list-group">
					    <li class="list-group-item">Objeto: {{$solicitud->Objeto}}</li>
					    <li class="list-group-item">Fuente: 
					    	@if($solicitud->fuente == 1)
					    	Fonam
					    	@else
					    	Nación
					    	@endif
					    </li>
					    <li class="list-group-item">Valor: {{$solicitud->Valor}} </li>
					    <li class="list-group-item">Expediente: {{$solicitud->N_radicado}}</li>
					    <li class="list-group-item">Dependencia:{{$solicitud->depen->nombre}}</li>
					    <li class="list-group-item">Estado: 
					    	@if($solicitud->estado == 1)
					    	Sin Asignar a CDP
					    	<div class="pull-rigth">
					    		<a href="{{route('crearCdp',['ident'=>$solicitud->N_solCDP])}}">Crear CDP</a></li>
					    	</div>
					    	@else
					    	con CDP asignado
					    	@endif
					    </li>
					    <li class="list-group-item">Comentarios: {{$solicitud->Comentarios}}</li>
 				    </ul>
				  @endif
					<div class="pull-rigth">
						<a href="{{route('editS',['id_sol'=>$solicitud->N_solCDP])}}" class="btn btn-info">Editar</a>
						<a href="{{url('/gestionar-cdp')}}" class="btn btn-primary">volver</a>
					</div>
				</div>
				</div>
			</div>

	</div>
					
</div>

@endsection