@extends('layouts.app')

@section('content')
	<div class="container">
		<div class="row">
			<h2>Documento No. {{$rta->id_persona}}</h2>
			<hr>
			<form action="{{route('updatePer',['id'=>$rta->id_persona])}}" method="post" enctype="multipart/form-data" class="col-lg-7">
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
					<label for="valor"><b>Nombres: </b></label>
					<label for="objeto">{{$rta->Nombres}}</label>
					</div>
				<div class="form-group">
					<label for="exp"><b>Apellidos:</b></label>
					<label for="objeto">{{$rta->Apellidos}}</label>				
				</div>
				<div class="form-group">
					<label for="exp"><b>Fecha de Nacimiento:</b></label>
					<label for="objeto">{{$rta->fecha_nac}}</label>				
				</div>
				<div class="form-group">
					<label for="exp"><b>Clase:</b></label>
					<label for="objeto">{{$rta->clase}}</label>				
				</div>
		
				<div class="form-group">
					<label for="objeto"><b>Telefono</b></label>
					<textarea class="form-control" id="telefono" name="telefono"> {{$rta->Telefono}} </textarea>
				</div>
				<div class="form-group">
					<label for="tipo"><b>Correo Personal:</b></label>
					<input type="text" class="form-control" id="correo" name="correo" value="{{$rta->correo_p}}" />
				</div>
				<div class="form-group">
					<label for="observaciones"><b>Profesion: </b></label>
					<textarea class="form-control" id="prof" name="prof">{{$rta->profesion}} </textarea>
				</div>
				<div class="form-group">
					<label for="tipo"><b>Experiencia:</b></label>
					<input type="text" class="form-control" id="expe" name="expe" value="{{$rta->experiencia}}" />
				</div>
								<div class="form-group">
					<label for="tipo"><b>Codigo HV Sigep:</b></label>
					<input type="text" class="form-control" id="hv" name="hv" value="{{$rta->hv_sigep}}" />
				</div>
				<button type="submit" class="btn btn-success">Actualizar</button>
			</form>
		</div>
	</div>
@endsection