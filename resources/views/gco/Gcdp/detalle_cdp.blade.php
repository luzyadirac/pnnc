@extends('layouts.app')


@section('content')
<div class="container">
	<div class="col-md-12 col-md-offset-3" >
		<h2>Detalle del CDP</h2>
		<hr/>
			<div class="col-md-8">
				<div class="card">
					<div class="card-header">No. de CDP <b>{{$rta->id_cdp}}</b></div>
				<!--datos de la solicitud-->

				<div class="card-body">
					@if(isset($rta ))
					<ul class="list-group">
					    <li class="list-group-item">Fecha: {{$rta->fecha}}</li>
					    <li class="list-group-item">Tipo: 
					    	@if($rta->tipo == 1)
					    	Funcionamiento
					    	@else
					    	Inversión
					    	@endif
					    </li>
					    <li class="list-group-item">No de Solicitud: {{$rta->cod_solicitud}} </li>
					    <li class="list-group-item">Última actualización: {{$rta->updated_at}}</li>
					    <li class="list-group-item">Observacioness: {{$rta->observaciones}}</li>
 				    </ul>
				  @endif
					<div class="pull-rigth">
						<a href="{{route('editC',['id'=>$rta->id_cdp])}}" class="btn btn-info">Editar</a>
						<a href="{{url('/gestionar-cdp')}}" class="btn btn-primary">volver</a>
					</div>
				</div>
				</div>

			</div>

	</div>
					
</div>

@endsection