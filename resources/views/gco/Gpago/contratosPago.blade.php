@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-around">
        <div class="col-md-3">
            <div class="card ">
                <div class="card-header">Contratos vigentes</div>
                  <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    @if (session('message'))
                        <div class="alert alert-success">
                            {{ session('message') }}
                        </div>
                    @endif
                   
                    <form method="GET" role="search" action="{{url('/buscarconPago')}}">
                    <div class="form-group">
                      <label for="fuente">Seleccione el contrato</label>
                      <select class="form-control" id="Contrato" name="Contrato" value="{{old('Contrato')}}">
                          <option value="NULL">(Seleccionar)</option>
                          @foreach($rta as $sol)
                          <option value={{$sol->id}}>{{$sol->num_cto}}</option>
                          @endforeach           
                        </select>
                    
                    </div>
                          <button type="submit" class="btn btn-default">
                          Ver pagos 
                        </button>
                    </form>
                    <hr />
                      
                  </div>
                </div>
              </div>

            <div class="col-md-9">
            

            <div class="card" >
                <div class="card-header">Pagos realizados a {{$dat}}</div>
                  <div class="card-body">
                    <table class="table table-bordered" id="tableSolicitudes">
                      <thead>
                        <tr>                        
                            <th class="text-center">Fecha de pago</th>
                            <th class="text-center">Valor Pagado</th>
                            <th class="text-center">Valor Saldo</th>
                            <th class="text-center">Observaciones</th>
                     
                        </tr>
                      </thead>
                      <tbody>
                        <div id="listado">

                        @if (isset($resultado))

               
                          @foreach($resultado as $result)
                            
                            <tr>
                              <td class="text-center">{{$result->f_pago}}</td>
                              <td class="text-center">{{ $result->valor_pago}}</td>
                              <td class="text-center">{{ $result->valor_saldo}}</td>
                              <td class="text-center">{{ $result->observaciones  }}</td>                    
                            </tr>
                          
                          @endforeach
                    
                        </div>   
                      </tbody>
                      </table>
                  </div>
                  <a href="{{route('crearPago2',['id'=>$search,'saldo'=>$result->valor_saldo])}}" class="btn btn-outline-primary">Crear nuevo pago</a>
                </div>
                @else 
               
                          Para empezar, Seleccione un contrato para ver sus pagos
                @endif

                
            </div>
        
    </div>    
 </div>
@endsection