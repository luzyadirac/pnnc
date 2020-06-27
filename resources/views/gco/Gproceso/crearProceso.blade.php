@extends('layouts.app')

@section('content')
	<div class="container">
		<div class="row">
			<h2>Crear Proceso de Contratacion</h2>
			<hr>
			<form action="{{url('/guardar-proceso')}}" method="POST" enctype="multipart/form-data" class="col-lg-7">
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
					<label for="objeto">Numero de proceso</label>
					<input type="text" class="form-data" id="Nproceso" name="Nproceso" value="{{old('Nproceso')}}" />
				</div>
				<div class="form-group">
					<label for="fuente">Modalidad</label>
					<select class="form-control" id="modalidad" name="modalidad">
						<option value=100>CONCURSO DE MÉRITOS ABIERTO</option>
						<option value=200>CONTRATACIÓN DIRECTA</option>
						<option value=300>LICITACIÓN PÚBLICA</option>
						<option value=400>SELECCIÓN ABREVIADA</option>
						<option value=500>MÍNIMA CUANTÍA</option>
						<option value=600>ACUERDO MARCO DE PRECIO</option>
						<option value=700>SELECCIÓN ABREVIADA SUBASTA INVERSA</option>
						<option value=998> 99999998 NO APLICA</option>
				</select>
				</div>
				<div class="form-group">
					<label for="valor">Abogado</label>
					<select class="form-control" id="abogado" name="abogado">
					    <option value=1016071808>Camila Barrantes</option>
						<option value=26421443>Leidy Serrano</option>
						<option value=51717059>Lila Zabaraín</option>
						<option value=51760900>Liliana Murillo</option>
						<option value=79906334>Luis Alberto Villamil</option>
						<option value=51889049>Luz Janeth Villalba</option>
						<option value=93414563>Mauricio Villegas</option>
						<option value=43035809>Martha Lopez</option>
						<option value=80073591>Nelson Cadena</option>
						<option value=1015394967>Catalina Peña</option>						
				</select>
				</div>
				<div class="form-group">
					<label for="nsol">Fecha de Reparto</label>
					<input type="date" class="form-control" id="freparto" name="freparto" value="{{old('freparto')}}" placeholder="aaa-mm-dd" />
				</div>
				<div class="form-group">
					<label for="exp">Link del Secop </label>
					<input type="text" class="form-control" id="enlace" name="enlace" value="{{old('enlace')}}"/>
				</div>

				<div class="form-group">					
					<label for="Ndp">CDP</label>
					<input type="text" class="form-control" id="Ncdp" name="Ncdp" value="{{old('Ncdp')}}"/>
					<a href="{{ url('/buscarA')}}">Ver CDPs</a>
				</div>
				<div class="form-group">
					<label for="comentarios">Estado</label>
					<select class="form-control" id="estado" name="estado">
						<option value=999>Asignado / pendiente</option>
						<option value=100>Creado / publicado</option>
						<option value=200>Adjudicado</option>
						<option value=300>Desierto</option>						
				</select>
				</div>
				<button type="submit" class="btn btn-success">Crear Proceso</button>
			</form>
		</div>
	</div>

@endsection