@extends('layouts.app')

@section('content')
	<div class="container">
		<div class="row">
			<h2>Editar CDP No. {{$rta->id_cdp}}</h2>
			<hr>
			<form action="{{route('updateC',['id'=>$rta->id_cdp])}}" method="post" enctype="multipart/form-data" class="col-lg-7">
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
					<label for="valor"><b>Fecha: </b></label>
					<label for="objeto">{{$rta->fecha}}</label>
					</div>
				<div class="form-group">
					<label for="exp"><b>No. Solicitud:</b></label>
					<label for="objeto">{{$rta->cod_sol}}</label>				
				</div>
		
				<div class="form-group">
					<label for="objeto"><b>Código de rubro</b></label>
					<textarea class="form-control" id="codigoR" name="codigoR"> {{$rta->codigo_rubro}} </textarea>
				</div>
				<div class="form-group">
					<label for="tipo"><b>Tipo:</b></label>
					<select class="form-control" id="tipo" name="tipo" value="{{old('tipo')}}">
						<option value=1>Funcionamiento</option>
						<option value=2>Inversión</option>
					</select>
				</div>
				<div class="form-group">
					<label for="observaciones"><b>Observaciones: </b></label>
					<textarea class="form-control" id="obs" name="obs">{{$rta->observaciones}} </textarea>
				</div>
				<button type="submit" class="btn btn-success">Actualizar CDP</button>

			</form>
		</div>
	</div>
@endsection