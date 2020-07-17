@extends('layouts.app')

@section('content')
	<div class="container">
		<div class="row">
			<h2>Crear Solicitud de CDP</h2>
			<hr>
			<form action="{{url('/guardar-solicitud')}}" method="post" enctype="multipart/form-data" class="col-lg-7">
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
					<label for="objeto">Objeto</label>
					<textarea class="form-control" id="objeto" name="objeto"> {{old('objeto')}} </textarea>
				</div>
				<div class="form-group">
					<label for="fuente">Fuente</label>
					<select class="form-control" id="fuente" name="fuente" value="{{old('fuente')}}">
						<option value=0>(Seleccionar)</option>
						<option value=1>FONAM</option>
						<option value=2>NACIÓN</option>
					</select>
				</div>
				<div class="form-group">
					<label for="valor">Valor</label>
					<input type="text" class="form-control" id="valor" name="valor" value="{{old('valor')}}"/>
				</div>
				<div class="form-group">
					<label for="nsol">Numero de solicitud</label>
					<input type="text" class="form-control" id="Numero_solicitud" name="Numero_solicitud" value="{{old('Numero_solicitud')}}"/>
				</div>
				<div class="form-group">
					<label for="exp">Expediente</label>
					<input type="text" class="form-control" id="exp" name="exp" value="{{old('exp')}}"/>
				</div>

				<div class="form-group">
					<label for="dep">Dependencia</label>
					<select class="form-control" id="dependencia" name="dependencia" value="{{old('dependencia')}}">
						<option value=0>(Seleccionar)</option>
						@foreach($areasP as $area)
						<option value={{$area->id_dep}}>{{$area->nombre}}</option>
						@endforeach						
					</select>

			
				</div>
				<div class="form-group">
					<label for="comentarios">Comentarios</label>
					<textarea class="form-control" id="classomentarios" name="comentarios">{{old('comentarios')}} </textarea>
				</div>
				<button type="submit" class="btn btn-success">Crear Solicitud</button>
			</form>
		</div>
	</div>

@endsection