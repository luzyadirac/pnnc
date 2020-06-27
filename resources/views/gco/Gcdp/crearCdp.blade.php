@extends('layouts.app')

@section('content')
	<div class="container">
		<div class="row">
			<h2>Crear CDP</h2>
			<hr>
			<form action="{{url('/guardar-cdp')}}" method="POST" enctype="multipart/form-data" class="col-lg-7">
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
					<label for="objeto">Numero de CDP</label>
					<input type="number" class="form-control" id="Ncdp" name="Ncdp" value="{{old('Ncdp')}}"  />
					
				</div>
				<div class="form-group">
					<label for="fuente">Fecha</label>
					<input type="date" class="form-control" id="fecha" name="fecha" value="{{old('fecha')}}"/>
				</div>
				<div class="form-group">
					<label for="valor">Codigo del rubro</label>
					<input type="text" class="form-control" id="rubro" name="rubro" value="{{old('rubro')}}"  />
				</div>
				<div class="form-group">
					<label for="nsol">Tipo</label>
					<select class="form-control" id="tipo" name="tipo" value="{{old('tipo')}}">
						<option value=1>Administración</option>
						<option value=2>Fortalecimiento</option>				
					</select>
				</div>
				<div class="form-group">
					<label for="exp">Observaciones</label>
					<input type="text" class="form-control" id="obs" name="obs" value="{{old('obs')}}"/>
				</div>

				<div class="form-group">
					<label for="dep">Solicitud </label>

					@if(isset($ident))
						<input type="text" class="form-control" id="Nsol" name="Nsol" value={{$ident->N_solCDP}} />
					@else
						<select class="form-control" id="Nsol" name="Nsol" value="{{old('Nsol')}}">
							<option value=null>(Seleccionar)</option>
							@foreach($solicitudes as $sol)
							<option value={{$sol->N_solCDP}}>{{$sol->N_solCDP}}</option>
							@endforeach						
						</select>
					@endif
				</div>
					<button type="submit" class="btn btn-success">Crear CDP</button>
			</form>
		</div>
	</div>

@endsection