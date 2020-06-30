<div class="container">
	<div class="col-md-12 col-md-offset-3" >
		<h4>Seleccione el reporte que desea, este se descargará en .xlsx</h4>
		<hr/>
			<div class="col-md-12">
				<div class="card">
					
				<!--datos de la solicitud-->

				<div class="card-body">		
				<table class="table table-bordered" id="tableSolicitudes">
                     			<tbody>                                            
                            		<tr>
                              			<td class="text-left" width="450px">Estado de los contratos: Exporta los contratos organizados por Misional . Administrativo o de apoyo. </td>
                              			<td class="text-center"><a href="{{route('export_maa')}}" class="btn btn-outline-info">Exportar</a></td>
                            		</tr>     
                            		<tr>
                              			<td class="text-left" width="450px">Estado contratistas: exporta los contratistas agrupados por activos, inactivos y nuevos</td>
                              			<td class="text-center"><a href="{{route('export_ep')}}" class="btn btn-outline-info">Exportar</a></td>
                            		</tr>
                            		                            		<tr>
                              			<td class="text-left" width="450px">Estado de garantías: exporta todas la garantías y los datos de las mismas</td>
                              			<td class="text-center"><a href="{{route('export_gar')}}" class="btn btn-outline-info">Exportar</a></td>
                            		</tr>
                            		                            		<tr>
                              			<td class="text-left" width="450px">Estado pagos: exporta todos los pagos registrados </td>
                              			<td class="text-center"><a href="{{route('export_pagos')}}" class="btn btn-outline-info">Exportar</a></td>
                            		</tr>                      
                      			</tbody>                     
                    		</table>	
				</div>
				</div>
			</div>
	</div>	
</div>
