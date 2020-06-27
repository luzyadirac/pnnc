@extends('layouts.app')

@section('content')
	<div class="container">
		<div class="row">
			<h2>Crear Garantía</h2>
			<hr>
			<form action="{{url('/guardar-garantia')}}" method="POST" enctype="multipart/form-data" class="col-lg-7">
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
					<a href="{{url('/gestionar-per')}}" >Ver Garantías</a>
				</div>
				<div class="form-group">
					<label for="numero">Numero de Garantía</label>
					<input type="text" class="form-control" id="ngar" name="ngar" value="{{old('ngar')}}"  />	
				</div>
				<div class="form-group">
					<label for="fuente">Fecha de expedición</label>
					<input type="date" class="form-control" id="f_exp" name="f_exp" value="{{old('f_exp')}}"/>
				</div>
				<div class="form-group">
					<label for="valor">Aseguradora</label>
					<input type="text" class="form-control" id="aseguradora" name="aseguradora" value="{{old('aseguradora')}}"  />	
					</div>	
				<div class="form-group">
					<label for="dep">Numero de anexo</label>
					<input type="number" class="form-control" id="anexo" name="anexo" value="{{old('anexo')}}" placeholder="Entero"/>
				</div>

				<div class="form-group">
					<label for="fuente">Fecha de aprobación</label>
					<input type="date" class="form-control" id="f_apro" name="f_apro" value="{{old('f_apro')}}"/>
				</div>

				<div class="form-group">
					<label for="fuente">Contrato</label>
					<input type="text" class="form-control" id="cto" name="cto" value="{{old('cto')}}"/>
				</div>
				
				<div class="form-group">
					<label for="dep">Observaciones</label>
					<textarea class="form-control" id="obs" name="obs">{{old('obs')}} </textarea>
				</div>
					<button type="submit" class="btn btn-success">Crear Garantía</button>
			</form>
		</div>
	</div>

@endsection