@extends('layouts.app')

@section('content')
	<div class="container">
		<div class="row">
			<h2>Crear Contrato</h2>
			<hr>
			<form action="{{url('/guardar-contrato')}}" method="POST" enctype="multipart/form-data" class="col-lg-7">
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
					<label for="anuncio">Click en la opción para buscar y seleccionar un contratista: </label>
					<a href="{{url('/gestionar-per')}}" >Ver contratistas</a>
				</div>
				<div class="form-group">
					<label for="contratista">Contratista</label>	
						@if(isset($per))
						@foreach($per as $p)
						<input type="text" class="form-data" id="contratista" name="contratista" value={{$p->documento}} />				
						{{$p->Nombres}}_{{$p->Apellidos}}
						@endforeach
						@endif
				</div>
				<div class="form-group">
					<label for="anuncio">Recuerde que el número de contrato: </label>
					<label for="anuncio"><b>Clase de contrato -  consecutivo - año vigencia </b></label>
				
				</div>
				<div class="form-group">
					<label for="numero">Numero de Contrato</label>
					<input type="text" class="form-control" id="Numero_cto" name="Numero_cto" value="{{old('Numero_cto')}}"  placeholder="Ej: CPS-0**-2020" />	
				</div>
				<div class="form-group">
					<label for="fuente">Fecha de suscripción</label>
					<input type="date" class="form-control" id="fecha_suscripcion" name="fecha_suscripcion" value="{{old('fecha_suscripcion')}}"/>
				</div>

				<div class="form-group">
					<label for="valor">Clase de Contrato</label>
					<select class="form-control" id="clase" name="clase">
						<option value=0>(Seleccionar)</option>
						<option value='ARRENDAMIENTO y/o ADQUISICIÓN DE INMUEBLES'>ARRENDAMIENTO y/o ADQUISICIÓN DE INMUEBLES</option>
						<option value='COMODATO'>COMODATO</option>
						<option value='COMPRAVENTA'>COMPRAVENTA</option>
						<option value='SUMNINISTRO'>SUMNINISTRO</option>
						<option value='CONCESIÓN'>CONCESIÓN</option>
						<option value='CONSULTORÍA'>CONSULTORÍA</option>
						<option value='CONTRATOS DE ACTIVIDAD CIENTÍFICA Y TECNOLÓGICA'>CONTRATOS DE ACTIVIDAD CIENTÍFICA Y TECNOLÓGICA</option>
						<option value='CONTRATOS DE ESTABILIDAD JURÍDICA'>CONTRATOS DE ESTABILIDAD JURÍDICA</option>
						<option value='DEPÓSITO'>DEPÓSITO</option>
						<option value='FIDUCIA y/o ENCARGO FIDUCIARIO'>FIDUCIA y/o ENCARGO FIDUCIARIO</option>
						<option value='INTERVENTORÍA'>INTERVENTORÍA</option>
						<option value='MANTENIMIENTO y/o REPARACION'>MANTENIMIENTO y/o REPARACIÓN</option>
						<option value='OBRA PUBLICA'>OBRA PÚBLICA</option>
						<option value='PERMUTA'>PERMUTA</option>
						<option value='PRESTACION DE SERVICIOS'>PRESTACIÓN DE SERVICIOS</option>
						<option value='PRESTACION DE SERVICIOS DE SALUD'>PRESTACIÓN DE SERVICIOS DE SALUD</option>
						<option value='PIBLICIDAD'>PUBLICIDAD</option>
						<option value='SEGUROS'>SEGUROS</option>
						<option value='TRASPORTE'>TRANSPORTE</option>
						<option value='OTROS'>OTROS</option>
						<option value='ORDEN DE COMPRA'>ORDEN DE COMPRA</option>
					</select>

					</div>
				<div class="form-group">
					<label for="nsol">Valor mensual</label>
					<input type="text" class="form-control" id="valor_mensual" name="valor_mensual" value="{{old('valor_mensual')}}"  />
				</div>
				<div class="form-group">
					<label for="nsol">Valor total</label>
					<input type="text" class="form-control" id="valor_total" name="valor_total" value="{{old('valor_total')}}" />
				</div>
				<div class="form-group">
					<label for="objeto">Observaciones de pago</label>
					<textarea class="form-control" id="observaciones_pago" name="observaciones_pago"> {{old('observaciones_pago')}} </textarea>
				</div>
				<div class="form-group">
					<label for="exp">Dependencia</label>

					<select class="form-control" id="dependencia" name="dependencia" value="{{old('dependencia')}}">
						<option value=0>(Seleccionar)</option>
						@foreach($areasP as $area)
						<option value={{$area->nombre}}>{{$area->nombre}}</option>
						@endforeach						
					</select>
				</div>

				<div class="form-group">
					<label for="dep">Plazo</label>
					<input type="number" class="form-control" id="plazo" name="plazo" value="{{old('plazo')}}" placeholder="Numero de días"/>
				</div>

				<div class="form-group">
					<label for="fuente">Fecha de inicio</label>
					<input type="date" class="form-control" id="fecha_inicio" name="fecha_inicio" value="{{old('fecha_inicio')}}"/>
				</div>
				<div class="form-group">
					<label for="fuente">Fecha de terminación</label>
					<input type="date" class="form-control" id="fecha_terminacion" name="fecha_terminacion" value="{{old('fecha_terminacion')}}"/>
				</div>

				<div class="form-group">
					<label for="dep">Link Secop II</label>
					<input type="text" class="form-control" id="link" name="link" value="{{old('link')}}" />
				</div>
				<div class="form-group">
					<label for="dep">Expediente</label>
					<input type="text" class="form-control" id="exp" name="exp" value="{{old('exp')}}" />
				</div>
				<div class="form-group">
					<label for="dep">Supervisor</label>

					<select class="form-control" id="supervisor" name="supervisor" value="{{old('supervisor')}}">
						<option value=0>(Seleccionar)</option>
						@foreach($supervisores as $super)
						<option value={{$super->Nombres}}.{{$super->Apellidos}}>{{$super->Nombres}}.{{$super->Apellidos}}</option>
						@endforeach						
					</select>
				</div>
				<div class="form-group">
					<label for="dep">Estado</label>
					<select class="form-control" id="estado" name="estado">
						<option value=0>(Seleccionar)</option>
						<option value=100>Vigente</option>
						<option value=200>Terminado</option>
						<option value=300>Terminado Anticipadamente</option>
					</select>
				</div>
				<div class="form-group">
					<label for="valor">Seleccionar el proceso</label>
					<select class="form-control" id="numero_proceso" name="numero_proceso" value="{{old('numero_proceso')}}">
						<option value=0>(Seleccionar)</option>
						@foreach($procesos as $proce)
						<option value={{$proce->id_proceso}}>{{$proce->num_proceso}}</option>
						@endforeach						
					</select>
				</div>
				<div class="form-group">
					<label for="valor">Tipo de MAA</label>
					<select class="form-control" id="cmaa" name="cmaa">
						<option value=0>(Seleccionar)</option>
						<option value=10>Misional</option>
						<option value=20>Administrativo</option>
						<option value=30>Apoyo</option>
					</select>
				</div>
				<div class="form-group">
					<label for="valor">Nivel:</label>
					<select class="form-control" id="nivel" name="nivel">
						<option value=0>(Seleccionar)</option>
						<option value=10>Directivo</option>
						<option value=20>Profesional</option>
						<option value=30>Tecnico</option>
						<option value=40>Asistencial</option>
					</select>
				</div>
				<div class="form-group">
					<label for="dep">Observaciones</label>
					<textarea class="form-control" id="obs" name="obs">{{old('obs')}} </textarea>
				</div>
					<button type="submit" class="btn btn-success">Crear Contrato</button>
			</form>
		</div>
	</div>

@endsection