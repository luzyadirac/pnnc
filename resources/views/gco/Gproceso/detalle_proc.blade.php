@extends('layouts.app')


@section('content')
<div class="container">
	<div class="col-md-12 col-md-offset-3" >
		<h2>Detalle del Proceso de Contratación </h2>
		<hr/>
			<div class="col-md-8">
				<div class="card">
					<div class="card-header">No. de proceso <b>{{$solicitud->num_proceso}}</b></div>
				<!--datos de la solicitud-->

				<div class="card-body">
					@if(isset($solicitud ))
					<ul class="list-group">
					    <li class="list-group-item">Modalidad: {{$solicitud->modalidad}}</li>
					    <li class="list-group-item">Abogado: {{$solicitud->abogado}} </li>
					    <li class="list-group-item">Fecha de Reparto: {{$solicitud->f_reparto}}</li>
					    <li class="list-group-item">Código de CDP:{{$solicitud->cod_cdp}}</li>
					    <li class="list-group-item">Estado: 
					    	@if($solicitud->estado == 100)
					    	Creado 
					    	@else
					    	Adjudicado
					    	@endif
					    </li>
					      <li class="list-group-item">Link:{{$solicitud->link}}</li>
 				    </ul>
				  @endif
					<div class="pull-rigth">
						<a href="{{route('editP',['id'=>$solicitud->num_proceso])}}" class="btn btn-info">Editar</a>
						<a href="{{url('/gestionar-proceso')}}" class="btn btn-primary">volver</a>
					</div>
				</div>
				</div>

			</div>

	</div>
					
</div>

@endsection