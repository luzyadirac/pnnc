@extends('layouts.app')

@section('content')
	<div class="container">
		<div class="row">
			<h2>Crear Rp para el contrato </h2>
			<hr>
			<form action="{{url('/guardar-rp')}}" method="POST" enctype="multipart/form-data" class="col-lg-7">
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
					<label for="numero">Numero de Registro</label>
					<input type="text" class="form-control" id="nreg" name="nreg" value="{{old('nreg')}}"  />	
				</div>
				<div class="form-group">
					<label for="fuente">Fecha de creación</label>
					<input type="date" class="form-control" id="freg" name="freg" value="{{old('freg')}}"/>
				</div>
				<div class="form-group">
					<label for="nsol">Subprograma</label>
					<input type="text" class="form-control" id="sub" name="sub" value="{{old('sub')}}"  />
				</div>

				<div class="form-group">
					<label for="valor">Número de CDP</label>
					<select class="form-control" id="ncdp" name="ncdp">
						@foreach($res as $dato)
						<option value={{$dato->id_cdp}}>{{$dato->id_cdp}}</option>
						@endforeach
					</select>
					</div>

				<div class="form-group">
					<label for="nsol">Numero de contrato</label>
					<input type="text" class="form-control" id="cto" name="cto" value="{{$id}}" />
				</div>
				<button type="submit" class="btn btn-success">Crear Registro</button>
			</form>
		</div>
	</div>

@endsection