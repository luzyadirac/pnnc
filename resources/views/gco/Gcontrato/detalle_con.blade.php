@extends('layouts.app')


@section('content')
<div class="container">
	<div class="col-md-12 col-md-offset-3" >
		<h2>Detalle del Contrato</h2>
		<hr/>
			<div class="col-md-8">
				<div class="card">
					<div class="card-header">No. de contrato <b>{{$solicitud->num_cto}}</b></div>
				<!--datos de la solicitud-->

				<div class="card-body">
					@if(isset($solicitud ))
					<ul class="list-group">
						<li class="list-group-item">Contratista: {{$solicitud->contratista}}</li>
						<li class="list-group-item">Fecha de Suscripción: {{$solicitud->f_susc}}</li>
					    <li class="list-group-item">Clase: {{$solicitud->clase}}</li>
					    <li class="list-group-item">Fuente: 
					    	@if($solicitud->fuente == 1)
					    	Fonam
					    	@else
					    	Nación
					    	@endif
					    </li>
					    <li class="list-group-item">Valor mensual: {{$solicitud->valor_mes}} </li>
					    <li class="list-group-item">Expediente: {{$solicitud->valor_total}}</li>
					    <li class="list-group-item">Plazo:{{$solicitud->plazo}}</li>
					    <li class="list-group-item">Fecha de inicio: {{$solicitud->f_ini}}</li>
					    <li class="list-group-item">Fecha de Terminación: {{$solicitud->f_fin}}</li>
					    <li class="list-group-item">Expediente virtual: {{$solicitud->expediente}}</li>
					    <li class="list-group-item">Nivel: 
					    	@if($solicitud->cod_nivel ==40)
					    	Asistencial
					    	@elseif($solicitud->cod_nivel ==30)
					    	Técnico
					    	@elseif($solicitud->cod_nivel ==20)
					    	profesional
					    	@else
					    	directivo
					    	@endif
					    </li>
					    <li class="list-group-item">
					    	@if($solicitud->cod_maa ==30)
					    	Apoyo
					    	Técnico
					    	@elseif($solicitud->cod_maa ==20)
					    	Administrativo
					    	@else
					    	Misional
					    	@endif
					    </li>
					    	<li class="list-group-item"> Registro presupuestal: 
					    		@foreach($registros as $registro)
					    		<p>
					    		 		{{$registro->id_rp}} 
					    		 	</p>
					    		@endforeach
							<a href="{{route('crearRp',['id'=>$solicitud->num_cto])}}">Crear RP</a></li>
					    <li class="list-group-item">Comentarios: {{$solicitud->observaciones}}  </li>
 				    </ul>
				  @endif
					<div class="pull-rigth">
						 @if(Auth::user()->role=='Admin'||Auth::user()->role=='Ages' )
						<a href="{{route('editCon',['id'=>$solicitud->num_cto])}}" class="btn btn-info">Editar</a>
						@endif
						<a href="{{url('/gestionar-contrato')}}" class="btn btn-primary">volver</a>
					</div>
				</div>
				</div>

			</div>

	</div>
					
</div>

@endsection