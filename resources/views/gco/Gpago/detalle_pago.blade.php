@extends('layouts.app')


@section('content')
<div class="container">
	<div class="col-md-12 col-md-offset-3" >
		<h2>Detalle del Pago</h2>
		<hr/>
			<div class="col-md-8">
				<div class="card">
					<div class="card-header">No. de pago <b>{{$solicitud->id_pago}}</b></div>
				<!--datos de la solicitud-->

				<div class="card-body">
					@if(isset($solicitud ))
					<ul class="list-group">
					    <li class="list-group-item">Fecha de pago: {{$solicitud->f_pago}}</li>
					    <li class="list-group-item">Valor pagado: {{$solicitud->valor_pagado}} </li>
					    <li class="list-group-item">Saldo: {{$solicitud->valor_saldo}}</li>
					    <li class="list-group-item">Contrato:{{$solicitud->cod_contrato}}</li>
		   		        <li class="list-group-item">Observaciones:{{$solicitud->observaciones}}</li>
 				    </ul>
				  @endif
					<div class="pull-rigth">
						<a href="{{url('/gestionar-pago')}}" class="btn btn-primary">volver</a>
					</div>
				</div>
				</div>

			</div>

	</div>
					
</div>

@endsection