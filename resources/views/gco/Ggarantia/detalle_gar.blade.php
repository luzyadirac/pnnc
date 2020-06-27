@extends('layouts.app')


@section('content')
<div class="container">
	<div class="col-md-12 col-md-offset-3" >
		<h2>Detalle de la Garantía</h2>
		<hr/>
			<div class="col-md-8">
				<div class="card">
					<div class="card-header">No. de garantía <b>{{$solicitud->id_garantia}}</b></div>
				<!--datos de la solicitud-->

				<div class="card-body">
					@if(isset($solicitud ))
					<ul class="list-group">
					    <li class="list-group-item">Aseguradora: {{$solicitud->Nombres}} {{$solicitud->Apellidos}}</li>
					    <li class="list-group-item">Fecha de expedición: {{$solicitud->fecha_nac}} </li>
					    <li class="list-group-item">Fecha de aprobación: {{$solicitud->correo_p}}</li>
					    <li class="list-group-item">Numero de anexo:{{$solicitud->Num_anexo}}</li>
					    <li class="list-group-item">Contrato:{{$solicitud->id_contrato }} </li>
					      <li class="list-group-item">Observaciones:{{$solicitud->observaciones}}</li>
 				    </ul>
				  @endif
					<div class="pull-rigth">
						<a href="{{route('editGar',['id'=>$solicitud->id_garantia])}}" class="btn btn-info">Editar</a>
						<a href="{{url('/gestionar-garantia')}}" class="btn btn-primary">volver</a>
					</div>
				</div>
				</div>

			</div>

	</div>
					
</div>

@endsection