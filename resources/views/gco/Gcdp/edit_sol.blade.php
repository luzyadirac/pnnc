@extends('layouts.app')

@section('content')
	<div class="container">
		<div class="row">
			<h2>Editar solicitud No. {{$solicitud->N_solCDP}}</h2>
			<hr>
			<form action="{{route('updateS',['id_sol'=>$solicitud->N_solCDP])}}" method="post" enctype="multipart/form-data" class="col-lg-7">
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
					<label for="valor"><b>Valor: </b></label>
					<label for="objeto">{{$solicitud->Valor}}</label>
					</div>
				<div class="form-group">
					<label for="exp"><b>Expediente:</b></label>
					<label for="objeto">{{$solicitud->N_radicado}}</label>				
				</div>
				<div class="form-group">
					<label for="exp"><b>Dependencia:</b></label>
					<label for="objeto">{{$solicitud->cod_dep}}</label>				
				</div>
					
			
				<div class="form-group">
					<label for="objeto">Objeto</label>
					<textarea class="form-control" id="objeto" name="objeto"> {{$solicitud->Objeto}} </textarea>
				</div>
				<div class="form-group">
					<label for="fuente">Fuente</label>
					<select class="form-control" id="fuente" name="fuente" value="{{old('fuente')}}">
						<option value=1>FONAM</option>
						<option value=2>NACIÓN</option>
					</select>
				</div>
				<div class="form-group">
					<label for="comentarios">Comentarios</label>
					<textarea class="form-control" id="comentarios" name="comentarios">{{$solicitud->Comentarios}} </textarea>
				</div>
				<button type="submit" class="btn btn-success">Actualizar Solicitud</button>

			</form>
		</div>
	</div>

@endsection