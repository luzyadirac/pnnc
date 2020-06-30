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
                              			<td class="text-left" width="450px">Contratación de la presente vigencia</td>
                              			<td class="text-center"><a href="{{route('exportCon')}}" class="btn btn-outline-info">Exportar</a></td>
                            		</tr>     
                            		                            		<tr>
                              			<td class="text-left" width="450px">Contratos por dependencia </td>
                              			<td class="text-center"><a href="{{route('exportadj')}}" class="btn btn-outline-info">Exportar</a></td>
                            		</tr>
                            		                            		<tr>
                              			<td class="text-left" width="450px">Contratistas con contrato vigente:</td>
                              			<td class="text-center"><a href="{{route('exportPer')}}" class="btn btn-outline-info">Exportar</a></td>
                            		</tr>
                            		                            		<tr>
                              			<td class="text-left" width="450px">Informe de gestión</td>
                              			<td class="text-center"><a href="{{route('export_ig')}}" class="btn btn-outline-info">Exportar</a></td>
                            		</tr>                      
                      			</tbody>                     
                    		</table>	
				</div>
				</div>
			</div>
	</div>	
</div>


