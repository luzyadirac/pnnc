@extends('layouts.app')

@section('content')
	<div class="container">
		<div class="row">
			<h2>Crear Contratista</h2>
			<hr>
			<form action="{{url('/guardar-persona')}}" method="POST" enctype="multipart/form-data" class="col-lg-8">
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
					<label for="valor">Tipo de documento</label>
					<select class="form-control" id="tdoc" name="tdoc">
						<option value=1>NIT</option>
						<option value=3>CEDULA DE CIUDADANÍA</option>
						<option value=4>CÉDULA DE EXTRANJERÍA</option>
						<option value=2>RUT - REGISTRO ÚNICO TRIBUTARIO</option>
					</select>

					</div>
				<div class="form-group">
					<label for="numero">Documento</label>
					<input type="number" class="form-data" id="documento" name="documento" value="{{old('documento')}}" />
				</div>		
				<div class="form-group">
					<label for="nombre">Nombres</label>
					<input type="text" class="form-control" id="nombre" name="nombre" value="{{old('nombre')}}"  />
				</div>
				<div class="form-group">
					<label for="apellido">Apellidos</label>
					<input type="text" class="form-control" id="apellido" name="apellido" value="{{old('apellido')}}" />
				</div>
				<div class="form-group">
					<label for="tel">Telefono</label>
					<input type="number" class="form-control" id="tel" name="tel" value="{{old('tel')}}" placeholder="10 digitos, si es fijo con el indicativo"/>
				</div>
				<div class="form-group">
					<label for="genero">Genero</label>
					<select class="form-control" id="genero" name="genero" >
						<option value=1>Hombre</option>
						<option value=2>Mujer</option>
						<option value=3>Otro</option>
					</select>
				</div>
				<div class="form-group">
					<label for="f_nac">Fecha de nacimiento</label>
					<input type="date" class="form-control" id="f_nac" name="f_nac" value="{{old('f_nac')}}"/>
				</div>
				<div class="form-group">
					<label for="mail_p">Correo personal</label>
					<input type="email" class="form-control" id="mail_p" name="mail_p" value="{{old('mail_p')}}" />
				</div>
				<div class="form-group">
					<label for="mail_i">Correo laboral</label>
					<input type="email" class="form-control" id="mail_i" name="mail_i" value="{{old('mail_i')}}" placeholder="@parqueasnacionales.gov.co" />
				</div>

				<div class="form-group">
					<label for="exp">Profesión</label>
					<input type="text" class="form-control" id="profesion" name="profesion" value="{{old('profesion')}}" placeholder="ENTERO 100" />
				</div>
				<div class="form-group">
					<label for="formacion">Formación</label>
					<select class="form-control" id="formacion" name="formacion">
						<option value="Bachiller">Bachiller</option>
						<option value="Tecnico">Tecnico</option>
						<option value="Tecnologo">Tecnologo</option>
						<option value="Universitario">Universitario</option>
						<option value="Profesional">Profesional</option>
						<option value="Especializacion">Especializacion</option>
						<option value="Maestria">Maestria</option>
						<option value="Doctorado">Doctorado</option>
					</select>
				</div>
				<div class="form-group">
					<label for="experiencia">Experiencia</label>
					<input type="text" class="form-control" id="experiencia" name="experiencia" value="{{old('experiencia')}}" placeholder="dias-meses-años" />
				</div>
				<div class="form-group">
					<label for="hv">Numero HV en Sigep</label>
					<input type="text" class="form-control" id="hv" name="hv" value="{{old('hv')}}" />
				</div>

				<div class="form-group">
					<label for="clase">Clase</label>
					<select class="form-control" id="clase" name="clase">
						<option value="Contratista">Contratista</option>
						<option value="Funcionario">Funcionario</option>
						<option value="Proveedor">Proveedor</option>
					</select>
				</div>
				<div class="form-group">
					<label for="estado">Estado</label>
					<select class="form-control" id="estado" name="estado">
						<option value="10">Sin asignar</option>
						<option value="20">Activo</option>
						<option value="30">Inactivo</option>
					</select>
				</div>
				
				<div class="form-group">
					<label for="obs">Observaciones</label>
					<textarea class="form-control" id="obs" name="obs">{{old('obs')}} </textarea>
				</div>
					<button type="submit" class="btn btn-success">Crear Persona</button>
			</form>
		</div>
	</div>

@endsection