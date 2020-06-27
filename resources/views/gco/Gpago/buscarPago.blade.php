@extends('layouts.app')


@section('content')
<div class="container">
    <div class="row justify-content-around">
        <div class="col-md-9">
            <div class="card" >
                <div class="card-header">Resultado de la consulta</div>
                  <div class="card-body">
                    <table class="table table-bordered" id="tableSolicitudes">
                      <thead>
                        <tr>                        
                            <th class="text-center">Numero de pago</th>
                            <th class="text-center">Fecha de pago</th>
                            <th class="text-center">Valor pagado</th>
                            <th class="text-center">Contrato</th>
                            <th class="text-center">Acciones</th>
                        </tr>
                      </thead>
                      <tbody>
                        <div id="listado">
                          @foreach($resultado as $result)
                            <tr>
                              <td class="text-center">{{$result->id_pago}}</td>
                              <td class="text-center">{{ $result->f_pago}}</td>
                              <td class="text-center">{{ $result->valor_pago}}</td>
                              <td class="text-center">{{ $result->icod_contrato  }}</td>
                              <td><a href="{{route('mostrarPago',['id'=>$result->id_pago])}}" class="btn btn-outline-info">Seleccionar</a></td>
                            </tr>
                          @endforeach
                        </div>   
                      </tbody>
                           

                      </table>
                  </div>
                </div>
            </div>        
    </div>
</div>
@endsection