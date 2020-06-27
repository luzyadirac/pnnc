@extends('layouts.app')

@section('content')
	<div class="container">
		<div class="row">
			<h2>Garantía No. {{$rta->id_garantia}}</h2>
			<hr>
			<form action="{{route('updateGar',['id'=>$rta->id_garantia])}}" method="post" enctype="multipart/form-data" class="col-lg-7">
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
					<label for="valor"><b>Aseguradora: </b></label>
					<label for="objeto">{{$rta->aseguradora}}</label>
					</div>
				<div class="form-group">
					<label for="exp"><b>fecha expedición:</b></label>
					<label for="objeto">{{$rta->fecha_exp}}</label>				
				</div>
				<div class="form-group">
					<label for="fecha a"><b>Fecha de aprobación:</b></label>
					<label for="objeto">{{$rta->f_arpobacion}}</label>				
				</div>
				<div class="form-group">
					<label for="contrato"><b>Contrato:</b></label>
					<label for="objeto">{{$rta->id_contrato}}</label>				
				</div>
		
				<div class="form-group">
					<label for="anexo"><b>Numero de anexo</b></label>
					<textarea class="form-control" id="nanexo" name="nanexo"> {{$rta->Num_anexo}} </textarea>
				</div>
				<div class="form-group">
					<label for="tipo"><b>Observaciones:</b></label>
					<input type="text" class="form-control" id="obs" name="obs" value="{{$rta->observaciones}}" />
				</div>
				
				<button type="submit" class="btn btn-success">Actualizar</button>
			</form>
		</div>
	</div>
@endsection