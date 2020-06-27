@extends('layouts.app')

@section('content')
	<div class="container">
		<div class="row">
			<h2>Editar el proceso No. {{$rta->num_proceso}}</h2>
			<hr>
			<form action="{{route('updateP',['id'=>$rta->id_proceso])}}" method="post" enctype="multipart/form-data" class="col-lg-7">
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
					<label for="valor"><b>Modalidad: </b></label>
					<label for="objeto">{{$rta->modalidad}}</label>
					</div>
				<div class="form-group">
					<label for="exp"><b>Codigo de CDP:</b></label>
					<label for="objeto">{{$rta->cod_cdp}}</label>				
				</div>
				<div class="form-group">
					<label for="exp"><b>Última actualización:</b></label>
					<label for="objeto">{{$rta->updated_at}}</label>				
				</div>
		
				<div class="form-group">
					<label for="objeto"><b>Fecha de reparto</b></label>
					<textarea class="form-control" id="reparto" name="reparto"> {{$rta->f_reparto}} </textarea>
				</div>
				<div class="form-group">
					<label for="tipo"><b>Abogado designado:</b></label>
					<input type="text" class="form-control" id="abogado" name="abogado" value="{{$rta->abogado}}" />
				</div>
				<div class="form-group">
					<label for="observaciones"><b>Link: </b></label>
					<textarea class="form-control" id="enlace" name="enlace">{{$rta->link}} </textarea>
				</div>
				<button type="submit" class="btn btn-success">Actualizar Proceso</button>
			</form>
		</div>
	</div>
@endsection