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
					<label for="fuente">Contrato asociado es {{$rta}} </label>	
					<input type="hidden" name="Contrato" value="{{$rta}}">	
				</div>
				<div class="form-group">
					<label for="fuente">El saldo actual del contrato es : {{$saldo}}</label>
					<input type="hidden" name="saldo_contrato" value="{{$saldo}}">
		
				</div>
				<div class="form-group">
					<label for="fuente">Fecha de pago</label>
					<input type="date" class="form-control" id="fecha_pago" name="fecha_pago" value="{{old('fecha_pago')}}"/>
				</div>
				<div class="form-group">
					<label for="valor">Valor pagado</label>
					<input type="text" class="form-control" id="valor_pagado" name="valor_pagado" value="{{old('valor_pagado')}}"  />	
					</div>	
				<div class="form-group">
					<label for="dep">Valor saldo</label>
					<input type="number" class="form-control" id="saldo" name="saldo" value="{{old('saldo')}}" placeholder="Entero"/>
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