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
					<label for="anuncio">Recuerde que el número de proceso: </label>
					<label for="anuncio"><b>Modalidad - Área protegida - consecutivo - año vigencia </b></label>
				</div>
				<div class="form-group">
					<label for="objeto">Numero de proceso</label>
					<input type="text" class="form-data" id="Numero_proceso" name="Numero_proceso" value="{{old('Numero_proceso')}}" placeholder="Ejemplo: CD-NC-0**-2020" />
				</div>
				<div class="form-group">
					<label for="fuente">Modalidad</label>
					<select class="form-control" id="modalidad" name="modalidad">
						<option value=0>(Seleccionar)</option>
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
						<option value=0>(Seleccionar)</option>
					    <option value="Camila Barrantes">Camila Barrantes</option>
						<option value="Leidy Serrano">Leidy Serrano</option>
						<option value="Lila Zabaraín">Lila Zabaraín</option>
						<option value="Liliana Murillo">Liliana Murillo</option>
						<option value="Luis Alberto Villamil">Luis Alberto Villamil</option>
						<option value="Luz Janeth Villalba">Luz Janeth Villalba</option>
						<option value="Mauricio Villegas">Mauricio Villegas</option>
						<option value="Martha Lopez">Martha Lopez</option>
						<option value="Nelson Cadena">Nelson Cadena</option>
						<option value="Catalina Peña">Catalina Peña</option>						
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
					<label for="Numero_dp">CDP</label>
					<input type="text" class="form-control" id="Numero_cdp" name="Numero_cdp" value="{{old('Numero_cdp')}}"/>
					<a href="{{ url('/buscarA')}}">Ver CDPs</a>
				</div>
				<div class="form-group">
					<label for="comentarios">Estado</label>
					<select class="form-control" id="estado" name="estado">
						<option value=0>(Seleccionar)</option>
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