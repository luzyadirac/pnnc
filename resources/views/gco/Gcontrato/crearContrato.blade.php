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
					<a href="{{url('/gestionar-per')}}" >Ver contratistas</a>
				</div>
				<div class="form-group">
					<label for="contratista">Contratista</label>	
						@if(isset($per))
						@foreach($per as $p)
						<input type="text" class="form-data" id="contra" name="contra" value={{$p->documento}} />				
						{{$p->Nombres}}_{{$p->Apellidos}}
						@endforeach
						@endif
				</div>
				<div class="form-group">
					<label for="numero">Numero de Contrato</label>
					<input type="text" class="form-control" id="Ncto" name="Ncto" value="{{old('Ncto')}}"  />	
				</div>
				<div class="form-group">
					<label for="fuente">Fecha de suscripción</label>
					<input type="date" class="form-control" id="f_susc" name="f_susc" value="{{old('f_susc')}}"/>
				</div>

				<div class="form-group">
					<label for="valor">Clase de Contrato</label>
					<select class="form-control" id="clase" name="clase">
						<option value=010>ARRENDAMIENTO y/o ADQUISICIÓN DE INMUEBLES</option>
						<option value=020>COMODATO</option>
						<option value=031>COMPRAVENTA</option>
						<option value=032>SUMNINISTRO</option>
						<option value=040>CONCESIÓN</option>
						<option value=050>CONSULTORÍA</option>
						<option value=060>CONTRATOS DE ACTIVIDAD CIENTÍFICA Y TECNOLÓGICA</option>
						<option value=070>CONTRATOS DE ESTABILIDAD JURÍDICA</option>
						<option value=080>DEPÓSITO</option>
						<option value=090>FIDUCIA y/o ENCARGO FIDUCIARIO</option>
						<option value=100>INTERVENTORÍA</option>
						<option value=110>MANTENIMIENTO y/o REPARACIÓN</option>
						<option value=120>OBRA PÚBLICA</option>
						<option value=130>PERMUTA</option>
						<option value=140>PRESTACIÓN DE SERVICIOS</option>
						<option value=150>PRESTACIÓN DE SERVICIOS DE SALUD</option>
						<option value=160>PRÉSTAMO o MUTUO</option>
						<option value=170>PUBLICIDAD</option>
						<option value=180>SEGUROS</option>
						<option value=190>TRANSPORTE</option>
						<option value=200>OTROS</option>
						<option value=210>ORDEN DE COMPRA</option>
					</select>

					</div>
				<div class="form-group">
					<label for="nsol">Valor mensual</label>
					<input type="text" class="form-control" id="v_mes" name="v_mes" value="{{old('v_mes')}}"  />
				</div>
				<div class="form-group">
					<label for="nsol">Valor total</label>
					<input type="text" class="form-control" id="v_total" name="v_total" value="{{old('v_total')}}" />
				</div>
				<div class="form-group">
					<label for="objeto">Observaciones de pago</label>
					<textarea class="form-control" id="o_pago" name="o_pago"> {{old('o_pago')}} </textarea>
				</div>
				<div class="form-group">
					<label for="exp">Dependencia</label>
					<select class="form-control" id="depe" name="depe" value="{{old('depe')}}">
						@foreach($areasP as $area)
						<option value={{$area->id_dep}}>{{$area->nombre}}</option>
						@endforeach						
					</select>
				</div>

				<div class="form-group">
					<label for="dep">Plazo</label>
					<input type="number" class="form-control" id="plazo" name="plazo" value="{{old('plazo')}}" placeholder="Entero"/>
				</div>

				<div class="form-group">
					<label for="fuente">Fecha de inicio</label>
					<input type="date" class="form-control" id="f_ini" name="f_ini" value="{{old('f_ini')}}"/>
				</div>
				<div class="form-group">
					<label for="fuente">Fecha de terminación</label>
					<input type="date" class="form-control" id="f_ter" name="f_ter" value="{{old('f_ter')}}"/>
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
					<input type="text" class="form-control" id="super" name="super" value="{{old('super')}}" placeholder="Entero"/>
				</div>
				<div class="form-group">
					<label for="dep">Estado</label>
					<select class="form-control" id="estado" name="estado">
						<option value=100>Vigente</option>
						<option value=200>Terminado</option>
						<option value=300>Terminado Anticipadamente</option>
					</select>
				</div>
				<div class="form-group">
					<label for="valor">Seleccionar el proceso</label>
					<select class="form-control" id="cproceso" name="cproceso" value="{{old('cproceso')}}">
						@foreach($procesos as $proce)
						<option value={{$proce->id_proceso}}>{{$proce->num_proceso}}</option>
						@endforeach						
					</select>
				</div>
				<div class="form-group">
					<label for="valor">Tipo de MAA</label>
					<select class="form-control" id="cmaa" name="cmaa">
						<option value=10>Misional</option>
						<option value=20>Administrativo</option>
						<option value=30>Apoyo</option>
					</select>
				</div>
				<div class="form-group">
					<label for="valor">Nivel:</label>
					<select class="form-control" id="cnivel" name="cnivel">
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