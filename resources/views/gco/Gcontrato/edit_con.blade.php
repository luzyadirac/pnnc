@extends('layouts.app')

@section('content')
	<div class="container">
		<div class="row">
			<h2>Editar Contrato No. {{$rta->num_cto}}</h2>
			<hr>
			<form action="{{route('updateCon',['id'=>$rta->id])}}" method="post" enctype="multipart/form-data" class="col-lg-7">
			{!! csrf_field()!!}
				@if($errors->any())
				<div class="alert alert-danger">
					<ul>
						@foreach($errors->all() as $error)
							<li>{{$error}}</li>
						@endforeach
					</ul>
				</div>
				@endif
				<div class="form-group">
					<label for="valor"><b>Fecha de suscripción: </b></label>
					<label for="objeto">{{$rta->f_susc}}</label>
					</div>
				<div class="form-group">
					<label for="exp"><b>Clase:</b></label>
					<label for="objeto">{{$rta->clase}}</label>				
				</div>
				<div class="form-group">
					<label for="exp"><b>Valor Mensual:</b></label>
					<label for="objeto">{{$rta->valor_mes}}</label>				
				</div>
				<div class="form-group">
					<label for="exp"><b>Valor Total:</b></label>
					<label for="objeto">{{$rta->valor_total}}</label>				
				</div>		
				<div class="form-group">
					<label for="objeto"><b>Observaciones de pago</b></label>
					<textarea class="form-control" id="o_pago" name="o_pago"> {{$rta->obs_pago}} </textarea>
				</div>
				<div class="form-group">
					<label for="objeto"><b>Plazo</b></label>
					<textarea class="form-control" id="plazo" name="plazo"> {{$rta->plazo}} </textarea>
				</div>
				<div class="form-group">
					<label for="tipo"><b>Supervisor:</b></label>
					<input type="text" class="form-control" id="super" name="super" value="{{$rta->supervisor}}" />
				</div>
				<div class="form-group">
					<label for="observaciones"><b>Observaciones: </b></label>
					<textarea class="form-control" id="obs" name="obs">{{$rta->observaciones}} </textarea>
				</div>
				<button type="submit" class="btn btn-success">Actualizar Contrato</button>

			</form>
		</div>
	</div>
@endsection