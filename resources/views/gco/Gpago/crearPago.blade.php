@extends('layouts.app')

@section('content')
	<div class="container">
		<div class="row">
			<h2>Crear Pago</h2>
			<hr>
			<form action="{{url('/guardar-pago')}}" method="POST" enctype="multipart/form-data" class="col-lg-7">
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
					<label for="fuente">Fecha de pago</label>
					<input type="date" class="form-control" id="fpago" name="fpago" value="{{old('fpago')}}"/>
				</div>
				<div class="form-group">
					<label for="valor">Valor pagado</label>
					<input type="text" class="form-control" id="vpago" name="vpago" value="{{old('vpago')}}"  />	
					</div>	
				<div class="form-group">
					<label for="dep">Valos saldo</label>
					<input type="number" class="form-control" id="spago" name="spago" value="{{old('spago')}}" placeholder="Entero"/>
				</div>

				<div class="form-group">
					<label for="fuente">Contrato asociado</label>
					<input type="text" class="form-control" id="cpago" name="cpago" value="{{old('cpago')}}"/>
				</div>
				<div class="form-group">
					<label for="dep">Observaciones</label>
					<textarea class="form-control" id="obs" name="obs">{{old('obs')}} </textarea>
				</div>
					<button type="submit" class="btn btn-success">Crear Pago</button>
			</form>
		</div>
	</div>

@endsection